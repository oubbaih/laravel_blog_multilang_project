<x-dashboard-master>

    @section('main')
    <form action="{{route('dashboard.post.store')}}" method="post" id="form">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <h6 class="card-header text-capitalize">
                    <i class="fa fa-align-justify"></i>
                    create post
                </h6>
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
                            <input type="hidden" name="author" value={{auth()->user()->id}}>
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
                                        rows=25></textarea>
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
