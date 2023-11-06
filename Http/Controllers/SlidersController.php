<?php

namespace Modules\Sliders\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Sliders\Entities\Slider;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $items = Slider::all();

        return view('sliders::index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sliders::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $slider = Slider::create([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'active' => $request->active,
                'background' => (isset($request->background)?file_store($request->background, 'assets/uploads/sliders/background/','photo_'):null),
                'image' => (isset($request->image)?file_store($request->image, 'assets/uploads/sliders/images/','photo_'):null)
            ]);

            return redirect()->route('sliders.index')->with('flash_message', 'با موفقیت ثبت شد');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('sliders::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Slider $slider)
    {
        return view('sliders::edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Slider $slider)
    {
        try {
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->active = $request->active;

            if (isset($request->background)){
                if ($slider->background){
                    File::delete($slider->background);
                }

                $slider->background = file_store($request->background, 'assets/uploads/sliders/background/','photo_');
            }

            if (isset($request->image)){
                if ($slider->image){
                    File::delete($slider->image);
                }

                $slider->image = file_store($request->image, 'assets/uploads/sliders/images/','photo_');
            }

            $slider->save();

            return redirect()->route('sliders.index')->with('flash_message', 'با موفقیت بروزرسانی شد');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Slider $slider)
    {
        try {
            $slider->delete();

            return redirect()->back()->with('flash_message', 'با موفقیت حذف شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }
}
