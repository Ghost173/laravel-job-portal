<?php

namespace App\Http\Controllers;
use App\Http\Requests\JobPostRequest;
use App\Models\Company;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;

class Jobcontroller extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('employer',['except'=>array('index','show')]);
    // }


    public function index() {
        $jobs = Jobs::all()->take(10);
        return view('welcome', compact('jobs'));

    }

    public function show($id,Jobs $job) {
        // $jos = Jobs::find($id);
     
        return view('jobs.show', compact('job'));
    }

    public function create(){
        return view('jobs.create');
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;

        Jobs::create([

            $slug = request('title'),
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slung' => $slug,
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id'=>request('cetegory'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status' =>request('status'),
            'laste_date' =>request('last_date'),
        ]);

        return redirect()->back()->with('message', 'job posted successfully');
    }


    public function myjob() {
        $job = Jobs::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob', compact('job'));
    }

    public function editjob($id) {
        $jobs = Jobs::findOrFail($id);
        return view('jobs.editjobs',compact('jobs'));
    }

    public function update(Request $request,$id){
        // dd($request->all());
        $job = Jobs::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message', 'jobs update success');

    }

    public function apply(Request $request,$id){
        $jobid = Jobs::find($id);
        $jobid->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Application has been submited');
    }
    public function applicant(){
         $applicants = Jobs::has('users')->where('user_id','auth()->user()->id')->get();
        // return view('jobs.applicant',compact('applicant'));
        // $applicants = Jobs::all()->where('user_id','auth()->user()->id');
        return view('jobs.applicant',compact('applicants'));
    }
}
