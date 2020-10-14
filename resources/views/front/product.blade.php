@extends('layouts/nav_footer')

@section('content')
<section class="news">
    <div class="container">
        <h2 class="news_title">最新消息</h2>

        <div class="row news_lists">
            @foreach ($products as $product)

            <div class="col-md-4">
                <div class="news_list">
                    <h3>{{ $product->name}}</h3>
                    <h4>{{ $product->type}}</h4>
                    <img width="100%" src="{{ $product->image_url}}" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">{{ $product->text}}</p>
                    <a class="btn btn-success" href="news_info/{{ $product->id}}" role="button">點擊查看更多 &raquo;</a>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
@endsection


@section('css')
<link rel="stylesheet" href="./css/news.css">
@endsection
