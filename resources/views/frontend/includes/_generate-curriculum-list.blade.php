<div class="row">
    @foreach ($curriculum_list as $curriculum)
    <div class="col-md-4 col-xs-4 col-sm-6">
        <div class="product-item">
            <div class="image">
                <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
            </div>
            <div class="move-text-left-top">
                <div class="tag bg-red">
                    {{isset($curriculum['subject']['level']['name']) ? $curriculum['subject']['level']['name'] : 'N/A'}}</div>
            </div>
            <div class="creater">
                <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                <h6 class="creater-name">
                    {{isset($curriculum['school']['school_name']) ? $curriculum['school']['school_name'] : 'N/A'}}</h6>
            </div>
            <h5> {{isset($curriculum['subject']['subject']) ? $curriculum['subject']['subject'] : 'N/A'}}
            </h5>
            <p class="desc">
                {{isset($curriculum['subject']['type']) ? $curriculum['subject']['type'] : 'N/A'}}
            </p>
            <div class="row">
                <div class="price col-6">
                    {{isset($curriculum['fees']) ? $curriculum['fees'] . 'SGD' : 'N/A'}}
                </div>
                <div class="col-6 text-right">
                    <a href=" {{ url('/school/live-class-detail') }}">
                        <button class="btn btn-secondary">
                            Buy Now
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row pagination-wrapper">
    {{$curriculum_list->links()}}
    <div class="col-md-4 col-xs-4 col-sm-6 total-product text-right">
        <div class="tag">
            {{count($curriculum_count)}}
        </div>
        <span>Products</span>
    </div>
</div>