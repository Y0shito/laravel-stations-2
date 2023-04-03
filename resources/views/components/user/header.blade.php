<header>
    <p><a href="{{ route('movies') }}">StationMovies</a></p>
    <nav>
        <ul>
            @if (Auth::check())
                <li><a href="">マイページ</a></li>
                <li><a href="">ログアウト</a></li>
            @else
                <li><a href="">ログイン</a></li>
                <li><a href="">サインイン</a></li>
            @endif
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
