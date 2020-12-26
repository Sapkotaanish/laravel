@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tournament') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tournament.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" placeholder="Title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-7">
                                <textarea name="description" id="description" cols="30" rows="3" required autocomplete="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_at" class="col-md-3 col-form-label text-md-right">{{ __('Start Date') }}</label>

                            <div class="col-md-7">
                                <input id="start_at" type="date" class="form-control @error('start_at') is-invalid @enderror" name="start_at" value="{{ old('start_at') ?? date( 'Y-m-d', strtotime('tomorrow') ) }}" required>

                                @error('start_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_at" class="col-md-3 col-form-label text-md-right">{{ __('End Date') }}</label>

                            <div class="col-md-7">
                                <input id="end_at" type="date" class="form-control @error('end_at') is-invalid @enderror" name="end_at" value="{{ old('end_at') ?? date( 'Y-m-d', strtotime('tomorrow') ) }}" required>

                                @error('end_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="published" class="col-md-3 col-form-label text-md-right">{{ __('Published') }}</label>

                            <div class="col-md-7">
                                <select name="published" id="published" class="form-control @error('published') is-invalid @enderror">
                                        <option value="0" {{ old('published') == 0 ? 'selected' : ''}}>Unpublished</option>
                                        <option value="1" {{ old('published') == 1 ? 'selected' : ''}}>Published</option>
                                </select>

                                @error('published')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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
