<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Page;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function Reseller()
    {
        return view('frontend.reseller');
    }
    public function WhyNirapodHost()
    {
        return view('frontend.why');
    }

    public function WebHosting()
    {
        return view('frontend.web_hosting');
    }

    public function DedicatedServer()
    {
        return view('frontend.dedicated_server');
    }
    public function VpsServer()
    {
        return view('frontend.vps');
    }

    public function ContactUs()
    {
        return view('frontend.contact_us');
    }
    public function SendEmail(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $department = $request->department;
        $message = $request->message;
        
        // send email
        Mail::to($email)->send(new ContactMail($name,$email,$message,$subject));;
        

        return back()->with('success','s');
    }
    
    public function Page($slug)
    {
        $page = Page::where('url',$slug)->first();
        if($page == null){
            abort(404);
        }
        return view('frontend.page',['page' => $page]);
    }

    public function Blog(Request $request,$slug = null)
    {
        $archive = Blog::orderBy('created_at', 'desc')
        ->whereNotNull('created_at')
        ->get()
        ->groupBy(function(Blog $post) {
            return $post->created_at->format('Y');
        });
        //dd($archive->toArray());
        $latest_post = Blog::latest()->limit(3)->get();
        if($slug !== null){
            $blog = Blog::where('slug',$slug)->first();
            $blog ?? abort(404);
            return view('frontend.blog-details',['blog' => $blog,'archive' => $archive,'latest_post' => $latest_post]);
        }
        $blogs = Blog::latest();
        if($request->query('search')){
            $blogs->orWhere('title',"LIKE","%{$request->search}%")->orWhere('description',"LIKE","%{$request->search}%")->orWhere('sub_title',"LIKE","%{$request->search}%")->orWhere('meta_keywords',"LIKE","%{$request->search}%");
        }
        if($request->query('year')){
            $blogs->whereYear('created_at',$request->year);
        }
        $blogs = $blogs->paginate(4);
        return view('frontend.blog',['blogs' => $blogs,'archive' => $archive,'latest_post' => $latest_post]);
    }

    public function SubscribeStore(Request $request)
    {
        $check = Subscribe::where('email',$request->email)->first();
        if($check == null){
            $subscribe = new Subscribe();
            $subscribe->email = $request->email;
            $subscribe->save();
            return back()->with('success','Subscribe successfully!');

        }
        return back()->with('error','Email already subscribed!');
    }

    public function CommentStore(Request $request)
    {
        $comment = new Comment();
        $comment->full_name = $request->full_name;
        $comment->email = $request->email;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('success','Comment submitted successfully!');
    }

    public function CommentReply(Request $request)
    {
        $comment = new Comment();
        $comment->comment_id = $request->comment_id;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->save();
        return back()->with('success','Comment submitted successfully!');
    }
}
