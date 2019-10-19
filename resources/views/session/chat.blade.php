@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="chat">
                <div class="chat__container">
                    <div class="chat__header">
                        {{ $session->content }}
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
                            <textarea name="content" placeholder="Nhập nội dung tin nhắn"></textarea>
                            <button type="submit">
                                Gửi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    