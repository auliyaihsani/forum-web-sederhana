@extends('layouts.main')

@section('title', 'show')

@section('content')
<div class="container">
<div class="show-header">
<h1>  {{ $forum->title }}</h1>

<div>
<a href="{{route('forum.create')}}" class="btn btn-sm btn-info pull-right">Buat Pertanyaan</a>
</div>
</div>



<div class="row">
  <div class="col-md-8">

      <div class="well">

          <p> {{ $forum->post }} </p>
              </div>
              <div class="well well-sm">

              @foreach ($forum->tags as $tag )
                  <span class="label label-success">{{$tag->name}}</span>
              @endforeach
              <span class="pull-right"> <a href="#"> Mohammad Auliya Ihsani  </a>{{date('j F Y, h:i a', strtotime($forum->created_at))}} </span>
              </div>

        @foreach ($forum->comments as $comment)

          <div class="well">
          <div class="panel panel-default">
  <div class="panel-body">
    <p>{{$comment->isi_komentar}}</p>
  </div>
</div>

<br>

  <small>{{$comment->user->name }}</small>
  <br>

  {{date('j F Y, h:i a', strtotime($forum->created_at))}}

</div>


@endforeach


  <form class="" method="post" action="{{route('buatkomentar.store', $forum->id)}}">
    {{ csrf_field() }}
    <div class="form-group">
      <input type="text" name="isi_komentar" class="form-control" placeholder="Tulis komentar disini.." value="">
    </div>

    <button type="submit" class="btn btn-success" name="button">Komentar</button>
  </form>

  
              </div>
              {{-- end well well-sm --}}


  <div class="col-md-4">
    @if(auth()->user()->id == $forum->user_id)
  <a href="{{route('forum.edit', $forum->id)}}" class="btn btn-success btn-block">Edit Pertanyaan</a>
  <br>

  <form  action= "{{route('forum.destroy', $forum->id)}}" method="post">
{{ csrf_field() }}
{{ method_field('delete') }}
    <input type="submit" value="Hapus" class="btn btn-block btn-danger">
  </form>
@endif
  </div>
  </div>
  </div>
  @endsection
