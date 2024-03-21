<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::paginate(20);
        $title = 'Slider';
        return view('slider.index', compact('sliders', 'title'));
    }

    public function create()
    {
        return view('slider.create', [
            'title' => 'Create Slider'
        ]);
    }

    protected function uploadImage($request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            return Storage::disk(env("FILESYSTEM_UPLOADS_DISK", "uploads"))->put("/slider", $image);
        }
        return null;
    }

    public function store(CreateSliderRequest $request)
    {
        $path = $this->uploadImage($request);
        Slider::create(array_merge($request->validated(), ['image' => $path, 'user_id'=>\Auth::id()]));
        return redirect('slider')->with('status', 'Slider added successfully.');
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
        $path = $this->uploadImage($request);
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
