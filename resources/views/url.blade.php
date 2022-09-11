<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Upload</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <link rel="stylesheet" href="/custom.css">

    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-10 offset-md-1">
                    <a href="/" class="btn btn-outline-success">Main Page</a>
                </div>
            </div>            
            <div class="row mt-5">
                <div class="col-md-10 offset-md-1">
                    <form method="post" action="{{ route('backend.doUrl') }}">
                        {{ csrf_field() }}
                        <h3 class="text-center">Upload Photo Here</h3>

                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <a href="{{ route('backend.home') }}" class="btn btn-outline-primary w-150">
                                Upload a File
                            </a>
                            <a href="{{ route('backend.url') }}" class="btn btn-primary w-150">
                                By URL
                            </a>
                        </div>

                        @if (session()->has('alert'))
                            @include('_alert', ['alert' => session('alert'), ])
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group mt-3">
                            <label for="js-url">Stock Url</label>
                            <input type="text" class="form-control" id="js-url" name="url" placeholder="Input URL..." value="{{ old('url') }}">
                        </div>  

                        <div class="form-group">
                            <label for="js-provider">Provider</label>
                            <select class="form-control" id="js-provider" name="provider">
                                <option value="">=== Choose Provider ===</option>
                                <option value="Unsplash" {{ old("provider") == 'Unsplash' ? 'selected' : '' }}>Unsplash</option>
                                <option value="Shutterstock" {{ old("provider") == 'Shutterstock' ? 'selected' : '' }}>Shutterstock</option>
                                <option value="Pixabay" {{ old("provider") == 'Pixabay' ? 'selected' : '' }}>Pixabay</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="js-tags">Tags</label>
                            <input type="text" class="form-control" id="js-tags" name="tags" placeholder="Input tags..." value="{{ old('tags') }}">
                            <i class="color-gray">Input the tags separating by comma.</i>
                        </div>

                        <button class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
