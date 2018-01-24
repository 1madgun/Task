<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<link rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/material-icon.css') }}">
</head>
<body class="grey lighten-3">
	<script src="{{ asset('/js/jquery-2.1.1.min.js') }}"></script>
	<script src="{{ asset('/js/materialize.min.js') }}"></script>
	<script>
		$(document).ready(function(){
			$('.collapsible').collapsible();
			$('.scrollspy').scrollSpy();
			$('#komentar').val('');
		});

		function onKomen() {
			$('#komen').focus();
		}
	</script>
	<div id="uphere" class="scrollspy"></div>
	<div class="row"></div>
	<div class="row">		
		<div class="col s2">
			<a class="btn btn-flat grey lighten-2 grey-text text-darken-3" href="{{ route('post.index') }}"><i class="material-icons left">keyboard_arrow_left</i>Back to Feed</a>
		</div>
		<div class="container">
			<div class="row">
				<div class="col s9 push-s1">
					<div class="card z-depth-0">
						<div class="card-content">
							@foreach($post as $post)
								<span class="card-title">{{ $post->title }}</span>
								<div class="divider"></div>
								<div class="col s2 right">
									By : 
									@if(Auth::guest())
					          {{ $post->name }}
					        @elseif($post->name == Auth::user()->name)
					          Me
					        @else
					          {{ $post->name }}
					        @endif
								</div>
								<div class="row"></div>
								@if($post->image === "")

								@else
									<img src="{{ asset($post->image) }}" class="responsive-img">
								@endif
								<div class="row">
									<p>{{ $post->article }}</p>
								</div>
							@endforeach
							<div class="divider"></div>
						</div>
						<div class="row">
							<div class="col s12">
								<ul class="collapsible z-depth-0" data-collapsible="accordion">
										<li>
											<div class="collapsible-header">
												<i class="material-icons left">comment</i>Komentar
											</div>
												<div class="collapsible-body">
													<div id="blokomen">
													@foreach($comment as $komen)
														<div id="{{ $komen->id }}">
															<blockquote>
															<input type="hidden" value="{{ $komen->id }}" id="{{ $komen->id }}">
																@if(!Auth::guest())
																	@if($komen->komentator == Auth::user()->id)
																		<a onclick="onDelete({{ $komen->id }})" style="cursor:pointer;" class="tooltipped right" data-position="bottom" data-delay="50" data-tooltip="Hapus Komentar"><i class="material-icons tiny black-text">close</i></a>
																	@endif
																@endif
																<div class="blue-text">{{ $komen->name }}</div>
																{{ $komen->komentar }}
															</blockquote>
														</div>
													@endforeach
													</div>
													@if(Auth::guest())
														<a href="{{ route('post.index') }}" class="right">Login untuk menambahkan komentar</a>
													@else
														<div class="row">
															<form method="POST">
																{{ csrf_field() }}
																{{ Form::hidden('post_id', $post->id, ['readonly' => 'readonly', 'id' => 'post_id']) }}
																{{ Form::hidden('komentator', Auth::user()->id, ['readonly' => 'readonly', 'id' => 'komentator']) }}
																{!! Form::hidden('nama', Auth::user()->name, ['readonly' => 'readonly', 'id' => 'nama']) !!}
																<div class="input-field col s8">
																	{{ Form::text('komentar', '', ['id' => 'komentar', 'class' => 'validate']) }}
																	{{ Form::label('komentar', 'Komentar', ['for' => 'komentar']) }}
																</div>
																<div class="input-field col s2">
																	<button type="button" onclick="komentari()" class="btn btn-flat green accent-4 white-text">Komentari</button>
																</div>
															</form>
														</div>
													@endif
												</div>
										</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="fixed-action-btn">
    <a class="btn-floating btn-large red darken-2" href="#uphere">
      <i class="large material-icons">arrow_upward</i>
    </a>
  </div>

  <script>
  	id = 
  	function komentari() {
  		$.ajax({
  			type: 'post',
  			url: "{{ route('comment.store') }}",
  			data: {
  				'_token': $('input[name=_token]').val(),
          'post_id': $('#post_id').val(),
          'komentator': $('#komentator').val(),
          'komentar': $('#komentar').val(),
          'nama': $('#nama').val()
  			},
  			success: function(data){
  				if (data.errors) {
  					materialize.toast('Error!',4000);
  				}
  				else{
  					var komentar = $('#komentar').val();
  					var nama = $('#nama').val();
  					$('#blokomen').prepend("<blockquote><div class='blue-text'>" + nama + "</div>" + komentar + "</blockquote>");
  					$('#komentar').val('');
  				}
  			},
  		});
  	}

  	function onDelete(id) {
  		id = id;
  		$.ajax({
  			type: 'DELETE',
  			url: "{{ url('comment') }}/" + id,
  			data: {
  				'_token': $('input[name=_token]').val()
  			},
  			success: function(data){
  				$('#'+id).remove();
  				$('.tooltipped').tooltip('remove');
  			},
  		});
  	}
  </script>
</body>
</html>