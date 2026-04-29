<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;

class YoutubeVideoController extends Controller
{
    public function index()
    {
        $videos = YoutubeVideo::orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        return view('admin.youtube_videos.index', compact('videos'));
    }

    public function add()
    {
        return view('admin.youtube_videos.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'video_url' => 'required|string|max:500',
        ]);

        // New videos should appear at the top
        YoutubeVideo::query()->increment('order');

        YoutubeVideo::create([
            'title'     => $request->title,
            'video_url' => $request->video_url,
            'order'     => 1,
        ]);

        return redirect()->route('admin.youtube_videos.index')
                         ->with('success', 'Video added successfully.');
    }

    public function edit($id)
    {
        $video = YoutubeVideo::findOrFail($id);
        return view('admin.youtube_videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'video_url' => 'required|string|max:500',
        ]);

        YoutubeVideo::findOrFail($id)->update([
            'title'     => $request->title,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('admin.youtube_videos.index')
                         ->with('update', 'Video updated successfully.');
    }

    public function destroy($id)
    {
        YoutubeVideo::findOrFail($id)->delete();
        return redirect()->route('admin.youtube_videos.index')
                         ->with('success', 'Video deleted successfully.');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            YoutubeVideo::whereIn('id', $ids)->delete();
        }
        return response()->json(['success' => true]);
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->order;

        if ($orders && is_array($orders)) {
            foreach ($orders as $index => $id) {
                YoutubeVideo::where('id', $id)->update(['order' => $index + 1]);
            }
            return response()->json(['status' => 'success', 'message' => 'Order updated successfully.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid order data.'], 400);
    }
}
