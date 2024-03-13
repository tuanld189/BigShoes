<?php
session_start();
    require "../admin/dao/color.php";
    require "../admin/dao/size.php";
    require "../admin/dao/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5576275d06.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../bigshoes/css/danh-sach-sp/products.css">
    <link rel="stylesheet" href="../../bigshoes/css/danh-sach-sp/style.css">
    <link rel="shortcut icon" href="../assets/img_nike_sneakers/logo1.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../bigshoes/css/chi-tiet-sp/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../bigshoes/css/chi-tiet-sp/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../bigshoes/css/chi-tiet-sp/plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../../bigshoes/css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>


    <header class="header" style="top:0px;">
        <div class="header_container">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo"><a href="../index.php"><h2 style="font-size:28px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;color:black;">Big Shoes</h2></a></div>
                            <nav class="main_nav">
                                <div class="close_menu">
                                    <i class="fas fa-times" onclick="closeMenu()"></i>
                                </div>
                                <ul>
                                    <li class="main_nav-item active">
                                        <a href="../index.php">Trang chủ</a>
                                    </li>
                                    <li class="main_nav-item" onclick="openListLink()">
                                        <a href="danh-sach-sp.php" aria-readonly="true">Sản phẩm
                                        </a>
                                    </li>
                                    <li><a href="tin-tuc.php">Tin tức</a></li>
                                    <li><a href="gioi-thieu.php">Giới thiệu</a></li>
                                    <li><a href="lien-he.php">Liên hệ</a></li>
                                </ul>
                            </nav>
                            <div class="icon_user">
                                <?php
                                
                                if (!isset($_SESSION['user'])) {
                                ?>
                                    <a class="login1" style="margin-left: 60px;text-decoration: none; color: black;border: 1px solid rgb(122, 112, 112) ; border-radius: 25%; padding: 4px 12px;" href="../tai-khoan/dang-nhap.php"><span>Đăng nhập</span> </a>
                                <?php } else { ?>
                                    <a id="login" style="margin-left: 50px;text-decoration: none; color: black;border: 1px solid rgb(122, 112, 112) ; border-radius: 25%; padding: 4px 12px;" href="../tai-khoan/thong-tin-tk.php"><span><?= $_SESSION['user']['ho_ten'] ?> </span></a>
                                <?php } ?>
                                <!-- <i class="fas fa-user"></i> -->

                            </div>
                            <div class="header_extra ml-auto">

                                <div class="shopping_cart">
                                    <a href="danh-sach-gio-hang.php">
                                        <i class="fas fa-shopping-bag">
                                            <?php
                                            $sll = 0;
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $item) {
                                                    extract($item);
                                                    $sll += $sl;
                                                }
                                            }
                                            ?></i>
                                        <div>Cart <span><?= $sll ?></span></div>
                                    </a>
                                </div>
                                <form action="tim-kiem-theo-ten.php" method="post">
                                    <div class="search">
                                        <div class="search_icon">
                                            <i class="fas fa-search" onclick="openSearchPanel()"></i>
                                        </div>
                                    </div>
                                    <div class="menu_nav">
                                        <i class="fa fa-bars" aria-hidden="false" onclick="openMenu()"></i>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search_panel">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                            <form action="tim-kiem-theo-ten.php" method="post">
                                <input type="text" class="search_input" placeholder="Tìm kiếm..." name="keywords">
                            <button type="submit" name="search-keywords"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-7" style="padding-left: 0px;">
                <div class="chuyen">
                    <p><i class="fa fa-home" style="font-size:24px"></i> <span>TRANG CHỦ </span> / GIỎ HÀNG</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" style="margin-top: 80px;">
        <div class="row">
        
        <div class="col-sm-12">
            <table class="table">
                <thead>
                <tr>
                    <th>SẢN PHẨM</th>
                    <th>HÌNH ẢNH</th>
                    <th>GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>MÀU SẮC</th>
                    <th>SIZE</th>
                    <th>TỔNG</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <!-- CODE PHP DANH SÁCH GIỎ HÀNG -->
                <form action="cap-nhat-gio-hang.php" method="post">
                <?php
                    $total = $i = 0;
                    if(!empty($_SESSION['cart'])){
                        $items = $_SESSION['cart'];
                        foreach($items as $item){
                            extract($item);
                            $i++;
                    ?>
                <tr>
               
                    <td ><?=$name ?></td>
                    <td ><img src="../../bigshoes/css/admin/images/products/<?=$hinh?>" alt="" style = "width:80px;"></td>
                    <td ><?=number_format($price - ($price*($giam_gia/100))) ?> VNĐ</td>
                    <td ><input class="form-control" type="number" min="1" max="9" name='sl[<?=$ma_hh?>]' value="<?=$sl ?>" style="width:50px;"></td>
                    <td >            
                        <select name="cl[<?=$ma_hh?>]" id="">
                        <?php
                            $color_select_list = color_select_all();
                           
                                foreach ($color_select_list as $cl) {
                                   
                                    if($cl['maMau'] == $color){
                                        echo '<option selected value="'.$cl['maMau'].'">'.$cl['Mau'].'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$cl['maMau'].'">'.$cl['Mau'].'</option>';
                                    }
                                }
                        ?>
                        </select>
                    </td>
                    <td >
                        <select name="sz[<?=$ma_hh?>]" id="">
                            <?php
                            $listsize=size_select_all();
                            $selected=null;
                            foreach($listsize as $sizes){

                                if($sizes['maSize'] == $size){
                                    echo '<option selected value="'.$sizes['maSize'].'">'.$sizes['Size'].'</option>';
                                }
                                else{
                                    echo '<option value="'.$sizes['maSize'].'">'.$sizes['Size'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td ><?=number_format(($price - ($price*($giam_gia/100)))*$sl);
                            $total += (($price - ($price*($giam_gia/100)))*$sl);
                    ?> VNĐ</td>
                    <td><a onclick="return confirm('Bạn muốn bỏ sản phẩm này khỏi giỏ hàng ?')" style = "color:black;" href="xoa-gio-hang.php?ma_hh=<?=$ma_hh?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
                </tr>

                <!-- NẾU KHÔNG CÓ SẢN PHẨM NÀO SẼ XUẤT HIỆN THẺ P -->
                        <?php }}else{
                        echo '<p>Giỏ hàng của bạn chưa có sản phẩm nào !</p>';
                        }?>
                        
                </tbody>
            </table>
            <button class = "btn btn-info"><a style = "color:#fff;text-decoration:none;" href="danh-sach-sp.php">Tiếp tục xem sản phẩm</a></button>  
            <button type="submit" class = "btn btn-secondary" name="btn_update_gio_hang" >Cập nhật giỏ hàng</button>
            </form>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-7"></div>
        <div class="col-sm-5">
            <table class="table">
                <thead>
                <tr>
                    <th>TỔNG SỐ LƯỢNG</th>
                    <th></th> 
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Tổng phụ</td>
                    <td style = "text-align:right;"><?=number_format($total)?> VNĐ</td>
                </tr>
                <tr>
                    <td>Giao hàng</td>
                    <td style = "text-align:right;">Giao hàng miễn phí <br>
                    Ứơc tính cho Việt Nam <br>
                    Đổi địa chỉ</td>
                </tr>
                <tr>
                    <td>Tổng</td>
                    <td style = "text-align:right;"><b><?= number_format($total)?> VNĐ</b></td>
                </tr>
                <tr>
                    <td colspan="2"><a href="thanh-toan-gio-hang.php"><button class = "btn btn-danger" style = "width:100%;">TIẾN HÀNH THANH TOÁN</button></a></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    <div class="container-fluid now2" style="margin-top: 70px;">
        <div class="row">
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="fo">
                        <img src="../../bigshoes/css/danh-sach-sp/img/logooo.png" alt="" style ="width:60px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fo">
                            <h5>Shop</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5>Hỗ trợ</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Tin khuyến mãi</h5>
                    </div>
                </div>
                <div class="row" style="margin-top: 0px;">
                    <div class="col-md-3">
                        <div class="fo">
                            <ul>

                                <li>
                                    <p>
                                    Nhiệm vụ của chúng tôi là mang đến những sản phẩm chất lượng với giá cả tốt nhất cho khách hàng. Được hỗ trợ khách hàng là niềm vinh dự của chúng tôi . <br><br>
                                    Xin cám ơn !                                    
                                </p>
                                </li>
                                <li><i class="fa fa-facebook "></i>
                                    <i class="fa fa-firefox"></i>
                                    <i class="fa fa-pinterest-p"></i>
                                    <i class="fa fa-youtube"></i>

                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="fo">

                            <ul>

                                <li>
                                    <p>Trang chủ</p>
                                </li>
                                <li>
                                    <p>Cửa hàng</p>
                                </li>
                                <li>
                                    <p>Giới thiệu</p>
                                </li>
                                <li>
                                    <p>Liên hệ</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fo">

                            <ul>

                                <li>
                                    <p>Ưu đãi</p>
                                </li>
                                <li>
                                    <p>Giao nhận</p>
                                </li>
                                <li>
                                    <p>Đổi trả</p>
                                </li>
                                <li>
                                    <p>Bảo mật</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fo">
                            <ul>
                                <li>
                                    <p>Nhập vào email của bạn để đăng ký nhận tin khuyến mãi ...</p>
                                </li>
                                <li>
                                    <input type="text" placeholder="You@gmail.com">
                                    <a href="#">Đăng ký</a>
                                </li>
                            </ul>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        const nextIcon = ' <i class="fa fa-chevron-left" style="font-size:36px;color:black"></i>';
        const preIcon = ' <i class="fa fa-chevron-right" style="font-size:36px;color:black"></i>';
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            navText: [
                nextIcon,
                preIcon
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1200: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
    </script>
    <script type="text/javascript">
        const nextIcon = ' <i class="fa fa-chevron-left" style="font-size:36px;color:black"></i>';
        const preIcon = ' <i class="fa fa-chevron-right" style="font-size:36px;color:black"></i>';
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            navText: [
                nextIcon,
                preIcon
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1200: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        var search_btn = document.querySelector(".header_extra .search .search_icon i");
        var search_panel = document.querySelector(".search_panel");

        function openSearchPanel() {
            if ($('.search_panel').hasClass('active')) {
                search_panel.classList.remove("active");
            } else {
                search_panel.classList.add("active");
            }
        }



        function openListLink() {
            if (document.querySelector('.main_nav-item ul').style.height == 'auto') {
                document.querySelector('.main_nav-item ul').style.height = '0';
            } else {
                document.querySelector('.main_nav-item ul').style.height = 'auto'
            }
        }


        $(window).scroll(function() {
            if ($(this).scrollTop() > 35) {
                $('.header').addClass('scrolled');
            } else {
                $('.header').removeClass('scrolled');
            }
        });


        $('.spbanchay_block').slick({
            infinite: true,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>











</body>

</html>