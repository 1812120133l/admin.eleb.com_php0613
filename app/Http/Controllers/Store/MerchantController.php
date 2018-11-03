<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MerchantController extends Controller
{
    //
    public function index(){
        $merchants=DB::select('select * from users');
        return view('merchant.index',compact('merchants'));
    }

    public function audit(){
        $id=$_GET['id'];
        $status=$_GET['status'];

        DB::update("update users set status=$status where id = ?", [$id]);
        return redirect()->route('merchant.index')->with('success','修改成功');

    }

    public function reset(){
        $id=$_GET['id'];
        $password=bcrypt('123456');
        DB::update("update users set password='{$password}' where id = ?", [$id]);
        return redirect()->route('merchant.index')->with('success','重置密码成功，密码重置为123456');
    }

    public function upload(Request $request){
        $path=$request->file('file')->store('public/img');
        return ['path' => Storage::url($path)];
    }

}
