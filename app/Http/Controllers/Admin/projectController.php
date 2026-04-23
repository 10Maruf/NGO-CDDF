<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusArea;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class projectController extends Controller
{
    // -- Index -----------------------------------------------------------------

    public function index(Request $request)
    {
        $query = Project::with(['partners', 'focusAreas'])
            ->withCount(['partners', 'focusAreas']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('focus_area')) {
            $query->whereHas('focusAreas', function ($q) use ($request) {
                $q->where('focus_areas.id', $request->focus_area);
            });
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
             $query->whereDate('end_date', '<=', $request->end_date);
        }

        $projects = $query->orderByDesc('created_at')
            ->get();

        $all_focus_areas = FocusArea::all(); // Pass focus areas to the view for the filter dropdown

        return view('admin.projects.index', compact('projects', 'all_focus_areas'));
    }

    // -- Add -------------------------------------------------------------------

    public function add()
    {
        $partners    = Partner::orderBy('name')->get();
        $focus_areas = FocusArea::where('is_active', true)->orderBy('order')->get();

        return view('admin.projects.add', compact('partners', 'focus_areas'));
    }

    // -- Store -----------------------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'status'            => 'required|in:ongoing,completed',
            'cover_image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'start_date'        => 'nullable|date',
            'end_date'          => 'nullable|date|after_or_equal:start_date',
            'budget'            => 'nullable|numeric|min:0',
            'beneficiary_count' => 'nullable|integer|min:0',
            'partner_ids'       => 'nullable|array',
            'focus_area_ids'    => 'nullable|array',
        ]);

        // Gallery files — only keep files that actually uploaded successfully
        $validGalleryFiles = collect($request->file('gallery', []))
            ->filter(fn($f) => $f && $f->isValid());

        // Cover image upload
        $imageName = null;
        if ($image = $request->file('cover_image')) {
            $imageName = rand(1000000, 9999999) . 'proj.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
        }

        $project = Project::create([
            'title'               => $request->title,
            'slug'                => Project::generateSlug($request->title),
            'cover_image'         => $imageName,
            'short_description'   => $request->short_description,
            'detail_description'  => $request->detail_description,
            'status'              => $request->status,
            'start_date'          => $request->start_date ?: null,
            'end_date'            => $request->end_date ?: null,
            'location'            => $request->location,
            'budget'              => $request->budget ?: null,
            'beneficiary_count'   => $request->beneficiary_count ?: null,
            'is_featured'         => $request->boolean('is_featured'),
            'is_active'           => $request->boolean('is_active', true),
        ]);

        // Attach partners (donors)
        if ($request->filled('partner_ids')) {
            $project->partners()->sync($request->partner_ids);
        }

        // Attach focus areas
        if ($request->filled('focus_area_ids')) {
            $project->focusAreas()->sync($request->focus_area_ids);
        }

        // Gallery images
        foreach ($validGalleryFiles as $file) {
            $galleryName = rand(1000000, 9999999) . 'proj_gallery.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/project'), $galleryName);
            ProjectImage::create([
                'project_id' => $project->id,
                'image'      => $galleryName,
            ]);
        }

        NotificationService::newProject($project->title);

        return redirect()->route('project.index')
            ->with('success', 'Project successfully added.');
    }

    // -- Edit ------------------------------------------------------------------

    public function edit($id)
    {
        $project     = Project::with(['partners', 'focusAreas', 'galleryImages'])->findOrFail($id);
        $partners    = Partner::orderBy('name')->get();
        $focus_areas = FocusArea::where('is_active', true)->orderBy('order')->get();

        $selectedPartners   = $project->partners->pluck('id')->toArray();
        $selectedFocusAreas = $project->focusAreas->pluck('id')->toArray();
        $galleryImages      = $project->galleryImages;

        return view('admin.projects.edit', compact(
            'project', 'partners', 'focus_areas',
            'selectedPartners', 'selectedFocusAreas', 'galleryImages'
        ));
    }

    // -- Update ----------------------------------------------------------------

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'status'            => 'required|in:ongoing,completed',
            'cover_image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'start_date'        => 'nullable|date',
            'end_date'          => 'nullable|date|after_or_equal:start_date',
            'budget'            => 'nullable|numeric|min:0',
            'beneficiary_count' => 'nullable|integer|min:0',
            'partner_ids'       => 'nullable|array',
            'focus_area_ids'    => 'nullable|array',
        ]);

        // Gallery files — only keep files that actually uploaded successfully
        $validGalleryFiles = collect($request->file('gallery', []))
            ->filter(fn($f) => $f && $f->isValid());

        // Cover image update
        $imageName = $project->cover_image;
        if ($image = $request->file('cover_image')) {
            $oldPath = public_path('images/project/' . $project->cover_image);
            if ($project->cover_image && file_exists($oldPath)) {
                @unlink($oldPath);
            }
            $imageName = rand(1000000, 9999999) . 'proj.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
        }

        $project->update([
            'title'               => $request->title,
            'slug'                => Project::generateSlug($request->title, $project->id),
            'cover_image'         => $imageName,
            'short_description'   => $request->short_description,
            'detail_description'  => $request->detail_description,
            'status'              => $request->status,
            'start_date'          => $request->start_date ?: null,
            'end_date'            => $request->end_date ?: null,
            'location'            => $request->location,
            'budget'              => $request->budget ?: null,
            'beneficiary_count'   => $request->beneficiary_count ?: null,
            'is_featured'         => $request->boolean('is_featured'),
            'is_active'           => $request->boolean('is_active', true),
        ]);

        // Sync pivot tables
        $project->partners()->sync($request->input('partner_ids', []));
        $project->focusAreas()->sync($request->input('focus_area_ids', []));

        // Append new gallery images
        foreach ($validGalleryFiles as $file) {
            $galleryName = rand(1000000, 9999999) . 'proj_gallery.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/project'), $galleryName);
            ProjectImage::create([
                'project_id' => $project->id,
                'image'      => $galleryName,
            ]);
        }

        return redirect()->route('project.index')
            ->with('success', 'Project successfully updated.');
    }

    // -- Destroy ---------------------------------------------------------------

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $oldPath = public_path('images/project/' . $project->cover_image);
        if ($project->cover_image && file_exists($oldPath)) {
            @unlink($oldPath);
        }

        // Delete gallery images
        foreach ($project->galleryImages as $gi) {
            $giPath = public_path('images/project/' . $gi->image);
            if (file_exists($giPath)) {
                @unlink($giPath);
            }
        }
        $project->galleryImages()->delete();

        $project->partners()->detach();
        $project->focusAreas()->detach();
        $project->delete();

        return redirect()->route('project.index')
            ->with('success', 'Project deleted successfully.');
    }

    // -- Toggle Active Status ------------------------------------------------

    public function toggleStatus($id)
    {
        $project = Project::findOrFail($id);
        $project->update(['is_active' => !$project->is_active]);
        return redirect()->back()->with('success', 'Project status updated.');
    }

    // -- Bulk Delete ----------------------------------------------------------

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        if (!$ids) {
            return response()->json(['error' => 'No items selected.'], 400);
        }
        foreach ($ids as $id) {
            $project = Project::find($id);
            if (!$project) continue;
            // Delete cover image
            if ($project->cover_image) {
                $path = public_path('images/project/' . $project->cover_image);
                if (file_exists($path)) @unlink($path);
            }
            // Delete gallery images
            foreach ($project->galleryImages as $gi) {
                $giPath = public_path('images/project/' . $gi->image);
                if (file_exists($giPath)) @unlink($giPath);
            }
            $project->galleryImages()->delete();
            $project->partners()->detach();
            $project->focusAreas()->detach();
            $project->delete();
        }
        return response()->json(['success' => 'Selected projects deleted successfully.']);
    }

    // -- Bulk Status ----------------------------------------------------------

    public function bulkStatus(Request $request)
    {
        $ids    = $request->input('ids');
        $status = $request->input('status');
        if (!$ids) {
            return response()->json(['error' => 'No items selected.'], 400);
        }
        Project::whereIn('id', $ids)->update(['is_active' => $status]);
        return response()->json(['success' => 'Status updated successfully.']);
    }

    // -- Delete single gallery image -------------------------------------------

    public function deleteGalleryImage($imageId)
    {
        $gi = ProjectImage::findOrFail($imageId);
        $path = public_path('images/project/' . $gi->image);
        if (file_exists($path)) {
            @unlink($path);
        }
        $gi->delete();

        return redirect()->back()->with('success', 'Gallery image deleted.');
    }
}
