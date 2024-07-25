@extends('layouts.app-admin')
@section('content')
<section class="section-rate">
    <div class="rate">
        <div class="rate__intro">
            <div class="rate__intro--intro">
                <div class="intro-heading">Shop rate</div>
                <div class="intro-sub">View rate of your shop</div>
            </div>
            <div class="rate__intro--score">
                <div id="score-score">0.0</div>
                <div class="score-scale">/5</div>
            </div>
        </div>
        <div class="rate__line"></div>
        <div class="rate__search">
            <div class="rate__search--name">
                <div class="rate-name">Product Name</div>
                <input class="input" type="text" placeholder="Enter name">
            </div>
            <div class="rate__search--category">
                <div class="rate-category">Category</div>
                <input class="input" type="text" placeholder="Enter category">
            </div>
            <div class="rate__search--customer">
                <div class="rate-customer">Customer</div>
                <input class="input" type="text" placeholder="Enter customer name">
            </div>
            <div class="rate__search--rate-time">
                <div class="rate-time">Rate time</div>
                <input class="input" type="date" name="" id="rate-time-picked">
            </div>
        </div>
        <div class="rate__search-button">
            <button class="rate__search-button--search">Search</button>
            <button class="rate__search-button--re-enter">Re-enter</button>
        </div>
        <div class="rate__tab">
            <div class="rate__tab--wrap">
                <div class="tab__container" >
                    <div class="clickable tab__container--status" id="all">All</div>
                    <div class="tab__container--line"></div>
                </div>
                <div class="tab__container" >
                    <div class="clickable tab__container--status" id="answer" >Answered</div>
                    <div class="tab__container--line"></div>
                </div>
                <div class="tab__container"  >
                    <div class="clickable tab__container--status" id="not-answer" >Not answered</div>
                    <div class="tab__container--line"></div>
                </div>
            </div>
            <div class="rate__tab--line"></div>
        </div>
        <div class="rate__tab-star">
            <div class="rate__tab-star--status all" id="all-star" onclick="showabc('all-star')">All</div>
            <div class="rate__tab-star--status" id="five-star" onclick="showabc('five-star')">5 stars</div>
            <div class="rate__tab-star--status" id="four-star" onclick="showabc('four-star')">4 stars</div>
            <div class="rate__tab-star--status" id="three-star" onclick="showabc('three-star')">3 stars</div>
            <div class="rate__tab-star--status" id="two-star" onclick="showabc('two-star')">2 stars</div>
            <div class="rate__tab-star--status one-star" id="one-star" onclick="showabc('one-star')">1 stars</div>
        </div>
        <div class="rate__table-heading">
            <div class="rate-heading">Product information</div>
            <div class="rate-heading">Customer reviews</div>
            <div class="rate-heading act">Action</div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-all-all-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-all-five-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-all-four-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-all-three-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-all-two-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-all-one-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-answer-all-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-answer-five-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-answer-four-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-answer-three-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-answer-two-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-answer-one-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-not-answer-all-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-not-answer-five-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-not-answer-four-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-not-answer-three-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-not-answer-two-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
        <div class="rate__table">
            <div class="rate__table--body hidden" id="rate__table--body-not-answer-one-star">
                <div class="rate-table-row">
                    <div class="rate-info">
                        <img class="rate-info__product-img"  src="http://localhost:8000/images/product-item-1.png" alt="error">
                        <div class="rate-info__product-name">Quá mệt</div>
                    </div>
                    <div class="rate-review">
                        <div class="rate-review__score">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                            <img src="http://localhost:8000/icons/star.svg" alt="error" class="rate-review__score--star">
                        </div>
                        <div class="rate-review__review">So goooood</div>
                        
                    </div>
                    <div class="rate-action">
                        <button class="rate-action__response">Response</button>
                        <button class="rate-action__delete">Delete reviews</button>
                    </div>
                </div>
                <div class="rate-table-line"></div>
            </div>
        </div>
    </div>
<script>
var lastClickedElementId = null;

var elements = document.querySelectorAll('.clickable');

elements.forEach(function(element) {
  element.addEventListener('click', getIdOnClick);
});

function getIdOnClick(event) {
  lastClickedElementId = event.target.id;
  console.log("Clicked element ID: " + lastClickedElementId);
}
function showabc(tabId) {
    console.log("ID of the last clicked element: " + lastClickedElementId);
    var content = document.querySelectorAll('.rate__table--body');
          content.forEach(function(tab) {
            tab.classList.add('hidden');
    });
    document.getElementById('rate__table--body-'+lastClickedElementId+'-' + tabId).classList.remove('hidden');
}
</script>
</section>
@endsection