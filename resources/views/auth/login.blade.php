<div class="row"></div>
<div class="col s8 push-s2 white z-depth-1">
	<h5 class="col s2 push-s1">Login</h5>
	{!! Form::open(['route' => 'login', 'class' => 'col s12']) !!}
    <div class="row">
			<div class="input-field col s10 push-s1">
        {{ Form::text('username', '', ['id' => 'username', 'class' => 'validate']) }}
        {{ Form::label('username', 'Username', ['for' => 'username']) }}
      </div>
    </div>
    <div class="row">                   
      <div class="input-field col s10 push-s1">
        {{ Form::password('password', ['id' => 'password', 'class' => 'validate']) }}
        {{ Form::label('password', 'Password', ['for' => 'password']) }}
      </div>
    </div>
    <div class="row">
      <div class="input-field col s7 right">
        {{ Form::submit('Login', ['class' => 'waves-effect waves-light btn btn-flat white-text light-blue']) }}
        <a onclick="onHome()" class="waves-effect waves-light white-text red btn btn-flat">Batal</a>
      </div>
    </div>
	{!! Form::close() !!}
</div>