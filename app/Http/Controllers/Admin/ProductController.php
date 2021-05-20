<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

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
       // ->join('product_colors', 'products.product_code', '=','product_colors.product_code')
        ->get();
        //dd($products);
        $categories = DB::table('categories')
        ->get();
        return view('admin.products',[
            'desktop' => 'menu-open',
            'desktopProductr' => 'active',
             'title' => 'Data Produk',
             'products' => $products,
             'categories' => $categories
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function storeCategory()
     {
         $request = request()->all();
         DB::table('categories')
         ->insert([
             'category_code' => $request['category_code'],
             'category_name' => $request['category'],
             ]);
         session()->flash("Ok","Kategori Baru Telah Ditambahkan");
        return redirect('products/create');
     }
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
    public function store()
    {
        $request = request()->all();

        request()->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'product_price' => 'required',

            ]);
            $product_code = $request['product_category'].'-'.$request['product_name'];
            $productSlug = Str::slug($product_code);
        if(request('product_image') == null) {
            $filename = null;
        } else {
            $filename = $product_code.'.'.request('product_image')->extension();
        }
        $product_price = str_replace('.', '', $request['product_price']);
        //dd($product_code);
        DB::table('products')
        ->insert([
            'product_slug' => $productSlug,
            'product_code' => $product_code,
            'product_category' => $request['product_category'],
            'product_name' => $request['product_name'],
            'product_price' => $product_price,
            'product_image' => $filename,
            'created_at' => now()
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
        $product_code = $request['product_category'].'-'.$request['product_name'];
        $productSlug = Str::slug($product_code);
        $image = DB::table('products')
        ->where('id_product','=' ,$request['id_product'])
        ->value('product_image');
        //dd($image);
        if(request('product_image') == null) {

        } else {
           if ($image == null) {

            $image = $product_code.'.'.request('product_image')->extension();
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
           'product_slug' => $productSlug,
           'product_price' => $request['product_price'],

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
        $deleteProduct =    DB::table('products')
        ->where('id_product','=',request('id'))
        ->delete();
        $deleteColor = DB::table('product_colors')
        ->where('product_id','=',request('id'))
        ->delete();
        if(
       $deleteProduct && $deleteColor
        )
        {
            session()->flash("Ok","Data Produk Telah Dihapus");
            return redirect('products');
        } else {
            session()->flash("Fail","Data Produk Belum Dihapus");
            return redirect('products');
        }
    }

    public function colorIndex($id)
    {
        $products = DB::table('products')
        ->where('id_product','=', $id)
        ->first();
        //dd($products);
        $color = DB::table('product_colors')
        ->where('product_id','=', $id)
        ->orderBy('color')
        ->get();
       return view('admin.product_create_color', [
           'products' => $products,
           'color' => $color,
           ]);
    }
    public function colorAdd()
    {

        $request = request()->all();
        $code = $request;
        //dd($code);
        $id = $code['product_id'];
        //dd($id);
        $colorCode = Str::slug($code['product_code'].' '.$code['color']);
        $cekId =   $color = DB::table('product_colors')
        ->where('color_code','=', $colorCode)
        ->first();
      //dd($cekId);

        $products = DB::table('products')
        ->where('id_product','=', $id)
        ->first();
        $color = DB::table('product_colors')
        ->where('product_id','=', $id)
        ->get();
        if ($cekId == null) {
            if(request('color_image') == null) {
                $filename = null;
            } else {
                $filename = $colorCode.'.'.request('color_image')->extension();
            }

                       $tambah = DB::table('product_colors')
                        ->insert([
                            'product_id' => $code['product_id'],
                            'color_code' => $colorCode,
                            'color_image' => $filename,
                            'color' => $code['color'],
                            'stok' => $code['stok'],
                            'created_at' => now()
                        ]);
                        if ($tambah) {
                            if ($filename != null) {
                                request()->file('color_image')->move(public_path('/dist/img/products/'), $filename);
                            }
                            session()->flash("Ok","Warna Baru Telah Ditambah");
                            return redirect('products/color/'.$id);
                        } else {
                            session()->flash("Fail","Warna Produk Gagal Ditambah");
                            return redirect('products/color/'.$id);
                        }
            # code...
        } else {
            session()->flash("Fail","Warna Produk Sudah Ada");
            return redirect('products/color/'.$id);
        }

    }
    public function colorUpdate()
    {
        $request = request()->all();
        //dd($request);
       $image = DB::table('product_colors')
        ->where('color_code','=' ,$request['color_code'])
        ->value('color_image');
        //dd($image);
        $colorCode = $request['product_code'].'-'.$request['color'];
        //dd($colorCode);
        if(request('color_image') == null) {
            $filename = $image;
        } else {
            $filename = $colorCode.'.'.request('color_image')->extension();
        }
        $update = DB::table('product_colors')
        ->where('color_code','=',$request['color_code'])
        ->update([
            'product_id' => $request['product_id'],
            'color' => $request['color'],
            'color_code' => $colorCode,
            'stok' => $request['stok'],
            'color_image' => $filename,
            'updated_at' => now()
            ]);
            if ($image != null) {
                unlink(public_path('/dist/img/products/').$image);
            }
            if ($filename != $image) {
                request()->file('color_image')->move(public_path('/dist/img/products/'), $filename);
            }
            if ($update) {
                session()->flash("Ok","Warna Produk Telah Diupdate");
                return redirect()->back();    # code...
            } else {
                session()->flash("Fail","Warna Produk Gagal Diupdate");
                return redirect()->back();    # code...
            }
    }
    public function colorDelete()
    {
        $image = DB::table('product_colors')
        ->where('color_code','=',request('id'))
        ->value('color_image');
        if ($image != null) {
            unlink(public_path('/dist/img/products/').$image);
        }
        if(
        DB::table('product_colors')
        ->where('color_code','=',request('id'))
        ->delete()
        )
        {
           // dd('ok');
            session()->flash("Ok","Data Produk Telah Dihapus");
            return redirect()->back();
        } else {
            //dd('gagal');
            session()->flash("Fail","Data Produk Belum Dihapus");
            return redirect()->back();
        }
    }

}
