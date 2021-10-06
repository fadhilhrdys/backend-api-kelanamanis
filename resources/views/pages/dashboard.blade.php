@extends('layouts.dashboard')

@section('dashboardcontent')
<!-- main content -->
<div class="col-sm-5">

    <!-- content 1 -->
    <div class="row">
        <div class="col-sm text-center amount-menu py-4">
            <h1 class="number-menu font-weight-bold">{{ $menus }}</h1>
            <h2 class="wording-menu">Menu's</h2>
            <a href="{{ route('menu.index') }}">click for details</a>
        </div>
        <div class="col-sm text-center amount-orders py-4">
            <h1 class="number-orders font-weight-bold">{{ $orders }}</h1>
            <h2 class="wording-roder">Order's</h2>
            <a href="{{ route('transaction.index') }}">click for details</a>
        </div>
    </div>
    <!-- end content 1 -->

    <!-- content 2 -->
    <div class="row container-recent-orders mt-4">
        <h3 class="font-weight-bold"> Recent Orders </h3>
        <div class="recent-orders d-flex justify-content-center px-3 py-2 w-100">
            <table class="w-100">
                <tr>
                    <th>ORDER ID</th>
                    <th>QUANTITY</th>
                    <th>TOTAL TRANSACTION</th>
                    <th>STATUS ORDER</th>
                </tr>
                @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->uuid }}</td>
                    <td>{{ $transaction->quantity }} Pcs</td>
                    <td>@currency( $transaction->transaction_total )</td>
                    <td>{{ $transaction->transaction_status }}</td>
                </tr>
                @empty
                <td>
                    <p>Transaction not availible</p>
                </td>
                @endforelse
            </table>
        </div>
    </div>
    <!-- end content 2 -->

    <!-- content 3 -->
    <div class="row mt-4">
        <h3 class="font-weight-bold">Signature Menu's</h3>
    </div>
    <div class="row signature-menus mt-2">
        <img class="box-signature" src="asset/img/pbs.png" alt="">
        <img class="box-signature" src="asset/img/pcs.png" alt="">
        <img class="box-signature" src="asset/img/pms.png" alt="">
    </div>
    <!-- end content 3 -->

</div>
<!-- end main content -->

<!-- side right panel -->
<div class="col-sm-3 ml-3">
    <!-- calendar -->
    <div class="row">
        <div class="col-sm calendar d-flex align-items-center flex-column py-4">
            <span class="month"></span>
            <span class="date font-weight-bold"></span>
            <span class="year"></span>
        </div>
    </div>
    <!-- end calendar -->
    <!-- grafik report -->
    <div class="row">
        <div class="col grafik-report mt-4 py-4">
            <h3 class="font-weight-bold mb-3 text-center"> Grafik Report </h3>
            <canvas id="chart-status" width="100" height="100"></canvas>
        </div>
    </div>
    <!-- end grafik report-->
</div>
<!-- end right panel -->
@endsection