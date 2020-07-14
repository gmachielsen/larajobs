<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;
use Auth;
use App\User;
use App\Category;

class JobController extends Controller
{
    public function __construct() {
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'show', 'apply', 'allJobs', 'searchJobs')]);
    }
    
    public function index(){
    	$jobs = Job::latest()->limit(10)->where('status',1)->get();
        $categories = Category::with('jobs')->get();        
        $companies = Company::get()->random(12);
       
    	return view('welcome',compact('jobs','companies','categories'));
    }

    public function show($id,Job $job){

        $jobRecommendations = $this->jobRecommendations($job);

        return view('jobs.show',compact('job','jobRecommendations'));
    }

    public function jobRecommendations($job){
        $data = [];
        
        $jobsBasedOnCategories = Job::latest()->where('category_id',$job->category_id)
                             ->whereDate('last_date','>',date('Y-m-d'))
                             ->where('id','!=',$job->id)
                             ->where('status',1)
                             ->limit(6)
                             ->get();
        array_push($data,$jobsBasedOnCategories);
                           
        $jobBasedOnCompany = Job::latest()
                                ->where('company_id',$job->company_id)
                                ->whereDate('last_date','>',date('Y-m-d'))
                                ->where('id','!=',$job->id)
                                ->where('status',1)
                                ->limit(6)
                                ->get();
            array_push($data,$jobBasedOnCompany);

        $jobBasedOnPosition= Job::where('position','LIKE','%'.$job->position.'%')                 ->where('id','!=',$job->id)
                                ->where('status',1)
                                ->limit(6);
            array_push($data,$jobBasedOnPosition);

       $collection  = collect($data);
       $unique = $collection->unique("id");
       $jobRecommendations =  $unique->values()->first();
        // dd($jobRecommendations);
        // dd($jobsBasedOnCategories);
        return $jobRecommendations;
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
            'last_date' => request('last_date'),
            'number_of_vacancy' => request('number_of_vacancy'),
            'gender' => request('gender'),
            'experience' => request('experience'),
            'salary' => request('salary'),
            'level' => request('level'),
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
        // front search
        $search = $request->get('search');
        $address = $request->get('address');
        if($search && $address) {
            $jobs = Job::where('position', 'LIKE', '%'.$search.'%')
                    ->orWhere('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('type', 'LIKE', '%'.$search.'%')
                    ->orWhere('address', 'LIKE', '%'.$address.'%')
                    ->paginate(10);
                    
            return view('jobs.alljobs', compact('jobs'));

        }
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
    public function searchJobs(Request $request) 
    {
        $keyword = $request->get('keyword');
        $users = Job::where('title', 'like', '%'.$keyword.'%')
                ->orWhere('position', 'like', '%'.$keyword.'%')->limit(5)->get();
        return response()->json($users);
    }
}
