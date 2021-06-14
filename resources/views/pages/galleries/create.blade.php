@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Gambar Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="form-control-name">Nama Barang</label>
                    <select name="product_id"
                            class="form-control @error('product_id') is-invalid @enderror">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product_id') 
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="image_url" class="form-control-photo">Gambar Barang</label>
                    <input  type="file"
                            name="image_url"
                            value="{{ old('image_url') }}"
                            accept="image/*"
                            required
                            class="form-control @error('image_url') is-invalid @enderror"/>
                    @error('image_url') 
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_default" class="form-control-default">Default Gambar</label>
                    <br>
                    <label>
                        <input  type="radio"
                                name="is_default"
                                value="1"
                                class="form-control @error('is_default') is-invalid @enderror"/> Ya
                    </label>
                    &nbsp
                    <label>
                        <input  type="radio"
                                name="is_default"
                                value="0"
                                class="form-control @error('is_default') is-invalid @enderror"/> Tidak
                    </label>
                    @error('is_default') 
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Gambar Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection