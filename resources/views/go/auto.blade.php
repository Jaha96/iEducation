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
            <h1><i class="icon-wrench"></i> Сэлбэг бүртгэл</h1>
            <div class="dash-title">
                {{ Auth::user()->name }}
            </div>
        </header>

        <section class="content">

            <div class="go-side-menu">
                <ul>
                    <li class="{{ Request::is('go/auto/autoparts') ? 'active' : '' }}">
                        <a href="/go/auto/autoparts">
                            <i class="icon-wrench"></i>
                            <span>Сэлбэг</span>
                        </a>
                    </li>

                    <?php
                    if(Auth::user()->role_id != 6){

                    ?>
                    <li class="{{ Request::is('go/auto/members') ? 'active' : '' }}">
                        <a href="/go/auto/members">
                            <i class="icon-people"></i>
                            <span>Гишүүд</span>
                        </a>
                    </li>

                    <li class="divider"></li>
                    <li class="{{ Request::is('go/auto/category') ? 'active' : '' }}">
                        <a href="/go/auto/category">
                            <i class="icon-menu"></i>
                            <span>Үндсэн ангилал</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('go/auto/subcategory') ? 'active' : '' }}">
                        <a href="/go/auto/subcategory">
                            <i class="icon-list"></i>
                            <span>Дэд ангилал</span>
                        </a>
                    </li>

                    <li class="divider"></li>

                    <li class="{{ Request::is('go/auto/factory') ? 'active' : '' }}">
                        <a href="/go/auto/factory">
                            <i class="icon-badge"></i>
                            <span>Үйлдвэрлэгч</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('go/auto/model') ? 'active' : '' }}">
                        <a href="/go/auto/model">
                            <i class="icon-tag"></i>
                            <span>Модел</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('go/auto/color') ? 'active' : '' }}">
                        <a href="/go/auto/color">
                            <i class="icon-puzzle"></i>
                            <span>Өнгө</span>
                        </a>
                    </li>

                    <?php
                    }
                    if (Auth::user()->role_id == 6) {
                    ?>
                    <li>
                        <a href="/logout">
                            <i class="icon-power"></i>
                            <span>Гарах</span>
                        </a>
                    </li>
                    <?php
                     }
                    ?>


                </ul>
            </div>

            <div class="go-panel over content-card">
                <div id="go"></div>
            </div>
        </section>
    </div>
@endsection
