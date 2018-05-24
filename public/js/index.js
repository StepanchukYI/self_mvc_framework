$(function () {
    $('.auth_form').submit(function (event) {
        event.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (data) {
            data = JSON.parse(data);
            if (data.success === 1) {
                alert("Пароль успешно был отправлен на почту, введите его в поле, чтобы авторизироваться");
                $('#password_div').html('<label for="password">Password</label>\n' +
                    '        <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Enter your password">\n' +
                    '    ');
                $('#password_div').show();
            } else if (data.success === 2) {
                alert("Спасибо за авторизацию!");
                window.location('/admin/auth/dashboard')
            }
            else if (data.error) {
                alert(data.error);
            }
        })
    });

    $('.product_form').submit(function (event) {
        event.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (data) {
            data = JSON.parse(data);
            if (data.success === 1) {
                alert("Успешно!");
            } else if (data.success === 2) {
                alert("Спасибо за авторизацию!");
                window.location = '/admin/auth/dashboard';
            }
            else if (data.error) {
                alert(data.error);
            }
        })
    });

    $('.order_view').submit(function (event) {
        event.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (data) {
            data = JSON.parse(data);
            if (data.success === 1) {
                alert("Успешно!");
                window.location.reload();
            }
            else if (data.error) {
                alert(data.error);
            }
        })
    });

    $('.order-table tbody tr').click(function () {
        console.log($(this).data('id'));
        window.location.href = '/admin/auth/order_view/' + $(this).data('id');
    });
});