<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;
use Auth;

class JobController extends Controller
{
    public function __construct() {
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'show', 'apply', 'allJobs')]);
    }
    public function index()
    {
        $jobs = Job::latest()->limit(10)->where('status', 1)->get();
        $companies = Company::get()->random(12);
        return view('welcome', compact('jobs', 'companies'));
    }



    public function show($id, Job $job) {
        return view('jobs.show', compact('job'));
    }


    public function edit($id) {
        $jobs = Job::findOrFail($id);
        return view('jobs.edit', compact('jobs'));
    }

    public function update(Request $request, $id)
    {
        $job = JOb::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message', 'Job successfully updated!');
    }

    public function applicant() 
    {
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }

    public function company()
    {
        return view('company.index');
    }

    public function create()
    {
        return view('jobs.create');
    }



    public function myjob() {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }

    public function store(JobPostRequest $request)
    {   
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date')
        ]);
        return redirect()->back()->with('message', 'Job posted successfully!');
    }

    public function apply(Request $request, $id) 
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Application sent!');
    }

    public function allJobs(Request $request) 
    {
        // $keyword = $request->get('title');
        $keyword = request('title');
        $type = request('type');
        $category = request('category_id');
        $address = request('address');
        if($keyword||$type||$category||$address) {
            $jobs = Job::where('title', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('type', $type)
                    ->orWhere('category_id', $category)
                    ->orWhere('address', $address)
                    ->paginate(10);
                    return view('jobs.alljobs', compact('jobs'));
        } else {        
                $jobs = Job::latest()->paginate(10);
                return view('jobs.alljobs', compact('jobs'));
        }
    }
}
