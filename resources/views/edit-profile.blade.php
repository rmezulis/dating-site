@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header title">{{ __('Edit profile') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name"
                                           value="{{ old('first-name', $profile->first_name) }}"
                                           required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name"
                                           value="{{ old('last-name', $profile->last_name) }}"
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
                                    <input id="birthday" type="date" class="form-control" name="birthday" required
                                           value="{{ old('birthday', $profile->birthday) }}">
                                    @error('birthday')
                                    <span class="text-danger" role="alert">
                                        <strong style="font-size: 12px">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option disabled selected hidden>Choose...</option>
                                        <option value="male"
                                            {{ ($profile->gender == 'male') ? 'selected' : null }} >
                                            Male
                                        </option>
                                        <option value="female"
                                            {{ ($profile->gender == 'female') ? 'selected' : null }}>
                                            Female
                                        </option>
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
                                           value="{{old('country', $profile->country)}}"
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
                                    <textarea class="form-control" id="bio" name="bio"
                                              placeholder="Optional"
                                              rows="3">{{old('name', $profile->bio)}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">
                                {{ __('Save') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
