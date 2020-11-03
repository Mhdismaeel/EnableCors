<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;
use App\Actions\Log\GetHttpLogAction;
use App\Actions\Log\GetAllActivityLogAction;
use App\Actions\Log\GetActivityUserLogAction;
use App\Actions\Log\ProjectAllActivityAction;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=GetHttpLogAction::execute();

        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetActivities()
    {
        $response=GetAllActivityLogAction::execute();

        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);

        }
    }



    public function GetProjectAllActivity($projectid)
    {
        $response=ProjectAllActivityAction::execute($projectid);

        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);

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
