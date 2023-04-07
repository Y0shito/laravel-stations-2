<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画編集</title>
</head>

<body>
    @include('components.admin.header', ['title' => "編集/{$movie->title}"])
    @include('components.validationErrors')

    <div class="contents">
        {{ $movie->id }}
    </div>
</body>

<style>

</style>

</html>
