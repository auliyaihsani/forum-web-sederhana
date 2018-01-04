@extends('layouts.main')

@section('title', 'Contact')


@section('content')

  <div class="row">
    <div class="col-md-3">
      @include('forum.includes.tags')
    </div>

<h1 class="text-center">Contact</h1>
<form class="form-horizontal">
  <fieldset>

    <div class="form-group">
        <div class="col-md-11">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
</div>

    <div class="form-group">
    <div class="col-md-11">
  <label for="inputEmail" class="col-lg-2 control-label">No. Telepon</label>
  <div class="col-lg-10">
    <input type="number" class="form-control" id="notelepon" placeholder="Masukan nomer Telepon">
  </div>
</div>
</div>


    <div class="form-group">
        <div class="col-md-11">
      <label for="textArea" class="col-lg-2 control-label">Text</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" placeholder="ketik disini"></textarea>

      </div>
    </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

</div>
@endsection
