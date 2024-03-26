<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\CreateSectionContentRequest;
use App\Models\PageContent;
use App\Models\SectionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    private $section = '';

    public function __construct()
    {
        $this->section =  Helper::getSection();
    }

    public function index()
    {
        if (view()->exists('page.page-section-content.index')) {
            $contents = PageContent::all();
            return view('page.page-section-content.index', ['title' => 'Section Content', 'contents'=>$contents, 'section'=>$this->section]);
        }
        abort(404);
    }

    public function create()
    {
        return view('page.page-section-content.create', [
            'title' => 'Create ' . Helper::getCurrentURL(2),
            'section' =>  $this->section
        ]);
    }

    public function store(CreateSectionContentRequest $request)
    {
        $path = Helper::uploadImage($request, 'image');
        $data = $request->validated();
        $data['image'] = $path;
        $data['user_id'] = \Auth::id();
        $data['page_id'] = Helper::getPageIdBy(['slug' => Helper::getCurrentURL()]);
        $data['page_sections_id'] = $this->section->id;
        PageContent::create($data);
        return redirect(url(Helper::getCurrentURL(1), Helper::getCurrentURL(2)))->with('status', 'Content added successfully.');

    }

    public function show()
    {
        return $this->index();
    }

    public function edit()
    {
        return view('page.page-section-content.edit', [
            'title' => 'Edit ' . ucwords(implode(' ', explode('-', Helper::getCurrentURL())))
        ]);
    }

    public function update(CreateSectionContentRequest $request, SectionSetting $sectionContent)
    {
        $path = Helper::uploadImage($request, 'image');;
        $data = $request->validated();
        if ($path) {
            $data['image'] = $path;
            Storage::disk(env("FILESYSTEM_UPLOADS_DISK", "uploads"))->delete($sectionContent->image);
        }
        $sectionContent->update($data);
        return redirect()->route('slider.index')->with('status', 'Content updated successfully');
    }

    public function destroy()
    {

    }
}
