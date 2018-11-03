<?php

namespace App\Http\Controllers\Store;

use App\Models\StopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoryController extends Controller
{
    //
    public function index(){
        $rows=StopCategory::paginate(2);
        return view('store/index',compact('rows'));
    }

    public function create(){
        return view('store.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'img' => 'required',
        ],[
            'name.required' => '分类名不能为空',
            'img.required' => '分类图片不能为空',
        ]);


        StopCategory::create([
            'name' => $request->name,
            'img' => $request->img,
            'status' => $request->status,
        ]);

        return redirect(route('stopcategory.index'));
    }

    public function edit(StopCategory $stopcategory){
        return view('store.edit',compact('stopcategory'));
    }

    public function update(StopCategory $stopcategory,Request $request){
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => '分类名不能为空',
        ]);

        $img=$request->img ?? $request->imgs;

        $stopcategory->update([
           'name' => $request->name,
            'img' => $img,
            'status' => $request->status,
        ]);

        return redirect()->route('stopcategory.index')->with('success','修改成功');
    }


    public function destroy(StopCategory $stopcategory){
        $stopcategory->delete();
        return redirect()->route('stopcategory.index')->with('success','删除成功');
    }

    public function show(){

    }
}
