@extends('admin.layout.admin')
@section('content')
    <h3>orders</h3>
    <ul>

    	@foreach($orders as $order)
    	<li>

    		<h4>order by{{$order->user->name }} </h4>

    		  <form action="{{route('toggle.deliver',$order->id)}}" method="POST" class="pull-right" id="deliver-toggle">
                    {{csrf_field()}}
                    <label for="delivered">Delivered</label>
                    <input type="checkbox" value="1" name="delivered"  {{$order->delivered==1?"checked":"" }}>
                    <input type="submit" value="Submit">
                </form>
    		<h5>items </h5>
    		<table >
    			<tr>
    				<th>name </th>
    				<th> quantity </th>
    				<th> price  </th>
    				
    			</tr>

    			@foreach($order->orderItems as $item )
    			<tr>
    				<td> {{$item->name}}</td>
    				<td>{{$item->pivot->qty}}</td>
                     <td>{{$item->pivot->total}}</td>
    			</tr>

    			@endforeach
    		</table>

    	</li>
    	@endforeach 

    </ul>




    
@endsection