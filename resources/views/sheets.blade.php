<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>座席</title>
</head>

<body>
    @include('components.user.header')

    <div class="contents">
        <table style="text-align: center;">
            <tr>
                <th>.</th>
                <th>.</th>
                <th>スクリーン</th>
                <th>.</th>
                <th>.</th>
            </tr>
            <tr>
                <td>:-:</td>
                <td>:-:</td>
                <td>:-:</td>
                <td>:-:</td>
                <td>:-:</td>
            </tr>
            @foreach ($sheetChunks as $sheetChunk)
                <tr>
                    @foreach ($sheetChunk as $sheet)
                        <td>{{ "{$sheet->row}-{$sheet->column}" }}</td>
                    @endforeach
                </tr>
            @endforeach
    </div>
</body>

<style>
    .contents {
        margin: 0px 150px;
    }

    table {
        text-align: center;
    }
</style>
