    <div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">

        @foreach (Page::where('nav', '=', 1)->get() as $item)
          {{-- expr --}}
          @if($page->url == $item->url)
            <li class="active"> 
          @else
            <li>
          @endif
            <a href="{{$item->url}}">{{ $item->title }}</a>
          </li>
        @endforeach
      </ul>
    </div>