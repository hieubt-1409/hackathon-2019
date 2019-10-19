@extends('layouts.app')

@section('avatar')
<img
    width="40"
    height="40"
    src="teacher_avatar.png"
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
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

            <el-card>
                <h4 class="m-0">Xin chào <b>{{ $user->name }}</b></h4>
            </el-card>

            <teacher-home></teacher-home>
        </div>
    </div>
</div>
@endsection
