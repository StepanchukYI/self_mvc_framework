$(function () {
    $('.auth_form').submit(function (event) {
        event.preventDefault();
        console.log($(this).serialize());
        $.post($(this).attr('action'), $(this).serialize(), function (data) {
            if(data.success){
                alert("Спасибо, мы скоро свяжемся с вами!");
                $('.notificationForm')[0].reset();
                $('.modal').modal('hide');
            }
        }).fail(function (data) {
            // console.log(data.status.status);
            if(data.status == 422) {
                alert("Неправильно заполнены данные");
            }
        });
    });
});