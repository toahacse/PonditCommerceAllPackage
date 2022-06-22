<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <title>CRUD</title>
</head>
<body>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="card">
                    <div class="card-header" style="padding: 5px; background-color: #7386D5;">
                        <h5 class="text-light" style="margin: 5px 15px 5px 15px;">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered w-100">
                            <tr>
                                <td width="15%">Category</td>
                                <td>{{ $product->category->name }}</td>
                            </tr>    
                            <tr>
                                <td>Brand</td>
                                <td>{{ $product->brand->name }}</td>
                            </tr>    
                            <tr>
                                <td>Name</td>
                                <td>{{ $product->name }}</td>
                            </tr>       
                            <tr>
                                <td>Short Description</td>
                                <td>{{ $product->short_description }}</td>
                            </tr>       
                            <tr>
                                <td>Description</td>
                                <td>{{ $product->description }}</td>
                            </tr>       
                            <tr>
                                <td>Warrinty Type</td>
                                <td>{{ $product->warrinty_type }}</td>
                            </tr>       
                            <tr>
                                <td>Warrinty Piriod</td>
                                <td>{{ $product->warrinty_piriod }}</td>
                            </tr>       
                            <tr>
                                <td>Weight</td>
                                <td>{{ $product->weight }}</td>
                            </tr>       
                            <tr>
                                <td>Quantity</td>
                                <td>{{ $product->quantity }}</td>
                            </tr>       
                            <tr>
                                <td>Price</td>
                                <td>{{ $product->price }}.TK</td>
                            </tr>       
                            <tr>
                                <td>Special Price</td>
                                <td>{{ $product->special_price }}.TK</td>
                            </tr>       
                            <tr>
                                <td>MRP</td>
                                <td>{{ $product->mrp }}.TK</td>
                            </tr>       
                            <tr>
                                <td>Label</td>
                                <td>{{ $product->label->title }}</td>
                            </tr>       
                            <tr>
                                <td>Product Type</td>
                                <td>{{ $product->product_type }}</td>
                            </tr>       
                            <tr>
                                <td>Status</td>
                                <td>{{ $product->status }}</td>
                            </tr>       
                            <tr>
                                <td>SKU</td>
                                <td>{{ $product->sku }}</td>
                            </tr>       
                            <tr>
                                <td>Total Sales</td>
                                <td>{{ $product->total_sales }}</td>
                            </tr>       
                            <tr>
                                <td>Picture</td>
                                <td>
                                    <img src="{{ asset('/storage/product-images/'.$product->picture) }}" height="200px" width= "300px" alt="">
                                </td>
                            </tr>       
                            <tr>
                                <td>Is Active</td>
                                <td>{{ $product->is_active ? 'Active' : 'Deactivated' }}</td>
                            </tr>       
                            <tr>
                                <td>Is Draft</td>
                                <td>{{ $product->is_draft ? 'Active' : 'Deactivated' }}</td>
                            </tr>       
                        </table>    
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a class="btn btn-outline-secondary btn-sm mr-1" href="{{ route('products.index') }}"><i
                            class="fas fa-list"></i></a>
                    </div>
                </div>
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
