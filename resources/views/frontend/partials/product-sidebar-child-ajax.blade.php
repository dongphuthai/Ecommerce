
@foreach (App\Models\Category::orderBy('id', 'asc')->where('parent_id', $id)->get() as $child)
	<div class="child-item {{ ($id==41||$id==45)?'watches-item': 'mobile-item'}}" >
	    <a id="parent_{{ $child->id }}" href="{!! route('categories.show.ajax', $child->id) !!}" data-child-id="{{ $child->id }}" data-child-slug="{{ Illuminate\Support\Str::slug($child->name) }}" class="list-group-item list-group-item-action p-0 btn">
	      <img src="{!! asset('public/images/categories/'.$child->image) !!}" width="100%" style="height: auto; background: #fff;">
	    </a>
	</div>
@endforeach

@section('scripts')
	
@endsection