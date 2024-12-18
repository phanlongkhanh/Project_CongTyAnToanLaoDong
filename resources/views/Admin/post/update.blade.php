@extends('Layout.admin')
@section('title', 'Tạo Bài Viết Mới & SEO')

@section('meta_tags')
    <meta name="description" content="Trang tạo bài viết mới với SEO, tối ưu hóa nội dung và hình ảnh.">
    <meta name="keywords" content="tạo bài viết, SEO, blog, tối ưu hóa">
    <meta name="author" content="Admin Blog">
@endsection

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="container">
        <h1>Cập Nhật Bài Viết</h1>
        <form action="{{ route('update-post', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu đề (Title)</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}"
                    placeholder="Nhập tiêu đề bài viết" required>
            </div>


            <div class="form-group">
                <label for="keywords">Từ khóa SEO (Keywords)</label>
                <input type="text" id="keywords" name="keywords" class="form-control" value="{{ $post->keywords }}"
                    placeholder="Nhập từ khóa, cách nhau bởi dấu phẩy" required>
                <div id="keywords-container" class="keywords-container"></div>
            </div>

            <div class="form-group">
                <label for="slug">Đường dẫn (Slug)</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ $post->slug }}"
                    placeholder="đường dẫn thân thiện" required readonly>
            </div>

            <div class="form-group">
                <label for="image">Ảnh đại diện</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                @if ($post->image)
                    <img src="{{ asset('images/' . $post->image) }}" alt="Current Image" width="100" height="100">
                @endif
            </div>

            <div class="form-group">
                <label for="description">Mô tả (Meta Description)</label>
                <textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả không quá 200 từ !" required>{{ $post->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="id_category_post">Danh Mục</label>
                <select id="id_category_post" name="id_category_post" class="form-control" required>
                    <option value="">Chọn Danh Mục</option>
                    @foreach ($categories_posts as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $post->id_category_post) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" id="editor_js" name="content" rows="3"
                    placeholder="Viết nội dung chi tiết tại đây ...">{{ $post->content }}</textarea>
            </div>

            <div class="col-md-12">
                <div class="box-footer" style="text-align: center;">
                    <a href="{{ route('index-post') }}" class="btn btn-danger" title="Quay lại trang danh sách bài viết">
                        <i class="fa fa-undo"></i> Trở Lại
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <link rel="stylesheet" href="{{ asset('css/post/post.css') }}">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('jss/post/post.js') }}"></script>

    <script type="text/javascript">
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('editor_js', options);
    </script>


@endsection
