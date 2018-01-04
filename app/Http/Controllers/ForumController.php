<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Tag;
class ForumController extends Controller
{

function __construct()
{
  return $this->middleware('auth')->except('index');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $forum = Forum::orderBy('id', 'desc')->paginate('4');
      return view('forum.index')->withForum($forum);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // menampilkan $tags
        $tags = Tag::all();

        return view('forum.create', ['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // validasi request
        $this->validate(request(), [
          'title'=> 'required',
          'post' => 'required',
        ]);

        // save ke database
        $forum = New Forum;
        $forum->title=$request->title;
        $forum->slug=str_slug($forum->title);
        $forum->post=$request->post;
        $forum->user_id = auth()->id();
        $forum->save();
        $forum->tags()->sync($request->tags);

        // menampilkan halaman sesuai id
        return redirect()->route('forum.show', $forum->slug)->withMessage('Pertanyaan berhasil di submit');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // menambahkan slug pda url
    public function show($slug)
    {
        $forum=Forum::where('slug', '=', $slug)->first();

      return view('forum.show')->withForum($forum);

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
        $forum=Forum::find($id);
        $tags = Tag::all();
        return view('forum.edit')->withForum($forum)->withTags($tags);


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
      $this->validate(request(), [
        'title'=> 'required',
        'post' => 'required',
      ]);
        $forum=Forum::find($id);
        $forum->title=$request->input('title');
        $forum->post=$request->input('post');

        $forum->save();

        // menampilkan data yang di update
        $forum->tags()->sync($request->tags);

        // menampilkan halaman sesuai id
        return redirect()->route('forum.show', $forum->id)->withMessage('Pertanyaan berhasil di edit');
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
          $forum=Forum::find($id);
          $forum->delete();

          return redirect()->route('forum.index')->withMessage('berhasil dihapus');
    }
}
