{{--  panel primary--}}
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Hot Threads</h3>
    </div>
@foreach ($forum as $forum )
      {{-- list group --}}
      <div class="list-group" style="margin-bottom: 14px;">
        <a href="{{ route('forum.show', $forum->slug) }}" class="list-group-item">
          <h4 class="list-group-item-heading"> {{ $forum->title }} </h4>
          <p class="list-group-item-text"> {{ $forum->post }}</p>
          <br>

          <div class="tags">
          @foreach ($forum->tags as $tag )
              <span class="label label-success">{{$tag->name}}</span>
          @endforeach
          <span class="pull-right">By Sahabat Coding {{$forum->created_at->diffForhumans()}} </span>
          </div>
        </a>
      </div>
    @endforeach
      </div>
