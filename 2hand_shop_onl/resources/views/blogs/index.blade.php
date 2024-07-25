@extends('layouts.app')
@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__inner">
                <h1 class="blog__heading">Read our latest blog</h1>
                <p class="section-desc blog__desc">
                    We provide actionable insights to help you stay on the cutting edge of emmerce. Join our thought
                    leadership community to get ecommerce tips right to your inbox
                </p>
            </div>
    </section>
    <section class="blog-content">
        <div class="container">
            {{-- featured --}}

            <div class="blog-content__featured">
                <h2 class="section-heading blog-content__heading">Featured</h2>
                <div class="blog-content__item1">
                    {{-- item1 --}}
                    <div class="blog-content__item-featured">
                        <a href="{{ route('blogs.show') }}">
                            <img src="{{ asset('images/blog-item-1.png') }}" alt=""
                                class="blog-content__item-image--lg">
                        </a>

                        <a href="{{ route('blogs.show') }}" class="section-title blog-content__item-title">
                            30 type of modern trendy fashion for women
                            and menin 2022 world wide
                        </a>
                        <p class="blog-content__item-date">July 7,2022 | By Warner</p>
                    </div>
                    {{-- item2 --}}
                    <div class="blog-content__item-featured">
                        <a href="{{ route('blogs.show') }}">
                            <img src="{{ asset('images/blog-item-2.png') }}" alt=""
                                class="blog-content__item-image--lg">
                        </a>

                        <a href="{{ route('blogs.show') }}" class="section-title blog-content__item-title">
                            Open-sourcing our
                            photo layout for Swift UI
                        </a>
                        <p class="blog-content__item-date">July 7,2022 | By Warner</p>
                    </div>
                </div>
            </div>
            {{-- end blog-content__featured --}}

            <div class="blog-content__latest">
                <h2 class="section-heading blog-content__heading">Latest from the team</h2>
                <div class="blog-content__item">
                    {{-- item1 --}}
                    <div class="blog-content__iteam-latest">
                        <a href="{{ route('blogs.show') }}">
                            <img src="{{ asset('images/latest-item-1.png') }}" alt=""
                                class="blog-content__item-image">
                        </a>

                        <a href="{{ route('blogs.show') }}" class="section-title blog-content__item-title">
                            Win a Samsung
                            Portable SSD T7 Shield
                        </a>
                        <p class="blog-content__item-date">July 7,2022 | By Warner</p>
                    </div>
                    {{-- item2 --}}
                    <div class="blog-content__item-latest">
                        <a href="{{ route('blogs.show') }}">
                            <img src="{{ asset('images/latest-item-2.png') }}" alt=""
                                class="blog-content__item-image">
                        </a>

                        <a href="{{ route('blogs.show') }}" class="section-title blog-content__item-title">Open-sourcing
                            our photo layout for Swift UI</a>
                        <p class="blog-content__item-date">July 7,2022 | By Warner</p>
                    </div>
                    {{-- item3 --}}
                    <div class="blog-content__item-latest">
                        <a href="{{ route('blogs.show') }}">
                            <img src="{{ asset('images/latest-item-3.png') }}" alt=""
                                class="blog-content__item-image">
                        </a>

                        <a href="{{ route('blogs.show') }}" class="section-title blog-content__item-title">
                            12 type of shirts that a girl can wear in any
                            casual party
                        </a>
                        <p class="blog-content__item-date">July 7,2022 | By Warner</p>

                    </div>

                </div>
            </div>
            <button class="btn blog-content__item-load">Load More</button>
        </div>
    </section>
@endsection
