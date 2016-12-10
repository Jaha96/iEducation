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
            <h1><i class="icon-settings"></i> Тохиргоо</h1>
            <div class="dash-title">
                {{ Auth::user()->name }}
            </div>
        </header>

        <section class="content">

            <div class="go-side-menu">
                <ul>
                    <li class="{{ Request::is('go/system/info') ? 'active' : '' }}">
                        <a href="/go/system/info">
                            <i class="icon-info"></i>
                            <span>Ерөнхий мэдээлэл</span>
                        </a>
                    </li>

                    <li class="divider"></li>

                    <li class="{{ Request::is('go/system/language') ? 'active' : '' }}">
                        <a href="/go/system/language">
                            <i class="icon-globe"></i>
                            <span>Хэлний тохиргоо</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('go/system/translation') ? 'active' : '' }}">
                        <a href="/go/system/translation">
                            <i class="icon-shuffle"></i>
                            <span>Орчуулга</span>
                        </a>
                    </li>

                    <li class="divider"></li>

                    <li class="{{ Request::is('go/system/category') ? 'active' : '' }}">
                        <a href="/go/system/category">
                            <i class="icon-menu"></i>
                            <span>Ангилал</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('go/system/subcategory') ? 'active' : '' }}">
                        <a href="/go/system/subcategory">
                            <i class="icon-list"></i>
                            <span>Дэд ангилал</span>
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
