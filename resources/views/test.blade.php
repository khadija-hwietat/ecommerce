<h1>test page </h1>
<form action="/test" method="POST">

	{{csrf_field()}}
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_2Zl02Xmh4pJcCJxYDHjqR6FA"
    data-amount="999"
    data-name="Demo Site"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>
