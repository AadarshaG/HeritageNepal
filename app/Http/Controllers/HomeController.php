<?php

namespace App\Http\Controllers;

use App\Model\About;
use App\Model\Banner;
use App\Model\Blog;
use App\Model\Brochure;
use App\Model\Choose;
use App\Model\Gallery;
use App\Model\Service;
use App\Model\Testimonial;
use App\Model\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::select('*')->where('enabled',1)->get();
        $about = About::select('*')->first();
        $gallery = Gallery::select('*')->latest()->get();
        $services = Service::select('*')->orderBy('id','asc')->get();
        $brochure = Brochure::select('title','image')->first();
        $chooses = Choose::select('*')->get();
        $videos = Video::select('*')->latest()->paginate(8);
        $blogs = Blog::select('*')->latest()->paginate(4);
        $testimonial = Testimonial::select('*')->latest()->paginate(6);
        return view('welcome', compact('about','testimonial','blogs','chooses','services','gallery','banner','brochure','videos'));
    }

    public function approval()
    {
        return view('frontend.pages.approval');
    }

}

