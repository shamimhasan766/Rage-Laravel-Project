@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card-header text-center">
                <h3>Edit Product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="text" value="{{ $product->id }}" name="id" hidden>
                        <div class="col-lg-3">
                            <div class="mb-5">
                                <label for="" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($categories as $category)

                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>

                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="strong text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-5">
                                <label for="" class="form-label">Sub Category</label>
                                <select id="subcategory" class="form-select" name="subcategory_id">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory }}</option>

                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <div class="strong text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-5">
                                <label for="" class="form-label">Brand</label>
                                <select id="" class="form-select" name="brand_id">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($brands as $brand)

                                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-5">
                                <label for="" class="form-label">Product Code(SKU)</label>
                                <input type="text" value="{{ $product->sku }}" name="sku" class="form-control">
                                @error('sku')
                                    <div class="strong text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-5">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control">
                                @error('product_name')
                                    <div class="strong text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-5">
                                <label for="" class="form-label">Discount</label>
                                <select name="discount" id="" class="form-select">
                                    <option value="" disabled selected>Select One</option>
                                    @for ($i = 1; $i < 100; $i++)
                                    <option value="{{ $i }}" {{ $product->discount == $i  ? 'selected' : '' }}>{{ $i. '%' }}</option>

                                    @endfor
                                </select>
                                @error('discount')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-5">
                                <label for="" class="form-label">Short Description</label>
                                <textarea id="" cols="30" rows="3" class="form-control" name="short_desc">{{ $product->short_desc }}</textarea>
                                @error('short_desc')
                                    <div class="strong text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-5">
                                <label for="" class="form-label">Long Description</label>
                                <textarea name="long_desc" id="summernote" cols="30" rows="10" class="form-control">{{ $product->long_desc }}</textarea>
                                @error('long_desc')
                                    <div class="strong text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-5">
                                <label for="" class="form-label">Additional Info</label>
                                <textarea name="additional_info" id="summernote2" cols="30" rows="10" class="form-control">{{ $product->additional_info }}</textarea>
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

                                        <option value="{{ $tag->id }}" {{ $product->Tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->tag_name }}</option>
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
                                <img height="150" src="../../{{ $product->preview_img }}" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-5">
                                <label for="" class="form-label">Add Gallery Images</label>
                                <input type="file" name="gallery[]" class="form-control mb-3" multiple>
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
                                <div class="d-flex">
                                    @foreach ($galleries as $gallery)
                                    <div class="mr-2">
                                        <img height="150" src="../../{{ $gallery->gallery_path }}" alt="">
                                        <a href="{{ route('gallery.image.delete', $gallery->id) }}" class="btn btn-sm btn-danger mt-2">Delete</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 m-auto">
                            <div class="mb-5">
                                <button class="btn btn-success d-block m-auto">Update Product</button>
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
