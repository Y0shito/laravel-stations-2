<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理者画面</title>
</head>

<body>
    @include('components.admin.header', ['title' => '映画一覧'])

    <div class="contents">
    </div>
</body>

<style>
    .contents {
        margin: 0px 150px;
    }

    table {
        table-layout: auto;
    }

    th {
        white-space: nowrap;
    }
</style>

</html>
