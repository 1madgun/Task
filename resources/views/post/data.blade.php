<div class="col s12 masonry">
@foreach($post as $post)
  <div class="card">
    @if($post->image === "")
    <div class="card-content">
      <span class="card-title activator">
        <strong>{{ $post->title }}</strong>
      </span>
      <span class="activator" style="cursor:pointer;">
        By : 
        @if(Auth::guest())
          {{ $post->name }}
        @elseif($post->name == Auth::user()->name)
          Me
        @else
          {{ $post->name }}
        @endif
        <i class="material-icons right">format_list_bulleted</i>
      </span>
    </div>
    @else
  	<div class="card-image waves-effect waves-light">
		  <img class="activator" src="{{ asset($post->image) }}">
      <span class="card-title">
      	<strong>{{ $post->title }}</strong>
      </span>
		</div>
    <div class="card-content">
      <span class="activator" style="cursor:pointer;">
        By : 
        @if(Auth::guest())
          {{ $post->name }}
        @elseif($post->name == Auth::user()->name)
          Me
        @else
          {{ $post->name }}
        @endif
        <i class="material-icons right">format_list_bulleted</i>
      </span>
    </div>
    @endif 
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">
        <strong>{{ $post->title }}</strong>
      	<i class="material-icons right">close</i>
      </span>
      <p>
        @if(strlen($post->article) > 150)
        {{ substr($post->article, 0,150) }}...
        @else
        {{ $post->article }}
        @endif
      </p>
      <div class="divider"></div>
      <div class="row">
      @if(Auth::guest())
      	<div class="right">
      		<a href="{{ route('post.show', $post->id) }}">Baca Selengkapnya</a>
        </div>
      @elseif(Auth::user()->id == $post->author)
        <div class="right">
          <a href="{{ route('post.show', $post->id) }}">Baca Selengkapnya</a>
        </div>
        <div class="left">
          {!! Form::open(['route' => ['post.destroy', $post->id], 'class' => 'right', 'id' => 'myPost']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
          {!! Form::close() !!}
          <a onclick="$('#myPost').submit()" style="cursor:pointer;" class="red-text">
            <i class="material-icons right">delete</i>
          </a>
          <a href="{{ route('post.edit',$post->id) }}" class="green-text text-darken-2">
            <i class="material-icons right">mode_edit</i>
          </a>
        </div>
      @else
        <div class="right">
          <a href="{{ route('post.show', $post->id) }}">Baca Selengkapnya</a>
        </div>
      @endif
      </div>
    </div>
  </div>
@endforeach
</div>