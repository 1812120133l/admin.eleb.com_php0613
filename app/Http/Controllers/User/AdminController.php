<?php

namespace App\Http\Controllers\User;

use App\Models\AdminUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //
    public function add(){
        $roles=Role::all();
        return view('admin.add',compact('roles'));
    }

    public function append(Request $request){

        $this->validate($request,[
            'name' =>'required|max:15|min:3',
            'email' =>'required|email',
            'password' =>'confirmed',
        ],[
            'name.required' => '用户名不能为空',
            'name.max' => '用户名不能大于15位',
            'name.min' => '用户名不能小于3位',
            'email.required' => '邮箱不能为空',
            'password.confirmed' => '两次密码不一致',
        ]);
        $user=AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => str_random(50),
        ]);

        $user->assignRole($request->power);

        return redirect()->route('user.index')->with('success','添加成功');
    }

    public function edit(AdminUser $adminuser){
        //AdminUser::role('writer')->get();
        $a=$adminuser->getAllPermissions();
        dd($a);
        $users = User::role('writer')->get();
        dd($adminuser);
    }
}
