  @extends('./employees/layout')
   <body>
    <div class="container mt-3">
        <form action="{{ route('employees.store') }}" method="post">
                <div class="row">
                    <div class="col-xl-8 p-4 m-auto shadow">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title text-info"> Add </h5>
                            </div>
                        <div class="card-body">

                        {{--  print success message  --}}
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                            @php
                                                Session::forget('success');
                                            @endphp
                                        </div>
                                    @endif

                                     <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                                                <div class="form-group" {{ $errors->has('first_name') ? 'has-error' : ''}}>
                                                    <label> First Name </label>
                                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{ old('first_name')}}">
                                                    {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                                                </div>
                                                <div class="form-group" {{ $errors->has('last_name') ? 'has-error' : ''}}>
                                                    <label> Last Name </label>
                                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{ old('last_name') }}">
                                                    {!! $errors->first('last_name', '<small class="text-danger">:message </small>') !!}
                                                </div>
                                                <div class="form-group" {{ $errors->has('email') ? 'has-error' : ''}}>
                                                    <label> Email </label>
                                                    <input type="text" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                                                    {!! $errors->first('email', '<small class="text-danger">:message </small>') !!}
                                                </div>
                                                <div class="form-group" {{ $errors->has('address') ? 'has-error' : ''}}>
                                                    <label> Address </label>
                                                    <input class="form-control" placeholder="Address" type="text" name="address" value="{{ old('address') }}">
                                                    {!! $errors->first('address', '<small class="text-danger">:message </small>') !!}
                                                </div>
                                                <div class="form-group" {{ $errors->has('dob') ? 'has-error' : ''}}>
                                                    <label> Date of Birth </label>
                                                    <input type="date" name="birthdate" placeholder="Date of Birth" class="form-control" value="{{ old('birthdate') }}">
                                                    {!! $errors->first('birthdate', '<small class="text-danger">:message</small>') !!}
                                                </div>
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success" name="submit"> Submit </button>
                                                    <a href=" {{ route('employees.index')}}" class="btn btn-danger"> Close <i class="fa fa-times-circle"></i></a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
