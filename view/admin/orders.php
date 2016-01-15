<table class="table table-responsive">
    <tr>
        <th>Номер заказа</th>
        <th>Контактные данные</th>
        <th>Товары</th>
        <th>Сумма</th>
        <th>Действия</th>
    </tr>
    <?php foreach($orders as $order) { ?>
    <?php $products = json_decode($order['product']);
        $total = 0;

        ?>
    <tr>
        <td><?=$order['order_key']?></td>
        <td><?php echo $order['data']; ?></td>
        <td>
            <?php foreach($products as $item){
                echo "<a href='".get_the_permalink($item->id)."'>".$item->name."</a>";
                echo "<br>Количество: ".$item->count;
                echo "<br>Цена: ".$item->price."<br>";
            }

            ?>
        </td>
        <td><?= $order['total']; ?></td>
        <td>
            <a href="/wp-admin/admin.php?page=orders&del=<?=$order['id']?>">Удалить</a>
        </td>
    </tr>
    <?php } ?>
</table>