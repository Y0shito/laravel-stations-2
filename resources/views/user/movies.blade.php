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
        <form method="GET" action="{{ route('movies') }}">
            <input type="text" name="keyword" placeholder="タイトルを入力" value="{{ request()->query('keyword') ?: '' }}">
            <input type="radio" name="is_showing" value=""
                {{ is_null(request()->query('is_showing')) ? 'checked' : '' }}>すべて
            <input type="radio" name="is_showing" value="0"
                {{ request()->query('is_showing') === '0' ? 'checked' : '' }}>上映予定
            <input type="radio" name="is_showing" value="1"
                {{ request()->query('is_showing') === '1' ? 'checked' : '' }}>上映中
            <button>検索</button>
        </form>

        <table>
            <tr>
                <th>タイトル</th>
                <th>画像</th>
                <th>公開年</th>
                <th>公開状況</th>
                <th>概要</th>
            </tr>

            @foreach ($movies as $movie)
                <tr>
                    <td>
                        <a href="{{ route('user.movie', $movie->id) }}">
                            {{ $movie->title }}
                        </a>
                    </td>
                    <td><img src={{ $movie->image_url }} width="100"></td>
                    <td>{{ $movie->published_year }}</td>
                    <td>{{ $movie->is_showing == true ? '上映中' : '上映予定' }}
                    <td>{{ $movie->description }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $movies->appends(request()->query())->links() }}
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

    .pagination {
        text-align: center;
    }

    .pagination li {
        display: inline-block;
    }
</style>

</html>
