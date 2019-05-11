<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\User;
use Lcobucci\JWT\Parser;


class UserController extends Controller
{

    public function userLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function userRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        $success['email'] = $user->email;
        $success['twitter'] = $user->twitter;
        $success['github'] = $user->github;
        $success['linkedin'] = $user->linkedin;
        $success['profile_pic'] = $user->profile_pic;
        $success['website'] = $user->website;

        return response()->json(['success'=>$success], 200);
    }


    public function userDetails()
    {
        $users = User::get();
        return response()->json(['success' => $users], 200);
    }

    public function updateDetail(Request $request, $id){

        $users = User::find($id);
        $users->update($request->all());


        return $users;
    }

    public function  userDetail($id){
        if(User::find($id) == null){
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        } else{
            return response()->json(['status' => 'success',
                'status_code' => 200,
                'message' => 'Record Found', 'data' =>User::find($id)]);
        }
    }

    public function logoutApi(Request $request)
    {
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens()->find($id);
        $token->revoke();
        $response = "You are logged out.";
        return response()->json([
            'message' => $response
        ],200);
    }
}