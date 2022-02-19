{{-- Dnh sách bài viết khac --}}
@if(isset($articles))
    @foreach($articles as $article)
        <div class="article" style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #838383; display: flex;" >
            <div class="ariicle_avatar">
                <a href="{{route('get.detail.article',[$article->a_slug,$article->id])}}">
                    <img src="{{ pare_url_file($article->a_avatar_seo)}}" style="width: 200px;  height: 120px;" alt="">
                </a>
            </div>
            <div class="ariicle_info" style="width: 80%; margin-left: 20px;">
                <h2 style="font-size: 14px; "><a href="{{route('get.detail.article',[$article->a_slug,$article->id])}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> {{$article->a_name}}</a></h2>
                <p style="font-size: 13px; ">{{$article->a_description}}</p>
                <p style="font-size: 13px; "><i class="fa fa-calendar" aria-hidden="true"></i> <span>{{$article->created_at}}</span></p>
            </div>
        </div>
    @endforeach
        {{-- Hiện thị phân trang --}}
        {!! $articles->links()!!}

@endif
                