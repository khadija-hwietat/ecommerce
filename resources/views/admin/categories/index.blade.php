@extends('admin.layout.admin')


@section('content')

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">categories</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<!-- <div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form> -->
			<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Action <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{route('categories.create')}}">Add</a></li>
						<li><a href="#">Delete</a></li>
						<li><a href="#">Edit</a></li>
						
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
<table class="table table-hover" >
	<thead>
		<tr>
			<th>All categories</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td align="left">
				@forelse($categories as $category)
             <div class="checkbox" class="form-control">
             	<label>
	        	<input type="checkbox" value="{{$category->id}}">
	        	   {{$category->name}}
	            </label>
           </div>
          @empty
                 <h3>no categories</h3>
       
            @endforelse
			</td>
		</tr>
	</tbody>
</table>

	

@endsection
