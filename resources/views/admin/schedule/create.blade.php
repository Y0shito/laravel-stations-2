<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $movie->title }}/スケジュール作成</title>
</head>

<body>
    @include('components.admin.header', ['title' => "{$movie->title}/スケジュール作成"])
    @include('components.validationErrors')
    @include('components.flashmessage')

    <div class="contents">
        <h2>{{ $movie->title }}</h2>
        <img src={{ $movie->image_url }} width="400">

        <form method="POST" action="{{ route('admin.schedule.store', $movie->id) }}">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">

            <div>
                <label>開始日付
                    <input type="date" name="start_time_date" value="{{ old('start_time_date') }}">
                </label>
            </div>

            <div>
                <label>開始時間
                    <input type="time" name="start_time_time" value="{{ old('start_time_time') }}">
                </label>
            </div>

            <div>
                <label>終了日付
                    <input type="date" name="end_time_date" value="{{ old('end_time_date') }}">
                </label>
            </div>

            <div>
                <label>終了時間
                    <input type="time" name="end_time_time" value="{{ old('end_time_time') }}">
                </label>
            </div>

            <button>確定</button>
        </form>
    </div>

</body>

<style>
    .contents {
        margin: 0px 150px;
    }
</style>

</html>
