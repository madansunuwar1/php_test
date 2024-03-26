<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\CreateSliderRequest;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Page';
        $limit = $request->limit ?? '';
        $pages = Page::orderBy('id', 'DESC');
        $keyword = $request->page;
        if ($keyword) {
            $pages->where(function ($query) use ($keyword) {
                $query->orWhere('title', 'like', "%{$keyword}%");
                $query->orWhere('slug', 'like', "%{$keyword}%");
                $query->orWhere('id', $keyword);
            });
        }
        $pages->with('sections', 'pageContents');
        if ($limit) {
            $pages = $pages->paginate($limit);
        } else {
            $result['data'] = $pages->get();
            $pages = (object)$result;
        }
        return view('page.index', compact('pages', 'title'));
    }

    public function create()
    {
        return view('slider.create', [
            'title' => 'Create Slider'
        ]);
    }

    public function store(CreateSliderRequest $request)
    {
        $path = Helper::uploadImage($request,'image', 'slider');
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
        $path = Helper::uploadImage($request,'image', 'slider');
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
