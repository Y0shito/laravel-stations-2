@if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

@if (session('failed'))
    <div class="failed">
        {{ session('failed') }}
    </div>
@endif

<style>
    .success {
        margin: 0px 150px;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        border-radius: 5px;
        background-color: #C8DEF4;
        color: #355D96;
    }

    .failed {
        margin: 0px 150px;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        border-radius: 5px;
        background-color: #F3D8D8;
        color: #7C3C3C;
    }
</style>
