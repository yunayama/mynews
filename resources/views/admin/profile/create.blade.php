@extends('layouts.admin')
@section('title', 'プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成</h2>
                <form action="{{ route('profile.create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row mb-2">
                        <label class="col-md-2" for="title">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-md-2" for="body">性別</label>
                        <div class="col-md-10">
                        <input type="radio" name="gender" value="male">男性
                        <input type="radio" name="gender" value="female">女性    
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-md-2" for="title">趣味</label>
                        <div class="col-md-10">
                        <textarea class="form-control" name="hobby" rows="3">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-md-2" for="body">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
