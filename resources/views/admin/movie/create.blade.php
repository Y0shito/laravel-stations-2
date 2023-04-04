<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin_movies_id.css') }}">
    <title>管理者画面/映画新規登録</title>
</head>

<body>
    @include('components.admin.header', ['title' => "映画新規登録"])

    <div class="contents">
    </div>
</body>

<style>
    .contents {
        margin: 0px 150px;
    }
</style>

</html>
