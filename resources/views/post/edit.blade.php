@if(Auth::guest())
	<script>
		var home = "{{ route('post.index') }}";
		window.location.replace(home);
	</script>
@else
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<link rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}">
</head>
<body class="grey lighten-3">
	<script src="{{ asset('/js/jquery-2.1.1.min.js') }}"></script>
	<script src="{{ asset('/js/materialize.min.js') }}"></script>
	<div class="row"></div>
	<div class="container">
		<div class="col s12 white z-depth-1">
			<div class="row"></div>
			{!! Form::model($post, ['route' => ['post.update',$post->id], 'method' =>'PUT', 'files' => true,'class' => 'col s12']) !!}
			<div class="container">
				<div class="row">
					<div class="input-field col s6">
						{{ Form::text('title', $post->title, ['id' => 'title', 'class' => 'validate']) }}
						{{ Form::label('title', 'Title', ['for' => 'title']) }}
					</div>
					<div class="input-field col s6">
						{{ Form::hidden('author', $post->author, ['readonly', 'class' => 'validate']) }}
						{{ Form::text('penulis', Auth::user()->name, ['id' => 'author' ,'readonly' => 'readonly', 'class' => 'validate']) }}
						{{ Form::label('author', 'Author', ['for' => 'author']) }}
					</div>
				</div>
				<div class="input-field">
					{{ Form::textarea('article', $post->article, ['class' => 'materialize-textarea', 'id' => 'textarea1']) }}
					{{ Form::label('article', 'Article', ['for' => 'textarea1']) }}
				</div>
				<div class="file-field input-field">
		      <div class="btn btn-flat green darken-1 white-text">
		        <span>Gambar</span>
		        {!! Form::file('image', []) !!}
		      </div>
		      <div class="file-path-wrapper">
		        {!! Form::text('images', substr($post->image, 16), ['class' => 'file-path validate', 'placeholder' => 'Sisipkan gambar terkait']) !!}
		      </div>
		    </div>
				<div class="input-field right">
					{{ Form::submit('Submit', ['class' => 'btn btn-flat waves-effect waves-light white-text light-blue']) }}
					<a href="{{ route('post.index') }}" class="btn btn-flat waves-effect waves-light white-text red">Cancel</a>
				</div>
			</div>
			{!! Form::close() !!}
			<div class="row"></div>
			<div class="row"></div>
		</div>
	</div>
</body>
</html>
@endif