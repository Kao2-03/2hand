@extends('layouts.app-admin')

@section('content')
    <section class="section-product">
        <div class="product">
            <div class="product__block1">
                <div class="product__block1-line1">
                    <div class="container-filter1-search">
                        <select name="dropdown1" id="dropdown1" class="filter1">
                            <option value="order-number">Order Number</option>
                            <option value="order-name">Order Name</option>
                        </select>
                        <div class="search">
                            <input type="text" id="filter1" name="filter1" placeholder="Filter order">
                            <img src="http://localhost:8000/icons/loupe_1.svg" alt="error">
                        </div>
                    </div>
                    <div class="category">
                        <select name="dropdown2" id="dropdown2" class="filter2">
                            <option value="all-category">All Category</option>
                            <option value="skirt">Skirt</option>
                        </select>
                    </div>
                </div>
                <div class="product__block1-line2">
                    <p class="label">Warehouse</p>
                    <input type="number" id="minValueWh" name="minValueWh" placeholder="Minimum" class="min">
                    <span class="interim-line"></span>
                    <input type="number" id="maxValueWh" name="maxValueWh" placeholder="Maximum" class="max">
                </div>
                <div class="product__block1-line3">
                    <div class="container-label-min-max-interim">
                        <p class="label">Sales revenue</p>
                        <input type="number" id="minValueSr" name="minValueSr" placeholder="Minimum" class="min">
                        <span class="interim-line"></span>
                        <input type="number" id="maxValueSr" name="maxValueSr" placeholder="Maximum" class="max">
                    </div>
                    <button class="search">Search</button>
                    <button class="re-enter">Re-enter</button>
                </div>
            </div>

            <div class="product__middle-content">
                <div class="product__middle-content--tab">
                    <div class="item">All</div>
                    <div class="item">Out of stock</div>
                </div>
                <div class="product__middle-content--line"></div>
            </div>
            <div class="product__title">
                <div class="product__title--title">{{ $cloth_count }} Products</div>
                <div class="product__title--button">
                    <a class="redirect" href="{{ route('admin.products.create') }}">
                        <img src="http://localhost:8000/icons/plus.svg" alt="error">
                        <button class="add-new-product">Add new product</button>
                    </a>
                </div>
            </div>

            <div class="product__block2">
                <div class="product__block2--heading">
                    <div class="heading square">
                        <input type="checkbox" name="isChoose">
                    </div>
                    <div class="heading heading-product">Product</div>
                    <div class="heading">Category</div>
                    <div class="heading">Price</div>
                    <div class="heading">Warehouse</div>
                    <div class="heading">Sale</div>
                    <div class="heading act">Action</div>
                </div>
                <div class="product__block2--content">

                    @foreach ($clothes as $cloth)
                        <div class="product__block2--content__table">
                            <div class="content square">
                                <input type="checkbox" name="isChoose">
                            </div>
                            <div class="content content-product">
                                <img src="http://localhost:8000/images/product-item-1.png" alt="error">
                                <div class="name">{{ $cloth->cloth_name }}</div>
                            </div>
                            <div class="content">
                                {{ $cloth->category->name }}
                            </div>
                            <div class="content">
                                <div class="price">${{ $cloth->cost }}</div>
                            </div>
                            <div class="content">
                                <div class="warehouse">{{ $cloth->stock }}</div>
                            </div>
                            <div class="content">
                                <div class="sale">1</div>
                                <div class="sale">1</div>
                            </div>
                            <div class="content act">
                                <a href="{{ route('admin.product.edit', $cloth->cloth_id) }}" class="action">
                                    Update
                                </a>
                                <button class="action js-toggle" onclick="initJsToggle()"
                                    toggle-target="#delete-cloth">Delete</button>
                            </div>
                        </div>
                        <div class="product__block2--content__line">
                            <div class="dotted-line"></div>
                            <div class="MoreCategories">More categories</div>
                            <div class="dotted-line"></div>
                        </div>

                        {{-- Modal Delete --}}
                        <div id="delete-cloth" class="modal hide">
                            <div class="modal__content delete-consign__content">
                                <form action="{{ route('admin.product.delete', $cloth->cloth_id) }}" method="POST"
                                    class="form">
                                    @csrf
                                    @method('DELETE')
                                    <p class="consign__name">Bạn có chắc chắn muốn xóa?</p>
                                    <div class="consign-mnm-cta delete-consign-cta">
                                        <button class="btn consign-delete__btn-delete">Delete</button>
                                        <button class="btn btn--text consign-delete__btn-cancel js-toggle"
                                            toggle-target="#delete-cloth">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal__overlay js-toggle" toggle-target="#delete-cloth"></div>
                        </div>
                    @endforeach

                    <div class="product__block2--content__page">
                        <button class="button left"></button>
                        <button class="button page">1</button>
                        <button class="button page">2</button>
                        <button class="button right"></button>
                    </div>

                    {{-- ============== Show/hide Select All============== --}}
                    <div class="product__block2--content__tail">
                        <div class="line"></div>
                        <div class="container-part1-part2">
                            <div class="part1">
                                <div class="part1__square">
                                    <input type="checkbox" name="isChoose">
                                </div>
                                <div class="part1__select-all">Select All</div>
                            </div>
                            <div class="part2">
                                <div class="part2__selected">1 product selected</div>
                                <button class="part2__delete">Delete</button>
                                <button class="part2__hide">Hide</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var checkboxes = document.querySelectorAll('[name="isChoose"]');
        var additionalButtonsDiv = document.querySelector(".product__block2--content__tail");

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('click', function() {
                // Kiểm tra trạng thái của checkbox và ẩn/hiện additionalButtonsDiv
                if (checkbox.checked) {
                    additionalButtonsDiv.style.display = "block";
                } else {
                    additionalButtonsDiv.style.display = "none";
                }
            });
        });
    </script>
@endsection
