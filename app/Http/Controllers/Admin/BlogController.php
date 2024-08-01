<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Model\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if($request->has('search'))
        {
            $key = explode(' ', $request['search']);
            $blogs = Blog::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('title', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        }else{
            $blogs = Blog::orderBy('id', 'desc');
        }

        $blogs = $blogs->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('admin-views.blog.list', compact('blogs','search'));
    }


    public function add_new()
    {
    
        return view('admin-views.blog.add-new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content'=>'required',
            'image' => 'required'
        ], [
            'title.required' => 'Blog title is required!',
            'image.required' => 'Blog image is required!',
        ]);

        $Blog = new Blog;
        $Blog->title = $request->title[array_search('en', $request->lang)];
        $Blog->content = $request->content[array_search('en', $request->lang)];
        $Blog->slug = Str::slug($request->title[array_search('en', $request->lang)]);
        $Blog->image = ImageManager::upload('Blog/', 'png', $request->file('image'));

        $Blog->save();

        $data = [];
        foreach ($request->lang as $index => $key) {
            if ($request->title[$index] && $key != 'en') {
                array_push($data, array(
                    'translationable_type' => 'App\Model\Blog',
                    'translationable_id' => $Blog->id,
                    'locale' => $key,
                    'key' => 'title',
                    'value' => $request->title[$index],
                ));
            }


            if ($request->content[$index] && $key != 'en') {
                array_push($data, array(
                    'translationable_type' => 'App\Model\Blog',
                    'translationable_id' => $Blog->id,
                    'locale' => $key,
                    'key' => 'content',
                    'value' => $request->content[$index],
                ));
            }
        }
        if (count($data)) {
            Translation::insert($data);
        }

        Toastr::success('Blog added successfully!');
        return redirect()->route('admin.blog.list');
    }

    public function edit(Request $request, $id)
    {
        $blog = Blog::withoutGlobalScopes()->find($id);
        return view('admin-views.Blog.Blog-edit', compact('blog'));
    }

    public function update(Request $request)
    {
        $Blog = Blog::find($request->id);
        $Blog->title = $request->title[array_search('en', $request->lang)];
        $Blog->content = $request->content[array_search('en', $request->lang)];
        $Blog->slug = Str::slug($request->title[array_search('en', $request->lang)]);
        if ($request->image) {
            $Blog->image = ImageManager::update('Blog/', $Blog->image, 'png', $request->file('image'));
        }
        $Blog->save();

        foreach ($request->lang as $index => $key) {
            if ($request->title[$index] && $key != 'en') {
                Translation::updateOrInsert(
                    ['translationable_type' => 'App\Model\Blog',
                        'translationable_id' => $Blog->id,
                        'locale' => $key,
                        'key' => 'title'],
                    ['value' => $request->title[$index]]
                );
            }


            if ($request->content[$index] && $key != 'en') {
                Translation::updateOrInsert(
                    ['translationable_type' => 'App\Model\Blog',
                        'translationable_id' => $Blog->id,
                        'locale' => $key,
                        'key' => 'content'],
                    ['value' => $request->content[$index]]
                );
            }
        }

        Toastr::success('Blog updated successfully!');
        return back();
    }

    public function delete(Request $request)
    {
        $translation = Translation::where('translationable_type','App\Model\Blog')
                                    ->where('translationable_id',$request->id);
        $translation->delete();
        Blog::destroy($request->id);

        return response()->json();
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::where('position', 0)->orderBy('id', 'desc')->get();
            return response()->json($data);
        }
    }

    public function status(Request $request)
    {
        $Blog = Blog::find($request->id);
        $Blog->blog_status = $request->blog_status;
        $Blog->save();
        Toastr::success('Service status updated!');
        return back();
    }
}
