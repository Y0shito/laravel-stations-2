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
        display: flex;
        justify-content: space-between;
        background-color: aqua;
    }

    .failed {
        margin: 0px 150px;
        display: flex;
        justify-content: space-between;
        background-color: #ff9999;
    }
</style>
