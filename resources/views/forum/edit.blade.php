@extends('layouts.main')

@section('title', 'Halaman edit')

@section('content')
      @if(auth()->user()->id == $forum->user_id)
  <div class="row">
    <div class="col-md-3">
      <div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Selamat datang di menu pertanyaan</strong> silahkan tanyakan masalah kamu <a href="#" class="alert-link"></a> mari kita diskusikan bersama
</div>
    </div>


    <div class="col-md-6">
<form action="{{ route('forum.update', $forum->id) }}" method="post" role="form">
  {{ csrf_field() }}
  {{ method_field('put') }}
<div class="well">

  <h4 class="text-center">Buat Pertanyaan : </h4>
  {{-- tambahkan  has-feedback{{$errors->has('title') ? 'has-error' : '' }} pada form group untuk validasi--}}
  <div class="form-group" >
    <label for="title" >Title</label>
    <input type="text" name="title"  class="form-control" placeholder="masukan judul" value="{{ $forum->title }}">
  </div>

  <div class="form-group" >
    <label for="Tag" >Tags</label>
    <select  name="tags[]" multiple="multiple"  class="form-control tags" placeholder="masukan tags">

      @foreach ($tags as $tag)
      <option value="{{$tag->id}}">{{$tag->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="post">Post</label>
    <textarea name="post" class="form-control" placeholder="tuliskan pertanyaan"  rows="5">{{ $forum->post }}
    </textarea>

  </div>

<button class="btn btn-success">Submit</button>
</div>
</form>
</div>
  </div>
@endsection


{{-- mengedit data tags  --}}
@section('script')

<script type="text/javascript">
   $(".tags").select2();
   $(".tags").select2().val({!! json_encode($forum->tags()->allRelatedIds() ) !!}).trigger('change');
</script>
@endsection

@else
  {{-- mengalihkan ke halaman home --}}
<script type="text/javascript">
  window.location = "/";
</script>

@endif
