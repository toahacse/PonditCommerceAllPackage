<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>CRUD</title>
</head>
<body>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="text-center mb-5">Edit</h1>
                <form action="{{ route('banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputId"></label>
                        <input
                                type="hidden"
                                class="form-control"
                                id="inputId"
                                name="id"
                                value="{{ $banner->id }}"
                                aria-describedby="idHelp">
                    </div>
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            id="inputTitle"
                            name="title"
                            value="{{ $banner->title }}"
                            aria-describedby="titleHelp">
                    </div>
                    <div class="form-group">
                        <label for="inputDetail">Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="inputDetail"
                            name="link"
                            value="{{ $banner->link }}"
                            aria-describedby="detailHelp">
                    </div>
                    <div class="form-group">
                        <label for="inputDetail">Promotional Message</label>
                        <input
                            type="text"
                            class="form-control"
                            id="inputDetail"
                            name="promotional_message"
                            value="{{ $banner->promotional_message }}"
                            aria-describedby="detailHelp">
                    </div>
                    <div class="form-group">
                        <label for="inputDetail">HTML Banner</label>
                        <input
                            type="text"
                            class="form-control"
                            id="inputDetail"
                            name="html_banner"
                            value="{{ $banner->html_banner }}"
                            aria-describedby="detailHelp">
                    </div>
                    <div class="form-group">
                        <label for="upload_file">Picture</label>
                        <input
                                type="file"
                                class="form-control-file"
                                id="upload_file"
                                name="picture"
                                value="{{ $banner->picture }}">
                    </div>

                    <img src="{{ asset('/storage/banner-images/'.$banner->picture) }}" height="100px" width= "200px"  alt="">

                    <div class="form-group form-check">
                        <input
                                type="checkbox"
                                class="form-check-input"
                                id="inputIsActive"
                                name="is_active"
                                {{ $banner->is_active == 1 ? 'checked' : '' }}
                                value="1">
                        <label class="form-check-label" for="inputIsActive">Is Active</label>
                    </div>
                    <div class="form-group form-check">
                        <input
                                type="checkbox"
                                class="form-check-input"
                                id="inputIsActive"
                                name="is_draft"
                                {{ $banner->is_draft == 1 ? 'checked' : '' }}
                                value="1">
                        <label class="form-check-label" for="inputIsActive">Is Draft</label>
                    </div>
                    <div class="form-group form-check">
                        <input
                                type="checkbox"
                                class="form-check-input"
                                id="inputIsActive"
                                name="max_display"
                                {{ $banner->max_display == 1 ? 'checked' : '' }}
                                value="1">
                        <label class="form-check-label" for="inputIsActive">Max Display</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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