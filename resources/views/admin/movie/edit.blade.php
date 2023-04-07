<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画編集</title>
</head>

<body>
    @include('components.admin.header', ['title' => "編集/{$movie->title}"])
    @include('components.flashmessage')
    @include('components.validationErrors')

    <div class="contents">
        <form method="POST" action="{{ route('admin.movie.update', $movie->id) }}">
            @csrf
            @method('PATCH')

            <ul>
                <li>
                    <label>ID：{{ $movie->id }}</label>
                    <input type="hidden" name="id" value="{{ $movie->id }}">
                </li>

                <li>
                    <label>映画タイトル</label>
                    <input type="text" name="title" value="{{ $movie->title }}">
                </li>

                <li>
                    <label>画像URL</label>
                    <input type="text" name="image_url" value="{{ $movie->image_url }}">
                </li>

                <li>
                    <label>公開年</label>
                    <input type="text" name="published_year" value="{{ $movie->published_year }}">
                </li>

                <li>
                    <label>公開状況</label>
                    <input type="hidden" name="is_showing" id="上映予定" value="0">
                    <input type="checkbox" name="is_showing" id="上映中" value="1"
                        {{ $movie->is_showing ? 'checked' : '' }}>
                </li>

                <li>
                    <label>概要</label>
                    <textarea name="description">{{ $movie->description }}</textarea>
                </Li>

                <button>送信</button>
            </ul>
        </form>
    </div>
</body>

<style>
    .contents {
        margin: 0px 150px;
    }

    form ul li {
        list-style: none;
        margin: 15px 0;
    }
</style>

</html>
