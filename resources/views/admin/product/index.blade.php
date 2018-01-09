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
			<a class="navbar-brand" href="#">Products</a>
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter by<b class="caret"></b></a>
					<ul class="dropdown-menu">
						@forelse($categories as $category)
						<li><a href="{{route('product.show',$category->id)}}">{{$category->name}}</a></li>
						@empty 
						<li><a href="#"></a>please add catgories</li>
						@endforelse
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>


<table class="table table-hover">
	<thead>
		<tr>
			<th>All products</th>
		</tr>
	</thead>
	<tbody>
		@forelse($products as $product )

		<tr>
			<td align="left">{{$product->name}}</td>
			<td>
			<form action="{{route('product.destroy',$product->id)}}"  method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}
           <input class="btn btn-sm btn-danger" type="submit" value="Delete">
         </form>
            <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-danger ">Edit Product</a>
      <br>
      
         </td>
		</tr>
		@empty 

        <tr>
			<td> no product found for this category </td>
		</tr>

@endforelse


	</tbody>
</table>
<!-- <h3>the list of products </h3>

@forelse($products as $product )
<h4>product name : {{$product->name}} </h4> 

@empty 

 <h2> sounds there is no product plz add product from the dash borad </h2>
@endforelse
 -->


@endsection