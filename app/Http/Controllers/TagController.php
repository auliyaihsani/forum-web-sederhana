<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;


class TagController extends Controller
{
  public function index()
  {
    $tags = Tag::all();
    return view('tags.index')->withTags($tags);
  }


  public function store(Request $request)
  {

    $this->validate(request(), [
      'name'=> 'required',
    ]);

    $tags = New Tag;
    $tags->name = $request->name;
    $tags->save();

    return redirect()->route('tags.index')->withMessage('Tag baru berhasil di buat');
  }




  public function edit($id)
  {
    $tags = Tag::find($id);
    return view('tags.edit')->withTags($tags);
  }

  public function update(Request $request, $id)
  {
    $this->validate(request(), [
    'name'=> 'required | min: 3'
    ]);

    $tags = Tag::find($id);
    $tags->name = $request->name;

    $tags->save();

  return redirect()->route('tags.index')->withMessage('Tag baru berhasil di edit');
  }

  public function destroy($id)
  {
      //
        $tags=Tag::find($id);
        $tags->delete();

        return redirect()->route('tags.index')->withMessage('berhasil dihapus');
  }


}
