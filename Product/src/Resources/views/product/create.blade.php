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
                        <h5 class="text-light" style="margin: 5px 15px 5px 15px;">Create Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            <!-- {{ csrf_field() }} -->
                            <div class="form-group">
                                <label for="inputId"></label>
                                <input
                                        type="hidden"
                                        class="form-control"
                                        id="inputId"
                                        name="id"
                                        value=""
                                        aria-describedby="idHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Category</label>
                                <select
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="category_id"
                                    aria-describedby="titleHelp">
                                    <option value="1" selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Brand</label>
                                <select
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="brand_id"
                                    aria-describedby="titleHelp">
                                    <option value="1" selected disabled>Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Name</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="name"
                                    value=""
                                    placeholder="Product Name"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Short Description</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="short_description"
                                    value=""
                                    placeholder="Short Description"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Description</label>
                                <textarea
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="description"
                                    value=""
                                    placeholder="Description write here..."
                                    aria-describedby="titleHelp"></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Warrinty Type</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="warrinty_type"
                                    value=""
                                    placeholder="Warrinty Type"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Warrinty Piriod</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="warrinty_piriod"
                                    value=""
                                    placeholder="Warrinty Piriod"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Weight</label>
                                <input
                                    type="number"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="weight"
                                    value=""
                                    placeholder="Weight"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Quantity</label>
                                <input
                                    type="number"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="quantity"
                                    value=""
                                    placeholder="Quantity"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Price</label>
                                <input
                                    type="number"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="price"
                                    value=""
                                    placeholder="Price"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Special Price</label>
                                <input
                                    type="number"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="special_price"
                                    value=""
                                    placeholder="Special Price"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">MRP</label>
                                <input
                                    type="number"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="mrp"
                                    value=""
                                    placeholder="MRP"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Label</label>
                                <select
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="label_id"
                                    aria-describedby="titleHelp">
                                    <option value="1" selected disabled>Select Label</option>
                                    @foreach ($labels as $label)
                                        <option value="{{ $label->id }}">{{ $label->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Product Type</label>
                                <select
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="product_type"
                                    aria-describedby="titleHelp">
                                    <option value="1" selected disabled>Select Product Type</option>
                                    <option value="Original">Original</option>
                                    <option value="Master Copy">Master Copy</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Status</label>
                                <select
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="status"
                                    aria-describedby="titleHelp">
                                    <option value="1" selected disabled>Select Status</option>
                                    <option value="Availeable">Availeable</option>
                                    <option value="Not Availeable">Not Availeable</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">SKU</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="sku"
                                    value=""
                                    placeholder="SKU"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">Total Sales</label>
                                <input
                                    type="number"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="total_sales"
                                    value=""
                                    placeholder="Total Sales"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">Picture</label>
                                <input
                                    type="file"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="picture"
                                    value=""
                                    multiple
                                    aria-describedby="detailHelp">
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-2">
                                    <div class="form-group form-check" style="padding-left: 5px">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="inputIsActive"
                                            name="is_active"
                                            value="1">
                                        <label class="form-check-label" for="inputIsActive">Is Active</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group form-check" style="padding-left: 5px">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="inputIsActive"
                                            name="is_draft"
                                            value="1">
                                        <label class="form-check-label" for="inputIsActive">Is Draft</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>        
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
