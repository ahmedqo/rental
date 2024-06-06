<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function index_view(Request $Request)
    {
        return view('review.index');
    }

    public function store_view()
    {
        return view('review.store');
    }

    public function patch_view($id)
    {
        $data = Review::findorfail($id);
        return view('review.patch', compact('data'));
    }

    public function search_action(Request $Request)
    {
        $data = Review::with('Car')->orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search(urldecode($Request->search));
        }
        $data = $data->cursorPaginate(50);
        return response()->json($data);
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'status' => ['required', 'string'],
            'content' => ['required', 'string'],
            'rate' => ['required', 'integer'],
            'car' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Review::create($Request->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'status' => ['required', 'string'],
            'content' => ['required', 'string'],
            'rate' => ['required', 'integer'],
            'car' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Review::findorfail($id)->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        Review::findorfail($id)->delete();

        return Redirect::route('views.reviews.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
