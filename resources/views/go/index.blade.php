@extends('go._layouts.master')

@section('content')
    <div id="contentWrapper">
        <div class="innerWrapper">
            <header class="innerHeader">
                <h1>Удирдлагын хэсэг</h1>
                <div class="dashTitle">
                    {{ Auth::user()->name }}
                </div>
            </header>

            <div class="innerWrapper-250">
                <div class="card" id="analytics"></div>
            </div>
            <div class="rightPanel">

            </div>
        </div>
    </div>
@endsection