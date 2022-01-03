<?php

namespace App\Http\Controllers\Frontend;

use App\Model\About;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Info;
use App\Model\Inquiry;
use App\Model\Page;
use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class FrontendController extends Controller
{
    protected $gallery = null;
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function aboutus()
    {
        $about = About::select('*')->first();
    	return view('frontend.aboutus.index',compact('about'));
    }

    public function services()
    {
        $services = Service::select('*')->get();
    	return view('frontend.service.index',compact('services'));
    }

    public function singleService($slug)
    {
        $service = Service::select('*')->where('slug',$slug)->first();
        $recent_service = Service::select('*')->where('id','!=',$service->id)->get();
        return view('frontend.service.singleservice',compact('service','recent_service'));
    }

    public function contact()
    {
        $info = Info::select('*')->first();
    	return view('frontend.contact.index',compact('info'));
    }

    public function blog()
    {
        $blogs = Blog::select('*')->latest()->paginate(8);
        return view('frontend.blog.index',compact('blogs'));
    }
    public function singleBlog($slug)
    {
        $blog = Blog::select('*')->where('slug',$slug)->first();
        $recent_blog = Blog::select('*')->where('id','!=',$blog->id)->latest()->paginate(10);
        return view('frontend.blog.singleblog',compact('blog','recent_blog'));
    }

    public function works(Request $request)
    {
        $services = Service::select('*')->orderBy('title','asc')->get();
        $allworks = Gallery::select('*')->latest()->paginate(15);
        $works = array();
        foreach($services as $work){
            $ok = Gallery::select('*')->where('service_id',$work->id)->where('enabled',1)->get();
            //dd($ok);
            foreach($ok as $i){
                array_push($works, $i);
            }
        }
        return view('frontend.work.index',compact('services','allworks','ok'));
    }
    //service inquiry
    public function serviceInquery(Request $request)
    {
        $inquiry = new Inquiry();
        $inquiry->service_name = $request->service_name;
        $inquiry->full_name = $request->full_name;
        $inquiry->phone = $request->phone;
        $inquiry->message = $request->message;
        $status = $inquiry->save();
        //for mail
         $service = $request->service_name;
         $name = $request->first_name;
         $phone = $request->phone;
         $messages = $request->message;

        if($status){
            return redirect()->back()->with('success','Inquery Message Send Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while sending inquery.');
        }
    }
    //privacy policy
    public function privacy()
    {
        $page = Page::select('*')->where('id',1)->first();
        return view('frontend.page.privacy',compact('page'));
    }
    public function terms()
    {
        $page = Page::select('*')->where('id',2)->first();
        return view('frontend.page.terms',compact('page'));
    }
    //page not found
    public function pageNotFound()
    {
        return view('frontend.404');
    }
}
