
<div style="display: flex;" class="text-center parent-item">
  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
    <a id="parent_{{ $parent->id }}" data-parent-id="{{ $parent->id }}" data-parent-slug="{{ $parent->slug }}" href="{{ route('categories.show.parent',$parent->slug) }}" class="list-group-item list-group-item-action p-0  @if(isset($id)){{ $parent->id==$id?'active':'' }}@endif">
      <img src="{!! asset('public/images/categories/'.$parent->image) !!}" width="25" style="padding-top: 3px;">
      <p class="mb-0 hiddentitle" style="font-size: 14px; ">{{ $parent->name }}</p>
    </a>
  @endforeach
</div>
