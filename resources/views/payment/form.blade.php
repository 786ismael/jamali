<html>
  <head><title>Pay SAR {{number_format(Request::get('amount'),2)}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0'">
    <link type="text/css" rel="stylesheet" href="{{asset('public/admin_assets/css/bootstrap.min.css')}}">
    <style>
      .payment-form {
            min-height: 100vh;
            background: #000;
        }

        .payment-form input {
            height: 40px;
            padding: 0 10px;
            color: #fff;
            font-size: 14px;
            border: 1px solid #6d6d6d;
            background: #000;
            box-shadow: none !important;
        }
        .payment-form input:focus {
          border-color: #f8c306;
        }

        .payment-form h4 {
            font-size: 18px;
            color: #fff;
            margin: 20px 0 15px;
        }

        .payment-form .buttons.form-group button {
            width: 100%;
            height: 45px;
            color: #000;
            font-size: 16px;
            font-weight: 600;
            background: #f8c301;
            border: 0;
            border-radius: 6px;
        }
        .invalid-text{
          color:red;
        }
    </style>
  </head>
  <body>
    <form accept-charset="UTF-8" action="{{url('payment')}}?appointment_id={{Request::get('appointment_id')}}" method="POST">
      @csrf
      <input type="hidden" name="callback_url" value="{{url('payment/callback')}}?appointment_id={{Request::get('appointment_id')}}" />
      <input type="hidden" name="publishable_api_key" value="pk_test_2r8GyTF89gHYGE4ytnpGX8NRFz3CosAmnhTBeVVn" />
      <input type="hidden" name="source[type]" value="creditcard" />
      <input type="hidden" name="description" value="Jamali Service" />
      <input type="hidden" name="currenct_url" value="{{Request::url('/')}}" />
      
      <div class="payment-form" style="padding: 15px;">
        <div class="logo" style="text-align: center; margin: 0 0 15px;">
          <img style="width: 100px;" src="{{url('/')}}/public/admin_assets/images/nav-logo.png" alt="">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="source[name]" value="{{Request::get('name')}}" placeholder="Card Holder Name"/>
          <span class="invalid-text">{{Request::get('name_error')}}</span>
        </div>
        <div class="form-group">
          <input type="text" id="cardInput" class="form-control" name="source[number]" value="{{Request::get('number')}}" placeholder="Card Number"/>
          <span class="invalid-text">{{Request::get('number_error')}}</span>
        </div>
        <div class="two-input clearfix" style="margin: 0 -5px;">
          <div class="form-group" style="width: 50%; padding: 0 5px; float: left;">
            <input type="text" class="form-control" name="source[month]" value="{{Request::get('month')}}" placeholder="Expiry Month"/>
            <span class="invalid-text">{{Request::get('month_error')}}</span>
          </div>
          <div class="form-group" style="width: 50%; padding: 0 5px; float: left;">
            <input type="text" class="form-control" value="{{Request::get('year')}}" name="source[year]" placeholder="Expiry Year"/>
            <span class="invalid-text">{{Request::get('year_error')}}</span>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="source[cvc]" value="{{Request::get('cvc')}}"as placeholder="CVC/CVV"/>
          <span class="invalid-text">{{Request::get('cvc_error')}}</span>

        </div>

        <h4><b>SAR {{number_format(Request::get('amount'),2)}}</b></h4>
        <div class="buttons form-group">
          <button type="submit" style="padding: 5px 20px;">Pay</button>
        </div>
      </div>
      
    </form>
  </body>
  <script src="{{asset('public/admin_assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/js/bootstrap.min.js')}}"></script>
  
  <script>
    $(document).ready(function() {
       $('body').find('a').trigger('click');

       $('#cardInput').on('keypress change', function () {
          $(this).val(function (index, value) {
            return value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
          });
        });

    });
  </script>
</html>
