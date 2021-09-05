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
    <form action="{{ route('admin.tour_plan.store') }}" method="post">
        @csrf
        <div class="container1">
            <input type="number" name="day[]" placeholder="day">
            <textarea name="content[]" id="summernote" placeholder="content"></textarea>
        </div>
        <input type="text" name="note" id="" placeholder="note">
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.tour_plan.index') }}">Back Index</a>
</body>
<script src="{{ asset('backend/index.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

</html>
