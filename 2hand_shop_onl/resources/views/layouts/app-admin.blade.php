<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2Hand Shop</title>

    {{-- Embed Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Roboto+Slab:wght@700&display=swap"
        rel="stylesheet">

    {{-- Library --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js""></script>


    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="sidebar">
        <a href="/" class="sidebar__header">2Hand</a>

        <div class="menu-admin">
            <div>
                <a href="#!" class="menu-item">
                    <img src="{{ asset('icons/order.svg') }}" alt="" class="menu__icon">
                    <p class="menu__desc">Order Management</p>
                    <img src="{{ asset('icons/arrow-up.svg') }}" alt="" class="menu__arrow">
                </a>
                <div class="sub-menu">
                    <a href="{{ route('admin.order_management.index') }}" class="sub-menu-item">All</a>
                    <a href="{{ route('admin.order_management.Cancelation') }}"
                        class="sub-menu-item sub-menu-item--active">Cancellation Order</a>
                    <a href="{{ route('admin.order_management.Return') }}" class="sub-menu-item">Return/Refund</a>
                </div>
            </div>
            <div>
                <a href="#!" class="menu-item">
                    <img src="{{ asset('icons/product.svg') }}" alt="" class="menu__icon">
                    <p class="menu__desc">Product Management</p>
                    <img src="{{ asset('icons/arrow-up.svg') }}" alt="" class="menu__arrow">
                </a>
                <div class="sub-menu">
                    <a href="{{ route('admin.products.index') }}" class="sub-menu-item">All</a>
                    <a href="{{ route('admin.products.create') }}" class="sub-menu-item">Add Product</a>
                    <a href="http://localhost:8000/admin/product-management/rate" class="sub-menu-item">Rate</a>
                </div>
            </div>
            <div>
                <a href="#!" class="menu-item">
                    <img src="{{ asset('icons/consign.svg') }}" alt="" class="menu__icon">
                    <p class="menu__desc">Consignment Management</p>
                    <img src="{{ asset('icons/arrow-up.svg') }}" alt="" class="menu__arrow">
                </a>
                <div class="sub-menu">
                    <a href="{{ route('admin.consign.index') }}" class="sub-menu-item">All</a>
                    <a href="#!" class="sub-menu-item">Inspection</a>
                </div>
            </div>
            <div>
                <a href="#!" class="menu-item">
                    <img src="{{ asset('icons/finance.svg') }}" alt="" class="menu__icon">
                    <p class="menu__desc">Finance</p>
                    <img src="{{ asset('icons/arrow-up.svg') }}" alt="" class="menu__arrow">
                </a>
                <div class="sub-menu">
                    <a href="#!" class="sub-menu-item">Revenue</a>
                    <a href="#!" class="sub-menu-item">Sale Analysis</a>
                    <a href="#!" class="sub-menu-item">Consigment</a>
                </div>
            </div>
            <div>
                <a href="#!" class="menu-item">
                    <img src="{{ asset('icons/service.svg') }}" alt="" class="menu__icon">
                    <p class="menu__desc">Customer Service</p>
                    <img src="{{ asset('icons/arrow-up.svg') }}" alt="" class="menu__arrow">
                </a>
                <div class="sub-menu">
                    <a href="#!" class="sub-menu-item">Chat Assistant</a>
                    <a href="#!" class="sub-menu-item">Q&A</a>
                </div>
            </div>
            <div>
                <a href="#!" class="menu-item">
                    <img src="{{ asset('icons/blog.svg') }}" alt="" class="menu__icon">
                    <p class="menu__desc">Blog Management</p>
                    <img src="{{ asset('icons/arrow-up.svg') }}" alt="" class="menu__arrow">
                </a>
                <div class="sub-menu">
                    <a href="#!" class="sub-menu-item">Overview</a>
                    <a href="#!" class="sub-menu-item">New Blog</a>
                </div>
            </div>
        </div>
    </div>

    @yield('content')


    <script type="text/javascript">
        const $1 = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        $(document).ready(() => {
            //jquery for toggle sub menus
            $(".menu-item").click(function() {
                $(this).next(".sub-menu").slideToggle();
                $(this).find(".menu__arrow").toggleClass("rotate");
            });
        })


        function initJsToggle() {
            $$(".js-toggle").forEach((button) => {
                const target = button.getAttribute("toggle-target");

                button.addEventListener("click", (e) => {
                    e.preventDefault();

                    const isHidden = $1(target).classList.contains("hide");

                    requestAnimationFrame(() => {
                        $1(target).classList.toggle("hide", !isHidden);
                        $1(target).classList.toggle("show", isHidden);
                    });
                });

                document.addEventListener("click", (e) => {
                    if (!e.target.closest(target)) {
                        const isHidden = $1(target).classList.contains("hide");
                        if (!isHidden) {
                            button.click();
                        }
                    }
                });
            });
        }
    </script>
</body>

</html>
