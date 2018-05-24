<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 24.05.2018
 * Time: 3:44
 */
?>
<form method="post" action="/admin/auth" class="auth_form">

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter your email">
    </div>
    <div id="password_div" style="display: none" class="form-group">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>