<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service as Service;
use App\Discussion;
use App\Developer;
use App\ProjectStatus;
use Session;
use DB;

class ProjectStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_statuses = DB::table('project_statuses')
            ->join('developers', 'project_statuses.developer_id', '=', 'developers.id')
            ->select('project_statuses.*','developers.name')
            ->where('project_statuses.status', 1)
            ->get();
            //dd($project_statuses);
        //$developer=Developer::all();
        //dd($developer);
        return view('admin.projectstatus.index',['project_statuses'=> $project_statuses]);
        ///return view('admin.discussions.index')->withDiscussions($discussions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discussions = DB::table('discussions')
            ->join('services', 'discussions.service_id', '=', 'services.id')
            ->select('services.service_name')
            ->where('discussions.project_status', 2)
            ->get();
            //dd($discussions);
        $developer=Developer::all();
        //dd($developer);
        return view('admin.projectstatus.create',['discussions'=> $discussions])->withDeveloper($developer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request);
        $this->validate($request,[
                'service_name'=>'required',
                'developer_id'=>'required',
                'project_post'=>'required|max:255',
                'file_send'=>'mimes:doc,pdf,docx',
                'comment'=>'required',
                'project_status'=>'required',

            ]);
        $projectstatus=new ProjectStatus;
        $projectstatus->service_name=$request->service_name;
        $projectstatus->developer_id=$request->developer_id;
        $projectstatus->project_post=$request->project_post;
$fileName = time().'.'.$request->file_send->getClientOriginalExtension();
        $request->file_send->move(public_path('file_send'), $fileName);
        //dd($fileName);
        $projectstatus->file_send=$fileName;
        $projectstatus->comment=$request->comment;
        $projectstatus->project_status=$request->project_status;
        $projectstatus->status='1';
            //dd($client);
        $projectstatus->save();
        Session::flash('success','Data was successfully save!');
       return redirect('/projectstatus'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
