<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\CreateSectionContentRequest;
use App\Models\PageContent;
use App\Models\SectionSetting;
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
            $contents = PageContent::where('page_sections_id', $this->section->id)->get();
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
        return redirect(url(Helper::getCurrentURL(1), $this->section->section_slug))->with('status', 'Content added successfully.');

    }

    public function show()
    {
        return $this->index();
    }

    public function edit($content_id)
    {
        $content = PageContent::findOrFail($content_id);
        return view('page.page-section-content.edit', [
            'title' => 'Edit ' . ucwords(implode(' ', explode('-', Helper::getCurrentURL()))),
            'content' => $content,
            'section' =>  $this->section
        ]);
    }

    public function update(CreateSectionContentRequest $request, $content_id)
    {
        $content = PageContent::findOrFail($content_id);
        $path = Helper::uploadImage($request, 'image');
        $data = $request->validated();
        if ($path) {
            $data['image'] = $path;
        }
        if ((!isset($data['image']) || !$data['image']) && $content->image) {
            $data['image'] = null;
            Storage::disk(env("FILESYSTEM_UPLOADS_DISK", "uploads"))->delete($content->image);
        }
        $content->update($data);
        return redirect(url(Helper::getCurrentURL(1), $this->section->section_slug))->with('status', 'Content updated successfully');
    }

    public function destroy($content_id)
    {
        PageContent::findOrFail($content_id)->delete();
        return redirect(url(Helper::getCurrentURL(1), $this->section->section_slug))->with('status', 'Content deleted successfully');
    }
}
