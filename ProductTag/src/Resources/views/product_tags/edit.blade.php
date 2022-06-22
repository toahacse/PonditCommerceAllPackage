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
                        <h5 class="text-light" style="margin: 5px 15px 5px 15px;">Edit Product Tag</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product-tags.update', $product_tag->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputId"></label>
                                <input
                                        type="hidden"
                                        class="form-control"
                                        id="inputId"
                                        name="id"
                                        value="{{ $product_tag->id }}"
                                        aria-describedby="idHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Product</label>
                                <select
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="product_id"
                                    aria-describedby="titleHelp">
                                    <option value="1" selected disabled>Select Product</option>
                                    @foreach ($products as $porduct)
                                        <option value="{{ $porduct->id }}" {{ $porduct->id == $product_tag->product_id  ? "selected" : "" }}>{{ $porduct->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Tag</label>
                                <select
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="tag_id"
                                    aria-describedby="titleHelp">
                                    <option value="1" selected disabled>Select Tag</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ $tag->id == $product_tag->tag_id ? "selected" : "" }}>{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>        
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a class="btn btn-outline-secondary btn-sm mr-1" href="{{ route('product-tags.index') }}"><i
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