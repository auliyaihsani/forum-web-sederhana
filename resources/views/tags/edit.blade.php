@extends('layouts.main')

@section('title', 'Home')

@section('content')

<form action="{{route('tags.update', $tags->id)}}" class="container"  method="post" >
{{ csrf_field() }}
{{ method_field('put') }}
<div class="form-group">

  <label for="name" >Nama Tag</label>
<input type="text" name="name" value="{{$tags->name}}" class="form-control">
</div>

<button type="submit" class="btn btn-info">Simpan</button>
 <a href="{{route('tags.index')}}" class="btn btn-danger">Batalkan</a>

</form>

@endsection
