@foreach ($children as $subcategory)
    <li>
        @if (count($subcategory->children))
            <a href="#" class="nav-link">
                {{ $subcategory->title }}
            </a>
            <ul class="sub-menu">
                @include('user.category_tree', ['children' => $subcategory->children])
            </ul>
        @else
            <a href="
            {{-- {{route('categorytreatments',['id'=>$subcategory->id])}} --}}
            ">{{ $subcategory->title }}</a>
        @endif
    </li>
@endforeach
