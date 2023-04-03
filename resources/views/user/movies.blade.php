<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StationMovies</title>
</head>

<body>
    @include('components.user.header')

    <div class="contents">
        <table>
            <tr>
                <th>タイトル</th>
                <th>画像</th>
            </tr>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td><img src={{ $movie->image_url }} width="100"></td>
                </tr>
            @endforeach
        </table>
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
