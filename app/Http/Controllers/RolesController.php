<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        Role::create($input);
        return \redirect('/movies/'.$request->movie_id);
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Role::where([
            ['actor_id',$request->actor_id],
            ['movie_id',$request->movie_id]
        ])->delete();
        return redirect('/movies/'.$request->movie_id);
    }
}
