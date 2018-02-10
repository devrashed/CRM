<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Session;
use DB;
class ServiceController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('auth',['except'=>'create']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $developers=DB::table('developers')->get();
       // 
       $services=Service::all();
        //dump($developers);
        //return view('admin.developers.index',['developers'=>$developers]);
        return view('admin.services.index')->withServices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request);die;
        $this->validate($request,[
                'service_name'=>array(
                            'required',
                            //'regex:/^[a-zA-Z ]+$',
                            'max:100'
                        ),
            ]);
        $service=new Service;
        $service->service_name=$request->service_name;
        $service->status='1';
        $service->save();
        Session::flash('success','Data was successfully save!');
       return redirect('/services');
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
