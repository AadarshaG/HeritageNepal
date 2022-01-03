@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add Product</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('admin-product/store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Select Category:</label>
                        <div class="col-md-6">
                            <select name="category_id" class="form-control" id="category">
                                <option selected disabled>-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Select Sub-Category:</label>
                        <div class="col-md-6" id="subcategory">
                            <select name="subcategory_id" id="freesubcategory" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="product_name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="8" class="form-control" type="text" id="description" name="description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Price:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="number" name="price" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">In Stock:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="number" name="in_stock" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Image:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="file" name="image" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Description PDF:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="file" name="pdf">
                        </div>
                    </div>

                    <div class="col-md-offset-4">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>
        $(document).ready(function() {
            $("#subcategory").find("*").prop("disabled", true);
            $('#freesubcategory').prepend('<option disabled="disabled" selected="selected">No Subcategory Found</option>');
            $('#category').on('change', function () {
                var id = $(this).val();
                $('#freesubcategory').empty();
                $.get("{{url('subcategory/allsubcategory')}}" + "/" + id, function (data) {
                    //console.log(data.result);
                    if (data.result.length > 0) {
                        $("#subcategory").find("*").prop("disabled", false);
                        $('#freesubcategory').prepend('<option disabled="disabled" selected="selected">Please Select Subcategory</option>');
                        $.each(data.result, function (key, value) {
                            $('#freesubcategory').append($('<option>', {
                                value: value.id,
                                text: value.subcategory_name,
                            }));
                        });
                    } else {
                        $('#freesubcategory').prepend('<option disabled="disabled" selected="selected">No Subcategory Found</option>');
                        $("#subcategory").find("*").prop("disabled", true);
                    }
                });
            });
        });
    </script>

@endsection
