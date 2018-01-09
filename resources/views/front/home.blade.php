@extends('layout.main')


@section('content')
 <section class="hero text-center">
            <br/>
            <br/>
            <br/>
            <br/>
            <h2 >
                <strong>
                    Hey! Welcome to the floers shop
                </strong>
            </h2>
            <br>
            <a href="{{url('/shirts')}}"><button class="button large">Check out our beatiful flowers </button></a>
        </section>
        <br/>
        <div class="subheader text-center">
             <h2>
           Last arrivals&rsquo;s 
        </h2>
        </div>
       
        <!-- Latest SHirts -->
           <div class="row">
             @forelse($shirts as $shirt)
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('cart.show',$shirt->id)}}" class="button expanded add-to-cart">
                            add to cart
                        </a>
                        <a href="{{url('/shirt')}}">
                            <img src="{{url('images',$shirt->image)}}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                           {{$shirt->name}}
                        </h3>
                    </a>
                    <h5>
                        ${{$shirt->price}}
                    </h5>
                    <p>
                        {{$shirt->description}}
                    </p>
                </div>
            </div>
             @empty
        <h3>No shirts</h3>
       @endforelse
        </div>
        <!-- Footer -->
        <br>

@endsection 