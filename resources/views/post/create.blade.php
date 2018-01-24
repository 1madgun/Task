@if(Auth::guest())
	<script>
		var home = "{{ route('post.index') }}";
		window.location.replace(home);
	</script>
@else
<div class="row"></div>
<div class="container">
	<div class="col s12 white z-depth-1">
		<div class="row"></div>
		{!! Form::open(['route' => 'post.store', 'class' => 'col s12', 'files' => true]) !!}
		<div class="container">
			<div class="row">
				<div class="input-field col s6">
					{{ Form::text('title', '', ['id' => 'title', 'class' => 'validate', 'data-length' => '50']) }}
					{{ Form::label('title', 'Title', ['for' => 'title']) }}
				</div>
				<div class="input-field col s6">
					{{ Form::hidden('author', Auth::user()->id, ['class' => 'validate', 'readonly']) }}
					{{ Form::text('penulis', Auth::user()->name, ['id' => 'author' ,'readonly' => 'readonly', 'class' => 'validate']) }}
					{{ Form::label('author', 'Author', ['for' => 'author', 'class' => 'active']) }}
				</div>
			</div>
			<div class="input-field">
				{{ Form::textarea('article', '', ['class' => 'materialize-textarea', 'id' => 'textarea1']) }}
				{{ Form::label('article', 'Article', ['for' => 'textarea1']) }}
			</div>
			<div class="file-field input-field">
	      <div class="btn btn-flat green darken-1 white-text">
	        <span>Gambar</span>
	        {!! Form::file('image', []) !!}
	      </div>
	      <div class="file-path-wrapper">
	        {!! Form::text('images', '', ['class' => 'file-path validate', 'placeholder' => 'Sisipkan gambar terkait']) !!}
	      </div>
	    </div>
			<div class="input-field right">
				{{ Form::submit('Submit', ['class' => 'waves-effect waves-light btn btn-flat white-text light-blue']) }}
				<a onclick="onHome()" class="btn btn-flat white-text red waves-effect waves-light">Cancel</a>
			</div>
		</div>
		{!! Form::close() !!}
		<div class="row"></div>
	</div>
</div>
@endif