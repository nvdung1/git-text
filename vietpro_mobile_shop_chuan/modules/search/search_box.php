<script>
    if(document.getElementsByName(keyword).values == 0){
        alert("Ban khong duoc mhap khoang trang va de trong");
        document.getElementsByName(keyword).focus();
        return false;
    }
</script>

<div id="search" class="col-lg-6 col-md-6 col-sm-12">
                <form class="form-inline" method="POST" action="index.php?page_layout=search">
                    <input name="keyword" class="form-control mt-3" type="search" placeholder="Tìm kiếm" aria-label="Search" required>
                    <button class="btn btn-danger mt-3" type="submit">Tìm kiếm</button>
                </form>
            </div>