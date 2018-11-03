<?php

namespace App\Http\Controllers\Activity;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //
    public function create(){
       return view('activity.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ],[
            'title.required' => '活动名称不能为空',
            'content.required' => '活动介绍不能为空',
            'start_time.required' => '活动开始时间不能为空',
            'end_time.required' => '活动结束时间不能为空',
        ]);

        Activity::create([
            'title' => $request->title,
            'content' => $request->content,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return redirect()->route('activity.index')->with('success','添加成功');
    }

    public function index(){
        $status=$_GET['status'] ?? 2;
        $data=date('Y-m-d H:i:s');
        if($status == 1){
            $activitys=Activity::where('start_time','>',$data)->get();
            return view('activity.index',compact('activitys'));
        }elseif($status == 0){
            $activitys=Activity::where('start_time','>',$data)->where('end_time','<',$data)->get();
            return view('activity.index',compact('activitys'));
        }elseif($status == -1){
            $activitys=Activity::where('end_time','<',$data)->get();
            return view('activity.index',compact('activitys'));
        }
        $activitys=Activity::paginate(4);
        return view('activity.index',compact('activitys'));
    }

    public function edit(Activity $activity){
        return view('activity.edit',compact('activity'));
    }

    public function update(Request $request,Activity $activity){
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ],[
            'title.required' => '活动名称不能为空',
            'content.required' => '活动介绍不能为空',
            'start_time.required' => '活动开始时间不能为空',
            'end_time.required' => '活动结束时间不能为空',
        ]);

        $activity->update([
            'title' => $request->title,
            'content' => $request->content,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return redirect()->route('activity.index')->with('success','修改成功');
    }

    public function destroy(Activity $activity){
        $activity->delete();
        return redirect()->route('activity.index')->with('success','删除成功');
    }

    public function show(Activity $activity){

        return view('activity.show',compact('activity'));
    }
}
