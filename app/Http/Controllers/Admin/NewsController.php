<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = News::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.news.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->getClientOriginalExtension();
            $file_name = time().'-'.'product'.'.'.$ext;
            $file->move(public_path('upload'), $file_name);
        }
        $request->merge(['image' => $file_name]);

        if(News::create($request->all())) {
            return redirect()->route('news.index')->with('success', 'Thêm mới bài viết thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $news->update($request->only("title", "contents", "image", "is_active"));
        return redirect()->route('news.index')->with('success', 'Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Xóa thành công');
    }
}
