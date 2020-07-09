@extends('blogs.layout');

@section('content')

	 <h1>Create Blog</h1>

	 <a href="{{ route('blogs.index') }}"> Back </a>
    <br> <br>
	 @if ($errors->any())
	 			 @foreach ($errors->all() as $error)
	 			<br> <br>	 				{{ $error}}
	 			 @endforeach

	 @endif

	 <form action="{{ route('blogs.store')}}" method="post">
	 	    @csrf
	 	      <label>Title:</label>
              <input type="text" name="title"> <br><br>

              <label>Category:</label>
              @foreach($allcategory as $catval)
             	 <input type="checkbox" name="category_id[]" value="{{ $catval->id }}">{{ $catval->category_name }} <br>
              @endforeach
              <label>Description:</label>
              <textarea  name="description" placeholder="Description"></textarea>
				<br><br>

			 <input type="submit" name="submit">
	 </form>
@endsection