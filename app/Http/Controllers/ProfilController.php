<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class ProfilController extends Controller
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
        //
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
        $user = User::find($id);
        return view('post.profil')->with('user',$user);
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
      $validator = Validator::make($request->all(), [
          'name' => 'required|max:255',
          'email' => 'required|regex:/^[a-zA-Z0-9_\.]+@([a-z]+\.)+[a-z]{2,4}$/',
          'username' => 'required|min:6',
          'profic' => 'sometimes|image|mimes:jpeg,png|min:1',
      ]);

      if ($validator->fails()) {
          return redirect()->back()->withInput()->with('errors', $validator->errors());
      }

      $user = User::find($id);

      if ($request->hasFile('profic')) {
          $file = $request->file('profic');
          $destination_path = 'img/profic/';
          $filename = str_random(6).'_'.$file->getClientOriginalName();
          $file->move($destination_path,$filename);
          $user->profic = $destination_path.$filename;
      }

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->username = $request->input('username');
      $user->save();

      return redirect()->route('post.index');
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
