<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user=User::all();
        return response()->json(['users'=>$user],200);
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
       try {
            $request->validate([
                'name'     => 'required|string',
                'email'    => 'required|string',
                'password' => 'required|string',
            ]);

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $token = $user->createToken('access_token')->accessToken;

            return response([
                'status'=>true,
                'message'=>'user save success',
                'user'         => $user,
                'access_token' => $token
            ]);
        } catch (Exception $e) {
            return response([
                'status'=>false,
                'error' => $e->getMessage()
            ]);
        }
    }



 public function login(Request $request){

   $validate=$request->validate([
               
                'email'    => 'required|string',
                'password' => 'required|string',
            ]);

    if(Auth::attempt($validate)){
        //$token = $user->createToken('Token Name')->accessToken;

        $token = Auth::user()->createToken('access_token')->accessToken;
            return response([
            'status'=>true,
            'message'=>"login success",
            'access_token'=>$token
        ]);
      

    }else{
          return response([
            'status'=>false,
            'message'=>"do not match"
        ]);

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
        $users=User::find($id);
        return response()->json(['user'=>$users]);
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
