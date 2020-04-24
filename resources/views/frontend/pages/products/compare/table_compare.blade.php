<section>
    <h2 class="compare-table-title mb-0">Cấu hình sản phẩm</h2>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Màn hình</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->screen:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para1"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Hệ điều hành</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->operating_system:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para2"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Camera sau</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->rear_camera:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para3"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Camera trước</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->front_camera:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para4"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">CPU</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->cpu:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para5"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">RAM</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->ram.' GB':'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para6"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Bộ nhớ trong</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->internal_memory.' GB':'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para7"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Thẻ nhớ</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->memory:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para8"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Sim</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->sim:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para9"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Pin</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space">{{ !is_null($product->para) ? $product->para->pin:'' }}</span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para10"></span>
      </li>
    </ul>
  </section>