<!DOCTYPE html>
<html>
<head>
    <title>Excel Data</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
    </style>
</head>
<body>

<h2>Excel Sheet Data</h2>

<table>
    <thead>
        <tr>
            @foreach ($header as $head)
                <th>{{ $head }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{{ $cell }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
