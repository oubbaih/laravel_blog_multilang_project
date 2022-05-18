<x-dashboard-master>
    @section('main')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-12">
            <div class="card">

                <h6 class="card-header text-capitalize">
                    <i class="fa fa-align-justify"></i>
                    Website Social Media Settings
                </h6>
                <div style="padding:0rem 1.5rem 1.5rem 1.5rem;;">
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">FaceBook</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="posttitleid" class="form-control" placeholder="Facebook Link" name="facebook"
                                type="text">
                        </div>
                    </div>
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Instagram</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="posttitleid" class="form-control" placeholder="Instagram Link" name="instagram"
                                type="text">
                        </div>
                    </div>
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Twitter</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="posttitleid" class="form-control" placeholder="Twitter Link" name="iwitter"
                                type="text">
                        </div>
                    </div>
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Youtube</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="posttitleid" class="form-control" placeholder="Youtube Link" name="youtube"
                                type="text">
                        </div>
                    </div>
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">TikTok</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="posttitleid" class="form-control" placeholder="TikTok Link" name="tikTok"
                                type="text">
                        </div>
                    </div>
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Logo</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="posttitleid" class="form-control" placeholder="Logo Link" name="logo"
                                type="file">
                        </div>
                    </div>
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Favicon</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="posttitleid" class="form-control" placeholder="Favicon Link" name="favicon"
                                type="file">
                        </div>
                    </div>
                    <label class="form-control-label " style="margin-top:2rem;" for="posttitleid">Email</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="posttitleid" class="form-control" placeholder="Email Link" name="gmail"
                                type="email">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <h6 class="card-header text-capitalize">
                    <i class="fa fa-align-justify"></i>
                    Website General Settings
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
            let inputsText = document.querySelectorAll('input[type=text]');
            let inputsFile = document.querySelectorAll('input[type=file]');
            let inputEmail = document.querySelector('input[type=email]');
            let inputsTextarea = document.querySelectorAll('textarea');
            let inputArea = [...inputsText, ...inputsFile , inputEmail , ...inputsTextarea];
            e.preventDefault();
            for (let element of inputArea) {
                element.value = '';
            }
        }

    </script>

    @endsection
</x-dashboard-master>
