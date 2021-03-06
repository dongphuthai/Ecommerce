<script type="text/javascript" src="public/asset/js/jquery-3.4.1.slim.min.js"></script>
<script type="text/javascript" src="public/asset/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="public/asset/css/scripts/jquery.rateit.js"></script>
<script type="text/javascript" src="public/asset/dist/popper.min.js"></script>
<script type="text/javascript" src="public/asset/css/scripts/star-rating.min.js"></script>
<script type="text/javascript" src="public/asset/css/scripts/typeahead.bundle.js"></script>
<script type="text/javascript" src="public/asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/asset/dist/alertify.min.js"></script>
<!-- CART AJAX -->
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
		  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	function addToCart(product_id){
		var url="{{ url('/') }}"
		$.post( url+"/api/cart/store", 
			{ 
				product_id: product_id 
			})
  		.done(function( data ) {
  			data=JSON.parse(data);
    		if (data.status=='success') {
    		alertify.set('notifier','position', 'top-center');
 				alertify.success('Giỏ hàng có: '+ data.totalItem + ' sản phẩm<br/>Tiến hành thanh toán <a href="{{ route('carts') }}">tại đây</a>');
    			$('#totalItem').html(data.totalItem);
    		}
  		});
	}
</script>
<!-- FUNCTION NUMBER_FORMAT  -->
<script type="text/javascript">
	function number_format (number, decimals, dec_point, thousands_sep) {
  //   Strip all characters but numerical ones.
  //   example 3: number_format(1234.5678, 2, '.', '')
  //   returns 3: '1234.57'
  //   example 4: number_format(67, 2, ',', '.')
  //   returns 4: '67,00'
  //   example 5: number_format(1000)
  //   returns 5: '1,000'
  //   example 6: number_format(67.311, 2)
  //   returns 6: '67.31'
  //   example 7: number_format(1000.55, 1)
  //   returns 7: '1,000.6'
  //   example 8: number_format(67000, 5, ',', '.')
  //   returns 8: '67.000,00000'
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }
</script>
<!-- JS NAV SEARCH -->
<script type="text/javascript">
    $(document).ready(function($){
        var url="{{ url('/') }}";
        var engine = new Bloodhound({
            remote: {
                url: url+'/products/new/search?search=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('search'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });
        $(".search").typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        },{
            source: engine.ttAdapter(),
            limit:25,
            display: function(data){
            },templates: {
                suggestion: function (data) {
                    var price=number_format(data.price, 0, ',', '.');
                    return '<a href="products/'+data.slug+'" class="list-group-item" style="width:345px"><div><img src="public/images/product/'+data.image+'" width="50" class="pr-1"></div><div>' + data.title + '<p class="mb-0 search-price">'+price+'₫</p></div></a>';
                }
            }
        });
  });
</script>
<!-- BACK TO TOP -->
<script type="text/javascript">
  jQuery(document).ready(function($){   
  if($(".btn-top").length > 0){
    $(window).scroll(function () {
      var e = $(window).scrollTop();
      if (e > 300) {
        $(".btn-top").show()
      } else {
        $(".btn-top").hide()
      }
    });
    $(".btn-top").click(function () {
      $('body,html').animate({
        scrollTop: 0
      })
    })
  }   
});
</script>


