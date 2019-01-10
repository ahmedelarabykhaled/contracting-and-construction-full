<?php

namespace App\Http\Controllers\Admin\AboutPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MainInfo;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maininfo = MainInfo::get();
        return view('admin.about.about',compact('maininfo'));
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
        // return 'edit';
        $maininfo = MainInfo::get();
        $edit = 'true';
        return view('admin.about.about',compact('maininfo','edit'));
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
        // return 'ok';
        $info = ['about'=>5,'ceo letter'=>6,'osv'=>7];
        $maininfo = MainInfo::get();
        $maininfo[$info['about']]->update(array('content'=>$request->about,'status'=>true));
        $maininfo[$info['ceo letter']]->update(array('content'=>$request->letter,'status'=>true));
        if ($request->hasFile('osv')) {
            $change_name = time().'.'.$request->osv->getClientOriginalExtension();
            $maininfo[$info['osv']]->update(array('content'=>$change_name,'status'=>true));
            $request->osv->move(public_path('upload/osv'),$change_name);
        }
        return redirect('admin/about');
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
