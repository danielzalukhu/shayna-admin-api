<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductGalleryRequest;
use App\Models\ProductGallery;
use App\Models\Product;
use Alert;

class ProductGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProductGallery::with('product')->get();
        return view('pages.galleries.index', compact(
            'items'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('pages.galleries.create', compact(
            'products'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        
        $data["image_url"] = $request->file('image_url')->store(
            'assets/product', 'public'
        );

        ProductGallery::create($data);
        
        Alert::success('Gatchaaa!', 'Gambar produk ID: ' . $request->product_id . ' berhasil tersimpan');
        return redirect('galleries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        Alert::success('Yup!', 'Gambar produk ' . $item->name . ' berhasil di hapus');
        return redirect('galleries');
    }
}
