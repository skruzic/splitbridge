<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="BK Split"
                                                       width="35%"/></a>
</div>
<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        @foreach ($menu as $item)
            @if ($item->descendants->isEmpty())
                <li class="{{ $item->isActive() ? 'active' : '' }}"><a
                        href="{{ url($item->uri) }}">{{ $item->title }}</a></li>
            @else
                <li class="dropdown {{ $item->isActive() ? 'active' : '' }}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ $item->title }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @foreach ($item->descendants as $child)
                            <li><a href="{{ url($child->uri) }}">{{ $child->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
</div>
