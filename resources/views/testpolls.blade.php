<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>

<body>

<h1>Polls</h1>

<p>test</p>
<ul>
    @foreach($polls as $poll)
        <li>{{ $poll->name }}</li>
    @endforeach

</body>
</html>
