<x-layouts.base>
    <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                Post Create
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" id="title">
                </div>

                <div class="form-group">
                    <label>Url Key</label>
                    <input type="text" class="form-control" name="slug" placeholder="Slug" id="slug">
                </div>

                <div class="form-group">
                    <label>Categories</label>
                    <select class="form-control" name="categories[]" id="categories" multiple="multiple">
                        <option></option>
                        @foreach($categories as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class=form-control name="image">
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Published</label>
                    <select class="form-control" name="published">
                        @foreach(\App\Models\Post::status as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <select class="form-control" name="tags[]" id="tags" multiple="multiple">
                        <option></option>
                        @foreach($tags as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Authors</label>
                    <select class="form-control" name="authors[]" id="authors" multiple="multiple">
                        <option></option>
                        @foreach($authors as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    @section('css')
        <link rel="stylesheet" href="{{asset('vendor/select2/dist/css/select2.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('modules/select2-theme-bootstrap4/dist/select2-bootstrap.min.css')}}"/>
    @endsection

    @section('scripts')
        <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}" referrerpolicy="origin"></script>
        <script>
            function slug(title) {
                let slug;
                //Convert string to lower case
                slug = title.toLowerCase();
                //Replace string
                slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
                slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
                slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
                slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
                slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
                slug = slug.replace(/??|???|???|???|???/gi, 'y');
                slug = slug.replace(/??/gi, 'd');
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                slug = slug.replace(/ /gi, "-");
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //Output slug
                return slug;
            }

            tinymce.init({
                selector: 'textarea#body', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });

            $(document).ready(function () {
                $('#categories').select2({
                    theme: "bootstrap"
                });
                $('#tags').select2({
                    theme: "bootstrap"
                });
                $('#authors').select2({
                    theme: "bootstrap"
                });
            });

            $("#title").on("input", function () {
                $('#slug').val(slug($(this).val()));
            });
        </script>
    @endsection
</x-layouts.base>
