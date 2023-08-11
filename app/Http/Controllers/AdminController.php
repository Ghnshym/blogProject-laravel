<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function add_post(){

        return view('admin.create_post');
    }

    public function create_post(Request $request){

       $user = Auth::user();

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;

        $post->post_status = 'active';
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->user_type = $user->usertype;
        
        $image = $request->image;

        if($image)
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('post_image'), $imageName);
            $post->image = $imageName;
        }

        $post->save();
        return redirect()->back()->with('message', 'Post Added Successfully');
    }

    public function show_post(){

        $post = Post::all();

        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id){

        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post Delete Successfully');
    }
}
