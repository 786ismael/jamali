<html>
  <head>
    <title>Don't refresh this page, your payment are processing.......</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0'">
    <link href="{{asset('public/admin_assets/css/bootstrap.min.css')}}">
  </head>
  <body>
    <h1>Don't refresh this page, your payment are processing.......</h1>
    <form accept-charset="UTF-8" action="https://api.moyasar.com/v1/payments.html" method="POST" id="payment">
      <input type="hidden" name="callback_url" value="{{$data['callback_url']}}" />
      <input type="hidden" name="publishable_api_key" value="{{$data['publishable_api_key']}}" />
      <input type="hidden" name="amount" value="{{$data['amount']}}" />
      <input type="hidden" name="source[type]" value="creditcard" />
      <input type="hidden" name="description" value="{{$data['desciption']}}" />
      
      <input type="hidden" name="source[name]" placeholder="Card Holder Name" value="{{$data['source']['name']}}"/>
      <input type="hidden" name="source[number]" placeholder="Card Number" value="{{$data['source']['number']}}"/>
      <input type="hidden" name="source[month]" placeholder="EXpiry Month" value="{{$data['source']['month']}}"/>
      <input type="hidden" name="source[year]" placeholder="Expiry Year" value="{{$data['source']['year']}}"/>
      <input type="hidden" name="source[cvc]" placeholder="CVC/CVV" value="{{$data['source']['cvc']}}"/>
      <button style="display: none;" type="submit">Pay</button>
    </form>
  </body>
  <script src="{{asset('public/admin_assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('public/js/creditcard.js')}}" ></script>
  <script src="{{asset('public/admin_assets/js/bootstrap.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $('#payment')[0].submit();
    })
  </script>
  <script>
  
  </script>
</html>
