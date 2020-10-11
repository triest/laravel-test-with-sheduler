$("#commentform").submit(function (event) {
    // alert( "Handler for .submit() called." );
    var datastring = $("#commentform").serialize();
    var article_id = $("#article_id").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/articles/" + article_id + "/comment/post",
        data: datastring,
        success: function (datastring) {
            //    alert('Data send');
            let form = $("#commentform");
            form.hide();
            let success = $("#success");
            success.show();
            let error = $("#error");
            error.hide();
        },
        error: function () {
            let error = $("#error");
            error.show();
            let success = $("#success");
            success.hide()
        }


    });
    event.preventDefault();
});

$("#like").click(function (event) {
    console.log("click")

    var article_id = $("#article_id").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var likeCount=0;
    $.ajax({
        type: "POST",
        url: "/articles/" + article_id + "/like",
        success: function (datastring) {
            likeCount=datastring;
            $("#like").html(likeCount)
        },
        error: function () {
        }

    });
});