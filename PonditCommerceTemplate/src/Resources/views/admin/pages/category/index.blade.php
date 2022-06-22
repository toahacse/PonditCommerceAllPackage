@extends('ponditcommercetemplate::admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="padding: 5px; background-color: #7386D5;">
                <h5 class="text-light" style="margin: 5px 15px 5px 15px;">Category List</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>
                            <th scope="col">Link</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td><a href="#">www.Mark.com</a></td>
                            <td style="display: flex">

                                <a class="btn btn-outline-success btn-sm mr-1" href="#"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-outline-primary btn-sm mr-1" href="#"><i
                                        class="fas fa-edit"></i></a>

                                <form action="#" method="POST">
                                    <!-- @method('DELETE')
                                {{ csrf_field() }} -->
                                    <button class="btn btn-outline-danger btn-sm" type="submit"
                                        onclick="return confirm('Are you sure you want to delete?')"><i
                                            class="fas fa-trash"></i></button>
                            </td>
                            </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a class="btn btn-outline-secondary btn-sm mr-1" href="category_create.html"><i
                    class="fas fa-plus"></i></a>
                <a class="btn btn-outline-info btn-sm mr-1" href="#"><i
                    class="fas fa-list"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
