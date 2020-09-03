<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>The Siyum</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>


        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="nav">
            <div class="container">
                <a href="/">
                    <img src="{{ asset('img/logo.svg') }}" alt="The Siyum">
                </a>
                <div class="checkout-menu">
                    <h4>CHECKOUT</h4>
                    <a href="">1. Order Details</a> >
                    <a href="">2. Tickets</a> >
                    <a href="">3. Payment</a>
                </div>
            </div>
        </nav>

        <main class="main">
            <div class="main-content">
                @yield('content')
            </div>

            <footer class="footer">
                <div class="container">
                    <!-- footer goes here -->
                </div>
            </footer>
        </main>

        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('script')
    </body>
</html>