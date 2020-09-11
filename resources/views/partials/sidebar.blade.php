
 <div class="list-group margin-top-20 margin-bottom-20">
   @foreach(App\Category::orderby('id', 'asc')->where('parent_id', NULL)->get() as $parent)
    <a class="list-group-item list-group-item-action" href="{{route('category.show', $parent->id)}}" data-toggle="collapse" data-target="#coll-{{$parent->id}}">
      <img src="{{ asset('images/categories/' .$parent->image) }}" alt="" width="60px">
      {{$parent->name}}
    </a>
    <div id="coll-{{$parent->id}}" class="collapse
     @if(Route::is('category.show'))
      @if(App\Category::parentOrNot($parent->id, $categories->id))
       show
      @endif
     @endif
      ">
      <div class="child-rows">
        @foreach(App\Category::orderby('id', 'asc')->where('parent_id', $parent->id)->get() as $child)
        <a href="{{  route('category.show', $child->id) }}" class="list-group-item
         @if(Route::is('category.show'))
          @if($child->id == $categories->id)
           active
          @endif
          @endif
          ">
          <img src="{{ asset('images/categories/' .$child->image) }}" alt="" width="35px">
          {{$child->name}}
        </a>
       @endforeach
      </div>
    </div>
   @endforeach
 </div>
