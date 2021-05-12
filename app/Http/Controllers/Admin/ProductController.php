<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
        ->get();
        return view('admin.products',[
            'desktop' => 'menu-open',
            'desktopProductr' => 'active',
             'title' => 'Data Produk',
             'products' => $products
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')
        ->get();
        return view('admin.product_create', [
            'desktop' => 'menu-open',
            'desktopProduct' => 'active',
             'title' => 'Tambah Product',
             'categories' => $category,
             ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'product_price' => 'required',
            'product_stok' => 'required',
        ]);
        if(request('product_image') == null) {
            $filename = null;
        } else {
            $filename = date('ymdhis').'.'.request('product_image')->extension();
        }
        $product_price = str_replace('.', '', $request->product_price);
        DB::table('products')
        ->insert([
            'product_code' => $request->product_code,
            'product_category' => $request->product_category,
            'product_name' => $request->product_name,
            'product_price' => $product_price,
            'product_stok' => $request->product_stok,
            'product_image' => $filename,
        ]);
        if ($filename != null) {
            request()->file('product_image')->move(public_path('/dist/img/products/'), $filename);
        }
            session()->flash("Ok","Data Produk Telah Ditambahkan");
            return redirect('products');

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
        $product = DB::table('products')
        ->where('id_product','=',$id)
        ->first();
        //dd($product);
        $category = DB::table('categories')
        ->get();
        return view('admin.product_edit', [
            'desktop' => 'menu-open',
            'desktopProduct' => 'active',
             'title' => 'Tambah Product',
             'categories' => $category,
             'product' => $product,
             ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $request = request()->all();
        // dd($request);
        $image = DB::table('products')
        ->where('id_product','=' ,$request['id_product'])
        ->value('product_image');
        if(request('product_image') == null) {

        } else {
           if ($image == null) {
           $image = date('ymdhis').'.'.request('product_image')->extension();
           request()->file('product_image')->move(public_path('/dist/img/products/'), $image);
       }  else {
           request()->file('product_image')->move(public_path('/dist/img/products/'), $image);
       }
    }

       $update = DB::table('products')
       ->where('id_product','=',$request['id_product'])
       ->update([
           'product_name' => $request['product_name'],
           'product_category' => $request['product_category'],
           'product_code' => $request['product_code'],
           'product_price' => $request['product_price'],
           'product_stok' => $request['product_stok'],
           'product_image' => $image,
           'updated_at' => now()
           ]);
           if ($update) {
            session()->flash("Ok","Data Product Telah Diupdate");
            return redirect('products');
        } else {
            session()->flash("Fail","Data Product Gagal Diupdate");
            return redirect('products');
        }
   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $cekFoto = DB::table('products')
        ->where('id_product','=',request('id'))
        ->value('product_image');
       //dd($cekFoto);
        if($cekFoto != null){
            unlink(public_path('dist/img/products/').$cekFoto);
        }
        if(
        DB::table('products')
        ->where('id_product','=',request('id'))
        ->delete()
        )
        {
            session()->flash("Ok","Data Produk Telah Dihapus");
            return redirect('products');
        } else {
            session()->flash("Fail","Data Produk Belum Dihapus");
            return redirect('products');
        }
    }

}
