<section>
    <h2 class="compare-table-title mb-0">Cấu hình sản phẩm</h2>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">CPU</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->cpu:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para1"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">RAM</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->ram:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para2"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Ổ cứng</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->hard_drive:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para3"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Màn hình</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->screen:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para4"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Card màn hinhd</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->card_screen:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para5"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Cổng kết nối</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->connector:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para6"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Hệ điều hành</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->operating_system:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para7"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Thiết kế</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->design:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para8"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Kích thước</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->size:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para9"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Thời điểm ra mắt</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->paralaptop) ? $product->paralaptop->time_launch:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para10"></span>
      </li>
    </ul>
  </section>