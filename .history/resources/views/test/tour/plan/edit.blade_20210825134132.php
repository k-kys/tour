<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta>
    <title>Document</title>
    <script type="text/javascript" src="{{ URL::asset('frontend/jquery/jquery.min.js') }}"></script>
    @routes
</head>

<body>
    {{-- <form action="{{ route('admin.tour.plan.update', ['tour_id' => $tourId]) }}" method="post"> --}}
    {{-- @csrf --}}
    {{-- <h3>{{ $tourPlan['tour_name'] }}</h3> --}}
    <input type="hidden" name="tour_id" value="{{ $tourId }}">
    <div class="container1">
        <button type="button" class="add_form_field">Add New Field &nbsp;
            <span style="font-size:16px; font-weight:bold;">+ </span>
        </button>
        @foreach ($tourPlan as $key => $item)
        <form action="" method="post">
            <div>
                <input type="number" name="day[{{ $key }}]" placeholder="day" value="{{ $item->day }}">
                <textarea name="content[{{ $key }}]" id="summernote"
                    placeholder="content">{{ $item->content }}</textarea>
                <input type="text" name="note[{{ $key }}]" id="" placeholder="note" value="{{ $item->note }}">
            </div>
            <button type="button" id="button-update" data-id="{{ $item->id }}"
                onclick="confirmUpdate({{ $item->id }})">update</button>
            <button type="button" id="button-delete" data-id="{{ $item->id }}"
                onclick="cònirmDelete({{ $item->id }})">delete</button>
        </form>
        @endforeach

    </div>
    {{-- <button type="submit">Save</button> --}}
    {{-- </form> --}}
    <script>
        $('#button-update').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);
    });
    function confirmUpdate(id) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        var url = route(`admin.tour.plan.update`, id);
        $.ajax({
            type: "post",
            url: url,
            success: (response) => {
                Toast.fire({
                    icon: response.stt,
                    title: response.title,
                });
            },
            error: (xhr, ajaxOptions, thrownError) => {
                Toast.fire({
                    icon: 'error',
                    title: 'Update failed.',
                });
            },
        });
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");
    var div_add = `<div>
        <input type="number" name="day[]" placeholder="day">
        <textarea name="content[]" id="summernote" placeholder="content"></textarea>
        <input type="text" name="note[]" id="" placeholder="note">
        <a href="#" class="delete">Delete</a>
    </div>`;
    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        x++;
        // $(wrapper).append(`<div>
        //     <input type="number" name="day${x}" placeholder="day">
        //     <textarea name="content${x}" id="summernote" placeholder="content"></textarea>
        //     <input type="text" name="note${x}" id="" placeholder="note">
        //     <a href="#" class="delete">Delete</a>
        //     </div>`); //add input box
        wrapper.append(div_add);

    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
    </script>
</body>

</html>
