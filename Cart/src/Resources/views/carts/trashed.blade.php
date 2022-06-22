<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>List</title>
</head>
<body>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1 class="text-center mb-5">All Trashed Items</h1>
                <ul class="nav mt-3 mb-3 d-flex justify-content-between">
                    <li class="nav-item">
                        <h4><a class="nav-link active" href="{{ route('carts.index') }}">List Item</a></h4>
                    </li>
                </ul>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Sid</th>
                        <th scope="col">Product ID</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unite Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($carts)> 0)
                    @php
                        $i=1;
                    @endphp
                    @foreach($carts as $cart)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $cart->sid }}</td>
                        <td>{{ $cart->product_id }}</td>
                        <td>
                            <img src="{{ asset('/storage/cart-images/'.$cart->picture) }}" height="50px" width="100px" alt="">
                        </td>
                        <td>{{ $cart->product_title }}</td>
                        <td>{{ $cart->qty }}</td>
                        <td>{{ $cart->unite_price }} TK</td>
                        <td>{{ $cart->total_price }} TK</td>
                        <td style="display: flex">
                            <a class="btn btn-outline-info mr-1" href="{{ route('carts.trashed.restore', $cart->id) }}">Restore</a> 
                            <form action="{{ route('carts.trashed.destroy', $cart->id ) }}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                            
                    </tr>
                    @endforeach
                    @else
                    <tr class="text-center">
                        <td colspan="8"><strong>No cart is available. <a href="{{ route('carts.create') }}">Click here to add one</a></strong></td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>