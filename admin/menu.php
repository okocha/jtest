<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="index.php?menu=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?menu=category-car-show">ประเภทรถ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?menu=promotion-show">จัดการโปรโมชั่น</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?menu=employee-show">จัดการพนักงาน</a>
            </li>
            

<!--            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown Test
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>-->

        </ul>
        <?php if(isset($_SESSION['LOGIN_ADMIN'])){ ?>

        <a class="btn btn-outline-warning" href="index.php?menu=logout" onclick="return confirm('ต้องการออกจากระบบ?')">Logout</a>

        <?php } ?>
        

    </div>
</nav>






