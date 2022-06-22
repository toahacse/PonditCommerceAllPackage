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
                        <h5 class="text-light" style="margin: 5px 15px 5px 15px;">Edit User Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user-informations.update', $user_information->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputId"></label>
                                <input
                                        type="hidden"
                                        class="form-control"
                                        id="inputId"
                                        name="id"
                                        value="{{ $user_information->id }}"
                                        aria-describedby="idHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputTitle" class="col-2">First Name</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputTitle"
                                    name="f_name"
                                    value="{{ $user_information->f_name }}"
                                    placeholder="First Name"
                                    aria-describedby="titleHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">Last Name</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="l_name"
                                    value="{{ $user_information->l_name }}"
                                    placeholder="Last Name"
                                    aria-describedby="detailHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">Phone</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="phone"
                                    value="{{ $user_information->phone }}"
                                    placeholder="Phone Number"
                                    aria-describedby="detailHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">Email</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="email"
                                    value="{{ $user_information->email }}"
                                    placeholder="Email Address"
                                    aria-describedby="detailHelp">
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
                                    <img src="{{ asset('/storage/user_information-images/'.$user_information->picture) }}" height="100px" width= "200px" style="margin-bottom: 5px" alt="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">Address</label>
                                <textarea
                                    type="text"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="address"
                                    value=""
                                    placeholder="Address"
                                    aria-describedby="detailHelp">{{ $user_information->address }}</textarea>
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">Division</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="division"
                                    value="{{ $user_information->division }}"
                                    placeholder="Division Name"
                                    aria-describedby="detailHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">District</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="district"
                                    value="{{ $user_information->district }}"
                                    placeholder="District Name"
                                    aria-describedby="detailHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">City</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="city"
                                    value="{{ $user_information->city }}"
                                    placeholder="City Name"
                                    aria-describedby="detailHelp">
                            </div>
                            <div class="form-group row">
                                <label for="inputDetail" class="col-2">Postal Code</label>
                                <input
                                    type="text"
                                    class="form-control col-10"
                                    id="inputDetail"
                                    name="post_code"
                                    value="{{ $user_information->post_code }}"
                                    placeholder="Postal Code"
                                    aria-describedby="detailHelp">
                            </div>
                            
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>        
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a class="btn btn-outline-secondary btn-sm mr-1" href="{{ route('user-informations.index') }}"><i
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