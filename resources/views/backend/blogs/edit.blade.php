@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Blog Update</h3>
            </div>
            <div class="box-body">
                <form action="{{route('blog.update',$blog -> id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @isset($blog -> blog_file)
                    <div class="form-group">
                        <label>Current Picture</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="images/blogs/{{ $blog -> blog_file }}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset

                    <div class="form-group">
                        <label>Choose picture</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="blog_file"  type="file" value="{{ $blog -> blog_file }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_title" value="{{ $blog -> blog_title }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_slug" value="{{ $blog -> blog_slug }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Context</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1"
                                              name="blog_content">{{ $blog -> blog_content }}</textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>

                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <label>Context</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select name="blog_status" class="form-control">
                                        <option {{ $blog -> blog_status == "1" ? "selected=''":""}} value="1">Aktif</option>
                                        <option {{ $blog -> blog_status == "0" ? "selected=''":""}} value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="old_file" value="{{$blog -> blog_file}}">


                            <div align="right" class="box-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>


                </form>
            </div>
        </div>
    </section>


@endsection
@section('css')@endsection
@section('js')@endsection
