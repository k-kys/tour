/*
|-----------------------------------------------------------------------
| Load dữ liệu trang Index. Xử lí action Delete.
|-----------------------------------------------------------------------
| File này chạy cho tất cả các trang index trong Backend.
*/

// load du lieu khi moi vao trang
$(document).ready(() => {
    var id = $("table").find("tbody").attr("id");
    var name = id.slice(id.lastIndexOf("-") + 1);
    LoadData(name);
    setInterval(() => LoadData(name), 900000);

    // tim kiem - filter
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(`#list-${name} tr`).filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

// ham de load du lieu
function LoadData(name) {
    $.ajax({
        type: "GET",
        url: route(`admin.${name}.index_data`),
        dataType: "json",
        success: (response) => {
            var str = "";
            $.each(response, (index, value) => {
                var ur = route(`admin.${name}.edit`, value.id);
                str += "<tr>";
                str += `<td>${value.name}<td>`;
                if (name == "article") {
                    str += `<td>${value.title}</td>`;
                }
                if (name == "location") {
                    str += `<td>${value.area}<td>`;
                }
                if (name == "promotion") {
                    str += `<td>${value.amount}<td>`;
                }
                if (name == "tour") {
                    str += `<td>${value.area}<td>`;
                    str += `<td>${value.location}<td>`;
                }
                str += `<td><a href="${ur}">Edit</a></td>`;
                str += `<td><a href="javascript::void(0)" onclick="confirmDelete('${name}', ${value.id})">Delete</a></td>`;
                str += "</tr>";
            });
            $("table > tbody" + `#list-${name}`).html(str);
        },
    });
}

// xac nhan Xoa
function confirmDelete(name, id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: route(`admin.${name}.delete`, id),
                type: "GET",
                success: (response) => {
                    Swal.fire(response.title, response.msg, response.type);
                    LoadData(name);
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    Swal.fire("Delete failed!", "Please try again.", "error");
                    LoadData(name);
                },
            });
        }
    });
}

// Generate code
$("#btn-generate-code").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: route(`generate_code`, 10),
        success: (response) => {
            $("input[name=code]").val(response);
        },
    });
});