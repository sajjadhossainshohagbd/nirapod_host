<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;

class PageController extends Controller
{
    public function Index()
    {
        $pages = Page::latest()->paginate(10);
        return view('backend.pages',['pages' => $pages]);
    }
    public function Add()
    {
        return view('backend.add-page');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
        ]);
        $page = new Page;
        $page->title = $request->title;
        $page->sub_title = $request->sub_title;
        $page->description = $request->description;
        $page->url = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', Str::lower($request->title)));
        $page->save();

        return redirect()->route('pages')->with('success','New Page created successfully!');
    }

    public function Edit($id)
    {
        $page = Page::findOrFail(decrypt($id));
        return view('backend.edit-page',['page' => $page]);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
        ]);
        $page = Page::findOrFail(decrypt($id));
        $page->title = $request->title;
        $page->sub_title = $request->sub_title;
        $page->description = $request->description;
        $page->update();

        return redirect()->route('pages')->with('success','Page updated successfully!');
    }

    public function Delete($id)
    {
        $setings = Page::findOrFail(decrypt($id));
        if($setings->delete())
        {
            return back()->with('success','Page deleted successfully!');
        }
        return back()->with('error','Sorry! Something went wrong.');
    }

    public function Blog()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('backend.blog',['blogs' => $blogs]);
    }

    public function AddBlog()
    {
        return view('backend.add-blog');
    }

    public function StoreBlog(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->description = $request->description;
        if($request->meta_title == null){
            $blog->meta_title = $request->title;
        }else{
            $blog->meta_title = $request->meta_title;
        }
        if($request->meta_description == null){
            $blog->meta_description = $request->description;
        }else{
            $blog->meta_description = $request->meta_description;
        }
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', Str::lower($request->title)));
        $blog->meta_keywords = $request->tags;
        $file_name = 'uploads/blog/'.date('dmYhis').$request->banner->getClientOriginalName();
        $request->banner->move(public_path('uploads/blog'),$file_name);
        $blog->banner = $file_name;
        $blog->save();
        return redirect()->route('admin.blog')->with('success','Blog created successfully!');
    }

    public function EditBlog($id)
    {
        $blog = Blog::findOrFail(decrypt($id));
        return view('backend.edit-blog',['blog' => $blog]);
    }

    public function UpdateBlog(Request $request,$id)
    {
        $request->validate([
            'description' => 'required'
        ]);
        $blog = Blog::findOrFail(decrypt($id));
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->description = $request->description;
        if($request->meta_title == null){
            $blog->meta_title = $request->title;
        }else{
            $blog->meta_title = $request->meta_title;
        }
        if($request->meta_description == null){
            $blog->meta_description = $request->description;
        }else{
            $blog->meta_description = $request->meta_description;
        }
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', Str::lower($request->title)));
        $blog->meta_keywords = $request->tags;
        if($request->hasFile('banner')){
            $file_name = 'uploads/blog/'.date('dmYhis').$request->banner->getClientOriginalName();
            $request->banner->move(public_path('uploads/blog'),$file_name);
            $blog->banner = $file_name;
        }
        $blog->update();
        return redirect()->route('admin.blog')->with('success','Blog created successfully!');
    }

    public function BlogDelete($id)
    {
        $setings = Blog::findOrFail(decrypt($id));
        if($setings->delete())
        {
            return back()->with('success','Blog deleted successfully!');
        }
        return back()->with('error','Sorry! Something went wrong.');
    }

    public function Comments()
    {
        $comments = Comment::latest()->paginate(20);
        return view('backend.comments',['comments' => $comments]);
    }

    public function CommentStatus(Request $request)
    {
        $comment = Comment::find($request->id);
        if($comment != null){
            $comment->status = $request->status;
            $comment->update();
            return 1;
        }else{
            return 0;
        }
    }
}
