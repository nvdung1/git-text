<?php
$cat_id = $_GET['cat_id'];
$cat_name = $_GET['cat_name'];

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$row_per_page = 3;
$per_rows = $page * $row_per_page - $row_per_page;

$sql = "SELECT*FROM product WHERE cat_id = '$cat_id' ORDER BY prd_id DESC LIMIT $per_rows,$row_per_page";
$total_rows = mysqli_num_rows(mysqli_query($conn, " SELECT*FROM product WHERE cat_id='$cat_id'"));
$total_page = ceil($total_rows /$row_per_page);
// button phan trang
$list_pages = '';
// trang trc
$page_perv = $page - 1;
if ($page_perv < 1) {
    $page_perv = 1;
}
$list_pages .=  '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='. $page_perv .'">&laquo;</a></li>';

for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page=' . $i . '">' . $i . '</a></li>';
}
// trang sau
$page_next = $page + 1;
if ($page_next > $total_page) {
    $page_next = $total_page;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page=' . $page_next . '">&raquo;</a></li>';

$query = mysqli_query($conn, $sql);
$num_rows = $total_rows;
?>
<!--	List Product	-->
<div class="products">
    <h3> <?php echo $cat_name; ?>(hiện có <?php echo $num_rows; ?> sản phẩm)</h3>
    <?php
    $i = 0;
    while ($rows = mysqli_fetch_array($query)) { ?>
        <?php if ($i == 0) { ?>
            <div class="product-list card-deck">
            <?php } ?>
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?php echo $rows['prd_id']; ?>"><img src="admin/img/product/<?php echo $rows['prd_image']; ?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $rows['prd_id']; ?>"><?php echo $rows['prd_name']; ?></a></h4>
                <p>Giá Bán: <span><?php echo $rows['prd_price']; ?></span></p>
            </div>
            <?php $i += 1;
            if ($i == 3) {
                $i = 0; ?>
            </div>
        <?php } ?>
    <?php } ?>
    <?php if ($i % 3 != 0) {
        echo '</div>';
    } ?>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <?php echo $list_pages; ?>
    </ul>
</div>