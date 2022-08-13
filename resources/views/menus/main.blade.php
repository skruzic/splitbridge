<div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </a>
    </div>
    <nav id="navbar" class="navbar">
        <ul>
            @foreach ($menu->items as $item)
                @if (!$item['children'])

                    @if($item['type']=='page')
                        <li><a class="nav-link {{ request()->segment(1)==$item['data']['page_id']?'active':'' }}"
                               href="{{ url($item['data']['page_id']) }}">{{ $item['label'] }}</a></li>
                    @else
                        <li><a class="nav-link {{ request()->segment(1)==$item['data']['url']?'active':'' }}"
                               href="{{ url($item['data']['url']) }}">{{ $item['label'] }}</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ $item['label'] }} <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @foreach ($item['children'] as $child)

                                <li><a href="{{ url($child['data']['url']) }}">{{ $child['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
</div>
