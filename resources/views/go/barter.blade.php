@extends('go._layouts.master')

@section('content')
    <div id="contentWrapper">
        <div class="innerWrapper">
            <header class="innerHeader">
                <h1>Хэрэглэгчид</h1>
                <div class="dashTitle">
                    {{ Auth::user()->name }}
                </div>
            </header>
            <div class="side-menu col-sm-12 col-md-4 col-lg-2">
                <ul>
                    <li>
                        <a href=/go/barter/price"> Үнэ </a>
                    </li>
                    <li>
                        <a href="#"> Бараа </a>
                    </li>
                </ul>                
            </div>
            <div class="col-sm-12 col-md-8 col-lg-10 go-panel over content-card">
                <div id="solar-tp"></div>
            </div>
        </div>
    </div>
@endsection

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
