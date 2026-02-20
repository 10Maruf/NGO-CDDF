<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newsController extends Controller
{
    // add
    public function add()
    {
        return view('admin.latest_news.add');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'category'    => 'required|in:news,event',
            'description' => 'required',
            'image'       => 'required|mimes:jpg,png,jpeg,gif|max:2048',
            'gallery.*'   => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Cover image
        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999) . 'news.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/news/'), $imageName);
        }

        $newsId = DB::table('latest_news')->insertGetId([
            'title'       => $request->title,
            'category'    => $request->category,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        // Gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $galleryName = rand(10000, 99999) . 'news_gallery.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/news/'), $galleryName);
                DB::table('latest_news_images')->insert([
                    'news_id'    => $newsId,
                    'image'      => $galleryName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $news = DB::table('latest_news')->get();
        return view('admin.latest_news.index', compact('news'));
    }

    // Destroy
    public function destroy($id)
    {
        $news = DB::table('latest_news')->where('id', $id)->first();

        // Delete cover image
        if ($news->image) {
            $oldImage = public_path('images/news/' . $news->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }
        }

        // Delete gallery images
        $galleryImages = DB::table('latest_news_images')->where('news_id', $id)->get();
        foreach ($galleryImages as $gi) {
            $galleryPath = public_path('images/news/' . $gi->image);
            if (file_exists($galleryPath)) {
                @unlink($galleryPath);
            }
        }
        DB::table('latest_news_images')->where('news_id', $id)->delete();
        DB::table('latest_news')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted News');
    }

    // Edit
    public function edit($id)
    {
        $news          = DB::table('latest_news')->where('id', $id)->first();
        $galleryImages = DB::table('latest_news_images')->where('news_id', $id)->get();
        return view('admin.latest_news.edit', compact('news', 'galleryImages'));
    }

    // Delete a single gallery image
    public function deleteGalleryImage($imageId)
    {
        $gi = DB::table('latest_news_images')->where('id', $imageId)->first();
        if ($gi) {
            $path = public_path('images/news/' . $gi->image);
            if (file_exists($path)) {
                @unlink($path);
            }
            DB::table('latest_news_images')->where('id', $imageId)->delete();
        }
        return redirect()->back()->with('update', 'Gallery image deleted');
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'category'    => 'required|in:news,event',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
            'gallery.*'   => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $news      = DB::table('latest_news')->where('id', $id)->first();
        $imageName = $news->image;

        // Replace cover image if a new one is uploaded
        if ($image = $request->file('image')) {
            $oldImage = public_path('images/news/' . $news->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }
            $imageName = rand(10000, 99999) . 'news.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
        }

        DB::table('latest_news')->where('id', $id)->update([
            'title'       => $request->title,
            'category'    => $request->category,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        // Append new gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $galleryName = rand(10000, 99999) . 'news_gallery.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/news'), $galleryName);
                DB::table('latest_news_images')->insert([
                    'news_id'    => $id,
                    'image'      => $galleryName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->back()->with('update', 'Successfully Updated News');
    }
}
