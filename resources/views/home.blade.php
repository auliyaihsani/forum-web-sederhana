@extends('layouts.main')

@section('title', 'Home')

@section('content')

  <div class="row">
    <div class="col-md-3">
    <a href="/create" class="btn btn-success btn-block">Buat Pertanyaan</a><br>
  @include('forum.includes.tags')
    </div>

  <div class="row">
  <div class="col-md-8">
@include('forum.includes.post-list')



      </div>
      </div>
@endsection
