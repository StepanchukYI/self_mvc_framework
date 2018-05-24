<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 24.05.2018
 * Time: 5:52
 */
?>

<table class="table order-table">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">Имя</th>
		<th scope="col">Номер телефона</th>
		<th scope="col"># товара</th>
		<th scope="col">Цена</th>
		<th scope="col">Комментарий</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ( $data['orders'] as $order ) { ?>
		<tr data-id="<?= $order['id'] ?>">
			<th scope="col"><?= $order['id'] ?></th>
			<th scope="col"><?= $order['name'] ?></th>
			<th scope="col"><?= $order['phone'] ?></th>
			<th scope="col"><?= $order['product_id'] ?></th>
			<th scope="col"><?= $order['price'] ?></th>
			<th scope="col"><?= $order['comment'] ?></th>
		</tr>
	<?php } ?>
	</tbody>
</table>
