<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title', '一覧')

@section('content')
  <a href="{{ route('diary.create') }}" class="btn btn-primary btn-block">
    新規投稿
  </a>

  @foreach ($diaries as $diary)
    <div class="m-4 p-4 border border-primary">
      <p>{{$diary->title}}</p>
      <p>{{$diary->body}}</p>
      <p>{{$diary->created_at}}</p>

      <form action="{{ route('diary.destroy', ['id' => $diary->id ]) }}" method="POST" class="d-inline">
        @csrf
        @method('delete')
        <button class="btn btn-danger">削除</button>
      </form>

    </div>
  @endforeach

@endsection