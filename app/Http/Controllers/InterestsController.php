<?php

namespace App\Http\Controllers;

use App\Article;
use App\Interest;
use App\Interests;
use Illuminate\Http\Request;

class InterestsController extends Controller
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
        $interests = Interests::create($request->all());
        return response()->json($interests, 201);

    }

    public function getall(){
        $interests = Interests::all();
        return response()->json(['success' => $interests], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Interests::find($id) == null){
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        } else{
            return response()->json(['status' => 'success',
                'status_code' => 200,
                'message' => 'Record Found', 'data' =>Interests::find($id)]);
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
        $intersests = Interests::findOrFail($id);

        if(Interests::find($id)==null){
            return response()->json([
                'error' => 'Resource not found'
            ], 500);
        } else{
            if($intersests->delete()){

                return response()->json( ['status' => 'success','message' => 'Article deleted successfully!'], 200);
            } else{
                return response()->json([
                    'error' => 'Resource not found'
                ], 404);
            }
        }
    }
}
