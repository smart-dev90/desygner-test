<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top: 100px;">
                <div class="col-md-4 offset-md-1">
                    <label><i>I would like to open Frontend</i></label>
                    <a href="{{ route('frontend.home') }}" class="btn btn-primary btn-block">Frontend</a>
                </div>

                <div class="col-md-4 offset-md-1">
                    <label><i>I would like to open Backend</i></label>
                    <a href="{{ route('backend.home') }}" class="btn btn-success btn-block">Backend</a>
                </div>
            </div>
        </div>
    </body>
</html>
