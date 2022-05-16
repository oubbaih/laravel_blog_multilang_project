<x-dashboard-master>

  @section('main')
  <div style="padding:2rem;">
  <h5 class=" text-capitalize">create post</h5>
  <form action="{{route('dashboard.post.store')}}" method="post">
    @csrf
    <ul class="nav nav-tabs" role="tablist">
      @foreach (config('app.languages') as $key=>$lang)
              <li class="nav-item">
                  <a class="nav-link @if ($loop->index == 0) active @endif" data-toggle="tab" href="#{{$key}}" role="tab">{{$lang}}</i></a>
              </li>
      @endforeach
      </ul>
      <div class="tab-content" id="pills-tabContent">
        @foreach (config('app.languages') as $key=>$lang)
              <div  class="tab-pane fade @if ($loop->index == 0)
                  show active in
              @endif" 
                  id="{{$key}}" role="tabpanel"
                  aria-labelledby="pills-home-tab" 
                  tabindex="0">
                  <input type="hidden" name="author" value={{auth()->user()->id}}>
                    <label class="form-control-label "  style="margin-top:2rem;" for="posttitleid">Post Title _{{$key}}</label>
                    <div class="controls">
                      <div class="input-group">
                        <input id="posttitleid" class="form-control" name="{{$key}}[title]" type="text">
                      </div>
                    </div>
                    <label class="form-control-label" style="margin-top:2rem;" for="postContentid">Post Content</label>
                    <div class="controls">
                      <div class="input-group">
                        <textarea id="postContentid" class="form-control" name="{{$key}}[content]" rows=5></textarea>
                      </div>
                    </div>
              </div>
            
        @endforeach
      </div>
      <button class="btn btn-primary"  style="margin-top:2rem;" type="submit">submit</button>
    </form>
  </div>
  @endsection

</x-dashboard-master>
