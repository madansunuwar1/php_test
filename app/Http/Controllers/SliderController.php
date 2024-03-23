<?php

namespace App\Http\Controllers;

use App\Helper\AdminMenu\getSectionSettings;
use App\Helper\Helper;
use App\Http\Requests\CreateSliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /*public function __construct()
    {
        $this->authorizeResource(Slider::class, 'slider');
    }*/
    public function index()
    {
        $sliders = Auth()->user()->slider;
        $title = 'Slider';
        return view('slider.index', compact('sliders', 'title'));
    }

    public function create()
    {
        return view('slider.create', [
            'title' => 'Create Slider'
        ]);
    }

    public function store(CreateSliderRequest $request)
    {
        $path = Helper::uploadImage('image');
        Slider::create(array_merge($request->validated(), ['image' => $path, 'user_id'=>\Auth::id()]));
        return redirect('slider')->with('status', 'Slider added successfully.');
    }

    public function show()
    {
        return $this->index();
    }

    public function edit(Slider $slider)
    {
        return view('slider.edit', [
            'title' => 'Edit Slider',
            'slider' => $slider
        ]);
    }

    public function update(CreateSliderRequest $request, Slider $slider)
    {
        $path = Helper::uploadImage('image');
        $data = $request->validated();
        if ($path) {
            $data['image'] = $path;
            Storage::disk(env("FILESYSTEM_UPLOADS_DISK", "uploads"))->delete($slider->image);
        }
        $slider->update($data);
        return redirect()->route('slider.index')->with('status','Slider updated successfully');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::disk(env("FILESYSTEM_UPLOADS_DISK", "uploads"))->delete($slider->image);
        }
        $slider->delete();
        return redirect('slider')->with('status', 'Slider deleted successfully');
    }
}
