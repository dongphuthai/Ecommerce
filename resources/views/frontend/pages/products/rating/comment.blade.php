<!-- COMMENT -->
      <div style="font-size: 14px">
        <ul class="ratingLst pl-0 mt-2">
          @php $i=3 @endphp            
          @foreach($ratings as $rating)
            @if($i>0)
              @if(!is_null($rating->comment))
                <li class="par ml-2 mt-3">
                  <div class="rh">
                    <span>{{ App\Models\User::where('id',$rating->user_id)->first()->first_name}} {{ App\Models\User::where('id',$rating->user_id)->first()->last_name}}</span>
                    <span><small>
                        <input id="input-{{ $rating->id }} " name="" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $rating->rating }}" data-size="xs" disabled>
                    </small></span>
                  </div>
                  <div class="rc ml-2">
                    <p class=""><i>{{ $rating->comment }}</i></p>
                    @php 
                      Carbon\Carbon::setLocale('vi') ;
                      $comments=App\Models\Cmtrate::where('rating_id',$rating->id)->get();
                    @endphp
                    <div style="margin-top: -12px; color: #999;">
                      <span><a href="javascript:void(0)" class="cmthref" rate_id="{{ $rating->id }}" id="cmt-{{ $rating->id }}" style="color: #007bff">
                        <span id="count_comment-{{ $rating->id }}">{{ count($comments)>0 ? count($comments):'' }}</span> <span id="tl_comment-{{ $rating->id }}">{{ count($comments)>0 ? 'thảo luận':'Thảo luận' }}</span>
                      </a></span>
                      <span> • </span>
                      <span style="">{{ $rating->updated_at->diffForHumans(Carbon\Carbon::now()) }}</span>
                    </div>                                        
                  </div>
                </li>

                @if(count($comments)==0)
                  <li class="par ml-3 mt-3" id="cmt-child-rating-{{ $rating->id }}" >
                    <div class="rh">                   
                      <div class="mt-2 mb-3 text" id="text-{{ $rating->id }}" style="border: none;padding-left: 0px;">
                        <form id="submit_cmtrate-{{ $rating->id }}" action="{{ route('rating.comment') }}" method="post" accept-charset="utf-8" class="form-inline">
                          @csrf
                          <input type="text" class="form-control mr-2" name="cmtrating" value="" placeholder="Nhập thảo luận của bạn" style="font-size: 14px;padding:7px;width: 380px;">
                          <input type="hidden" name="rating_id" value="{{ $rating->id }}"> 
                          <button class="rrSend" type="submit">Gửi</button>
                        </form>
                        <div id="result-errors-{{ $rating->id }}">
                        
                        </div>
                      </div >                     
                    </div>
                  </li>
                @endif
                
                @if(count($comments)>0)
                  @foreach($comments as $comment) 
                    @php 
                    $rate_cmt=\willvincent\Rateable\Rating::where('id',$comment->rating_id)->first();
                    @endphp                   
                    <li class="par ml-4 mt-3 text text-{{ $comment->rating_id }}" comment_id="{{ $comment->id }}" id="child-{{ $comment->id }}">
                      <div class="rh">
                        <span>{{ App\Models\User::where('id',$comment->user_id)->first()->first_name}} {{ App\Models\User::where('id',$comment->user_id)->first()->last_name}}</span>
                      </div>
                      <div class="rc ml-2">
                        <p class=""><i>{{ $comment->cmtrating }}</i></p>
                        @php 
                          Carbon\Carbon::setLocale('vi') ;
                        @endphp
                        <div style="margin-top: -12px; color: #999;">                  
                          <span style="">{{ $comment->updated_at->diffForHumans(Carbon\Carbon::now()) }}</span>
                        </div>                                          
                      </div>
                    </li>
                  @endforeach                 

                  <li class="par ml-4 mt-3 child-cmt" id="cmt-child-rating-{{ $rating->id }}" >
                    <div class="mt-3 mb-3 text" id="text-{{ $rating->id }}" style="border: none;padding-left: 0px;">
                      <form id="submit_cmtrate-{{ $rating->id }}" action="{{ route('rating.comment') }}" method="post" accept-charset="utf-8" class="form-inline">
                        @csrf
                        <input type="text" class="form-control mr-2" name="cmtrating" value="" placeholder="Nhập thảo luận của bạn" style="font-size: 14px;padding:7px;width: 380px;">
                        <input type="hidden" name="rating_id" value="{{ $rating->id }}"> 
                        <button class="rrSend" type="submit">Gửi</button>
                      </form> 
                      <div id="result-errors-{{ $rating->id }}">
                        
                      </div>                  
                    </div >
                  </li>
                @endif

              @endif
              @php $i-- @endphp
            @endif
          @endforeach         
        </ul>
        <a href="{!! route('rating.show',$product->slug) !!}" class="rtpLnk ml-3 mt-1">Xem tất cả đánh giá<span> › </span></a>
      </div> 