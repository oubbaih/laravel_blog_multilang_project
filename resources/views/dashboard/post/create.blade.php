<x-dashboard-master>
    @section('styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

    @endsection
    @section('main')
    <form action="{{route('dashboard.post.store')}}" method="post" id="form" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <h6 class="card-header text-capitalize">
                    <i class="fa fa-align-justify"></i>
                    create post
                </h6>

                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="card-block">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image Post</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                    </div>
                    <div class="form-group " style="margin-top:2rem">
                        <label for="exampleFormControlSelect1">Categories</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            <option value="0">Default Category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <ul class="nav nav-tabs" role="tablist" style="margin-top:2rem">
                        @foreach (config('app.languages') as $key=>$lang)
                        <li class="nav-item">
                            <a class="nav-link @if ($loop->index == 0) active @endif" data-toggle="tab" href="#{{$key}}"
                                role="tab">{{$lang}}</i></a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach (config('app.languages') as $key=>$lang)
                        <div class="tab-pane fade @if ($loop->index == 0)
                            show active in
                             @endif" id="{{$key}}" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Post Title
                                _{{$key}}</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="posttitleid" class="form-control" name="{{$key}}[title]" type="text">
                                </div>
                            </div>
                            <label class="form-control-label" style="margin-top:2rem;" for="postContentid">Post
                                Content</label>
                            <div class="controls">
                                <div class="input-group">
                                    <textarea id="postContentid" class="form-control" name="{{$key}}[content]"
                                        rows="25"></textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-primary btn-block " id="submit" style="margin-top:2rem;"
                                type="submit">submit</button>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-danger btn-block " style="margin-top:2rem;" onclick="resetFun(event)"
                                type="button" id="reset">reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endsection
    @section('scripts')
    {{-- <script src="{{asset('js/ckeditor/ckeditor.min.js')}}"></script> --}}

    <script>
        function resetFun(e) {
            let inputs = document.querySelectorAll('input[type=text]');
            let textarea = document.querySelectorAll('textarea');
            let inputArea = [...inputs, ...textarea];
            e.preventDefault();
            for (let element of inputArea) {
                element.value = '';
            }
        }
        var allEditors = document.querySelectorAll('#postContentid');
        for (i = 0; i <= allEditors.length; i++) {
            ClassicEditor
                .create(allEditors[i]);
        }

    </script>

    @endsection
</x-dashboard-master>
