<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baskets = DB::table('products')
        ->join('product_colors','products.id_product','=','product_colors.product_id')
        ->join('baskets','product_colors.color_code','=','baskets.product_code')
        ->get();
        // dd($baskets);
        return view('resellers.baskets',[
            'desktop' => 'menu-open',
            'desktopBaskets' => 'active',
             'title' => 'Data Pesanan',
             'baskets' => $baskets,
            //  'products' => $products,
            //  'productColor' => $productColor,
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request = request()->all();
        // dd($request);
        $cekCode = DB::table('baskets')
        ->select('product_code','product_color')
        ->where('product_code','=',$request->product_code)
        ->first();
        if ($cekCode != null) {
            $cekNilai = $cekCode->product_color;
            $value = $cekNilai + $request->product_color;
           $baskets = DB::table('baskets')
           ->where('product_code','=',$request->product_code)
        ->update([
            'product_color' => $value,
        ]);
        } else {
            $baskets = DB::table('baskets')
            ->insert([
                'product_code' => $request->product_code,
                'reseller_name' => $request->reseller_name,
                'product_color' => $request->product_color,
                ]);
        }
            if ($baskets) {
                session()->flash("Ok","Berhasil Dimasukkan Keranjang");
                return redirect('baskets');
            } else {
                session()->flash("Fail","Gagal Dimasukkan Keranjang");
                return redirect()->back();
            }
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
        $baskets = DB::table('baskets')
        ->where('product_code','=',$request['color_code'])
        ->update([
         'product_color' => request('stok'),
     ]);
     if ($baskets) {
        session()->flash("Ok","Data Berhasil Diupdate");
        return redirect('baskets');
    } else {
        session()->flash("Fail","Data Gagal Diupdate");
        return redirect()->back();
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

        if(
            DB::table('baskets')
            ->where('product_code','=',request('id'))
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
