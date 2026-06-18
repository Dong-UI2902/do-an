<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('admin.blog.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();

        $image = $this->prepareImage($request, $data);

        try {
            if (!Blog::create($data)) {
                throw new Exception('Blog create failed.');
            }

            if ($image) {
                $image['file']->move(public_path(Blog::PATH_IMAGE), $image['fileName']);
            }

            return back()->with('success', 'Blog created successfully!');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->all();

        $image = $this->prepareImage($request, $data);
        $oldImage = $blog->image;

        try {
            if (!$blog->update($data)) {
                throw new Exception('Blog update failed.');
            }

            if ($image) {
                $image['file']->move(public_path(Blog::PATH_IMAGE), $image['fileName']);
            }

            if ($image && file_exists(public_path($oldImage))) {
                @unlink(public_path($oldImage));
            }

            return back()->with('success', 'Blog updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $image = $blog->image;
        $blog->delete();

        if (file_exists(public_path($image))) {
            @unlink(public_path($image));
        }

        return back()->with('success', 'Blog deleted');
    }

    private function prepareImage(BlogRequest $request, array &$data): ?array
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $fileName = time() . '_' . Str::random(10) . '_' . $file->getClientOriginalName();
            $data['image'] = Blog::PATH_IMAGE . $fileName;

            return [
                'file' => $file,
                'fileName' => $fileName
            ];
        }

        return null;
    }
}
