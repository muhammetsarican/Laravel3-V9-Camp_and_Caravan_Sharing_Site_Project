@foreach($children as $subcategory)
    <li class="has-children">
        <span class="arrow-collapse collapsed" data-toggle="collapse" data-target="#collapseItem0"></span>
        @if(count($subcategory->children))
            <a href="#" class="active nav-link">{{$subcategory->title}}</a>
            <ul class="collapse" id="collapseItem0">
                <li><a href="#" class="nav-link">@include('user.category_tree',['children'=>$subcategory->children])</a>
                </li>
            </ul>
            <hr>
        @else
            <a href="
            {{-- {{route('categorytreatments',['id'=>$subcategory->id])}} --}}
            ">{{$subcategory->title}}</a>
        @endif
    </li>
@endforeach