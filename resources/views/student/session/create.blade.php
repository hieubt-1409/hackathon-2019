@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/student/session/create.css') }}" rel="stylesheet">
    <link href="https://www.jqueryscript.net/demo/Clean-jQuery-Date-Time-Picker-Plugin-datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
    <style>
        .session {
            width: 100%;
            max-width: 400px;
            min-height: 600px;
            margin: auto;
            border: 1px solid #cacaca;
            background: white;
            border-radius: 3px;
        }

        .session__container {
            padding: 15px;
        }

        .session__time {
            display: flex;
        }
        .session__content  {
            width: 100%;
        }
        .session__price {
            display: flex;
        }
        .session__action {
            display: flex;
            justify-content: center;
        }
    </style>
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
                            <input name='end_time' placeholder="Kết thúc" type="text" id="end-time" class="form-control" >
                        </div>
                        <div class='session__price'>
                            <input name='min_bid' placeholder="Min giá" type="number" class="form-control" >
                            <input name='max_bid' placeholder="Max giá" type="number" class="form-control" >
                        </div>
                        <div class='session__price'>
                            <input name="location" placeholder="Địa chỉ" type="text" class="form-control" >
                        </div>
                        <div class="session__method">
                            <label class="radio">
                            <input type="radio" name="method">
                            Direct
                            </label>
                            <label class="radio">
                            <input type="radio" name="method">
                            Video call
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
