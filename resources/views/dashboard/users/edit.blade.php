<x-dashboard-master>
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-x-auto pull-xs-none vamiddle" style="width:50%">
            <div class="card-group ">
                <div class="card p-a-2">
                <div class="card-header" style="margin-bottom: 1rem;">Edit User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.user.update' , $user) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3" style="margin-bottom: 1rem;">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-bottom: 1rem;">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-bottom: 1rem;">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3" style="margin-bottom: 1rem;">
                            <label  class="col-md-4 col-form-label text-md-end">Status</label>

                            <div class="col-md-8">
                                <select class="form-control" name="status">
                                    <option value="admin"  @if ($user->status == 'admin')
                                        selected
                                    @endif >Admin</option>
                                    <option value="writer" @if ($user->status == 'writer')
                                        selected
                                    @endif >Writer</option>
                                    <option>No Status</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0" style="margin-bottom: 1rem;">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Update 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection


</x-dashboard-master>