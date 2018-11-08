<?php

namespace App\Http\Controllers\User;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function create(){
        $poweries=Permission::all();
        return view('role.create',compact('poweries'));
    }

    public function store(Request $request){
        $role= Role::create(['name' => $request->name]);
        $permissions=[];
        foreach ($request->power as $k=>$v){
            $permissions[]=Permission::where('name',$v)->first();
        }
        $role->syncPermissions($permissions);

        return redirect()->route('role.index')->with('success','添加成功');
    }

    public function index(){
        $roles=Role::paginate(5);
        return view('role.index',compact('roles'));
    }

    public function edit(Role $role){
        $role->id;
        $permission=DB::select("select permission_id from role_has_Permissions");
        $permission_id=[];
        for($i=0;$i<count($permission);$i++){
            $permission_id[]=$permission[$i]->permission_id;
        }
        $permissions=[];
        foreach ($permission_id as $k=>$v){
            $permissions[]=Permission::where('id',$v)->first();
        }
        $permission_name=[];
        foreach ($permissions as $permission){
            $permission_name[]=$permission->name;
        }
        //dd($permission_name);
        $poweries=Permission::all();
        return view('role.edit',compact('role','poweries','permission_name'));
    }

    public function update(Role $role,Request $request){
        $role->id;
        $permission=DB::select("select permission_id from role_has_Permissions");
        $permission_id=[];
        for($i=0;$i<count($permission);$i++){
            $permission_id[]=$permission[$i]->permission_id;
        }
        $permissions=[];
        foreach ($permission_id as $k=>$v){
            $permissions[]=Permission::where('id',$v)->first();
        }
        $permission_name=[];
        foreach ($permissions as $permission){
            $permission_name[]=$permission->name;
        }
        $role->revokePermissionTo($permission_name);


        $role->syncPermissions($request->power);

        return redirect()->route('role.index')->with('success','修改成功');
    }

    public function destroy(Role $role){

        DB::delete("delete from role_has_Permissions where role_id=?",[$role->id]);
        DB::delete("delete from roles where id=?",[$role->id]);
        return redirect()->route('role.index')->with('success','删除成功');
    }
}
