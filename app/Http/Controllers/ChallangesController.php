<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challange;
use DB;

class ChallangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'reward' => 'required'
        ]);

        $challange = new Challange;
        $challange->userId = auth()->user()->id;
        $challange->title = $request->input('title');
        $challange->description = $request->input('description');
        $challange->deadline = $request->input('deadline');
        $challange->reward = $request->input('reward');
        $challange->isRunning = false;
        $challange->save();

        return redirect('/profile2');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challange = Challange::find($id);
        return $challange;
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
        $challange = Challange::find($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'reward' => 'required',
            'isRunning' => 'required'
        ]);

 
        $challange->userId = auth()->user()->id;
        $challange->title = $request->input('title');
        $challange->description = $request->input('description');
        $challange->deadline = $request->input('deadline');
        $challange->reward = $request->input('reward');
        $challange->isRunning = $request->input('isRunning');
        $challange->save();

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

    public function start($id)
    {
        $challange = Challange::find($id);
        $challange->isRunning = true;
        $challange->save();
        return "jo, hat geklappt";
    }
}
