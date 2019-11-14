@extends('layout')

@section('title', '新規投稿')

@section('content')
    <section class="container m-5">
        <div class="row justify-content-center">
            <div class="col-8">

              @if($errors->any())

                <ul>
                  @foreach($errors->all() as $message)

                    <li class="alert alert-danger">{{$message}}</li>

                  @endforeach
                </ul>

              @endif

              <form action="{{ route('diary.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="title">タイトル</label>
                  <input type="text" class="form-control" id="title" name="title" 
                    value="{{ old('title') }}">
                </div>

                <div class="form-group">
                  <label for="body">本文</label>
                  <textarea id="body" class="form-control" name="body">{{ old('body') }}</textarea>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary">投稿</button>
                </div>

              </form>

            </div>
        </div>
    </section>
@endsection