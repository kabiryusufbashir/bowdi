<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FrontController extends Controller
{
    public function index(){
        $blogs = Blog::where('status', 'publish')->orderby('id', 'desc')->paginate(3);
        return view('welcome', compact('blogs'));
    }

    public function blogFront(){
        $blogs = Blog::where('status', 'publish')->orderby('id', 'desc')->paginate(9);
        return view('blog', compact('blogs'));
    }

    public function readBlog($blog){
        $post = Blog::where('id', $blog)->first();
        $views = $post->views + 1;
        $updateView = Blog::where('id', $blog)->update(['views'=> $views]);
        
        $blog = Blog::where('id', $blog)->first();
        $sharepost = \Share::page('https://bowdi.org/blogs/'.$blog->id)->facebook()->twitter()->linkedin()->telegram()->whatsapp();
        
        return view('readpost', compact('blog'))->with('sharepost', $sharepost);

    }

    public function whereWeWork(){
        return view('wherewework');
    }

    public function whoWeAre(){
        return view('whoweare');
    }

    public function whatWeDo(){
        return view('whatwedo');
    }

    public function contactUs(){
        return view('contactus');
    }
}
