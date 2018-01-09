@extends('layout.main')



 @section('content')

<h3> shipping address </h3>
 <div class="row">
 <div class="small-6 small-centered columns"
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'checkout.shipping', 'method' => 'get', 'files' => true, 'data-parsley-validate'=>'']) !!}

            <div class="form-group">
                {{ Form::label('address line', 'Name') }}
                {{ Form::text('address_line', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
            </div>

            <div class="form-group">
                {{ Form::label('city', 'Description') }}
                {{ Form::text('city', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('state', 'Price') }}
                {{ Form::text('state', null, array('class' => 'form-control')) }}
            </div>

           <div class="form-group">
                {{ Form::label('zip', 'Price') }}
                {{ Form::text('zip', null, array('class' => 'form-control')) }}
            </div>

           
           <div class="form-group">
                {{ Form::label('contry', 'Price') }}
                {{ Form::text('contry', null, array('class' => 'form-control')) }}
            </div>

            {!! Form::close() !!}

          
          </form>

          <form action="/shipping-info" method="POST">

    {{csrf_field()}}
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_2Zl02Xmh4pJcCJxYDHjqR6FA"
    data-amount={{Cart::subtotal()}
    data-name="Demo"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
       </form>

           </div>
       </div>
    </div>



 @endsection