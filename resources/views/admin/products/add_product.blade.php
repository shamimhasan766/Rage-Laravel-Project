@extends('layouts.layout')
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-header text-center">
                        <h3>Add New Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Select Category</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option value="" disabled selected>Select One</option>
                                            @foreach ($categories as $category)

                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>

                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="strong text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Select Sub Category</label>
                                        <select id="subcategory" class="form-select" name="subcategory_id">
                                            <option value="" disabled selected>Select One</option>
                                        </select>
                                        @error('subcategory_id')
                                            <div class="strong text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Select Brand</label>
                                        <select id="" class="form-select" name="brand_id">
                                            <option value="" disabled selected>Select One</option>
                                            @foreach ($brands as $brand)

                                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Product Code(SKU)</label>
                                        <input type="text" value="{{ old('sku') }}" name="sku" class="form-control">
                                        @error('sku')
                                            <div class="strong text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Enter Product Name</label>
                                        <input type="text" value="{{ old('product_name') }}" name="product_name" class="form-control">
                                        @error('product_name')
                                            <div class="strong text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Select Discount</label>
                                        <select name="discount" id="" class="form-select">
                                            <option value="" disabled selected>Select One</option>
                                            @for ($i = 1; $i < 100; $i++)
                                            <option value="{{ $i }}" {{ old('discount') == $i  ? 'selected' : '' }}>{{ $i. '%' }}</option>

                                            @endfor
                                        </select>
                                        @error('discount')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Enter Short Description</label>
                                        <textarea id="" cols="30" rows="3" class="form-control" name="short_desc">{{ old('short_desc') }}</textarea>
                                        @error('short_desc')
                                            <div class="strong text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Enter Long Description</label>
                                        <textarea name="long_desc" id="summernote" cols="30" rows="10" class="form-control">{{ old('long_desc') }}</textarea>
                                        @error('long_desc')
                                            <div class="strong text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Enter Additional Info</label>
                                        <textarea name="additional_info" id="summernote2" cols="30" rows="10" class="form-control">{{ old('additional_info') }}</textarea>
                                        @error('additional_info')
                                            <div class="strong text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Enter Tags</label>
                                        <select id="select-gear" class="demo-default" name="tag_name[]" multiple placeholder="Select tag...">
                                            <option value="">Select tags...</option>
                                            <optgroup label="">
                                                @foreach ($tags as $tag)

                                                <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        @error('tag_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Preview Image</label>
                                        <input type="file" name="preview_img" class="form-control">
                                        @error('preview_img')
                                            <div class="strong text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        <label for="" class="form-label">Gallery Images</label>
                                        <input type="file" name="gallery[]" class="form-control" multiple>
                                        @error('gallery')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                        @php
                                        $i = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
                                        @endphp
                                        @foreach ($i as $item)
                                        @error('gallery.'.$item)

                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        @endforeach

                                    </div>
                                </div>

                                <div class="col-lg-6 m-auto">
                                    <div class="mb-5">
                                        <button class="btn btn-primary d-block m-auto">Add Product</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
        <script>
            $(document).ready(function() {

              $('#summernote').summernote();
              $('#summernote2').summernote();

              $('#select-gear').selectize({ sortField: 'text' })
            });

            // On Change Category Subcategory will show based on category id

            $('#category_id').on('change', function(){
                var category_id = $(this).val()

                let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                let Url = "{{ route('get.subcategory') }}";

                let formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('category_id', category_id);

                $.ajax({
                    type: 'POST',
                    url: Url,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response){
                        $('#subcategory').html(response)
                    }
                })
            })
        </script>
@endsection
