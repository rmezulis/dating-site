@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header title">{{ __('Edit profile') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name"
                                           required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last-name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name"
                                           required
                                           autocomplete="family-name">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>
                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control" name="birthday" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option disabled selected hidden>Choose...</option>
                                        <option value="male"> Male</option>
                                        <option value="female"> Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                                <div class="col-md-6">
                                    <input id="country" type="text"
                                           class="form-control @error('country') is-invalid @enderror"
                                           name="country"
                                           required
                                           autocomplete="country-name">
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="bio" name="bio" placeholder="Optional"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="picture" name="picture" required>
                                <label class="custom-file-label" for="picture">Add new photo</label>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
