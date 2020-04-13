<div class="container">
  <div class="row">
    <div class="col-12 col-lg-7 page-feature" style="font-size: 14px;">
      <div class="d-flex justify-content-between" style="display: inline-block; margin-bottom: -20px;">    
        <form id="form-review" action="{{ route('review') }}" method="post" style="width: 100%; margin-bottom: 35px;">
          <span id="view-rating" class="hiddentitle" style="position: absolute;top: 14px;">
            <a href="{!! route('products.show',$product->slug) !!}#view-rating"><span class="count-review">{{ \willvincent\Rateable\Rating::where('rateable_id',$product->id)->count() }}</span> đánh giá {{ $product->title }}
            </a>
          </span>
          <div class="form-inline float-right pb-1" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="rate">                              
              <small>
                <input id="input-1 " name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" data-size="xs">
              </small>              
              <input id="rateable_id" type="hidden" data-slug="{{ $product->slug }}" name="id" required="" value="{{ $product->id }}" > 
            </div>
              <button type="submit" class="btn btn-success ml-3 p-1" style="font-size: 14px;">Đánh giá sản phẩm</button>
            </div>
            <div id="rating-result" class="pt-3" style="font-size: 12px"></div>
            <div class="form-group text-rating pt-4" style="margin-bottom: 10px;">
              <label for="comment"></label>
              <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Nhập đánh giá về sản phẩm (tối thiểu 50 ký tự)"></textarea>
            </div>
        </form>
      </div>
      
      <div id="skillbar">
        <div class="in_skillbar" style="display: flex;" >
          <div class="left">
            <span id="danhgia" class="side-left">{{ number_format($product->averageRating,1) }}</span>
            <small style="vertical-align: top; color: orange" class="hidden-star"><i class="fas fa-star" ></i></small>
          </div>
          <div class="side" style="border-left: 1px solid rgba(0, 0, 0, 0.1); padding-left: 10px;">
            <div>5 <i class="fas fa-star" ></i></div>
            <div class="">4 <i class="fas fa-star" ></i></div>
            <div class="">3 <i class="fas fa-star" ></i></div>
            <div class="">2 <i class="fas fa-star" ></i></div>
            <div class="">1 <i class="fas fa-star" ></i></div>
          </div>
          @php
            $ratings=\willvincent\Rateable\Rating::where('rateable_id',$product->id)->get();
            if($ratings->count()>0){
              $rating=$ratings->count();             
            }else{
              $rating=1;
            }
          @endphp

          <div class="middle">
            <div class="bar-container">
              <div class="skill-color">
                <div class="skillbar-bar" data-percent="{{ $percent=$ratings->where('rating','5')->count()/$rating*100 }}%"></div>
              </div>
              <div class="skill-color">
                <div class="skillbar-bar bar-margin" data-percent="{{ $percent=$ratings->where('rating','4')->count()/$rating*100 }}%"></div>
              </div>  
              <div class="skill-color">
                <div class="skillbar-bar bar-margin" data-percent="{{ $percent=$ratings->where('rating','3')->count()/$rating*100 }}%"></div>
              </div>
              <div class="skill-color">
                <div class="skillbar-bar bar-margin" data-percent="{{ $percent=$ratings->where('rating','2')->count()/$rating*100 }}%"></div>
              </div>
              <div class="skill-color">
                <div class="skillbar-bar bar-margin" data-percent="{{ $percent=$ratings->where('rating','1')->count()/$rating*100 }}%"></div>
              </div>
            </div>
          </div>

          <div class="side right">
            <div><a href="#">{{ $ratings->where('rating',5)->count() }} đánh giá</a></div>
            <div><a href="#">{{ $ratings->where('rating',4)->count() }} đánh giá</a></div>
            <div><a href="#">{{ $ratings->where('rating',3)->count() }} đánh giá</a></div>
            <div><a href="#">{{ $ratings->where('rating',2)->count() }} đánh giá</a></div>
            <div><a href="#">{{ $ratings->where('rating',1)->count() }} đánh giá</a></div>
          </div>
        </div>
      </div>
     @include('frontend.pages.products.partials.commenttest')
    </div>

    <div class="col-12 col-lg-5 page-feature">
      <h5 class="pb-1">Thông số kỹ thuật</h5>            
      <table class="table">     
        <tbody style="font-size: 14px">
          <tr>
            <td class="para-left">Màn hình</td><td>{{ !is_null($product->para) ? $product->para->screen:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Hệ điều hành</td><td>{{ !is_null($product->para) ? $product->para->operating_system:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Camera sau</td><td>{{ !is_null($product->para) ? $product->para->rear_camera:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Camera trước</td><td>{{ !is_null($product->para) ? $product->para->front_camera:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">CPU</td><td>{{ !is_null($product->para) ? $product->para->cpu:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">RAM</td><td>{{ !is_null($product->para) ? $product->para->ram:'' }} GB</td>
          </tr>
          <tr>
            <td class="para-left">Bộ nhớ trong</td><td>{{ !is_null($product->para) ? $product->para->internal_memory:'' }} GB</td>
          </tr>
          <tr>
            <td class="para-left">Thẻ nhớ</td><td>{{ !is_null($product->para) ? $product->para->memory:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Sim</td><td>{{ !is_null($product->para) ? $product->para->sim:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Pin</td><td>{{ !is_null($product->para) ? $product->para->pin:'' }}</td>
          </tr>
        </tbody>
      </table>

      <button type="button" data-target="#modalImage" data-toggle="modal" class="btn btn-primary" style="width: 100%; color: #fff;">Xem cấu hình chi tiết</button>
      <div class="modal fade " id="modalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h6 class="modal-title" id="exampleModalLabel">Thông số kỹ thuật chi tiết {{ $product->title }}</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <img class="modalImg" src="public/images/parameter/{{ !is_null($product->para) ? $product->para->image:'' }}">
              <table class="table">     
                <tbody style="font-size: 14px">
                  <tr>
                    <td >Màn hình</td><td>{{ !is_null($product->para) ? $product->para->screen:'' }}</td>
                  </tr>
                  <tr>
                    <td>Hệ điều hành</td><td>{{ !is_null($product->para) ? $product->para->operating_system:'' }}</td>
                  </tr>
                  <tr>
                    <td>Camera sau</td><td>{{ !is_null($product->para) ? $product->para->rear_camera:'' }}</td>
                  </tr>
                  <tr>
                    <td>Camera trước</td><td>{{ !is_null($product->para) ? $product->para->front_camera:'' }}</td>
                  </tr>
                  <tr>
                    <td>CPU</td><td>{{ !is_null($product->para) ? $product->para->cpu:'' }}</td>
                  </tr>
                  <tr>
                    <td>RAM</td><td>{{ !is_null($product->para) ? $product->para->ram:'' }} GB</td>
                  </tr>
                  <tr>
                    <td>Bộ nhớ trong</td><td>{{ !is_null($product->para) ? $product->para->internal_memory:'' }} GB</td>
                  </tr>
                  <tr>
                    <td>Thẻ nhớ</td><td>{{ !is_null($product->para) ? $product->para->memory:'' }}</td>
                  </tr>
                  <tr>
                    <td>Sim</td><td>{{ !is_null($product->para) ? $product->para->sim:'' }}</td>
                  </tr>
                  <tr>
                    <td>Pin</td><td>{{ !is_null($product->para) ? $product->para->pin:'' }}</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>