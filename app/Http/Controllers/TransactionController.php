<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transfer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function confirm(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'iban' => 'required',
            'bic' => 'required',
            'bank' => 'required',
            'amount' => 'required',
            'description' =>'required'
        ]);

        sleep(5);

        if($input['amount'] > Auth::user()->balance){
            return redirect()->back()->with('status', 'Amount exceeds your balance');
        }

        return view('confirm', ['inputs' => $input]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'iban' => 'required',
            'bic' => 'required',
            'bank' => 'required',
            'amount' => 'required',
            'description' =>'required',
            'pin' => 'required'
        ]);

        if ($validated['pin'] === Auth::user()->pin) {
            $request->user()->transaction()->create($validated);
        } else{
            return redirect('transfer')->with('status', 'Invalid password');
        }
        $user = Auth::user();
        $newBalance = $user->balance-$validated['amount'];

        DB::table('users')->where('id', $user->id)->update(array('balance' => $newBalance));

        sleep(5);

        return redirect(route('dashboard'))->with('status', 'Transfer successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
