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

                    </div>
                    @if ($user->type == 'student')
                        
                    @else
                        teacher                        
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
