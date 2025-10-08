@foreach ($categories as $category)
<span class="sidebar-nav-sub-item-title">
    <a href="{{ route('customer.products', $category->id) }}" class="d-inline">{{ $category->name }}</a>
    @if ($category->children->count() > 0)
    <i class="fa fa-angle-left"></i>
    @endif
</span>
@include('customer.layouts.partials.sub-categories', ['subCategories' => $category->children])
@endforeach
