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
            <td class="para-left">RAM</td><td>{{ !is_null($product->para) ? $product->para->ram:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Bộ nhớ trong</td><td>{{ !is_null($product->para) ? $product->para->internal_memory:'' }}</td>
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
              @if(!is_null($product->para))
                <img class="modalImg" src="public/images/parameter/{{$product->para->image}}">
              @endif
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
                    <td>RAM</td><td>{{ !is_null($product->para) ? $product->para->ram:'' }}</td>
                  </tr>
                  <tr>
                    <td>Bộ nhớ trong</td><td>{{ !is_null($product->para) ? $product->para->internal_memory:'' }}</td>
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