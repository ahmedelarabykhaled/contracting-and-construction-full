<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Project;
use App\ProjectCategory;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::get();
        $categories = ProjectCategory::get();
        return view('admin.maininfo.projects',compact('projects','categories'));
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
        $project = new Project;

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        $project->title = $request->title;
        $project->content = $request->content;
        $project->category = $request->category;
        if ($request->hasFile('image')) {
            $project->image_name = time().'.'.$request->image->getClientOriginalExtension();
            $project->save();
            $request->image->move(public_path('upload/projects'),$project->image_name);
        }
        return back()->with('messege','You Have Successfully Add Project');
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
        $project = Project::find($id);
        $categories = ProjectCategory::get();
        return view('admin.maininfo.editproject',compact('project','categories'));
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
        $project = Project::find($id);
    

        if ($request->hasFile('image')) {
            $change_name = time().'.'.$request->image->getClientOriginalExtension();
            unlink('upload/projects/'.$project->image_name);
            $request->image->move(public_path('upload/projects'),$change_name);
            $project->update(array('title'=>$request->title,'content'=>$request->content,'category'=>$request->category,'image_name'=>$change_name));
        }
        else
        {
            $project->update(array('title'=>$request->title,'content'=>$request->content,'category'=>$request->category));
        }
        return back()->with('messege','You Have Successfully Update Project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        unlink('upload/projects/'.$project->image_name);
        return back();
    }
}
