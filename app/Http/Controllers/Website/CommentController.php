<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class CommentController extends Controller
{
    protected function validator($request)
    {
        $data = $request->all();
        return Validator::make($data, [
            'content' => ['required', 'string'],
            'post_id' => ['required', 'string', 'max:255'],
        ], [
            'content.required' => __("admin.The name field is required."),
            'content.string' => __('admin.The name must be a string.'),
            'post_id.required' => __('admin.The slug field is required.'),
            'post_id.string' => __('admin.The slug must be a string.'),
        ]);
    }
    public function storecomment(Request $request)
    {
        $validator = $this->validator($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // S
        $Comment = new Comment();
        $Comment->content = $request->input('content');
        $Comment->post_id = $request->input('post_id');
        $Comment->user_id = Auth::user()->id;
        $Comment->status = 'draft';
        $Comment->save();
        $post = Post::where('id',$Comment->post_id)->first();
        if (!$post) {
            return abort(404);
        }
        return redirect()->route('articles', $post->slug ); // redirect to the users index page


    }
}