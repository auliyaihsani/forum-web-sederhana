@extends('layouts.main')

@section('title', 'Homepage')


@section('content')

{{-- jumbotron --}}
<div class="container">
  <div class="jumbotron">
    <h1>Welcome to Forum Sahabat Coding  </h1>
    <p>Belajar coding bersama mudah dan seru mari buat karya yang menyenangkan </p>
    <p><a class="btn btn-primary btn-lg">Bergabung bersama kami</a></p>
  </div>



<div class="row">
<div class="col-md-3">
<a href="forum/create" class="btn btn-success btn-block">Buat Pertanyaan</a><br>
@include('forum.includes.tags')
</div>

<div class="row">
<div class="col-md-8">

@include('forum.includes.post-list')


    </div>
    </div>

    {{-- pagination --}}
    <div class="text-center">
    {!! $forum->links()!!}
    </div>

    </div>




@endsection
