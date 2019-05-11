<?php

namespace App\Http\Controllers;

use App\Connection;
use App\Interests;
use App\InterestUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConnectionController extends Controller
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
        $connection = Connection::create($request->all());
        return response()->json($connection, 201);
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

    public function getall(){
        $connection = Connection::all();
        return response()->json(['success' => $connection], 200);
    }

    public function  getone($id){
//        if(Connection::find($id) == null){
//            return response()->json([
//                'error' => 'Resource not found'
//            ], 404);
//        } else{
//            return response()->json(['status' => 'success',
//                'status_code' => 200,
//                'message' => 'Record Found', 'data' =>Connection::find($id)]);
//        }

        $interestofuser = DB::table('connection')
            ->join('users', 'connection.user_id_2', '=', 'users.id')
            ->where('connection.user_id_1', $id)
            ->select('user_id_2','name', 'email')
            ->get();


        $interestofuser2 = DB::table('connection')
            ->join('users', 'connection.user_id_1', '=', 'users.id')
          ->where('connection.user_id_2', $id)
            ->select('user_id_1','name', 'email')
            ->get();
//        $data[] = json_decode($interestofuser,true);
//        $data[] = json_decode($interestofuser2,true);
//        $json_merge = json_encode($data);

        if($interestofuser->isEmpty()&& $interestofuser2->isEmpty()){
            return response()->json(['status' => 'failed',
                'status_code' => 404,
                'user_id' => $id,
                'message' => 'Record Not Found']);
        }

        return response()->json(['status' => 'success',
            'status_code' => 200,
            'user_id' => $id,
            'message' => 'Record Found', 'data' =>array_merge(json_decode($interestofuser, true),json_decode($interestofuser2, true))]);
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
        $connection = DB::table('connection')
            ->where('connection.user_id_1', $id)
            ->orWhere('connection.user_id_2', $id)
            ->get();

        if($connection->isEmpty()){
            return response()->json([
                'error' => 'Resource not found'
            ], 500);
        } else{
            if(DB::table('connection')
                ->where('connection.user_id_1', $id)
                ->orWhere('connection.user_id_2', $id)
                ->delete()){

                return response()->json( ['status' => 'success','message' => 'Connection deleted successfully!'], 200);
            } else{
                return response()->json([
                    'error' => 'Resource not found'
                ], 404);
            }
        }
    }
}
