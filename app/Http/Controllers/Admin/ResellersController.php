<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class ResellersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resellers = DB::table('resellers')
        ->get();
        return view('admin.resellers',[
            'desktop' => 'menu-open',
            'desktopReseller' => 'active',
             'title' => 'Data Reseller',
             'resellers' => $resellers
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reseller_create', [
            'desktop' => 'menu-open',
            'desktopReseller' => 'active',
             'title' => 'Tambah Reseller',
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
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);


        if(request('image') == null) {
            $filename = null;
        } else {
            $filename = date('ymdhis').'.'.request('image')->extension();
        }
        DB::table('users')
        ->insert([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt('1234'),
            'role' => 'reseller',
            'image' => $filename,
            'created_at' => now()
        ]);
        $idUser = DB::table('users')
        ->where('name','=',$request->name )
        ->value('id');
        DB::table('resellers')
        ->insert([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $filename,
            'role' => 'reseller',
            'created_at' => now(),
            'user_id' => $idUser
        ]);
        if ($filename != null) {
            request()->file('image')->move(public_path('/dist/img/resellers/'), $filename);
        }
            session()->flash("Ok","Data Reseller Telah Ditambahkan");
            return redirect('resellers');

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
        //dd($id);
        $reseller = DB::table('resellers')
        ->where('user_id','=',$id)
        ->first();
        $username = DB::table('users')
        -> where('id','=',$id)
        ->value('username');
        return view('admin.reseller_edit', [
            'desktop' => 'menu-open',
            'desktopReseller' => 'active',
             'title' => 'Edit Reseller',
             'reseller' => $reseller,
             'username' => $username
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
    //    dd($request);
        $image = DB::table('resellers')
        ->where('user_id','=',$request['id'])
        ->value('image');
        if(request('image') == null) {

                 } else {
                    if ($image == null) {
                    $image = date('ymdhis').'.'.request('image')->extension();
                    request()->file('image')->move(public_path('/dist/img/resellers/'), $image);
                }  else {
                    request()->file('image')->move(public_path('/dist/img/resellers/'), $image);
                }
            }

            DB::table('users')
            ->where('id','=', $request['id'])
            ->update([
                'username' => $request['username'],
                'image' => $image,
                'updated_at' => now()
            ]);
              $update = DB::table('resellers')
              ->where('user_id','=',$request['id'])
              ->update([
                  'name' => $request['name'],
                  'gender' => $request['gender'],
                  'email' => $request['email'],
                  'birthday' => $request['birthday'],
                  'address' => $request['address'],
                  'phone' => $request['phone'],
                  'image' => $image,
                  'updated_at' => now()
                  ]);
                if ($update) {
                    session()->flash("Ok","Data Reseller Telah Diupdate");
                    return redirect('resellers');
                } else {
                    session()->flash("Fail","Data Reseller Gagal Diupdate");
                    return redirect('resellers');
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
        //dd(request('id'));
        $cekFoto = DB::table('resellers')
        ->where('user_id','=',request('id'))
        ->value('image');
       //dd($cekFoto);
        if($cekFoto != null){
            unlink(public_path('dist/img/resellers/').$cekFoto);
        }
        if (
        DB::table('users')
        ->where('id','=', request('id'))
        ->delete()
        &&
        DB::table('resellers')
        ->where('user_id','=',request('id'))
        ->delete()
        )
        {
            session()->flash("Ok","Data Reseller Telah Dihapus");
            return redirect('resellers');
        } else {
            session()->flash("Fail","Data Reseller Belum Dihapus");
            return redirect('resellers');
        }


    }
}
