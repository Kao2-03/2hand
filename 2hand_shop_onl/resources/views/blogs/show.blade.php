@extends('layouts.app')

@section('content')
    {{-- blog detail --}}
    <section class="blog-detail">
        <div class="container">
            <div class="blog-detail__content">
                <div class="blog-detail__content-title1">
                    <h1 class="blog-detail__content-title">Ukrainian Power: Showcase of <br>Ukrainian creative agencies</h1>
                    <p class="blog-detail__content-date">July 7,2022 | By Warner</p>
                    <div class="blog-detail__content-author">
                        <img src="{{ asset('images/avt.png') }}" alt="Avt" class="blog-detail__content-avt">
                        <p class="blog-detail__content-name_author">Natalie Brennan</p>
                    </div>
                    <img src="{{ asset('images/thumb1.png') }}" alt="Hình ảnh minh họa"
                        class="blog-detail__content-thumbnail">
                    <p class="blog-detail__content-topic">
                        With over 11k contributions, the Travel Topic on Unsplash gets a lot of traffic. Its allows for
                        Unsplash users to discover hidden wonders and inspiring destinations around the world from the
                        comfort of their own homes. We are so thankful to these travel photographers for braving crazy
                        heights, dark seas and stormy weather in the name of art. And we are grateful for all the reliable
                        and durable devices that ensure those memories make it home safely.
                    </p>
                    <p class="blog-detail__content-topic">
                        Samsung Memory supports the superior performance and reliability that you can only get fom the
                        world's number one brand for flash memory since 2003. Samsung products are a perfect partner in any
                        situatioon, from daily life to a tough enviroment.
                    </p>
                    <p class="blog-detail__content-topic">
                        So we are calling all travel photographers, who are confident in their gear, to submit your best.
                        Travel images. The top three images, as chosen by the Samsung Memory team, have the chance to win a
                        Samsung Portable SSD T& Shield to help keep your photos safe on your next adventure.
                    </p>
                </div>
                {{-- detail news --}}
                {{-- news 1 --}}
                <div class="blog-detail__content-title2">
                    <h2 class="section-heading blog-detail__content-sub_title">Submit to the Travel Topic</h2>
                    <p class="blog-detail__content-sub_topic">
                        Originally taken to create a time-lapse of the Milky Way rotating over the amazing Spitzkope
                        mountains in Namibia, this series of 250 images taken over the course of an hour also produced this
                        dramatic star trail image. By accident, the foreground has been lit by the occasional flash of a car
                        headlight in the distance catching the hills. The nature of the southern skies produces a
                        particularly rich spectrum of colour and this is really illustrated in this picture.
                    </p>
                    <p class="blog-detail__content-sub_topic">
                        Taken using the amazing Sony A1 and equally fantastic Sony 12-24mm F2.8 GM lens and processed using
                        DxO Photolab 5 for the invidual images and Affinity Photo for image stacking
                    </p>
                    <img src="{{ asset('images/thumb2.png') }}" alt="Hình ảnh minh họa"
                        class="blog-detail__content-thumbnail">
                    <p class="blog-detail__content-sup_topic">
                        With over 11k contributions, the Travel Topic on Unsplash gets a lot of traffic. Its allows for
                        Unsplash users to discover hidden wonders and inspiring destinations around the world from the
                        comfort of their own homes. We are so thankful to these travel photographers for braving crazy
                        heights, dark seas and stormy weather in the name of art. And we are grateful for all the reliable
                        and durable devices that ensure those memories make it home safely.
                    </p>
                    <p class="blog-detail__content-sup_topic">
                        Samsung Memory supports the superior performance and reliability that you can only get fom the
                        world's number one brand for flash memory since 2003. Samsung products are a perfect partner in any
                        situatioon, from daily life to a tough enviroment.
                    </p>
                    <p class="blog-detail__content-sup_topic">
                        So we are calling all travel photographers, who are confident in their gear, to submit your best.
                        Travel images. The top three images, as chosen by the Samsung Memory team, have the chance to win a
                        Samsung Portable SSD T& Shield to help keep your photos safe on your next adventure.
                    </p>
                </div>
                {{-- news 2 --}}
                <div class="blog-detail__content-title2">
                    <h2 class="section-heading blog-detail__content-sub_title">How do Topics work?</h2>
                    <p class="blog-detail__content-sub_topic">
                        Topics work as a way to curate various images on our platform through a similar theme. From topics
                        like the aforementioned Travel <br> Topic, to Current Events - curated topics have an increased
                        chance of being featured, promoted, or seen on the site.
                    </p>
                    <p class="blog-detail__content-sub_topic">
                        Curious to partner with us on a topic? Reach out, we'd love to make magic happen
                    </p>
                </div>
            </div>
            {{-- blog contact --}}
            <div class="blog-detail-contact">
                <h2 class="section-title blog-detail-contact_title">Share article</h2>
                <div class="blog-detail-contact_wrap-icon">
                    <a href="#!" class="blog-detail-contact__icon">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.14269 13.8502V7.03605H7.19067L7.46214 4.63778H5.14269L5.14613 3.43734C5.14613 2.81181 5.20948 2.4768 6.16733 2.4768H7.44778V0.078125H5.39934C2.9388 0.078125 2.07289 1.24149 2.07289 3.19818V4.63796H0.539062V7.03645H2.07289V13.7536C2.67043 13.8653 3.28818 13.9243 3.92069 13.9243C4.3293 13.9243 4.73748 13.8996 5.14269 13.8502Z"
                                fill="white" />
                        </svg>
                    </a>
                    <a href="#!" class="blog-detail-contact__icon">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.0761719 1.68652C0.0761719 1.22031 0.239898 0.835691 0.567336 0.53267C0.894774 0.229636 1.32046 0.078125 1.84436 0.078125C2.35892 0.078125 2.77523 0.2273 3.09332 0.525677C3.42076 0.83337 3.58449 1.23429 3.58449 1.72847C3.58449 2.17603 3.42545 2.54898 3.10736 2.84736C2.77992 3.15505 2.34956 3.30889 1.8163 3.30889H1.80226C1.28771 3.30889 0.871395 3.15505 0.553303 2.84736C0.235211 2.53966 0.0761719 2.15271 0.0761719 1.68652ZM0.258604 13.9243V4.58162H3.37399V13.9243H0.258604ZM5.10008 13.9243H8.21546V8.7075C8.21546 8.38115 8.25289 8.1294 8.32773 7.95225C8.4587 7.63523 8.65751 7.36716 8.92414 7.14806C9.19078 6.92894 9.52523 6.81938 9.92752 6.81938C10.9753 6.81938 11.4992 7.52334 11.4992 8.93127V13.9243H14.6146V8.56764C14.6146 7.18768 14.2872 6.14106 13.6323 5.42778C12.9774 4.71449 12.112 4.35785 11.0362 4.35785C9.82929 4.35785 8.88906 4.87533 8.21546 5.91029V5.93827H8.20143L8.21546 5.91029V4.58162H5.10008C5.11879 4.87999 5.12815 5.80772 5.12815 7.36484C5.12815 8.92194 5.11879 11.1084 5.10008 13.9243Z"
                                fill="white" />
                        </svg>
                    </a>
                    <a href="#!" class="blog-detail-contact__icon">
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18 1.7173C17.3306 1.99528 16.6174 2.17954 15.8737 2.26901C16.6388 1.83659 17.2226 1.15706 17.4971 0.338007C16.7839 0.74061 15.9964 1.02499 15.1571 1.18369C14.4799 0.500965 13.5146 0.078125 12.4616 0.078125C10.4186 0.078125 8.77387 1.64807 8.77387 3.57268C8.77387 3.8496 8.79862 4.11588 8.85938 4.36937C5.7915 4.22771 3.07687 2.83564 1.25325 0.715048C0.934875 1.23801 0.748125 1.83659 0.748125 2.48097C0.748125 3.69091 1.40625 4.76345 2.38725 5.3844C1.79437 5.37375 1.21275 5.21079 0.72 4.9541C0.72 4.96475 0.72 4.9786 0.72 4.99244C0.72 6.6902 1.99912 8.10037 3.6765 8.42523C3.37612 8.50298 3.04875 8.54025 2.709 8.54025C2.47275 8.54025 2.23425 8.52747 2.01038 8.48061C2.4885 9.86416 3.84525 10.8813 5.4585 10.9143C4.203 11.8442 2.60888 12.4044 0.883125 12.4044C0.5805 12.4044 0.29025 12.3916 0 12.3565C1.63462 13.3545 3.57188 13.9243 5.661 13.9243C12.4515 13.9243 16.164 8.59883 16.164 3.98274C16.164 3.8283 16.1584 3.67919 16.1505 3.53114C16.8829 3.03907 17.4982 2.42452 18 1.7173Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>

            </div>
            {{-- blog-newst  --}}
            <div class="blog-detail__latest">
                <div class="blog-detail__item">
                    {{-- item1 --}}
                    <div class="blog-detail__iteam-latest">
                        <a href="#!">
                            <img src="{{ asset('images/latest-item-1.png') }}" alt=""
                                class="blog-detail__item-image">
                        </a>

                        <p class="section-title blog-detail__item-title">Win a Samsung Portable SSD T7 Shield</p>
                        <p class="blog-detail__latest-topic">
                            With over 11k contributions, the Travel Topic on Unsplash gets a lot of traffic. Its allows for
                            Unsplash users to discover hidden wonders and inspiring destinations around the world from the
                            comfort of their own homes. We are so thankful to these travel photographers for braving crazy
                            heights, dark seas and stormy weather in the name of art. And we are grateful for all the
                            reliable and durable devices that ensure those memories make it home safely.
                        </p>
                        <a href="#!" class="blog-detail__item-read_more">Read more</a>
                    </div>
                    {{-- item2 --}}
                    <div class="blog-detail__item-latest">
                        <a href="#!">
                            <img src="{{ asset('images/latest-item-2.png') }}" alt=""
                                class="blog-detail__item-image">
                        </a>

                        <p class="section-title blog-detail__item-title">Open-sourcing our photo layout for Swift UI</p>
                        <p class="blog-detail__latest-topic">
                            With over 11k contributions, the Travel Topic on Unsplash gets a lot of traffic. Its= allows for
                            Unsplash users to discover hidden wonders and inspiring destinations around the world from the
                            comfort of their own homes. We are so thankful to these travel photographers for braving crazy
                            heights, dark seas and stormy weather in the name of art. And we are grateful for all the
                            reliable and durable devices that ensure those memories make it home safely.
                        </p>
                        <a href="" class="blog-detail__item-read_more">Read more</a>
                    </div>
                    {{-- item3 --}}
                    <div class="blog-detail__item-latest">
                        <a href="">
                            <img src="{{ asset('images/latest-item-3.png') }}" alt=""
                                class="blog-detail__item-image">
                        </a>

                        <p class="section-title blog-detail__item-title">12 type of shirts that a girl can wear in any
                            casual party</p>
                        <p class="blog-detail__latest-topic">
                            Samsung Memory supports the superior performance and reliability that you can only get fom the
                            world's number one brand for flash memory since 2003. Samsung products are a perfect partner in
                            any situatioon, from daily life to a tough enviroment.
                        </p>
                        <a href="" class="blog-detail__item-read_more">Read more</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
