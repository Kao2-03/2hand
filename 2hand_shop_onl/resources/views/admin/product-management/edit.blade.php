@extends('layouts.apps')
@section('content')
    <section class="add-product">
        <form action="{{ route('admin.product.update', $cloth->cloth_id) }}" method="post" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="add-product__block1">
                <div class="add-product__block1--line1">
                    <div class="BasicInformation">Basic Information</div>
                    <button class="preview">Preview</button>
                </div>
                <div class="add-product__block1--line2">
                    <div class="ProductImages">Product Images</div>
                    <div class="contain-add">
                        <div class="Ratio11">Ratio 1:1</div>
                        <div class="contain-add-img">
                            <img src="http://localhost:8000/icons/add-picture.svg" alt="error">
                            <input type="file" class="AddPicture" name="product_img">
                        </div>

                    </div>
                </div>
                <div class="add-product__block1--line3">
                    <div class="product-name">Product Name</div>
                    <input class="product-input" type="text" name="product_name" value="{{ $cloth->cloth_name }}"
                        placeholder="This is the name of product">
                </div>
                <div class="add-product__block1--line3">
                    <div class="product-name">Price</div>
                    <input class="product-input" type="text" name="product_price" value="{{ $cloth->cost }}"
                        placeholder="This is the price of product">
                </div>
                <div class="add-product__block1--line4">
                    <div class="product-desc">Description</div>
                    <textarea class="product-texta" name="product_desc" cols="30" rows="10">
                        {{ $cloth->description }}
                    </textarea>
                </div>
                <div class="add-product__block1--line5">
                    <div class="product-brand">Category</div>
                    <select name="category_id">
                        {{-- @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach --}}
                        <option value="{{ $cloth->category_id }}">{{ $cloth->category_id }}</option>
                    </select>
                </div>
                <div class="add-product__block1--line5">
                    <div class="product-brand">Brand</div>
                    <input class="add-product-input" name="product_brand" value="{{ $cloth->brand }}"
                        placeholder="This is the Brand of product">
                </div>
                <div class="add-product__block1--line5">
                    <div class="product-brand">Origin</div>
                    <input class="add-product-input" name="product_origin" value="{{ $cloth->origin }}"
                        placeholder="This is the Origin of product">
                </div>
                <div class="add-product__block1--line5">
                    <div class="product-brand">For Gender</div>
                    <input class="add-product-input" name="product_for" value="{{ $cloth->forGender }}"
                        placeholder="This is the Origin of product">
                </div>
            </div>

            <div class="add-product__block2">
                <div class="add-product__block2--line1">
                    <div class="DetailInformation">Detail Information</div>
                </div>
                <div class="add-product__block2--line2">
                    <div class="product-size">Size</div>
                    <div class="contain-detail">
                        <div class="contain-detail__line1">
                            <input type="text" class="detail-input">
                            <img src="http://localhost:8000/icons/recycle-bin.svg" alt="error">
                        </div>
                        {{-- <div class="contain-detail__line1">
                                <input type="text" class="detail-input">
                                <img  src="http://localhost:8000/icons/recycle-bin.svg" alt="error">
                            </div> --}}
                        <div class="contain-detail__line2">
                            <input type="text" placeholder="Exemple: S,M,v.v" class="detail-ex">
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-product__button">
                <button type="submit" class="save">Update</button>
                <a class="cancel" href="{{ route('admin.products.index') }}">Cancel</a>
            </div>
        </form>
    </section>
@endsection
