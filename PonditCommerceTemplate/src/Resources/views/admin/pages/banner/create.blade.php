@extends('ponditcommercetemplate::admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Create Banner</h3>

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
            <div class="form-group">
                <label for="inputTitle">Title</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputTitle"
                    name="title"
                    value=""
                    aria-describedby="titleHelp">
            </div>
            <div class="form-group">
                <label for="inputDetail">Link</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="link"
                    value=""
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group">
                <label for="inputDetail">Promotional Message</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="promotional_message"
                    value=""
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group">
                <label for="inputDetail">HTML Banner</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="html_banner"
                    value=""
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group">
                <label for="upload_file">Picture</label>
                <input
                        type="file"
                        class="form-control"
                        id="upload_file"
                        name="picture"
                        value="">
            </div>

            <div class="form-group form-check">
                <input
                        type="checkbox"
                        class="form-check-input"
                        id="inputIsActive"
                        name="is_active"
                        value="1">
                <label class="form-check-label" for="inputIsActive">Is Active</label>
            </div>
            <div class="form-group form-check">
                <input
                        type="checkbox"
                        class="form-check-input"
                        id="inputIsActive"
                        name="is_draft"
                        value="1">
                <label class="form-check-label" for="inputIsActive">Is Draft</label>
            </div>
            <div class="form-group form-check">
                <input
                        type="checkbox"
                        class="form-check-input"
                        id="inputIsActive"
                        name="max_display"
                        value="1">
                <label class="form-check-label" for="inputIsActive">Max Display</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
