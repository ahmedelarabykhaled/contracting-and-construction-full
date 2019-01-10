<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();
        return view('admin.maininfo.events',compact('events'));
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        $event = new Event;
        $event->title = $request->title;
        $event->content = $request->content;
        $event->image_name = time().'.'.$request->image->getClientOriginalExtension();
        $event->save();

        $request->image->move(public_path('upload/events'),$event->image_name);

        return back()->with('messege','You Have Succssfully Add An Event');
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
        $event = Event::find($id);
        return view('admin.maininfo.editevent',compact('event'));
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

        $event = Event::find($id);
        
        if ($request->hasFile('image')) {
            $event_image = time().'.'.$request->image->getClientOriginalExtension();
            unlink('upload/events/'.$event->image_name);
            $request->image->move(public_path('upload/events'),$event_image);
        }
        else
        {
            $event_image = $event->image_name;
        }
        $event->update(array('title'=>$request->title,'content'=>$request->content,'image_name'=>$event_image));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        unlink('upload/events/'.$event->image_name);
        return back()->with('messege','You Have Succssfully Deletted An Event');
    }
}
