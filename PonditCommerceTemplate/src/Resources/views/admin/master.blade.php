<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PonditCommerce</title>

    @include('ponditcommercetemplate::admin.partials.style')

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->

        @include('ponditcommercetemplate::admin.partials.nav')
        
        <!-- Page Content  -->
        <div id="content">

            @include('ponditcommercetemplate::admin.partials.content_top_navbar')
            
            <div class="row">
                <div class="col-md-12">
                    
                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    @include('ponditcommercetemplate::admin.partials.scripts')

</body>

</html>