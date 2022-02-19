 <form action="" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="form-group">
                <label for="name">Tiêu đề bài viết:</label>
                <input type="text" class="form-control" placeholder="Tên bài viết" value="{{old('a_name',isset($article->a_name) ? ($article->a_name): '' )}}" name="a_name">
                        {{-- hien thi loi --}}
                        @if($errors->has('a_name'))
                            <span class="error-text">
                                {{$errors->first('a_name')}}
                            </span>
                         @endif
            </div> 
            <div class="form-group">
                <label for="name">Mô tả:</label>
                <textarea name="a_description" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả bài viết" >{{old('a_description',isset($article->a_description) ? ($article->a_description): '')}}</textarea>
                {{-- hien thi loi --}}
                @if($errors->has('a_description'))
                <span class="error-text">
                    {{$errors->first('a_description')}}
                </span>
                 @endif
            </div>
            <div class="form-group">
                <label for="name">Nội dung:</label>
                <textarea name="a_content" class="form-control" id="" cols="30" rows="3" placeholder="Nội dung bài viết" >{{old('a_title_seo',isset($article->a_content)? ($article->a_content): '')}}</textarea>
                {{-- hien thi loi --}}
                @if($errors->has('a_content'))
                <span class="error-text">
                    {{$errors->first('a_content')}}
                </span>
                 @endif
            </div>
            <div class="form-group">
                <label for="name">Avartar:</label>
                <input type="file" id="input_img" name="avatar" class="form-control" value="{{old('a_avatar_seo',isset($article->a_avatar_seo) ? ($article->a_avatar_seo): '' )}}" name="a_avatar_seo" >
            </div>
            <div class="form-group">
                <img  id="out_img" src="{{asset('images/no_images.png')}}" alt="img" style="width: 50% ;height: 50%" >
            </div>
            <div class="form-group">
                <label for="name">Meta title:</label>
                <input type="text" class="form-control" placeholder="Meta title" value="{{old('a_title_seo',isset($article->a_title_seo)? ($article->a_title_seo): '')}}" name="a_title_seo">
            </div>    
            <div class="form-group">
                <label for="name">Meta description:</label>
                <input type="text" class="form-control" placeholder="Meta description" value="{{old('a_description_seo',isset($article->a_description_seo) ? ($article->a_description_seo): '')}}" name="a_description_seo">
            </div>
            
            <button type="submit" class="btn btn-success">Lưu thông tin</button>      
        </div>
        
        
    </div>

    
</form>

{{-- Nhúng ckeditor --}}
@section('script')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    // name pro_content
    CKEDITOR.replace('a_content');
</script>
@stop