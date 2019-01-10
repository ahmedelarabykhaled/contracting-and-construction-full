<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;

class SliderImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderimages = SliderImage::get();
        return view('admin.maininfo.sliderimages',compact('sliderimages'));
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
        $change_name = 0;
        if ($request->hasFile('image')) {
            foreach ($request->image as $s_image) {
                $slider = new SliderImage;
                $slider->name = $change_name.time().'.'.$s_image->getClientOriginalExtension();
                $slider->save();
                $change_name++;
                $s_image->move(public_path('upload/slider images'),$slider->name);
            }
            return back()->with('messege_success','You Have Add Image Successfully');
        }
        return back()->with('messege_error','You Should Select An Image');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider_image = SliderImage::find($id);
        $slider_image->delete();
        unlink('upload/slider images/'.$slider_image->name);
        return back()->with('messege_delete','You Have Successfully Delete An Image');
    }
}
