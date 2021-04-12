<html>
<html>
<head>
    <title>Payment {{Request::get('amount')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0'">
    <link type="text/css" rel="stylesheet" href="{{asset('public/admin_assets/css/bootstrap.min.css')}}">

    <style>
        .payment-success{

        }
        .payment-success .wrapper1{
            display: table;
            height: 100%;
            width: 100%;
        }
        .payment-success .wrapper2{
            display: table-cell;
            vertical-align: middle;
        }
        .payment-success .data{
            text-align: center;
            max-width: 500px;
            margin: 0 auto;
            padding: 0 30px;
        }
        .payment-success img{
            width: 95px;
            margin: 0 0 15px;
        }
        .payment-success h2{
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            color: #FF9800;
        }
        .payment-success h3{
            margin: 15px 0;
            font-size: 18px;
            font-weight: 600;
            color: #000000;
        }
    </style>
</head>

<body>

    <section class="payment-success">
        <div class="wrapper1">
            <div class="wrapper2">
                @if(Request::get('status') == 'paid')
                <div class="data">
                    <img src="{{asset('public/admin_assets/images/check.png')}}" alt="">
                    <h3>SAR  {{Request::get('amount')/100}}</h3>
                    <h2>Successfully done payment</h2>
                    <br>
                    <p>Transaction id <br/>  {{Request::get('id')}}</p>
                    <a href="{{route('payment.success')}}">Back</a>
                </div>
                @else
                <div class="data">
                    <img src="{{asset('public/admin_assets/images/cancel.png')}}" alt="">
                    <h3>SAR {{Request::get('amount')/100}}</h3>
                    <h2>Transaction Failed</h2>
                    <br>
                    <p>Transaction id <br/>  {{Request::get('id')}}</p>
                    <a href="{{route('payment.failed')}}">Back</a>
                </div>
                @endif
            </div>
        </div>
    </section>
    
    <script src="{{asset('public/admin_assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/creditcard.js')}}" ></script>
    <script src="{{asset('public/admin_assets/js/bootstrap.min.js')}}"></script>
</body>
</html>