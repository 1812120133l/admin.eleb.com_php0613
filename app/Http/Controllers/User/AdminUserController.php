<?php

namespace App\Http\Controllers\User;

use App\Models\AdminUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    //
    public function register(){
        return view('user.user');
    }

    public function user(Request $request){
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
        AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => str_random(50),
        ]);
        echo '注册成功';
        return redirect()->route('user.index');
    }

    public function index(){
        $users=AdminUser::all();
        return view('user.index',compact('users'));
    }

    public function door(){
        return view('user.door');
    }

    public function login(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
      //      'captcha' => 'required|captcha',
        ],[
            'name.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'captcha.required' =>'验证码不能为空',
           // 'captcha.captcha' =>'验证码错误',
        ]);


        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password],$request->has('remember'))){

            return redirect()->route('user.index')->with('success','登录成功');
        }else{

            return back()->with('danger','用户名或密码错误，请重新登录')->withInput();
        }
    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('user.door')->with('success','退出成功');
    }

    public function edit(){
        $user=Auth::user();
        return view('user.edit',compact('user'));
    }

    public function update(Request $request){
        $id=Auth::user()->id;
        $password=Auth::user()->password;
        if(!Hash::check($request->former,$password)){
            return back()->with('danger','原密码不正确')->withInput();
        }
        $this->validate($request,[
            'password' =>'confirmed',
        ],[
            'password.confirmed' => '两次密码不一致',
        ]);
        $password=bcrypt($request->password);

        DB::update("update admin_users set password='{$password}' where id=$id");

        return redirect()->route('user.index')->with('success','修改成功');
    }

}
