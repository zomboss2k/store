 <form action="" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                    <input type="text" class="form-control" placeholder="Tên sản phẩm" value="{{old('pro_name',isset($product->pro_name) ? ($product->pro_name): '' )}}" name="pro_name">
                        {{-- hien thi loi --}}
                        @if($errors->has('pro_name'))
                            <span class="error-text">
                                {{$errors->first('pro_name')}}
                            </span>
                         @endif
            </div> 
            <div class="form-group">
                <label for="name">Mô tả:</label>
                <textarea name="pro_description" class="form-control" id="" cols="30" rows="2" placeholder="Mô tả ngắn về sản phẩm" >{{old('pro_name',isset($product->pro_description)? ($product->pro_description): '')}}</textarea>
            </div>
          
            <div class="form-group">
                <label for="name">Nội dung chi tiết:</label>
                <textarea name="pro_content" class="form-control" id="" cols="30" rows="3" placeholder="Thông tin sản phẩm" >{{old('pro_name',isset($product->pro_content)? ($product->pro_content): '')}}</textarea>
            </div>
            <div class="form-group">
                    <label for="name">Meta title:</label>
                    <input type="text" class="form-control" placeholder="Meta title" value="{{old('pro_title_seo',isset($product->pro_title_seo)? ($product->pro_title_seo): '')}}" name="pro_title_seo">
            </div>    
            <div class="form-group">
                <label for="name">Meta description:</label>
                <input type="text" class="form-control" placeholder="Meta description" value="{{old('pro_description_seo',isset($product->pro_description_seo)? ($product->pro_description_seo): '')}}" name="pro_description_seo">
            </div>       
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">Danh mục sản phẩm:</label>
                <select name="pro_category_id" id="" class="form-control">
                    {{-- <option value="">-- Loại sản phẩm --</option> --}}
                    <!-- Lay loai san pham trong danh muc -->
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id :'') == $category->id ? "selected='select'":""}}  >{{$category->c_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                    <label for="name">Giá sản phẩm: (VNĐ)</label>
                    <input type="number" placeholder="Giá sản phẩm" class="form-control" value="{{old('pro_price',isset($product->pro_price) ? $product->pro_price :'0')}}" name="pro_price">
                    {{-- hien thi loi --}}
                    @if($errors->has('pro_price'))
                    <span class="error-text">
                        {{$errors->first('pro_price')}}
                    </span>
                    @endif
            </div>
            <div class="form-group">
                    <label for="pro_sale">Khuyến mãi: (%)</label>
                    <input type="number" placeholder="% giảm giá"  class="form-control" name="pro_sale" value="{{old('pro_sale',isset($product->pro_sale) ? $product->pro_sale :'0')}}" name="pro_sale">
            </div>
            {{-- Số lương sản phẩm --}}
            <div class="form-group">
                <label for="pro_number">Số lượng sản phẩm: (cái / bộ)</label>
                <input type="number" placeholder="Số lượng sản phẩm"  class="form-control" name="pro_number" value="{{old('pro_number',isset($product->pro_number) ? $product->pro_number :'0')}}" name="pro_number">
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh:</label>
                <input type="file" id="input_img" name="avatar" class="form-control" >
            </div>
            <div class="form-group">
                <img  id="out_img" src="{{asset('images/no_images.png')}}" alt="img" style="width: 80% ;height: 80%">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="hot">Nổi bật</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>

{{-- Nhúng ckeditor --}}
@section('script')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    // name pro_content
    CKEDITOR.replace('pro_content');
</script>
@stop