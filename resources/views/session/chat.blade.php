@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="chat">
                <div class="chat__container">
                    <div class="chat__header">
                        <div class="chat__back">
                            <a class="btn btn-danger" href="{{ asset('/student') }}">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="chat__title">
                            {{ $session->content }}
                        </div>
                    </div>
                    <div class="chat__content">
                        @foreach ($messages as $message)
                            <div class="chat__item">
                                <div class="chat__item--container">
                                    <div class="chat__item--header">
                                        <span class="chat__item--name">
                                            {{ $message->user->name }}
                                        </span>
                                        <span class="chat__item--time">
                                            {{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="chat__item--content">
                                        {{ $message->content }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="chat__footer">
                        <form action="" method="post">
                            <div class="chat__footer--button">
                                <button type="submit" class="btn btn-success">
                                    Gửi
                                </button>
                            </div>
                            <div class="chat__footer--textarea">
                                <textarea name="content" placeholder="Nhập nội dung tin nhắn"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    