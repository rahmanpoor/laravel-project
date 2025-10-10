 <section class="sidebar-nav-sub-sub-wrapper py-1 px-1">
     @foreach ($subCategories as $subCategory)
         <section class="sidebar-nav-sub-sub-item" class="d-inline"><a
                 href="{{ route('customer.products', $subCategory->id) }}">{{ $subCategory->name }}
                 @if ($subCategory->children->count() > 0)
                     <i class="fa fa-angle-left"></i>
                 @endif
             </a>
         </section>
         @if ($subCategory->children)
             @include('customer.layouts.partials.sub-categories', [
                 'subCategories' => $subCategory->children,
             ])
         @endif
     @endforeach
 </section>
