@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Task
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Task Form -->
					<form action="/photo" method="POST" class="form-horizontal" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
						    <label for="photoUserId">User id</label>
						    <input name="user_id" type="number" class="form-control" id="photoUserId" placeholder="Id of the user as Int">
						  </div>
						  <div class="form-group">
						    <label for="photoName">Name</label>
						    <input name="name" type="text" class="form-control" id="photoName" placeholder="Name Of the Photo">
						  </div>
						  <div class="form-group">
						    <label for="photoFile">File input</label>
						    <input name="photoFile" type="file" id="photoFile">
						    <p class="help-block">Select the photo you want to save</p>
						  </div>
						  <div class="checkbox">
						    <label>
						      <input type="checkbox"> You agree with our invisible ters and conditions ?
						    </label>
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>

			<!-- Current Tasks -->
			@if (count($photos) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Photos
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Task</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($photos as $photo)
									<tr>
										<td class="table-text"><div>{{ $photo->name }}</div></td>
										<td ><div>{{ $photo->name }}</div></td>
										<!-- Task Delete Button -->
										<td>
											<form action="/photo/{{ $photo->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>Delete
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
