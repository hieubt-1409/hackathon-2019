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
                    @if ($currentSession)
                        <div class="home__current-session">
                            <div class="row">
                                <div class="row__label">
                                    Nội dung
                                </div>
                                <div class="row__content">
                                    {{ $currentSession->content }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="row__label">
                                    Bắt đầu
                                </div>
                                <div class="row__content">
                                    {{ $currentSession->start_time }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="row__label">
                                    Kết thúc
                                </div>
                                <div class="row__content">
                                    {{ $currentSession->end_time }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="row__label">
                                    Mức giá tối thiểu
                                </div>
                                <div class="row__content">
                                    {{ $currentSession->min_bid }} (VNĐ)
                                </div>
                            </div>
                            <div class="row">
                                <div class="row__label">
                                    Mức giá tối đa
                                </div>
                                <div class="row__content">
                                    {{ $currentSession->max_bid }} (VNĐ)
                                </div>
                            </div>
                            <div class="row">
                                <div class="row__label">
                                    Địa điểm
                                </div>
                                <div class="row__content">
                                    {{ $currentSession->location }}
                                </div>
                            </div>        
                        </div>
                    @else
                        <div class="home__learn-now">
                            <a href="{{ url('/student/sessions/create') }}">
                                ĐẶT LỊCH HỌC NGAY
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
