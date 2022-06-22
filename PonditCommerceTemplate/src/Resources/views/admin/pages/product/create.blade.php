@extends('ponditcommercetemplate::admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Create Product</h3>

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
                <label for="inputTitle">Brand</label>
                <select
                    type="text"
                    class="form-control"
                    id="inputTitle"
                    name="brand_id"
                    aria-describedby="titleHelp">
                    <option value="1">Test-1</option>
                    <option value="2">Test-2</option>
                    <option value="3">Test-3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputTitle">Label</label>
                <select
                    type="text"
                    class="form-control"
                    id="inputTitle"
                    name="lebel_id"
                    aria-describedby="titleHelp">
                    <option value="1">Test-1</option>
                    <option value="2">Test-2</option>
                    <option value="3">Test-3</option>
                </select>
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
                <label for="inputDetail">Short Description</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="short_description"
                    value=""
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group">
                <label for="inputDetail">Description</label>
                <textarea
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="description"
                    value=""
                    aria-describedby="detailHelp">
                </textarea>
            </div>
            <div class="form-group">
                <label for="inputDetail">Total Sales</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="total_sales"
                    value=""
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group">
                <label for="inputTitle">Product Type</label>
                <select
                    type="text"
                    class="form-control"
                    id="inputTitle"
                    name="product_type"
                    aria-describedby="titleHelp">
                    <option value="1">Test-1</option>
                    <option value="2">Test-2</option>
                    <option value="3">Test-3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputDetail">Cost</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="cost"
                    value=""
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group">
                <label for="inputDetail">MRP</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="mrp"
                    value=""
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group">
                <label for="inputDetail">Special Price</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputDetail"
                    name="special_price"
                    value=""
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group">
                <label for="inputDetail">Picture</label>
                <input
                    type="file"
                    class="form-control"
                    id="inputDetail"
                    name="picture"
                    value=""
                    multiple
                    aria-describedby="detailHelp">
            </div>
            <div class="form-group form-check">
                <input
                        type="checkbox"
                        class="form-check-input"
                        id="inputIsActive"
                        name="is_new"
                        value="1">
                <label class="form-check-label" for="inputIsActive">Is New</label>
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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
