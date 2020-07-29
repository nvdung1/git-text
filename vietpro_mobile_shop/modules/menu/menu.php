<nav>
                	<div id="menu" class="collapse navbar-collapse">
                        <ul>
                            <?php 
                                $sql = "SELECT*FROM category ORDER BY cat_id ASC";
                                $query = mysqli_query($conn,$sql);
                                while($rows = mysqli_fetch_array($query)){ ?>
                                    <li class="menu-item"><a href="index.php?page_layout=category&cat_id=<?php echo $rows['cat_id']; ?>&cat_name=<?php echo $rows['cat_name']; ?>"><?php echo $rows['cat_name']; ?></a></li>
                                <?php } ?>
                        </ul>
                    </div>
                </nav>