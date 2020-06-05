@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header title">{{ __('Settings') }}</div>
                    <div class="card-body">
                        <form class="form-group" method="POST" action="{{ route('settings.update') }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="col-2">
                                    <h4>Age:</h4>
                                </div>
                                <div class="form-inline">
                                    <label for="from_age">From:</label>
                                    <div class="col-6">
                                        <input type="number" min="18" max="99" class="form-control" id="from_age"
                                               name="from_age"
                                               value="{{ old('from_age', setting()->get('from_age')) }}">
                                    </div>
                                    @error('from_age')
                                    <span class="text-danger" role="alert">
                                        <strong style="font-size: 12px">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-inline">
                                    <label for="to_age">To:</label>
                                    <div class="col-6">
                                        <input type="number" min="18" max="99" class="form-control" id="to_age"
                                               name="to_age"
                                               value="{{ old('to_age', setting()->get('to_age')) }}">
                                    </div>
                                    @error('to_age')
                                    <span class="text-danger" role="alert">
                                        <strong style="font-size: 12px">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-2">
                                    <h4>Gender:</h4>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="male" name="gender[]"
                                           value="male"
                                        {{ in_array('male', setting()->get('gender')) ? 'checked' : null }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="female" name="gender[]"
                                           value="female"
                                        {{ in_array('female', setting()->get('gender')) ? 'checked' : null }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                @error('gender')
                                <span class="text-danger" role="alert">
                                        <strong style="font-size: 12px">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
