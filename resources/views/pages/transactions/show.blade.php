<table class="table table-bordered table-striped">
    <tr>
        <th style="width:30%"> Nama </th>
        <td> {{ $item->name }} </td>
    </tr>
    <tr>
        <th style="width:30%"> Email </th>
        <td> {{ $item->email }} </td>
    </tr>  
    <tr>
        <th style="width:30%"> Nomor </th>
        <td> {{ $item->number }} </td>
    </tr>   
    <tr>
        <th style="width:30%"> Alamat </th>
        <td> {{ $item->address }} </td>
    </tr> 
    <tr>
        <th style="width:30%"> Total Transaksi </th>
        <td> {{ $item->transaction_total }} </td>
    </tr>
    <tr>
        <th style="width:30%"> Status </th>
        <td> 
            @if($item->transaction_status == "pending")
                PENDING
            @elseif($item->transaction_status == "rejected")
                REJECT
            @else
                SUCCESS
            @endif
        </td>
    </tr>
    <tr>
        <th style="width:30%"> Detail Pembelian Produk </th>
        <td> 
            <table class="table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach($item->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>Rp. {{ $detail->product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
@if($item->transaction_status !== "success")
    <div class="row">
        <div class="col-4">
            <a  href="{{ route('transactions.status', $item->id) }}?status=success"
                class="btn btn-success btn-block">
                <i class="fa fa-check"></i>Sukses
            </a>
        </div>
        <div class="col-4">
            <a  href="{{ route('transactions.status', $item->id) }}?status=rejected"
                class="btn btn-danger btn-block">
                <i class="fa fa-times"></i>Reject
            </a>
        </div>
        <div class="col-4">
            <a  href="{{ route('transactions.status', $item->id) }}?status=pending"
                class="btn btn-warning btn-block">
                <i class="fa fa-spinner"></i>Pending
            </a>
        </div>
    </div>
@endif