<x-dashboard-master>

    @section('main')
    <form action="{{route('dashboard.category.update' , $category)}}" method="post" id="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-12">
            <div class="card">
                <h6 class="card-header text-capitalize">
                    <i class="fa fa-align-justify"></i>
                    Edit Category
                </h6>
                <div class="container">
                    <img src="{{asset($category->image)}}" alt="" class="img-thumbnail" style="width:35%; display:block">
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Image Category</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="fileinputid" class="form-control" name="image" type="file">
                        </div>
                    </div>
                    <div class="form-group " style="margin-top:2rem">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="parent">
                            <option value="0" @if ($category->parent === 0)
                                selected
                            @endif>Default Category</option>
                            @foreach ($categories as $cat)
                            <option value="{{$cat->id}}" @if ($category->parent === $cat->id)
                                selected
                            @endif>{{$cat->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-block">
                    <ul class="nav nav-tabs" role="tablist">
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
                            <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Category Title
                                _{{$key}}</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="posttitleid" class="form-control" name="{{$key}}[title]" type="text" value="{{$category->translate($key)->title}}">
                                </div>
                            </div>
                            <label class="form-control-label" style="margin-top:2rem;" for="postContentid">Category
                                Content</label>
                            <div class="controls">
                                <div class="input-group">
                                    <textarea id="postContentid" class="form-control" name="{{$key}}[content]"
                                        rows=25> {{$category->translate($key)->content}}"</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-primary btn-block " id="submit" style="margin-top:2rem;"
                                type="submit">update</button>
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

    </script>



    @endsection
</x-dashboard-master>
