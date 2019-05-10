<?php

namespace App\Http\Controllers;

use App\Interests;
use App\InterestUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterestUsersController extends Controller
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
        $interestusers = InterestUsers::create($request->all());
        return response()->json($interestusers, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $interestofuser = InterestUsers::where('user_id', $id)->get();
//        if($interestofuser == null){
//            return response()->json([
//                'error' => 'Resource not found'
//            ], 404);
//        } else{
//            return response()->json(['status' => 'success',
//                'status_code' => 200,
//                'message' => 'Record Found', 'data' =>$interestofuser]);
//        }

        $interestofuser = DB::table('interestusers')
            ->join('interests', 'interestusers.interest_id', '=', 'interests.id')
            ->join('users', 'users.id', '=', 'interestusers.user_id')
            ->where('interestusers.user_id', $id)
            ->get()->pluck('interest_name');

        return response()->json(['status' => 'success',
            'status_code' => 200,
            'user_id' => $id,
            'message' => 'Record Found', 'data' =>$interestofuser]);

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
