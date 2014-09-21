    <div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">

        @foreach (Page::where('nav', '=', 1)->get() as $item)
          {{-- expr --}}
          @if($page->route == $item->route)
            <li class="active"> 
          @else
            <li>
          @endif
       		@if( $item->route[0] === '/')
            	<a href="{{$item->route}}">{{ $item->title }}</a>
            @else
            	<a href="/{{$item->route}}">{{ $item->title }}</a>
            @endif
          </li>
        @endforeach
      </ul>
    </div>