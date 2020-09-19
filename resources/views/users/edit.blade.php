@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Settings</h2>
                    <form action="/dashboard/settings" method="post">
                        @if(session('success'))
                            <div class="valid-feedback alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="background_color">Background Color</label>
                                    <input type="text" name="background_color"
                                           class="form-control {{ $errors->first('background_color') ? 'is-invalid':'' }}"
                                           placeholder="#FFFFFF" value="{{ $user->background_color }}" required>
                                    @error('background_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="text_color">Text Color</label>
                                    <input type="text" name="text_color" class="form-control {{ $errors->first('text_color') ? 'is-invalid':'' }}"
                                           placeholder="#FED123" value="{{ $user->text_color }}" required>
                                    @error('text_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button type="submit"
                                        class="btn btn-primary {{ session('success') ? 'is-valid':'' }}">Update</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
