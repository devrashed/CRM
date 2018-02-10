<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client as Client;
use App\Marketer as Marketer;
use Session;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $clients = DB::table('clients')
            ->join('marketers', 'clients.marketer_id', '=', 'marketers.id') 
            ->select('clients.*','marketers.infos as marketers_infos')
            ->where('clients.status', 1)
            ->get();
            //$clients=Client::with('marketer')->get();
            //dd($clients);
            //return view('admin.clients.index')->withClients($clients);
            //echo $clients;die;
            // echo "<pre>";
            // dd($clients);
            //$marketers=Marketer::all();
            //dd($marketers);
return view("admin.clients.index",['clients'=> $clients]);
//return view("admin.clients.index",['clients'=> $clients,'marketers'=> $marketers]);
     //$clients=Client::all();
     //$marketers=Marketer::all();
        //return view('admin.clients.index')->withClients($clients)->withMarketers($marketers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marketers=Marketer::all();
        //dd($marketers);
        return view('admin.clients.create')->withMarketers($marketers);
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
                'infos.*'=>array(
                            'required',
                        ),
                'email'=>'required|email',
                'company_name'=>'required',
                'business_type'=>'required',
                'project_name'=>'required',
                'client_status'=>'required',
                'marketer_id'=>'required',

            ]);
        //dd($request);
        $client_info=$request['infos']=json_encode($request['infos']);
        $client=new Client;
        $client->infos=$client_info;
        $client->email=$request->email;
        $client->company_name=$request->company_name;
        $client->business_type=$request->business_type;
        $client->project_name=$request->project_name;
        $client->client_status=$request->client_status;
        $client->marketer_id=$request->marketer_id;
        $client->status='1';
            //dd($client);
        $client->save();
        Session::flash('success','Data was successfully save!');
       return redirect('/clients');
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
