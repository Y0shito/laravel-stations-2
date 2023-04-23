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
    @include('components.flashmessage')

    <div class="contents">
        <h2>{{ $movie->title }}</h2>
        <img src={{ $movie->image_url }} width="400">
        <p>ジャンル：{{ $movie->genre->name }}</p>
        <p>上映状況：{{ $movie->is_showing == true ? '上映中' : '上映予定' }}</p>
        <p>公開年：{{ $movie->published_year }}</p>
        <p>概要：{{ $movie->description }}</p>

        <table border="1">
            <tr>
                <th>公開日</th>
                <th>開始時間</th>
                <th>終了時刻</th>
            </tr>
            @foreach ($movie->schedules as $schedule)
                <tr>
                    <td>{{ $schedule->start_time->format('m/d') }}</td>
                    <td>{{ $schedule->start_time->format('H:i') }}</td>
                    <td>{{ $schedule->end_time->format('H:i') }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

<style>
    .contents {
        margin: 0px 150px;
    }
</style>

</html>
