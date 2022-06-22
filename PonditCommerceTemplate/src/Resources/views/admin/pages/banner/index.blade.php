@extends('ponditcommercetemplate::admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 style="float: left;">Banner List</h3>
        <a class="btn btn-primary mr-1" href="banner_create.html" style="float: right;">Add Banner</a>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Sl</th>
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td><a href="#">www.Mark.com</a></td>
                <td><img src="{{ asset('/') }}vendor/ponditcommercetemplate/assets/admin/images/logo.png" height="50px" width="100px" alt=""></td>
                <td style="display: flex">
                    <a class="btn btn-outline-success mr-1" href="banner_show.html">Show</a>
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
