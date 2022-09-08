@include('layouts.app')

<div class="container">
	<h1>Tous les utilisateurs</h1>
    <table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Opération</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach($users as $user)
				<tr class="table-primary">
					<th scope="row">{{ $user->name }}</th>
					
					<th scope="row">
						@if($user->admin == "0")
							<form action="{{ route('users.makeAdmin', $user->id) }}" method="post">
								@csrf
								<input type="submit" value="Attribuer le statut Admin" />
							</form>
						@elseif($user->admin == "1")
							<form action="{{ route('users.makeNotAdmin', $user->id) }}" method="post">
								@csrf
								<input type="submit" value="Retirer le statut Admin" />
							</form>
						@endif
					</th>

					<th scope="row">
						<form action="{{ route('users.delete', $user->id) }}" method="post">
								@csrf
								<input type="submit" value="Bannir" />
						</form>
					</th>

					<th scope="row">
						<a href="{{ route('users.show', $user->id) }}">
							<button type="button" class="btn btn-info">Voir cet utilisateur</button>
						</a>
					</th>

				</tr>
			@endforeach
		</tbody>
    </table>
</div>