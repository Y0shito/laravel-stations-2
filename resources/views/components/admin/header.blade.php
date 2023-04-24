<header>
    <p><a href="{{ route('admin.movies') }}">管理者画面/{{ $title }}</a></p>
    <nav>
        <ul>
            <li><a href="{{ route('admin.movie.create') }}">映画新規登録</a></li>
            <li><a href="{{ route('admin.schedules') }}">スケジュール一覧</a></li>
            <li><a href="">予約一覧</a></li>
        </ul>
    </nav>
</header>

<style>
    header {
        margin: 0px 150px;
        display: flex;
        justify-content: space-between;
    }

    header ul {
        display: flex;
        list-style: none;
    }

    header li {
        margin-left: 20px;
    }

    header a {
        font-weight: bold;
        text-decoration: none;
    }
</style>
