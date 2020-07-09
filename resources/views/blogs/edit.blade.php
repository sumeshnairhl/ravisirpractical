@extends('blogs.layout');

@section('content')

	 <h1>Edit Blog</h1>

	 <a href="{{ route('blogs.index') }}"> Back </a>
 <br> <br>
   @if ($errors->any())
         @foreach ($errors->all() as $error)
        <br> <br>         {{ $error}}
         @endforeach

   @endif



        <form action="{{ route('blogs.update',$blog->id) }}" method="post">
       @csrf
        @method('PUT')

	 	      <label>Title:</label>
              <input type="text" name="title" value="{{ $blog->title }}"> <br><br>

              <label>Category:</label>
              <?php $counter=1; ?>
               @foreach($allcategory as $catval)

               <input type="checkbox" <?php if(in_array($catval->id,$getcatname)){echo "checked";}?> name="category_id[]" value="{{ $catval->id }}">{{ $catval->category_name }} <br>
              @endforeach
             <br><br>
              <label>Description:</label>
              <textarea  name="description" placeholder="Description">{{ $blog->description }}</textarea>
				<br><br>

       <input type="submit" name="submit">
	    </form>
@endsection