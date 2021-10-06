@extends('layouts.default')

@section('content')
<div class="col-sm-8 px-0">
    <div class="col-sm-5 align-self-center pb-3 px-0 text-center search-transaction">
        <form action="/transaction">
            <input class="col py-3" type="search" placeholder="search transaction..." name="search"
                value="{{ request('search') }}">
        </form>
    </div>
    <div class="row transcations-row ml-0">
        <table class="w-100">
            <tr>
                <th>NO</th>
                <th class="p-0">DATE ORDER</th>
                <th>ORDER ID</th>
                <th>TOTAL ORDER</th>
                <th>PAYMENT</th>
                <th>DETAIL ORDER</th>
                <th>STATUS ORDER</th>
            </tr>
            @php
            $no = 1;
            @endphp
            @forelse ($transactions as $index=>$transaction)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="p-0">{{ date('d/m/Y', strtotime($transaction->created_at)) }}</td>
                <td>{{ $transaction->uuid }}</td>
                <td>@currency( $transaction->transaction_total )</td>
                <td class="text-center">
                    <img src="{{ asset('storage/' . $transaction->payment) }}" id="image-payment @php $index @endphp"
                        onclick="showImage(this, @php $index @endphp)">
                </td>
                <td class="text-center">
                    <a href=".modal-detail" class="btn-detail" data-toggle="modal" data-target=".modal-detail"
                        data-title="{{ $transaction->uuid }}"
                        data-remote="{{ route('transaction.show' , $transaction->id) }}">DETAIL</a>
                </td>
                <td>
                    @if ($transaction->transaction_status == 'PROCESS')
                    <span class="process">PROCESS</span>
                    @elseif ($transaction->transaction_status == 'SUCCESS')
                    <span class="success">SUCCESS</span>
                    @else
                    <span class="pending">PENDING</span>
                    @endif
                </td>
            </tr>
            @empty
            <td>
                <p>Transaction is not availible</p>
            </td>
            @endforelse
        </table>
    </div>

    <!-- modal detail -->
    <div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="header-modal d-flex align-items-center pl-3">
                    <h3>Detail Transaction</h3>
                    <h3 class="font-weight-bold ml-2 pb-1 modal-title"></h3>
                </div>
                <div class="table-detail">
                    {{-- data on detail.blade.php --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end modal detail -->

    <!-- view payment -->
    <div id="modal-payment-img" class="modal-payment">
        <span class="close">&times;</span>
        <img class="modal-content" id="show-image-payment">
    </div>
    <!-- end view payment -->

</div>
@endsection