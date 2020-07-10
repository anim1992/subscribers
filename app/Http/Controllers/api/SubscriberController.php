<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Subscriber;
class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::all();
        if($subscribers)
        {
            return response(['subscribers' => $subscribers, 'status' => 200]);
        }
        else{
            return response(['message' => 'No Data Found', 'status' => 401]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $subscriber = Subscriber::create([
            'name' => $request->name,
            'email' => $request->email
        ]);
        if($subscriber){
            return response(['message' => 'Upload Successfully']);
        }
        else{
            return response(['message' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscriber = Subscriber::find($id);
        if($subscriber)
        {
            return response(['subscriber' => $subscriber, 'status' => 200]);
        }
        else{
            return response(['message' => 'No Data Found', 'status' => 401]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       
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
        $subscriber = Subscriber::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $subscriber = $subscriber->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        if($subscriber)
        {
            return response(['message' => 'Update Successfully']);
        }
        else
        {
            return response(['message' => 'Some thing goes wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber = $subscriber->delete();
            if($subscriber)
            {
                return response(['message' => 'Delete Successfully']);
            }
            else
            {
                return response(['message' => 'Some thing goes wrong']);
            }
    }
}
