<table>
    <tr>
        <td>Name</td>
        <td>: {{ $transactions->name }}</td>
    </tr>
    <tr>
        <td>Date Order</td>
        <td>: {{ date('H:i:s , d/m/Y', strtotime( $transactions->created_at)) }}</td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td>: {{ $transactions->phone_number}}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td>: {{ $transactions->address}}</td>
    </tr>
    <tr>
        <td>Transaction total</td>
        <td>: @currency( $transactions->transaction_total )</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>: {{ $transactions->transaction_status }} /
            <a href="{{ route('transaction.status', $transactions->id) }}?status=PROCESS" class="process ml-2">
                Set Process
            </a>
            <a href="{{ route('transaction.status', $transactions->id) }}?status=SUCCESS" class="success ml-3">
                Set Success
            </a></td>
    </tr>
    {{-- <button class="btn-change-status">change status</button> --}}
    {{-- <tr class="btn-set-status">
        <td>
            <a href="#" class="process">
                Set Process
            </a>
        </td>
        <td>
            <a href="#" class="success">
                Set Success
            </a>
        </td>
    </tr> --}}
    <tr>
        <td>Orders </td>
        <td>
            <table class="table-orders">
                <tr>
                    <th>Menu</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Toping</th>
                </tr>
                @foreach ($transactions->transaction as $detail)
                <tr>
                    <th>{{ $detail->menu->name }}</th>
                    <th>{{ $detail->menu->price }}</th>
                    <th>{{ $transactions->quantity }}</th>
                    <th>{{ $transactions->toping }}</th>
                </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>