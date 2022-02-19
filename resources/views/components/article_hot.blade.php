{{-- Bài viết nổi bật --}}
@if(isset($articleHot))
    @foreach($articleHot as $arHot)
    <div class="article_hot_item">
        <div class="article_img">
            <a href="{{route('get.detail.article',[$arHot->a_slug,$arHot->id])}}">
                <img src="{{pare_url_file($arHot->a_avatar_seo)}}" alt="">
            </a>
        </div>
        <div class="article_info">
            <h3 style="font-size: 14px; margin-top:10px; margin-bottom: 10px; "><i class="fa fa-chevron-right" aria-hidden="true"></i> <a href="{{route('get.detail.article',[$arHot->a_slug,$arHot->id])}}"> {{$arHot->a_name}}</a></h3>
            <p>{{$arHot->a_description}}</p>
            <p> <i class="fa fa-calendar" aria-hidden="true"></i> {{$arHot->created_at->format('d-m-Y')}}</p>
        </div>
    </div>
    @endforeach
@endif
