<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 22:44
 */
?>
<form>
    <select name="product" id="product" class="form-control">
		<?php foreach ( $data['products'] as $product ) { ?>
            <option value="<?= $product['id'] ?> "><?= $product['title'] ?> (<?= $product['price'] ?> грн.)</option>
		<?php } ?>
    </select>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea class="form-control" id="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>