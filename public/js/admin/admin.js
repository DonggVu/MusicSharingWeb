$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
        }
    });
    $('#test').click(()=>{
        $.ajax({
            url: 'admin/track',
            type: 'PUT',
            data: {
                data1: "123"
            },
            success: (data) => {
                alert(data);
            }, error: ()=>{
                alert(2);
            }
        });
    });

});
