<x-dashboard-master>
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-x-auto pull-xs-none vamiddle" style="width:50%">
            <div class="card-group ">
                <div class="card p-a-2">
                <div class="card-header" style="margin-bottom: 1rem;">View Message</div>
                <div class="card-body">
                        <div class="row mb-3" style="margin-bottom: 1rem;">
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control"  value="{{$contact->name}}"  >
                            </div>
                        </div>
                        <div class="row mb-3" style="margin-bottom: 1rem;">
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control"  value="{{$contact->email}}"  >
                            </div>
                        </div>
                        <div class="row mb-3" style="margin-bottom: 1rem;">
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control"  value="{{$contact->phone}}"  >
                            </div>
                        </div>
                        <div class="row mb-3" style="margin-bottom: 1rem;">
                            <div class="col-md-8">
                                <textarea id="name" type="text" class="form-control">{{$contact->message}}</textarea>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection


</x-dashboard-master>