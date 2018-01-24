<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<link rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/material-icon.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/masonry.css') }}">
</head>
<body class="grey lighten-3">
	<script src="{{ asset('/js/jquery-2.1.1.min.js') }}"></script>
	<script src="{{ asset('/js/materialize.min.js') }}"></script>
	<script>
		var data = "{{ route('post.data') }}";
		var loginform = "{{ route('login') }}";
		var regisform = "{{ route('register') }}";
		var createpage = "{{ route('post.create') }}";
		@if(Auth::guest())

		@else
		var profpage = "{{ route('profil.edit',Auth::user()->id) }}";
		@endif

	  $(document).ready(function(){
	    $('.collapsible').collapsible();
			$(".button-collapse").sideNav({
				closeOnClick: true,
				draggable: true,
			});
			$(".button-collapse1").sideNav({
				closeOnClick: true,
				draggable: true,
			});
			$('.dropdown-button').dropdown({
				belowOrigin: true,
			});

			$('#isi').load(data);

	  });

	  function onHome() {
	  	$('#isi').empty();
	  	$('#isi').load(data);
	  }

		function onLogin() {
	  	$('#isi').empty();
			$('#isi').load(loginform);
		}

		function onRegister() {
	  	$('#isi').empty();
			$('#isi').load(regisform)
		}

		function onProfil() {
	  	$('#isi').empty();
			$('#isi').load(profpage);
		}

		function onCreate() {
	  	$('#isi').empty();
			$('#isi').load(createpage);
		}

	</script>

	@if(Auth::guest())

  @else
	<ul id="slide-out" class="side-nav">
    <li>
    	<div class="user-view">
      	<div class="background grey">
        	<img src="{{ asset('/img/cb_pasundan.jpg') }}" class="responsive-img">
      	</div>
      	<a onclick="onProfil()"><img class="circle" src="{{ asset(Auth::user()->profic) }}"></a>
      	<a onclick="onProfil()"><span class="white-text name">{{ Auth::user()->name }}</span></a>
      	<a onclick="onProfil()"><span class="white-text email">{{ Auth::user()->email }}</span></a>
    	</div>
    </li>
    <li>
    	<a onclick="onHome()">Home<i class="material-icons right">home</i></a>
    </li>
    <li>
    	<a onclick="onCreate()">Tulis<i class="material-icons right">create</i></a>
    </li>
    <li>
    	<a onclick="onProfil()">Profil<i class="material-icons right">account_circle</i></a>
    </li>
    <li>
    	<div class="divider"></div>
    </li>
    <li>
    	<a onclick="$('#formLogout').submit()">Logout</a>
    </li>
  </ul>
  @endif

	<nav class="red accent-2">
		<div class="nav-wrapper container">
			<a href="{{ route('post.index') }}" class="brand-logo">
				<i class="material-icons">motorcycle</i>
				Pasundan
				<i class="material-icons right">motorcycle</i>
			</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse">
				<i class="material-icons">menu</i>
			</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				@if(Auth::guest())
					<li>
						<a onclick="onLogin()">Login<i class="material-icons right">person</i></a>
					</li>
					<li>
						<a onclick="onRegister()">Daftar<i class="material-icons right">person_add</i></a>
					</li>
				@else
					{!! Form::open(['route' => 'logout', 'id' => 'formLogout']) !!}
					{!! Form::close() !!}
					<li>
						<a data-activates = "slide-out" class="button-collapse1">{{ Auth::user()->name }}<i class="material-icons right">menu</i></a>
					</li>
				@endif
			</ul>
			<ul class="side-nav" id="mobile-demo">
				@if(Auth::guest())
					<li>
						<a onclick="onLogin()">Login<i class="material-icons right">person</i></a>
					</li>
					<li>
						<a onclick="onRegister()">Daftar<i class="material-icons right">person_add</i></a>
					</li>
				@else
					<li>
			    	<div class="user-view">
			      	<div class="background grey">
			        	<img src="{{ asset('/img/cb_pasundan.jpg') }}" class="responsive-img">
			      	</div>
			      	<a onclick="onProfil()"><img class="circle" src="{{ asset(Auth::user()->profic) }}"></a>
			      	<a onclick="onProfil()"><span class="white-text name">{{ Auth::user()->name }}</span></a>
			      	<a onclick="onProfil()"><span class="white-text email">{{ Auth::user()->email }}</span></a>
			    	</div>
			    </li>
			    <li>
			    	<a onclick="onHome()">Home<i class="material-icons right">home</i></a>
			    </li>
			    <li>
			    	<a onclick="onCreate()">Tulis<i class="material-icons right">create</i></a>
			    </li>
			    <li>
			    	<a onclick="onProfil()">Profil<i class="material-icons right">account_circle</i></a>
			    </li>
			    <li>
			    	<div class="divider"></div>
			    </li>
			    <li>
			    	<a onclick="$('#formLogout').submit()">Logout</a>
			    </li>
				@endif
			</ul>
		</div>
	</nav>

	<div class="row">
		<div class="container">
			<div id="isi"></div>
		</div>
	</div>

</body>
</html>