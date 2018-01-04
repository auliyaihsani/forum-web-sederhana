@extends('layouts.main')

@section('title', 'Tags')

@section('content')
<div class="row">
<div class="container">
<ul class="breadcrumb">
  <li> <a href="#">Home</a> </li>
  <li> <a href="#">Library</a> </li>
  <li class="active">Data</li>
</ul>

<hr>

<div class="col-md-4">
<form  action="{{route('tags.store')}}" method="post">
  {{ csrf_field() }}
  <div class="form-group" style="margin-top: 12px;">
    <label for="name">Buat Tag Baru</label>
  <input type="text" name="name"  class="form-control" placeholder="Masukan Tags">
  </div>


<button type="submit" class="btn btn-success">Simpan</button>

</form>
  </div>

<div class="col-md-8">
  <div class="text-center">
  <h4>Semua Tags</h4>
  </div>
  <table class="table table-striped table-hover">
    <thead>
      <tr class="info">
        <th>No.</th>
        <th>Nama Tag</th>
        <th>Dibuat Tanggal</th>
        <th>Di Update Tanggal</th>
        <th></th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($tags as $tag )
      <tr>

        {{-- tag edit --}}
        <td>{{$tag->id}}</td>
        <td>  {{$tag->name}}</td>
        <td> {{date('j F Y, h:i a', strtotime($tag->created_at))}}</td>
        <td>  {{date('j F Y, h:i a', strtotime($tag->updated_at))}}</td>
        <td> <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-success btn-sm">Edit</a> </td>

        {{-- delete tag --}}
      <td>
      <form action="{{route('tags.destroy', $tag->id)}}" method="post">
      {{ csrf_field() }}
        {{method_field('delete')}}
      <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
      </form>
        </td>
      </tr>
  @endforeach
</tbody>
</table>
</div>
@endsection
