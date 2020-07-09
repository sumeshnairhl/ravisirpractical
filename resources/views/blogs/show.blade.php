@extends('blogs.layout');

@section('content')

	 <h1>Show Blog</h1>

	 <a href="{{ route('blogs.index') }}"> Back </a>
    <br> <br>


	 	      <label>Title:</label>
              <input type="text" name="title" value="{{ $blog->title }}" readonly> <br><br>

              <label>Category:</label>
              @foreach($getcatname as $catval)
              			{{ $catval->category_name}} <br><br>
              @endforeach
             <br><br>
              <label>Description:</label>
              <textarea  name="description" placeholder="Description" readonly>{{ $blog->Description }}</textarea>
				<br><br>

	 </form>
@endsection