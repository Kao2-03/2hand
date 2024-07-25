@extends('layouts.apps')
@section('content')
    <section class="product-details">
        <div class="product-details__block1">
            <div class="product-details__block1--line1">
                <div class="BasicInformation">Basic Information</div>
                <button class="preview">Preview</button>
            </div>
            <div class="product-details__block1--line2">
                <div class="ProductImages">Product Images</div>
                <div class="contain-add">
                    <div class="Ratio11">Ratio 1:1</div>
                    <div class="container-picture">
                        <div class="contain-picture">
                            <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                        </div>
                        <div class="contain-picture">
                            <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                        </div>
                        <div class="contain-picture">
                            <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                        </div>
                        <div class="contain-picture">
                            <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                        </div>
                        <div class="contain-picture">
                            <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                        </div>
                        <div class="contain-picture">
                            <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                        </div>
                        <div class="contain-picture">
                            <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                        </div>
                        <div class="contain-picture">
                            <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                        </div>
                        {{-- <div class="contain-picture">
                        <img  src="http://localhost:8000/images/product-item-1.png" alt="error">
                    </div>
                    <div class="contain-picture">
                        <img  src="http://localhost:8000/images/product-item-1.png" alt="error">
                    </div> --}}
                        <div class="contain-add-img">
                            <img src="http://localhost:8000/icons/add-picture.svg" alt="error">
                            <div class="AddPicture">Add picture</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details__block1--line3">
                <div class="product-name">Product Name</div>
                <input class="product-input" name="product_name" type="text" value="{{ $cloth->cloth_name }}"
                    placeholder="This is the name of product">
            </div>
            <div class="product-details__block1--line4">
                <div class="product-desc">Description</div>
                <textarea class="product-texta" name="product_desc" cols="30" rows="10">{{ $cloth->description }}</textarea>
            </div>
            <div class="product-details__block1--line5">
                <div class="product-brand">Brand</div>
                <input class="product-input" name="product_brand" value="{{ $cloth->brand }}"
                    placeholder="This is the brand of product">
            </div>
        </div>
        <div class="product-details__block2">
            <div class="product-details__block2--line1">
                <div class="DetailInformation">Detail Information</div>
            </div>
            <div class="product-details__block2--line2">
                <div class="product-size">Size</div>
                <div class="contain-detail">
                    <div class="contain-detail__line1">
                        <input type="text" class="detail-input">
                        <img src="http://localhost:8000/icons/recycle-bin.svg" alt="error">
                    </div>
                    <div class="contain-detail__line1">
                        <input type="text" class="detail-input">
                        <img src="http://localhost:8000/icons/recycle-bin.svg" alt="error">
                    </div>
                    <div class="contain-detail__line1">
                        <input type="text" class="detail-input">
                        <img src="http://localhost:8000/icons/recycle-bin.svg" alt="error">
                    </div>
                    <div class="contain-detail__line1">
                        <input type="text" class="detail-input">
                        <img src="http://localhost:8000/icons/recycle-bin.svg" alt="error">
                    </div>
                    <div class="contain-detail__line1">
                        <input type="text" class="detail-input">
                        <img src="http://localhost:8000/icons/recycle-bin.svg" alt="error">
                    </div>
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
            <div class="product-details__block2--line3">
                <div class="list-category">List Categories</div>
                <div class="container__list-category">
                    <div class="container__list-category--input">
                        <div class="input-price">
                            <p class="input-price__unit">đ</p>
                            <div class="input-price__line"></div>
                            <input type="text" class="input-price__price" placeholder="Price">
                        </div>
                        <div class="input-warehouse">
                            <input type="text" class="input-warehouse__warehouse" placeholder="Warehouse">
                        </div>
                    </div>
                    <div class="container__list-category--button">
                        <button class="apply-all">Apply for all</button>
                    </div>
                </div>
            </div>
            <div class="product-details__block2--table">
                <table class="table">
                    <thead class="table__heading">
                        <tr class="table__heading--row">
                            <th class="row-size">Size</th>
                            <th class="row-price">Price</th>
                            <th class="row-warehouse">Warehouse</th>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        <tr class="table__body--row">
                            <td class="table-size">Size28</td>
                            <td class="table-price">
                                <div class="container-input">
                                    <p class="table-price--unit">đ</p>
                                    <div class="table-price--line"></div>
                                    <input type="text" class="table-price--price" placeholder="Price">
                                </div>

                            </td>
                            <td class="table-warehouse">
                                <input type="text" class="table-warehouse--warehouse">
                            </td>
                        </tr>
                        <tr class="table__body--row">
                            <td class="table-size">Size28</td>
                            <td class="table-price">
                                <div class="container-input">
                                    <p class="table-price--unit">đ</p>
                                    <div class="table-price--line"></div>
                                    <input type="text" class="table-price--price" placeholder="Price">
                                </div>

                            </td>
                            <td class="table-warehouse">
                                <input type="text" class="table-warehouse--warehouse">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="product-details__button">
            <button class="update">Update</button>
            <button class="hide-button">Hide</button>
            <button class="cancel">Cancel</button>
        </div>
    </section>
@endsection
