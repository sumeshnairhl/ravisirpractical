@extends('blogs.layout')


@section('content')
	<div class="row">
		<div class="col-lg-8">
				<div class="pull-left">
					<h3>All Blogs</h3>
				</div>

				<div class="pull-right">
           			 <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create blog</a>

				</div>

		</div>

		@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
   		 @endif

   		 <table class="table">
			  <thead>
			    <tr>
			      <th>Sr.No</th>
			      <th>Name</th>
			      <th>Created Date</th>
			      <th>Actions</th>
			    </tr>
			  </thead>
			  <?php 
			  	$counter=1;

			  ?>
			  <tbody>
			  	@foreach($blogs as $valb)
			    <tr>
			      <td>{{ $counter++ }}</th>
			      <td>{{ $valb->title }}</td>
			      <td>{{ date('d/m/Y',strtotime($valb->created_at)) }}</td>
			      <td><a href="{{ route('blogs.edit',$valb->id) }}">Edit</a> | <a href="{{ route('blogs.show',$valb->id) }}">View</a> | <form action="{{ route('blogs.destroy',$valb->id) }}" method="POST"> @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button></form>
      </td>
			    </tr>
			   @endforeach
			  </tbody>
		</table>
	</div>

	    {!! $blogs->links() !!}

@endsection