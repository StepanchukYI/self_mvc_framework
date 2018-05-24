<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 24.05.2018
 * Time: 4:08
 */

?>

<table class="table">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">Title</th>
		<th scope="col">Price</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ( $data['products'] as $product ) { ?>
		<tr>
			<th scope="row"><?= $product['id'] ?> </th>
			<td><?= $product['title'] ?></td>
			<td><?= $product['price'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
