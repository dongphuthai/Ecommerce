@foreach (App\Models\Category::orderBy('id', 'asc')->where('parent_id', $id)->get() as $child)
	<div class="child-item mobile-item" >
	    <a id="child_{{ $child->id }}" href="the-loai/{{ $slug1 }}/{{ $child->slug }}" data-child-id="{{ $child->id }}" data-child-slug="{{ $child->slug }}" data-parent-slug="{{ $child->parent->slug }}" class="list-group-item list-group-item-action  @if(isset($id_child)){{ $child->id==$id_child?'active':'' }} @endif p-0">
	      <img src="{!! asset('public/images/categories/'.$child->image) !!}" width="100%" style="height: auto; background: #fff; padding:5px 0;">
	    </a>
	</div>
@endforeach
