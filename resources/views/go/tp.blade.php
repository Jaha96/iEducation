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
        <script type="text/javascript" src="{{ URL::asset('shared/table-properties/js/tp.js')}}"></script>
    @endif
@endsection

@section('content')
    <div id="contentWrapper">
        <div class="innerWrapper">
            <header class="innerHeader">
                <h1>Удирдлагын хэсэг</h1>
                <div class="dashTitle">
                    {{ Auth::user()->name }}
                </div>
            </header>
            <div id="solar-tp"></div>
        </div>
    </div>
@endsection
