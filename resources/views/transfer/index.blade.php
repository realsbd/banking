<x-app-layout>
    @include('layouts.navigation')
    <main id="main" class="main">
        <div class="row">
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
    
                    <div class="card-body">
                        <h5 class="card-title">{{ ucwords(Auth::user()->name) }}</span></h5>
    
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h3 class="">€{{ number_format(Auth::user()->balance,'2',',','.') }}</h3>
    
                            </div>
                        </div>
                    </div>
    
                </div>
            </div><!-- End Revenue Card -->
        </div>
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        <form class="row g-3" method="POST" action="/confirm">
            @csrf
            <div class="col-12 col-lg-6">
                <label for="clientName" class="form-label">Client Name</label>
                <input type="text" name="name" class="form-control" style="text-transform:uppercase" value="{{ old('name') }}" id="clientName" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="iban" class="form-label">IBAN</label>
                <input type="text" name="iban" value="{{ old('iban') }}" class="form-control" style="text-transform:uppercase" id="iban" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="bic" class="form-label">BIC</label>
                <input type="text" name="bic" value="{{ old('bic') }}" class="form-control" style="text-transform:uppercase" id="bic" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="bank" class="form-label">Bank Name</label>
                <input type="text" class="form-control" style="text-transform:uppercase" name="bank" value="{{ old('bank') }}" id="bank" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="amount" class="form-label">Amount</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-currency-euro"></i></span>
                    <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" id="amount" required>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <label for="description" class="form-label">Payment for</label>
                <input type="text" class="form-control" name="description" value="{{ old('description') }}" id="description" placeholder="iPone 13 Pro max 512GB" required>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary" id="submit">Transfer</button>
            </div>

            <script>
                // document.onload(
                    // function spinner() {
                    //     var btn = document.getElementById("submit")
                    //     btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Transferring....'
                    // }
                // )
            </script>
        </form>
    </main>
</x-app-layout>