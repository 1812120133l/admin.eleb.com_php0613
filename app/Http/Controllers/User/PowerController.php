<?php

namespace App\Http\Controllers\User;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PowerController extends Controller
{
    //
    public function add(){
        return view('power.add');
    }

    public function append(Request $request){
        $permission = Permission::create(['name' => $request->name]);
        if($permission){
            return redirect()->route('power.add')->with('success','添加成功');
        }
    }

    public function index(){
        $powers=Permission::paginate(5);
        return view('power.index',compact('powers'));
    }

    public function modify(Permission $permission){
        return view('power.update',compact('permission'));
    }

    public function update(Permission $permission,Request $request){
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => '权限名称不能为空',
        ]);

        $permission->update([
           'name'=>$request->name,
        ]);
        return redirect()->route('power.index')->with('success','修改成功');
    }

    public function destroy(Permission $permission){
        DB::delete("delete from role_has_Permissions where permission_id=?",[$permission->id]);
        DB::delete("delete from permissions where id=?",[$permission->id]);
        return redirect()->route('power.index')->with('success','删除成功');
    }


}
