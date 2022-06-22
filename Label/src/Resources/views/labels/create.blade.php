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
                        <h5 class="text-light" style="margin: 5px 15px 5px 15px;">Create Label</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('labels.store') }}" method="post" enctype="multipart/form-data">
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
                                <label for="inputTitle" class="col-2">Title</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="title"
                                    value=""
                                    placeholder="Label Name"
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
                                <div class="col-10">
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
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>        
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a class="btn btn-outline-secondary btn-sm mr-1" href="{{ route('labels.index') }}"><i
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