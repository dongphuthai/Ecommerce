

<div style="display: flex;" class="text-center">
  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
    <a id="parent_{{ $parent->id }}" href="{{ route('categories.show.parent',$parent->slug) }}" class="list-group-item list-group-item-action p-0 btn">
      <img src="{!! asset('public/images/categories/'.$parent->image) !!}" width="25" style="padding-top: 3px;">
      <p class="mb-0 hiddentitle" style="font-size: 14px; font-family: arial;">{{ $parent->name }}</p>
    </a>
  @endforeach
</div>

@section('scripts')
	<script type="text/javascript">
		$("#parent_32").click(function() {
				$(this).addClass('active');
		});
		$("#parent_41").click(function() {
				$(this).addClass('active');
		});
		$("#parent_67").click(function() {
				$(this).addClass('active');
		});
		$("#parent_29").click(function() {
				$(this).addClass('active');
		});
		$("#parent_30").click(function() {
				$(this).addClass('active');
		});
		$("#parent_33").click(function() {
				$(this).addClass('active');
		});


	</script>
@endsection