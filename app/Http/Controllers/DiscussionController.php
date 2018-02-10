<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client as Client;
use App\Service as Service;
use App\Discussion;
use Session;
use DB;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions = DB::table('discussions')
            ->join('services', 'discussions.service_id', '=', 'services.id')
            ->join('clients', 'discussions.client_id', '=', 'clients.id') 
            ->select('discussions.*','services.service_name','clients.infos as clients_infos')
            ->where('discussions.status', 1)
            ->get();
        //$discussions=Discussion::all();
        return view('admin.discussions.index',['discussions'=> $discussions]);
        ///return view('admin.discussions.index')->withDiscussions($discussions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        $clients=Client::all();
        return view('admin.discussions.create')->withServices($services)->withClients($clients);
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
                'service_id'=>'required',
                'client_id'=>'required',
                'project_req'=>'required|max:255',
                'project_prosal'=>'mimes:doc,pdf,docx',
                'current_date'=>'required',
                'flow_date'=>'required',
                'comment'=>'required',
                'project_status'=>'required',

            ]);
        $discussions=new Discussion;
        $discussions->service_id=$request->service_id;
        $discussions->client_id=$request->client_id;
        $discussions->project_req=$request->project_req;
$fileName = time().'.'.$request->project_prosal->getClientOriginalExtension();
        $request->project_prosal->move(public_path('proposal_file'), $fileName);
        $discussions->project_prosal=$fileName;
        $discussions->proposal_send=$request->proposal_send;
        $discussions->current_date=$request->current_date;
        $discussions->flow_date=$request->flow_date;
        $discussions->comment=$request->comment;
        $discussions->project_status=$request->project_status;
        $discussions->status='1';
            //dd($client);
        $discussions->save();
        Session::flash('success','Data was successfully save!');
       return redirect('/discussions'); 
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
