<x-dashboard-master>

    @section('main')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('dashboard.about.update' , $about)}}" method="POST" enctype="multipart/form-data">-
    @csrf
    @method('PUT')
        <div class="col-lg-12">
            <div class="card">
                <h6 class="card-header text-capitalize">
                    <i class="fa fa-align-justify"></i>
                     about us
                </h6>
                <div style="padding:0rem 1.5rem 1.5rem 1.5rem;">
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">About Us Image</label>
                    <div class="controls">
                        <div class="input-group d-flex">
                            <input id="posttitleid" class="form-control" placeholder="Logo Link" name="logo"
                                type="file">
                            <img src="{{asset($about->image)}}" style="width:200px;" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <h6 class="card-header text-capitalize">
                    <i class="fa fa-align-justify"></i>
                   About Content
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
                            <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">about Title
                                _{{$key}}</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="posttitleid" class="form-control" name="{{$key}}[title]" type="text"
                                        value="{{$about->translate($key)->title }}">
                                </div>
                            </div>
                            <label class="form-control-label" style="margin-top:2rem;" for="postContentid">About
                                Contant</label>
                            <div class="controls">
                                <div class="input-group">
                                    <textarea id="postContentid" class="form-control" name="{{$key}}[content]"
                                        rows=25>{{$about->translate($key)->content}}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-primary btn-block " id="submit" style="margin-top:2rem;"
                                type="submit">Updated</button>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-danger btn-block " style="margin-top:2rem;" onclick="resetFun(event)"
                                type="button" id="reset">Reset</button>
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
            let inputsText = document.querySelectorAll('input[type=text]');
            let inputsFile = document.querySelectorAll('input[type=file]');
            let inputEmail = document.querySelector('input[type=email]');
            let inputsTextarea = document.querySelectorAll('textarea');
            let inputArea = [...inputsText, ...inputsFile, inputEmail, ...inputsTextarea];
            e.preventDefault();
            for (let element of inputArea) {
                element.value = '';
            }
        }

    </script>

    @endsection
</x-dashboard-master>
