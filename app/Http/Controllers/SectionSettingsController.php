<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\CreateSectionContentRequest;
use App\Models\SectionSetting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionSettingsController extends Controller
{
    public function index()
    {
        if (view()->exists('section-settings.index')) {
            return view('section-settings.index', ['title'=> 'Section Settings']);
        }
        return abort(404);
    }

    public function create()
    {
        return view('section-settings.create', [
            'title' => 'Create '.ucwords(implode(' ', explode('-', Helper::getCurrentURL())))
        ]);
    }

    public function store(CreateSectionContentRequest $request)
    {
        $path = Helper::uploadImage('image');
        Slider::create(array_merge($request->validated(), ['image' => $path, 'user_id'=>\Auth::id()]));
        return redirect(Helper::getCurrentURL())->with('status', 'Content added successfully.');
    }

    public function show()
    {
        return $this->index();
    }

    public function edit()
    {
        return view('section-settings.edit', [
            'title' => 'Edit '.ucwords(implode(' ', explode('-', Helper::getCurrentURL())))
        ]);
    }

    public function update(CreateSectionContentRequest $request, SectionSetting $sectionContent)
    {
        $path = Helper::uploadImage('image');
        $data = $request->validated();
        if ($path) {
            $data['image'] = $path;
            Storage::disk(env("FILESYSTEM_UPLOADS_DISK", "uploads"))->delete($sectionContent->image);
        }
        $sectionContent->update($data);
        return redirect()->route('slider.index')->with('status','Content updated successfully');
    }

    public function destroy()
    {

    }

    public function sectionList(Request $request)
    {
        if (view()->exists('section-settings.section.index')) {
            return view('section-settings.section.index', ['title'=> 'Section Settings']);
        }
        return abort(404);
    }

    public function createSection()
    {
        return view('section-settings.section.create', [
            'title' => 'Create '.ucwords(implode(' ', explode('-', Helper::getCurrentURL())))
        ]);
    }

    public function storeSection()
    {

    }

    public function showSection()
    {
        return $this->sectionList();
    }

    public function editSection()
    {
        return view('section-settings.section.edit', [
            'title' => 'Edit '.ucwords(implode(' ', explode('-', Helper::getCurrentURL())))
        ]);
    }

    public function updateSection()
    {

    }

    public function destroySection()
    {

    }
}
