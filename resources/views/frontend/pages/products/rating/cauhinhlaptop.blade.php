<div class="col-12 col-lg-5 page-feature">
      <h5 class="pb-1">Thông số kỹ thuật</h5>            
      <table class="table">     
        <tbody style="font-size: 14px">
          <tr>
            <td class="para-left">CPU</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->cpu:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">RAM</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->ram:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Ổ cứng</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->hard_drive:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Màn hình</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->screen:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Card màn hình</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->card_screen:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Cổng kết nối</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->connector:'' }} GB</td>
          </tr>
          <tr>
            <td class="para-left">Hệ điều hành</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->operating_system:'' }} GB</td>
          </tr>
          <tr>
            <td class="para-left">Thiết kế</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->design:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Kích thước</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->size:'' }}</td>
          </tr>
          <tr>
            <td class="para-left">Thời điểm ra mắt</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->time_launch:'' }}</td>
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
              <img class="modalImg" src="public/images/paralaptop/{{ !is_null($product->paralaptop) ? $product->paralaptop->image:'' }}">
              <table class="table">     
                <tbody style="font-size: 14px">
                  <tr>
                    <td class="para-left">CPU</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->cpu:'' }}</td>
                  </tr>
                  <tr>
                    <td class="para-left">RAM</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->ram:'' }}</td>
                  </tr>
                  <tr>
                    <td class="para-left">Ổ cứng</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->hard_drive:'' }}</td>
                  </tr>
                  <tr>
                    <td class="para-left">Màn hình</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->screen:'' }}</td>
                  </tr>
                  <tr>
                    <td class="para-left">Card màn hình</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->card_screen:'' }}</td>
                  </tr>
                  <tr>
                    <td class="para-left">Cổng kết nối</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->connector:'' }} GB</td>
                  </tr>
                  <tr>
                    <td class="para-left">Hệ điều hành</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->operating_system:'' }} GB</td>
                  </tr>
                  <tr>
                    <td class="para-left">Thiết kế</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->design:'' }}</td>
                  </tr>
                  <tr>
                    <td class="para-left">Kích thước</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->size:'' }}</td>
                  </tr>
                  <tr>
                    <td class="para-left">Thời điểm ra mắt</td><td>{{ !is_null($product->paralaptop) ? $product->paralaptop->time_launch:'' }}</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>