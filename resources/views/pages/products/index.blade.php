@extends('layouts.master')

@section('content')
    <div class="orders"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableListProduk">
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->type }}</td>
                                            <td>Rp. {{ number_format($product->price, 0, ', ', '.') }}</td>
                                            <td>{{ $product->quantity }}</td></td>
                                            <td>
                                                <a href="{{ route('product.galleries', $product->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-picture-o "></i>
                                                </a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form   action="{{ route('products.destroy', $product->id) }}" 
                                                        method="post" 
                                                        class="d-inline ">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm confirm-delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Tidak ada produk
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
    $(document).ready(function(){
        $('#tableListProduk').on('click', '.confirm-delete', function () {
            alert('kena deh');
            // event.preventDefault();
            // const url = $(this).attr('href');
            // swal({
            //     title: 'Apakah anda yakin?',
            //     text: 'Produk ini akan terhapus secara permanen!',
            //     icon: 'warning',
            //     buttons: ["Batal", "Ya!"],
            // }).then(function(value) {
            //     if (value) {
            //         window.location.href = url;
            //     }
            // });
        });        
    });
</script>
@endsection