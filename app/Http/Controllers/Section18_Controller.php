<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Carbon\carbon;

use Illuminate\Http\Request;

class Section18_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view ('pages.section_18.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.section_18.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
// Method 1
    // Post::create([
    //     'title'=>$request->title,
    //     'content'=>$request->content,
    // ]);

// Method 2
    $data = 
    [
        "title"=>$request->title,
        'content'=>$request->content
    ];
    Post::create($data);


// Method 3
    // $input = $request->all();
    // $input['title']=$request->title;
    // $input['content']=$request->content;
    //  Post::create($request->all());

// Method 4
    // $post = New Post;
    // $post->title = $request->title;
    // $post->content = $request->content;
    // $post->save();


 return redirect()->back()->with('success','Successfully recorded!!');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $posts = Post::findOrFail($id);
     return view ('pages.Section_18.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $posts = Post::findOrFail($id);
        return view('pages.Section_18.edit',compact('posts'));
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
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->updated_at = Carbon::now();
        $post->save();

        return redirect()->route('section18.show',$id)->with('success',"Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
         Post::findOrFail($id)->delete();
        return redirect()->route('section18.index');
    }
}
