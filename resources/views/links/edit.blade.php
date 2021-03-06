@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Create a new link</h2>
                    <form action="/dashboard/links/{{ $link->id }}" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Link Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->first('name') ? 'is-invalid':'' }}" placeholder="My Youtube channel" value="{{ $link->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="link">Link URL</label>
                                    <input type="text" name="link" class="form-control {{ $errors->first('link') ? 'is-invalid':'' }}" placeholder="https://mysite.com" value="{{ $link->link }}" required>
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit()">Delete</button>
                            </div>
                        </div>
                    </form>
                    <form id="delete-form" action="/dashboard/links/{{ $link->id }}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
