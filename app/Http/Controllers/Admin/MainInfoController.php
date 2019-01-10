<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MainInfo;
use App\icon;

class MainInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maininfo = MainInfo::get();
        $icons = Icon::get();
        return view('admin.maininfo.maininfo',compact('maininfo','icons'));
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
        //
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
        $edit = true;
        $maininfo = MainInfo::get();
        $icons = Icon::get();
        return view('admin.maininfo.maininfo',compact('maininfo','edit','icons'));
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
        // return $request;
        $info = ['logo'=>0,'co name'=>1,'co activity'=>2,'co comment'=>3,'phone number'=>4,'co adress'=>8];


        // return $request->co_name;
        $a = MainInfo::get();

        // update co logo name
        if (!$request->hasFile('logo')) {
            $a[$info['logo']]->update(array('status'=>false));
        }
        else
        {
            $change_name = time().'.'.$request->logo->getClientOriginalExtension();
            $a[$info['logo']]->update(array('status'=>true,'content'=>$change_name));
            $request->logo->move(public_path('upload/logo'),$change_name);
        }

        // update co name
        if ($request->co_name == null) {
            $a[$info['co name']]->update(array('status'=>false));
        }
        else
        {
            $a[$info['co name']]->update(array('status'=>true,'content'=>$request->co_name));
        }

        // update co activity
        if ($request->co_activity == null) {
            $a[$info['co activity']]->update(array('status'=>false));
        }
        else
        {
            $a[$info['co activity']]->update(array('status'=>true,'content'=>$request->co_activity));
        }

        // update co comment
        if ($request->co_comment == null) {
            $a[$info['co comment']]->update(array('status'=>false));
        }
        else
        {
            $a[$info['co comment']]->update(array('status'=>true,'content'=>$request->co_comment));
        }

        // update co phone number
        if ($request->phone_number == null) {
            $a[$info['phone number']]->update(array('status'=>false));
        }
        else
        {
            $a[$info['phone number']]->update(array('status'=>true,'content'=>$request->phone_number));
        }

        if ($request->co_adress == null) {
            $a[$info['co adress']]->update(array('status'=>false));
        }
        else
        {
            $a[$info['co adress']]->update(array('status'=>true,'content'=>$request->co_adress));
        }

        if (!$request->link == null)
        {
            $icon = Icon::find($request->icon);
            $icon->update(array('link'=>$request->link,'status'=>true));
        }

        // update icon
        // if ($request->link != '') {
            
        // }
        return redirect('admin/maininfo')->with('messege','you have successfully update data');
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
    public function delete_icon($id)
    {
        $icon = Icon::find($id);
        $icon->update(array('status'=>false));

        // return $icon;
        return back();
    }
}
