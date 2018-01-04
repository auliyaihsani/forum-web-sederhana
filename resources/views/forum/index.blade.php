@extends('layouts.main')

@section('title', 'Forum')

@section('content')
<br>

  <div class="row">
    <div class="col-md-3">
    <a href="{{route('forum.create')}}" class="btn btn-success btn-block">Buat Pertanyaan</a><br>
  @include('forum.includes.tags')
    </div>

  <div class="row">
  <div class="col-md-8">
@include('forum.includes.post-list')
  </div>
  </div>

<div align="center">
{!! $forum->links()!!}
</div>

@endsection
