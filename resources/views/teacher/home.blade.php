@extends('layouts.app')

@section('more-js')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}

                </div>
            @endif

            <div class="home">
                <div class="home__container">
                    <div class="home__title">
                        Xin chào: <span>{{ $user->name }}</span>
                    </div>

                    <teacher-home></teacher-home>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
