<!-- layout.blade.phpを読み込む -->
@extends('layouts.app')

@section('title', '一覧')

@section('content')

  <div class="text-center">
    <a href="{{ route('diary.create') }}" class="btn btn-primary ">
      新規投稿
    </a>
  </div>
  

  @foreach ($diaries as $diary)
    <div class="m-4 p-4 border border-primary">
      <p>{{$diary->title}}</p>
      <p>{{$diary->body}}</p>
      <p>{{$diary->created_at}}</p>
      <p>{{$diary->user->name}}</p>

	  {{-- Auth::check() ： ログインしていたらtrue, 他はfalse --}}
      @if (Auth::check() && $diary->user_id == Auth::user()->id)
        <a href="{{ route('diary.edit', ['id' => $diary->id]) }}" class="btn btn-success">編集</a>

        <form action="{{ route('diary.destroy', ['id' => $diary->id ]) }}" method="POST" class="d-inline">
          @csrf
          @method('delete')
          <button class="btn btn-danger">削除</button>
        </form>
      @endif
      <div class="mt-3 ml-3">

        @if (Auth::check() && $diary->likes->contains(function ($user) {
          return $user->id === Auth::user()->id;
        }))
          {{-- ログインしている かつ この日記にいいねしている場合 --}}
          <i class="fas fa-heart fa-lg text-danger js-dislike"></i>
        @else
          {{-- いいねしていない場合 --}}
          <i class="far fa-heart fa-lg text-danger js-like"></i>
        @endif

        <input type="hidden" class="diary-id" value="{{ $diary->id }}">
        <span class="js-like-num">{{ $diary->likes->count() }}</span>
      </div>

    </div>
  @endforeach

@endsection