<?php

namespace App\Http\Controllers\Store;

use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use App\Models\StopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ShopController extends Controller
{
    //
    public function create(){
        $shopcategories=StopCategory::all();
        return view('shop.create',compact('shopcategories'));
    }

    public function store(Request $request){
        $this->validate($request,[
           'shop_name' => 'required',
           'shop_img' => 'required',
           'shop_rating' => 'required',
           'start_send' => 'required',
           'send_cost' => 'required',
           'notice' => 'required',
        ],[
           'shop_name.required' => '店铺名称不能为空',
           'shop_img.required' => '店铺图片不能为空',
           'shop_rating.required' => '评分不能为空',
           'start_send.required' => '起送金额不能为空',
           'send_cost.required' => '配送费不能为空',
           'notice.required' => '店公告不能为空',
        ]);


        Shop::create([
            'shop_category_id' => $request->shop_category_id,
            'shop_name' => $request->shop_name,
            'shop_img' => $request->shop_img,
            'shop_rating' => $request->shop_rating,
            //'brand' => $request->brand,
            'brand' => $request->brand,
            'on_time' => $request->on_time,
            'fengniao' => $request->fengniao,
            'bao' => $request->bao,
            'piao' => $request->piao,
            'zhun' => $request->zhun,
            'start_send' => $request->start_send,
            'send_cost' => $request->send_cost,
            'notice' => $request->notice,
            'discount' => $request->discount,
            'status' => $request->status,
        ]);
        return redirect()->route('shop.index')->with('success','添加成功');
    }

    public function index(){
        $shops = Shop::paginate(2);
        return view('shop.index',compact('shops'));
    }

    public function edit(Shop $shop){
        $shopcategories=StopCategory::all();
        return view('shop.edit',compact('shopcategories','shop'));
    }

    public function update(Shop $shop,Request $request){
        $this->validate($request,[
            'shop_name' => 'required',
            'shop_rating' => 'required',
            'start_send' => 'required',
            'send_cost' => 'required',
            'notice' => 'required',
        ],[
            'shop_name.required' => '店铺名称不能为空',
            'shop_rating.required' => '评分不能为空',
            'start_send.required' => '起送金额不能为空',
            'send_cost.required' => '配送费不能为空',
            'notice.required' => '店公告不能为空',
        ]);

            $shop_img=$request->shop_img ?? $request->shop_imgs;


        $shop->update([
            'shop_category_id' => $request->shop_category_id,
            'shop_name' => $request->shop_name,
            'shop_img' => $shop_img,
            'shop_rating' => $request->shop_rating,
            'brand' => $request->brand,
            'on_time' => $request->on_time,
            'fengniao' => $request->fengniao,
            'bao' => $request->bao,
            'piao' => $request->piao,
            'zhun' => $request->zhun,
            'start_send' => $request->start_send,
            'send_cost' => $request->send_cost,
            'notice' => $request->notice,
            'discount' => $request->discount,
            'status' => $request->status,
        ]);

        return redirect()->route('shop.index')->with('success','修改成功');
    }

    public function destroy(Shop $shop){
        $shop->delete();
        return redirect()->route('shop.index')->with('success','删除成功');
    }

    public function audit(){
        $id=$_GET['id'];
        $status=$_GET['status'];
        //$shop=DB::table('shops')->where('id','=',$id)->get();

        DB::update("update shops set status=$status where id = ?", [$id]);
        return redirect()->route('shop.index')->with('success','审核成功');

    }

    public function show(){
        $shops=DB::table('shops')->where('status','=',0)->get();
        return view('shop.show',compact('shops'));
        //return view('shop.show',compact('shopcategories','shops'));
    }

}
