<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movies',['movies'=>Movie::all()]);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        Movie::create($input);
        return redirect('/');
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie=Movie::find($id);
        $arr=Actor::all();
        $actors=[];
        foreach($arr as $actor){
            $flag=true;
            foreach($movie->actors as $role){
                if($actor->id==$role->actor->id){
                    $flag=false;
                    break;
                }
            }
            if($flag){
                $actors[]=$actor;
            }
        }
        return view('/movie',['movie'=>$movie,'actors'=>$actors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $movie=Movie::find($id);
        if(isset($_POST['delete'])){
            $movie->delete();
            return \redirect('/');
        }
        $input=$request->all();
        $movie->update($input);
        return  \redirect('/movies/'.$id);
      
    }

}
