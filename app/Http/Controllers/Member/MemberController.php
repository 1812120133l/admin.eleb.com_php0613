<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //
    public function index(){
        $rows=DB::select("select * from members where status=0");
        return view('member.index',compact('rows'));
    }

    public function forbidden(){
        $id=$_GET['id'];
        $status=$_GET['status'];
        if($status==-1){
            DB::update("update members set status=-1 where id=?",[$id]);
            return redirect()->route('member.index')->with('success','禁用成功');
        }else{
            DB::update("update members set status=0 where id=?",[$id]);
            return redirect()->route('member.index')->with('success','账号恢复成功');
        }

    }

    public function bidden(){
        $rows=DB::select("select * from members where status=-1");
        return view('member.bidden',compact('rows'));
    }
}
