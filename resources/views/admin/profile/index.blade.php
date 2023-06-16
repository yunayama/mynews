@extends('layouts.admin')
@section('title', '登録済みプロフィールの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <a href="{{ route('profile.create') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('profile.index') }}" method="get">
                    <div class="form-group row mb-3">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                                <th width="10%">名前</th>
                                <th width="10%">性別</th>
                                <th width="20%">趣味</th>
                                <th width="20%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                                <tr>
                                    <th>{{ Str::limit($profile->name, 50)  }}</th>
                                    <th>{{ $profile->gender }}</th>
                                    <td>{{ Str::limit($profile->hobby, 100) }}</td>
                                    <td>{{ Str::limit($profile->introduction, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection