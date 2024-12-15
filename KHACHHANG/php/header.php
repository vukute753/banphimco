<?php session_start(); ?>
<div class="header-pos-fix">
    <!-- header -->
    <div class="wrapper">
        <header class="header">
            <img id="header-logo" src="./ASSETS/img/IMG-home-page/logo.png" alt="">
            <div class="header-container">
                <div class="header-searching">
                    
                <div class="input-group">

                
                    

                <form action='server.php?page=product.php&search' method="post" style="display: flex; align-items:center;">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input style="height: 40px; width: 300px" type="search" id="form1" class="form-control" name="search_value"/>
                                        <label class="form-label" for="form1">Search</label>
                                    </div>
                         <button  style="height: 40px;"  name="btn_search" type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
</div>
                   
                </div>
                <div class="header-contact">
                    <img id="header-contact_phone" src="./ASSETS/img/IMG-home-page/phone.svg" alt="">
                    <div class="header-contact_container">
                        <p style="margin: 0;" id="header-contact-hotline">
                            Tổng đài hổ trợ/ Hotline
                        </p>
                        <p id="header-contact-numberphone" style="margin: 0;">
                            032777381
                        </p>
                    </div>
                </div>
                <div class="header-login">
                    <img id="header-login-icon" src="./ASSETS/img/IMG-home-page/circle-user-regular 1.svg" alt="">
                    <div class="header-login-container">
                        <p id="header-login_hello" style="margin: 5px 0;">
                            Xin Chao!
                        </p>
                        <p id="header-login_user" style="margin: 5px 0;">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo ('<a href=./php/profile.php>' . $_SESSION['username'] . '</a>');
                            } else {
                                echo ('<a href="./php/formLogin-Register.php">Đăng nhập</a>');
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="header-cart">
                <a id="header-cart_icon" href="<?php if (isset($_SESSION['username'])) {
                                                    echo './php/cart.php';
                                                } else {
                                                    echo './php/formLogin-Register.php';
                                                } ?>"> <img src="./ASSETS/img/IMG-home-page/cart-shopping-solid 2.svg" alt=""></a>
            </div>
        </header>

    </div>
    <!-- end header -->
    <!-- navigation -->
    <div class="menu ">

        <div class="wrapper ">
            <ul class="menu-list">
                <li class="menu-item"><a class="menu-item_title" href="server.php">Trang Chủ</a>

                </li>
                <li class="menu-item"><a class="menu-item_title" href="server.php?page=product.php">Sản phẩm</a>

                </li>
                <li class="menu-item"><a class="menu-item_title" href="#">Kiến thức và bảo hành</a>

                </li>
                <li class="menu-item"><a class="menu-item_title" href="#footer">Liên hệ</a>

                </li>

            </ul>
        </div>
    </div>
    <!-- end navigation -->
</div>