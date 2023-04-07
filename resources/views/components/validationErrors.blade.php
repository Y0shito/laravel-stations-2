@if ($errors->any())
    <ul class="validation-errors">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<style>
    .validation-errors {
        margin: 0px 150px;
        color: red;
    }
</style>
