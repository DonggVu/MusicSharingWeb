<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Upload</title>
    <link href="css/app.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container container-fluid">
    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <label class="col-md-3">Track Name: </label>
            <input type="text" name="name" class="col-md-4" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label class="col-md-3">Album Name: </label>
            <input type="text" name="album" class="col-md-4" value="{{ old('album') }}" required>
            @if ($errors->has('album'))
                <span class="help-block">
                    <strong>{{ $errors->first('album') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label class="col-md-3">Artist: </label>
            <input type="text" name="artist" class="col-md-4" value="{{ old('artist') }}" required>
            @if ($errors->has('artist'))
                <span class="help-block">
                    <strong>{{ $errors->first('artist') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label class="col-md-3">Price: </label>
            <input type="number" name="price" class="col-md-4" value="{{ old('price') }}" required>
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label class="col-md-3">Genre: </label>
            <select name="genre" class="col-md-4" value="{{ old('genre') }}">
                @foreach ($genre as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <label class="col-md-3">Select File: </label>
            <input type="file" name="trackUpload" accept="audio/*" class="col-md-4" required>
        </div>
        @if ($errors->has('trackUpload'))
            <span class="help-block">
                    <strong>{{ $errors->first('trackUpload') }}</strong>
                </span>
        @endif
        <div class="row">
            <label class="col-md-4"></label>
            <input type="submit" class="col-md-2" value="upload">
        </div>
    </form>
</div>
</body>
</html>