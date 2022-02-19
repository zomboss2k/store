 <form action="" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="form-group">
                <label for="name">Tiêu đề trang:</label>
                <input type="text" class="form-control" required placeholder="Tiêu đề trang" value="{{old('ps_name',isset($page->ps_name) ? ($page->ps_name): '' )}}" name="ps_name">     
            </div>

            <div class="form-group">
                <label for="name">Chọn trang:</label>
                <select name="ps_type" class="form-control">
                    <option value="1">Về chúng tối</option>
                    <option value="2">Thông tin giao hàng</option>
                    <option value="3">Chính sách bảo mật</option>
                    <option value="4">Điều khoản sử dụng</option>                   
                </select>     
            </div> 

            <div class="form-group">
                <label for="name">Nội dung:</label>
                <textarea name="ps_content" required class="form-control" id="ps_content" cols="30" rows="3" placeholder="Nội dung page" >{{old('ps_name',isset($page->ps_content)? ($page->ps_content): '')}}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Lưu lại</button>      
        </div>
    </div>    
</form>
{{-- Nhúng ckeditor --}}
@section('script')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    // name ps_content
    CKEDITOR.replace('ps_content');
</script>
@stop