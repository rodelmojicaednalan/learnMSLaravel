<div class="row">
    @foreach ($classes as $item)
      <div class="col-md-4 col-xs-4 col-sm-6">
          <div class="product-item">
              <div class="image">
                  <img src="{{isset($item['cover_photo']) ? Storage::url('public/uploads/teacher/class/image/'. $item['cover_photo']) : asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
              </div>
              <div class="move-text-left-top">
                  <?=$item['class_type'] == 'pre_recorded_class' ? '<div class="tag bg-orange">Pre-Recorded</div>' : '<div class="tag bg-red">Live Class</div>'?>
              </div>
              <div class="creater">
                  <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                  <h6 class="creater-name">{{isset($item['creator']) ? $item['creator']['first_name']. ' ' .$item['creator']['last_name'] : 'N/A'}}</h6>
              </div>
              <h5> {{isset($item['title']) ? $item['title'] : 'Not Available'}}</h5>
              <p class="desc">{{isset($item['description']) ? $item['description'] : 'Not Description Available'}} </p>
              <div class="row">
                <div class="price col-6">
                  {{isset($item['price']) ? $item['price'] . ' SGD' : 'Not Available'}}
                </div>
                <div class="col-6 text-right">
                  <a href='<?=$item['class_type'] == 'live_class' ? '/class/live/' . $item['id'] : '/class/pre-recorded/' .$item['id'] ?>'>
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
  {{$classes->links()}}
  <div class="col-md-4 col-xs-4 col-sm-6 total-product text-right">
      <div class="tag">
          {{count($product_count)}}
      </div>
      <span>Products</span>
  </div>
</div>