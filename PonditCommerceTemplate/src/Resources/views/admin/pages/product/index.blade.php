@extends('ponditcommercetemplate::admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 style="float: left;">Product List</h3>
        <a class="btn btn-primary mr-1" href="product_create.html" style="float: right;">Add Product</a>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Sl</th>
                <th scope="col">Title</th>
                <th scope="col">Brand</th>
                <th scope="col">MRP</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">1</td>
                <td>Mark</td>
                <td><a href="#">Test</a></td>
                <td>500 TK</td>
                <td>
                    <img src="images/logo.png" height="50px" width="100px" alt="">
                </td>
                <td style="display: flex">
                    <a class="btn btn-outline-success mr-1" href="product_show.html">Show</a>
                    <a class="btn btn-outline-primary mr-1" href="#">Edit</a>
                    <form action="#" method="POST">
                        <!-- @method('DELETE')
                        {{ csrf_field() }} -->
                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                    </form>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
