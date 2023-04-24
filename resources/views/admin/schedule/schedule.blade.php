<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $movie->title }}/スケジュール一覧</title>
</head>

<body>
    @include('components.admin.header', ['title' => "{$movie->title}/スケジュール一覧"])
    @include('components.flashmessage')

    <div class="contents">
        <h2>{{ $movie->title }}</h2>
        <img src={{ $movie->image_url }} width="400">
        <p>ID：{{ $movie->id }}</p>
        <p>公開年：{{ $movie->published_year }}</p>
        <p>公開状況：{{ $movie->is_showing == true ? '上映中' : '上映予定' }}</p>
        <p>概要：{{ $movie->description }}</p>
        <p>作成日：{{ $movie->created_at }}</p>
        <p>更新日：{{ $movie->updated_at }}</p>

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
                    <td>
                        <form method="GET">
                            <button>
                                編集
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.schedule.delete', $schedule->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return articleDelete();">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
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

<script>
    'use strict';
    const articleDelete = () => {
        var ret = confirm("削除を実行しますか？");
        return ret;
    }
</script>

</html>
