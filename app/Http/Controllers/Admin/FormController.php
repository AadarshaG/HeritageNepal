<?php

namespace App\Http\Controllers\Admin;

use App\Model\ContactUs;
use Illuminate\Http\Request;
use App\Model\JobApplication;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function contact()
    {
    	$contacts = ContactUs::all();
    	return view('admin.formdata.contact', compact('contacts'));
    }

    public function viewmessage($id)
    {
    	$contact = ContactUs::find($id);
    	return view('admin.formdata.viewcontact', compact('contact'));
    }

    public function deletemsg($id)
    {
    	$contact = ContactUs::find($id);
    	$contact->delete();
    	return redirect()->back()->with('error', 'Message deleted Successfully');
    }

     public function job()
    {
    	$jobs = JobApplication::all();
    	return view('admin.formdata.job', compact('jobs'));
    }

    public function viewjob($id)
    {
    	$job = JobApplication::find($id);
    	return view('admin.formdata.viewjob', compact('job'));
    }

    public function deletejob($id)
    {
        $job = JobApplication::find($id);
        $job->delete();
        return redirect()->back()->with('error', 'Job Application deleted Successfully');
    }
}
