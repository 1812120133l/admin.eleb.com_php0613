<?php

namespace App\Http\Controllers\Nav;

use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class NavController extends Controller
{
    //
    public function create(){
        $navs=Nav::where('pid',0)->get();
        $permissions=Permission::all();
        return view('nav.create',compact('navs','permissions'));
    }


    public function store(Request $request){
        Nav::create([
            'name' => $request->name,
            'url' => $request->url,
            'permission_id' => $request->permission_id,
            'pid' => $request->pid,
        ]);
        echo '添加成功';
        return redirect()->route('nav.index')->with('success','添加成功');
    }

    public function index(){
        $navs=Nav::paginate(10);
        return view('nav.index',compact('navs'));
    }

    public function edit(Nav $nav){
       // dd($nav);
        $ns=Nav::where('pid',0)->get();
        $permissions=Permission::all();
        return view('nav.edit',compact('nav','permissions','ns'));
    }

    public function update(Nav $nav,Request $request){

        $nav->update([
            'name' => $request->name,
            'url' => $request->url,
            'permission_id' => $request->permission_id,
            'pid' => $request->pid,
        ]);
        return redirect()->route('nav.index')->with('success','修改成功');
    }

}
