{{-- @foreach ($children as $subcategory)
    <div class="mother">
        <div class="alt-menu alt-1">
            @if (count($subcategory->children))
                <label for="acilirmenu">{{ $subcategory->title }}</label><input type="checkbox" id="acilirmenu" />
                <div id="menum">
                    @include('user.category_tree_filter', ['children' => $subcategory->children])
                </div>
            @else
                <a href="
                {{route('categorytreatments',['id'=>$subcategory->id])}}
                ">{{ $subcategory->title }}</a>

            @endif
        </div>
    </div>
@endforeach --}}
@foreach ($children as $subcategory)
    <li>
        @if (count($subcategory->children))
            <a href="#" class="nav-link">
                {{ $subcategory->title }}<input type="checkbox" id="acilirmenu" />
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

