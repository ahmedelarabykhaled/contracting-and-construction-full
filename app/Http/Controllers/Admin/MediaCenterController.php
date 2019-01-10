<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Activity;

class MediaCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::get();
        return view('admin.mediacenter.mediacenter',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'required',
        ]);
        $activity = new Activity;
        $activity->content = $request->content;
        $activity->image_name = time().'.'. $request->image->getClientOriginalExtension();
        $activity->save();
        $request->image->move(public_path('upload/activity'),$activity->image_name);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::find($id);
        return view('admin.mediacenter.editactivity',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);
        if ($request->hasFile('image')) {
            unlink('upload/activity/'.$activity->image_name);
            $change_name = time().'.'. $request->image->getClientOriginalExtension();
            $activity->update(array('content'=>$request->content,'image_name'=>$change_name));
            $request->image->move(public_path('upload/activity'),$change_name);
        }
        else
        {
            $activity->update(array('content'=>$request->content));
        }
        return redirect('admin/mediacenter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
