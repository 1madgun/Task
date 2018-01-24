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
	<link rel="stylesheet" href="{{ asset('/css/material-icon.css') }}">
</head>
<body>
	<script src="{{ asset('/js/jquery-2.1.1.min.js') }}"></script>
	<script src="{{ asset('/js/materialize.min.js') }}"></script>
	<script>
		$(document).ready(function(){
			$('#action').hide();
		});

		function onEdit() {
			$('#name').removeAttr("readonly");
			$('#email').removeAttr("readonly");
			$('#username').removeAttr("readonly");
			$('#file-input').removeAttr("disabled");
			$('#action').show();
			$('#button').hide();
		}

		function onCancel() {
			$('#name').attr("readonly","");
			$('#email').attr("readonly","");
			$('#username').attr("readonly","");
			$('#file-input').attr("disabled","");
			$('#button').show();
			$('#action').hide();
		}
	</script>

	<div class="row"></div>
			<div class="row">
				<div class="col s9 push-s1 white">
					<div class="row"></div>
					<div class="container">
						<div class="row">
							<div class="col s4 center-align">
								<div class="row"></div>
									<img src="{{ asset(Auth::user()->profic) }}" class="responsive-img circle grey">
								<div class="row"></div>
								<a class="btn btn-flat grey lighten-2 waves-effect" onclick="onHome()">Home<i class="material-icons right">home</i></a>
								<div class="row"></div>
								<div id="button">
									<a class="btn btn-flat grey lighten-2 waves-effect" onclick="onEdit()">Edit Profil</a>
								</div>
							</div>
							<div class="col s8">
								{!! Form::model($user, ['url' => '/profil/'.$user->id, 'method' => 'PUT', 'files' => true]) !!}
								<div class="input-field">
									<input type="text" value="{{ $user->name }}" readonly="readonly" id="name" name="name">
									<label for="name">Nama</label>
								</div>
								<div class="input-field">
									<input type="text" value="{{ $user->email }}" readonly="readonly" id="email" name="email">
									<label for="email">e-mail</label>
								</div>
								<div class="input-field">
									<input type="text" value="{{ $user->username }}" readonly="readonly" id="username" name="username">
									<label for="username">Username</label>
								</div>
								<div id="action">
									<div class="file-field input-field">
							      <div class="btn btn-flat green darken-1 white-text">
							        <span>Profil Pic</span>
							        {!! Form::file('profic', []) !!}
							      </div>
							      <div class="file-path-wrapper">
							        {!! Form::text('images', substr($user->profic, 18), ['class' => 'file-path validate']) !!}
							      </div>
							    </div>
									<div class="input-field right">
										<input type="submit" class="btn btn-flat waves-effect waves-light blue white-text" value="Simpan">
										<a onclick="onCancel()" class="btn btn-flat waves-effect waves-light red white-text">Batal</a>
									</div>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>
@endif