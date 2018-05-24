<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 24.05.2018
 * Time: 5:52
 */
?>

<form method="post" class="order_view">

	<div class="form-group">
		<label for="id">ID</label>
		<input type="email" class="form-control" id="id" name="id" aria-describedby="id" value="<?= $data['order']['id']?>" disabled>
	</div>

	<div class="form-group">
		<label for="name">Имя</label>
		<input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="<?= $data['order']['name']?>">
	</div>

	<div class="form-group">
		<label for="phone">Номер телефона</label>
		<input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone" value="<?= $data['order']['phone']?>">
	</div>

	<div class="form-group">
		<label for="product_id"># товара</label>
		<input type="text" class="form-control" id="product_id" name="product_id" aria-describedby="product_id" value="<?= $data['order']['product_id']?>">
	</div>

	<div class="form-group">
		<label for="price">Цена</label>
		<input type="text" class="form-control" id="price" name="price" aria-describedby="price" value="<?= $data['order']['price']?>">
	</div>

	<div class="form-group">
		<label for="comment">Комментарий</label>
		<input type="text" class="form-control" id="comment" name="comment" aria-describedby="comment" value="<?= $data['order']['comment']?>">
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>

