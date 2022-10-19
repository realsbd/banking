{{-- {{ dd($transactions) }} --}}
<x-app-layout>
    @include('layouts.navigation')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Welcome</a></li>
                    <li class="breadcrumb-item active">{{ ucwords(Auth::user()->name) }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Balance <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-euro"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>€{{ number_format(Auth::user()->balance,'2',',','.') }}</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->
                        @if (session('status'))
                            <div class="col-xxl-4 col-md-6">
                                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        @endif

                        <!-- Recent Transactions -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Recent Transactions <span>| Today</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $transaction)
                                                <tr>
                                                    <th scope="row"><a href="#">5462{{ $transaction->id }}</a></th>
                                                    <td>Debit {{ ucwords($transaction->name) }}</td>
                                                    <td>{{ $transaction->description }}</td>
                                                    <td>€{{ number_format($transaction->amount,'2',',','.') }}</td>
                                                    <td>
                                                        {{-- get today's date --}}
                                                        @if ($transaction->created_at->diffInDays(now())<1)
                                                            <span class="badge bg-warning">Pending</span>
                                                        @else
                                                            <span class="badge bg-success">Approved</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th scope="row"><a href="#">54621</a></th>
                                                <td>Bridie Kessler</td>
                                                <td><a href="#" class="text-primary">Purchased Wristwatch</a></td>
                                                <td>€470,41</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">54620</a></th>
                                                <td>Ashleigh Langosh</td>
                                                <td><a href="#" class="text-primary">Rolex Watch</a></td>
                                                <td>€10.247,52</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">5458</a></th>
                                                <td>Angus Grady</td>
                                                <td><a href="#" class="text-primar">iPhone XR</a></td>
                                                <td>€67</td>
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">54596</a></th>
                                                <td>Raheem Lehner</td>
                                                <td><a href="#" class="text-primary">JBL Speaker</a></td>
                                                <td>€165</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->
</x-app-layout>
