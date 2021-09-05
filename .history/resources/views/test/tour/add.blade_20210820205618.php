<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="{{ URL::asset('frontend/jquery/jquery.min.js') }}"></script>
    @routes
</head>

<body>
    <form action="{{ route('admin.tour.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="code" placeholder="code" readonly>
        <button type="button" id="btn-generate-code">Generate</button>
        {{-- <button type="button" id="btn-generate-code" onclick="generateCode()">Generate</button> --}}
        <select name="area_id" id="">
            @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <select name="location_id" id="">
            @foreach ($locations as $location)
            <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <select name="promotion_id" id="">
            @foreach ($promotions as $promotion)
            <option value="{{ $promotion->id }}">{{ $promotion->name }}</option>
            @endforeach
        </select>
        <textarea name="description" id="" cols="30" rows="10" placeholder="Mo ta"></textarea>
        <input type="text" name="departure_location" placeholder="Departure location">
        <input type="text" name="destination" placeholder="destination">
        <input type="text" name="itinerary" id="" placeholder="Itinerary">
        <input type="number" name="slot" id="" placeholder="slot">
        <input type="number" name="adult_price" step="500" id="" placeholder="adult price">
        <input type="number" name="youth_price" step="500" id="" placeholder="youth price">
        <input type="number" name="child_price" step="500" id="" placeholder="child price">
        <input type="number" name="baby_price" step="500" id="" placeholder="baby price">
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.tour.index') }}">Back Index</a>


    <script src="{{ asset('backend/index.js') }}"></script>
</body>

</html>
