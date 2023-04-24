<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理者画面/スケジュール一覧</title>
</head>

<body>
    @include('components.admin.header', ['title' => 'スケジュール一覧'])

    <div class="contents">
        @foreach ($movies as $movie)
            <h4>
                <a href="{{ route('admin.movie', $movie->id) }}">
                    ID:{{ $movie->id }} {{ $movie->title }}
                </a>
            </h4>
            <img src={{ $movie->image_url }} width="100">

            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>開始時刻</th>
                    <th>終了時刻</th>
                    <th>作成日時</th>
                    <th>更新日時</th>
                </tr>
                @foreach ($movie->schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>{{ $schedule->created_at }}</td>
                        <td>{{ $schedule->updated_at }}</td>
                    </tr>
                @endforeach
            </table>
            <a href="{{ route('admin.schedule', $movie->id) }}">
                <p>「{{ $movie->title }}」のスケジュール管理へ</p>
            </a>
            <br>
        @endforeach
    </div>

</body>

<style>
    .contents {
        margin: 0px 150px;
    }

    a {
        text-decoration: none;
    }

    table {
        table-layout: auto;
    }

    th {
        white-space: nowrap;
    }
</style>

</html>
