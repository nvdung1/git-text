              <!--	Feature Product	-->
              <?php
                $sql = "SELECT*FROM product WHERE prd_featured=1 ORDER BY prd_id DESC LIMIT 6";
                $query = mysqli_query($conn, $sql);
                ?>
              <div class="products">
                  <h3>Sản phẩm nổi bật</h3>
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
                          <?php $i += 1; ?>
                          <?php if($i ==3){ $i=0; ?>
                          </div>
                          <?php } ?>
                      <?php } ?>
              </div>
              <!--	End Feature Product	-->