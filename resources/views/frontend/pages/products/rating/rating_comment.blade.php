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