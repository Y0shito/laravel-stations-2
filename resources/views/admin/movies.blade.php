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
        <table>
            <tr>
                <th>ID</th>
                <th>映画タイトル</th>
                <th>画像URL</th>
                <th>公開年</th>
                <th>公開状況</th>
                <th>概要</th>
                <th>登録日時</th>
                <th>更新日時</th>
            </tr>

            @foreach ($movies as $movie)
                <tr>
                    <td>
                        <a href="{{ route('admin.movie', ['id' => $movie->id]) }}">
                            {{ $movie->id }}
                        </a>
                    </td>
                    <td>{{ $movie->title }}</td>
                    <td><img src={{ $movie->image_url }} width="100"></td>
                    <td>{{ $movie->published_year }}</td>
                    <td>{{ $movie->is_showing == true ? '上映中' : '上映予定' }}
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->created_at }}</td>
                    <td>{{ $movie->updated_at }}</td>
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
