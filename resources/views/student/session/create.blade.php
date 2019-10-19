@extends('layouts.app')

@section('styles')
    <link href="https://www.jqueryscript.net/demo/Clean-jQuery-Date-Time-Picker-Plugin-datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
@endsection

@section('avatar')
<img
    width="40"
    height="40"
    src="https://images.viblo.asia/avatar-retina/9def6311-6903-4a08-b727-88568a31e525.jpg"
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
    class="d-md-none"
>
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

            <div class="session">
                <div class="session__container">
                    <form action='/student/sessions' method="POST">
                        <textarea placeholder="Bạn muốn học gì" name="content" class="session__content">
                        </textarea>
                        <div class='session__time'>
                            <input name='start_time' placeholder="Bắt đầu" type="text" id="start-time" class="form-control" >
                        </div>
                        <div class='session__time'>
                            <input name='end_time' placeholder="Kết thúc" type="text" id="end-time" class="form-control" >
                        </div>
                        <div class='session__price'>
                            <input name='min_bid' placeholder="Mức giá tối đa" type="number" class="form-control" >
                        </div>
                        <div class='session__price'>
                                <input name='max_bid' placeholder="Mức giá tối thiểu" type="number" class="form-control" >
                            </div>
                        <div class='session__price'>
                            <input name="location" placeholder="Địa chỉ" type="text" class="form-control" >
                        </div>
                        <div class="session__method">
                            <label class="radio">
                                <input type="radio" name="method">
                                Gặp mặt
                            </label>
                            <label class="radio">
                                <input type="radio" name="method">
                                Trực tuyến
                            </label>
                        </div>
                        <div class="session__action">
                            <button class="btn btn-primary" type="submit" >Tạo</button>
                            <a class="btn btn-danger" href="/student">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="https://www.jqueryscript.net/demo/Clean-jQuery-Date-Time-Picker-Plugin-datetimepicker/jquery.datetimepicker.js" defer></script>
    <script>
        $(document).ready(function (){
            $('#start-time').datetimepicker();
            $('#end-time').datetimepicker();
        })
    </script>
@endsection
