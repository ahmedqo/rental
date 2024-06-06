<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index_view(Request $Request)
    {
        return view('blog.index');
    }

    public function store_view()
    {
        return view('blog.store');
    }

    public function patch_view($id)
    {
        $data = Blog::findorfail($id);
        return view('blog.patch', compact('data'));
    }

    public function search_action(Request $Request)
    {
        $data = Blog::with('Image')->orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search(urldecode($Request->search));
        }
        $data = $data->cursorPaginate(50);
        return response()->json($data);
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'title_en' => ['required', 'string', 'unique:blogs'],
            'title_fr' => ['required', 'string', 'unique:blogs'],
            'title_it' => ['required', 'string', 'unique:blogs'],
            'title_sp' => ['required', 'string', 'unique:blogs'],
            'content_en' => ['required', 'string'],
            'content_fr' => ['required', 'string'],
            'content_it' => ['required', 'string'],
            'content_sp' => ['required', 'string'],
            'image' => ['required', 'image'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Blog::create($Request->merge([
            'slug' =>  Str::slug($Request->title_en)
        ])->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'title_en' => ['required', 'string', 'unique:blogs,title_en,' . $id],
            'title_fr' => ['required', 'string', 'unique:blogs,title_fr,' . $id],
            'title_it' => ['required', 'string', 'unique:blogs,title_it,' . $id],
            'title_sp' => ['required', 'string', 'unique:blogs,title_sp,' . $id],
            'content_en' => ['required', 'string'],
            'content_fr' => ['required', 'string'],
            'content_it' => ['required', 'string'],
            'content_sp' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Blog = Blog::findorfail($id);
        $Blog->update($Request->merge([
            'slug' =>  Str::slug($Request->title_en)
        ])->all());

        if ($Request->hasFile('image')) {
            Image::$FILE = $Request->file('image');
            $Blog->Image->delete();
            $Blog->Image()->create();
        }

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        Blog::findorfail($id)->delete();

        return Redirect::route('views.blogs.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
