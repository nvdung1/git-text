    <?php
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $_GET['key'] = $keyword;
    } else {
        if (isset($_GET['page'])) {
            $keyword = $_GET['key'];
        } else {
            header("location: index.php");
        }
    }
    
    $arr_keyword = explode(" ", $keyword);
    $str_keyword = "%" . implode("%", $arr_keyword) . "%";

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rows_per_page = 4;
    $per_rows = $page * $rows_per_page - $rows_per_page;
    $total_rows = mysqli_num_rows(mysqli_query($conn, " SELECT*FROM product WHERE prd_name LIKE ('$str_keyword')"));
    $total_page = ceil($total_rows / $rows_per_page);
    $list_pages = '';
    // trang trc
    $page_perv = $page - 1;
    if ($page_perv < 1) {
        $page_perv = 1;
    }
    $list_pages .=  '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&key=' . $_GET['key'] . '&page=' . $page_perv . '">&laquo;</a></li>';

    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $active = 'active';
        } else {
            $active = '';
        }
        $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=search&key=' . $_GET['key'] . '&page=' . $i . '">' . $i . '</a></li>';
    }
    // trang sau
    $page_next = $page + 1;
    if ($page_next > $total_page) {
        $page_next = $total_page;
    }
    $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&key=' . $_GET['key'] . '&page=' . $page_next . '">&raquo;</a></li>';


    $sql = "SELECT*FROM product WHERE prd_name LIKE ('$str_keyword') ORDER BY prd_id DESC LIMIT $per_rows,$rows_per_page";
    $query = mysqli_query($conn, $sql);
    if ($total_rows == 0) {
        $noti = '<div class="alert alert-danger">Khong tim thay san pham voi tu khoa "'.$keyword.'".</div>';
    }

    ?>
    <!--	List Product	-->
    <div class="products">
        <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $keyword; ?></span></div>
        <?php
        if (isset($noti)) {
            echo $noti;
        } else {
            $i = 0;
            while ($rows = mysqli_fetch_array($query)) {
        ?>
                <?php if ($i == 0) { ?>
                    <div class="product-list card-deck">
                    <?php } ?>
                    <div class="product-item card text-center">
                        <a href="index.php?page_layout=product&prd_id=<?php echo $rows['prd_id']; ?>"><img src="admin/img/product/<?php echo $rows['prd_image']; ?>"></a>
                        <h4><a href="index.php?page_layout=product&prd_id=<?php echo $rows['prd_id']; ?>"><?php echo $rows['prd_name']; ?></a></h4>
                        <p>Giá Bán: <span><?php echo $rows['prd_price']; ?></span></p>
                    </div>
                    <?php $i++; ?>
                    <?php if ($i == 3) {
                        $i = 0;
                    ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php if ($i % 3 != 0) {
                echo "</div>";
            }
        } ?>
    </div>
    <!--	End List Product	-->

    <div id="pagination">
        <ul class="pagination">
            <?php echo $list_pages; ?>
        </ul>
    </div>