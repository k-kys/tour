<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.tour_plan.store') }}" method="post">
        @csrf
        <input type="number" name="day" placeholder="day">
        <input type="text" name="note" id="" placeholder="note">
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.tour_plan.index') }}">Back Index</a>
</body>

</html>
