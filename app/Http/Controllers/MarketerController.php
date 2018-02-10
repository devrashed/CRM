<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketer;
use Session;

class MarketerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marketers=Marketer::all();
        //dd($marketers);
        //echo $marketers['email'];die;
        //$var= json_decode($marketers['infos'],true);
        //dd($var);
        //return view('admin.marketers.index',compact('marketers'));
        return view('admin.marketers.index')->withMarketers($marketers);
           // dump($marketers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.marketers.create');
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

            ]);
        $mar_info=$request['infos']=json_encode($request['infos']);
        //dd($mar_info);
        $marketer=new Marketer;
        $marketer->infos=$mar_info;
        $marketer->email=$request->email;
            //dd($marketer);
        $marketer->save();
        Session::flash('success','Data was successfully save!');
       return redirect('/marketers');
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
