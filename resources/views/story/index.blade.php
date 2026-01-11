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

@foreach($users as $user)
    <div class="user-row">
        {{-- Accessing direct properties --}}
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

        {{-- Accessing the related address --}}
        @if($user->address)
            {{-- Note: address might still be a collection/array, use [] or -> accordingly --}}
            <p>City: {{ $user->address['city'] ?? 'No City' }}</p>
        @endif
    </div>
    <hr>
@endforeach


{{-- <table>
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
</table> --}}

</body>
</html>
