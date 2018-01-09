@extends('layout.main')

@section('content')
  
   <h3>Cat items </h3>

       <table class="table table-hover">
       	<thead>
       		<tr>
       			<th>item name </th>
       			<th>item price </th>
       			<th>item size </th>
       			<th>item quantity </th
       		</tr>
       	</thead>
       	@foreach($cartitems as $cartitem)
       	<tbody>
       		<tr>
       			<td>{{$cartitem->name}}</td>
       			<td>{{$cartitem->price}}</td>
       			<td>{{$cartitem->options->has('size')?$cartitem->options->size:''}}</td>
       			<td>
                                   {!! Form::open(['route'=>['cart.update',$cartitem->rowId],'method'=>'put']) !!}
                                   <input type="text" name="qty" value="{{$cartitem->qty}}">
                                   <input type="submit" name="" class="btn btn-default" value="add">
                                   {!! Form::close() !!}
                            </td>
                            <td>
                                  <form action="{{route('cart.destroy',$cartitem->rowId)}}" method="post">
                                          {{ csrf_field()}}
                                          {{method_field('DELETE')}}
                                         <button type="submit" class="btn btn-large btn-block btn-warning">Delete</button>
                                  </form>        
                            </td>
       		</tr>
       	</tbody>
       	@endforeach

              <tr>
                     
                     <td></td>
                     <td>grand total ${{Cart::subtotal()}}</td>
                     <td></td>
                     <td>{{Cart::count()}}</td>
              </tr>
       </table>
       <a href="{{route('checkout.shipping')}}" class="button">Check out</a>



@endsection