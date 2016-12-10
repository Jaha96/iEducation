@extends('go._layouts.master')

@section('script')
    <script>
        window.setup = {!! json_encode($setup) !!};
    </script>
    @if($setup['googleMap'] == true)
        <script src="https://maps.googleapis.com/maps/api/js"></script>
    @endif

    @if(config('go.tdebug'))
        <script type="text/javascript" src="http://localhost:3030/js/tp.js"></script>
    @else
        <script type="text/javascript" src="{{ URL::asset('js/tp.js')}}"></script>
    @endif
@endsection

@section('content')
    <div id="page">
        <header>
            <h1><i class="icon-user"></i> Хэрэглэгчид</h1>
            <div class="dash-title">
                {{ Auth::user()->name }}
            </div>
        </header>

        <section class="content">

            <div class="go-side-menu">
                <ul>
                    <li class="{{ Request::is('go/content/crud') ? 'active' : '' }}">
                        <a href="/go/content/crud">
                            <i class="icon-globe"></i>
                            <span>Хуудас мэдээ</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('go/content/banner') ? 'active' : '' }}">
                        <a href="/go/content/banner">
                            <i class="icon-puzzle"></i>
                            <span>Баннер</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="go-panel over content-card">
                <div id="go"></div>
            </div>
        </section>
    </div>
@endsection
