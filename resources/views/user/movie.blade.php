<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $movie->title }}</title>
</head>

<body>
    @include('components.user.header')

    <div class="contents">
        {{ $movie->title }}
    </div>
</body>

<style>
    .contents {
        margin: 0px 150px;
    }
</style>

</html>
