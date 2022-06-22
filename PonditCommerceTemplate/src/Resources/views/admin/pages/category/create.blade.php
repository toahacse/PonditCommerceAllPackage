@extends('ponditcommercetemplate::admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header" style="padding: 5px; background-color: #7386D5;">
                <h5 class="text-light" style="margin: 5px 15px 5px 15px;">Create Category</h5>
            </div>
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
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
                        <label for="inputTitle" class="col-2">Name</label>
                        <input
                            type="text"
                            class="form-control col-10"
                            id="inputTitle"
                            name="name"
                            value=""
                            placeholder="Category Name"
                            aria-describedby="titleHelp">
                    </div>
                    <div class="form-group row">
                        <label for="inputDetail" class="col-2">Link</label>
                        <input
                            type="text"
                            class="form-control col-10"
                            id="inputDetail"
                            name="link"
                            value=""
                            placeholder="Category Link"
                            aria-describedby="detailHelp">
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
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
                <a class="btn btn-outline-secondary btn-sm mr-1" href="category_index.html"><i
                    class="fas fa-list"></i></a>
            </div>
        </div>


    </div>
</div>
@endsection
