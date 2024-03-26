<?php

namespace App\Http\Controllers;

use App\Helper\Constant;
use App\Helper\Helper;
use App\Http\Requests\CreatePageSectionRequest;
use App\Http\Requests\CreateSectionContentRequest;
use App\Models\ContentTemplate;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageSection;
use App\Models\SectionSetting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSectionController extends Controller
{
    private $section = '';

    public function __construct()
    {
        $this->section =  Helper::getSection();
    }

    public function index()
    {
        if (view()->exists('page.page-section-content.section.index')) {
            $homeSections = Helper::getPageSections(Constant::HOME_PAGE);
            return view('page.page-section-content.section.index', ['title' => 'Section Settings', 'sections' => $homeSections]);
        }
        abort(404);
    }

    public function create()
    {
        return view('page.page-section-content.section.create', [
            'title' => 'Create ' . ucwords(implode(' ', explode('-', Helper::getCurrentURL()))),
            'templates' => ContentTemplate::all()
        ]);
    }

    public function store(CreatePageSectionRequest $request)
    {
        $path = Helper::uploadImage($request, 'image');
        $lastData = PageSection::orderBy('id', 'DESC')->first();
        $data = $request->validated();
        $data['image'] = $path;
        $data['section_slug'] = Helper::generateSlug($request->section_title);
        $data['user_id'] = \Auth::id();
        $data['page_id'] = Helper::getPageIdBy(['slug' => Helper::getCurrentURL()]);
        $data['sort'] = $lastData ? $lastData->id : 1;
        PageSection::create($data);
        return redirect(url(Helper::getCurrentURL(1), Helper::getCurrentURL(2)))->with('status', 'Section added successfully.');
    }

    public function show()
    {
        return $this->sectionList();
    }

    public function edit(PageSection $section)
    {
        return view('page.page-section-content.section.edit', [
            'title' => 'Edit ' . ucwords(implode(' ', explode('-', Helper::getCurrentURL()))),
            'section' => $section,
            'templates' => ContentTemplate::all()
        ]);
    }

    public function update(CreatePageSectionRequest $request, PageSection $section)
    {
        $path = Helper::uploadImage($request, 'image');
        $data = $request->validated();
        if ($path) {
            $data['image'] = $path;
        }
        if ((!isset($data['image']) || !$data['image']) && $section->image) {
            $data['image'] = null;
            Storage::disk(env("FILESYSTEM_UPLOADS_DISK", "uploads"))->delete($section->image);
        }
        $section->update($data);
        return redirect(url(Helper::getCurrentURL(1), Helper::getCurrentURL(2)))->with('status', 'Section updated successfully');
    }

    public function sortOrder(Request $request)
    {
        if (!$request->order && !is_array($request->order))
            return;
        $orderIDs = $request->order;
        foreach ($orderIDs as $key => $value) {
            PageSection::where('id', $value)->update(['sort' => $key]);
        }
        return true;
    }

    public function destroy(PageSection $section)
    {
        $section->delete();
        return redirect(url(Helper::getCurrentURL(1), Helper::getCurrentURL(2)))->with('status', 'Section deleted successfully');
    }
}
