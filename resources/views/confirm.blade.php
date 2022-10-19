{{-- {{ dd($inputs) }} --}}
<x-app-layout>
    @include('layouts.navigation')
    <main id="main" class="main">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
              <h5 class="card-title">You are transferring:</h5>
              <p><strong>Amount:</strong> €{{ number_format($inputs['amount'],'2',',','.') }} </p>
              <h2><strong>To:</strong></h2>
              <p>{{ ucwords($inputs['name']) }}</p>
              <p>{{ $inputs['email'] }}</p>
              <p>{{ strtoupper($inputs['iban']) }}</p>
              <p>{{ strtoupper($inputs['bic']) }}</p>
              <p>{{ strtoupper($inputs['bank']) }}</p>
              <h2><strong>Being payment for:</strong></h2>
              <p>{{ $inputs['description'] }}</p>
            </div>
        <form action="/transfer" method="post">
            @csrf
            <input type="hidden" name="name" value="{{ $inputs['name'] }}">
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">
            <input type="hidden" name="iban" value="{{ $inputs['iban'] }}">
            <input type="hidden" name="bic" value="{{ $inputs['bic'] }}">
            <input type="hidden" name="bank" value="{{ $inputs['bank'] }}">
            <input type="hidden" name="amount" value="{{ $inputs['amount'] }}">
            <input type="hidden" name="description" value="{{ $inputs['description'] }}">
            <div class="col-4 text-center" style="margin: 10px auto">
                <label for="yourPassword" class="form-label">Enter your pin</label>
                <input type="text" name="pin" class="form-control" id="yourPassword" required>
                <div class="invalid-feedback">Please enter your 6 digit!</div>
                @error('pin')
                    <span class="hidden alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center mb-2">
                <button type="submit" name="submit" class="btn btn-primary" id="submit">Confirm</button>
            </div>
        </form>
        </div>
    </main>
</x-app-layout>