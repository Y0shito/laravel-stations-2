<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $schedule->movie->title }}/スケジュール編集</title>
</head>

<body>
    @include('components.admin.header', ['title' => "{$schedule->movie->title}/スケジュール編集"])
    @include('components.validationErrors')
    @include('components.flashmessage')

    <div class="contents">
        <h2>{{ $schedule->movie->title }}</h2>
        <img src={{ $schedule->movie->image_url }} width="400">

        <form method="POST" action="{{ route('admin.schedule.update', $schedule->id) }}">
            @method('PATCH')
            @csrf

            <input type="hidden" name="movie_id" value="{{ $schedule->movie->id }}">
            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">

            <p>スケジュールID：{{ $schedule->id }}</p>
            <div>
                <label>開始日付
                    <input type="date" name="start_time_date" value="{{ $schedule->start_time->format('Y-m-d') }}">
                </label>
            </div>

            <div>
                <label>開始時間
                    <input type="time" name="start_time_time" value="{{ $schedule->start_time->format('H:i') }}">
                </label>
            </div>

            <div>
                <label>終了日付
                    <input type="date" name="end_time_date" value="{{ $schedule->end_time->format('Y-m-d') }}">
                </label>
            </div>

            <div>
                <label>終了時間
                    <input type="time" name="end_time_time" value="{{ $schedule->end_time->format('H:i') }}">
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
