@extends('layouts.app')

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
                    <div class="home__balance">
                        <span class="home__balance--number">
                            {{ $user->balance }} (VNĐ)
                        </span>
                        <span class="home__balance--plus">
                            +
                        </span>
                    </div>
                    <div class="home__learn-now">
                        LEARN NOW
                    </div>
                    @if ($user->type == 'student')
                        
                    @else
                        teacher                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
