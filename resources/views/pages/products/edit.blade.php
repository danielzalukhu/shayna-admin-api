@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Barang</strong>
            <small> - {{ $product->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update', $product->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-name">Nama Barang</label>
                    <input  type="text"
                            name="name"
                            value="{{ old('name') ? old('name') : $product->name }}"
                            class="form-control @error('name') is-invalid @enderror"/>
                    @error('name') 
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-type">Tipe Barang</label>
                    <input  type="text"
                            name="type"
                            value="{{ old('type') ? old('type') : $product->type }}"
                            class="form-control @error('type') is-invalid @enderror"/>
                    @error('type') 
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-description">Deskripsi Barang</label>
                    <textarea   name="description"
                                class=" form-control ckeditor
                                        @error('description') is-invalid @enderror">
                                {{ old('description') ? old('description') : $product->description }}
                    </textarea>
                    @error('description') 
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-price">Harga Barang</label>
                    <input  type="number"
                            name="price"
                            value="{{ old('price') ? old('price') : $product->price }}"
                            class="form-control @error('price') is-invalid @enderror"/>
                    @error('price') 
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-quantity">Kuantitas Barang</label>
                    <input  type="number"
                            name="quantity"
                            value="{{ old('quantity') ? old('quantity') : $product->quantity }}"
                            class="form-control @error('quantity') is-invalid @enderror"/>
                    @error('quantity') 
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-warning btn-block" type="submit">
                        Ubah Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection