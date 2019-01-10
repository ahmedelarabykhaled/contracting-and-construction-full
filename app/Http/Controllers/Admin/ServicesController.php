<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get();
        return view('admin.maininfo.services',compact('services'));
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
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $service = new Service;
            $service->title = $request->title;
            $service->content = $request->content;
            $service->image_name = time().'.'.$request->image->getClientOriginalExtension();
            $service->save();
            $request->image->move(public_path('upload/services'),$service->image_name);
        }
        
        return back()->with('messege','You Have Successfully Add New Service');

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
        $service = Service::find($id);
        return view('admin.maininfo.editservice',compact('service'));
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
        $service = Service::find($id);
        if ($request->hasFile('image')) {
            $change_name = time().'.'.$request->image->getClientOriginalExtension();
            unlink('upload/services/'.$change_name);
            $request->image->move(public_path('upload/services'),$change_name);
            $service->update(array('title'=>$request->title,'content'=>$request->content,'image_name'=>$change_name));
        }
        else
        {
            $service->update(array('title'=>$request->title,'content'=>$request->content));
        }
        return back()->with('messege','YOU HAVE UPDATE SERVICE SUCCESSFULLY');
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
