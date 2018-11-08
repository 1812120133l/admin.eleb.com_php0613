<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Nav extends Model
{
    //
    protected $fillable=[
      'name','url','permission_id','pid'
    ];

    public static function getNavs(){
        $navs=Nav::where('pid',0)->get();

        $html='';
        $html_father='';
        foreach ($navs as $nav){
            //查询子菜单
            $children=Nav::where('pid',$nav->id)->get();
            $html_son='';
            foreach ($children as $child){
                if(Auth::user()->hasPermissionTo($child->permission_id)){
                    $html_son.='<li><a href="'.$child->url.'">'.$child->name.'</a></li>';
                }
            }

            //判断是否有子菜单
            if($html_son){
                $html_father.='<li class="dropdown">
                    <a href="'.$nav->url.'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$nav->name.'<span class="caret"></span></a><ul class="dropdown-menu">';
            }

            //将子菜单加入父菜单内
            $html_father.=$html_son;
            // dd($children);
            if($html_son){
                $html_father.='</ul></li>';
            }

        }

        //将父菜单加入导航中
        $html.=$html_father;
        return $html;
        }

}
