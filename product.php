<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/brands.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/regular.min.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/products.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>The Grand Shop Shoes</title>
</head>
<body>
    <div class="container contenedor_">

        <header class="header_">

            <div class="header_logo_title_user">

                <div class="logo_">
                    <a href="#"><img src="./img/Logo.png" alt="The Grand Shop Shoes"></a>
                </div>

                <div class="title_">
                    <h1>The GRAND Shop <span>Shoes</span></h1>
                    <span class="title_slogan">Your excelent virtual store</span>
                </div>

                <div class="user_">
                    <h2>Welcome,</h2>
                    <h5><img src="./img/user.png" width="80px" alt=""></i> Visitor! <a href="#">Log In</a></h5>
                </div>

            </div>

            <div class="header_nav_cart">
                <nav class="header_nav">
                    <ul>
                        <li>Home</li>
                        <li>Products</li>
                        <li>Contact US</li>
                        <li>About US</li>
                        <li>My Orders</li>
                        <li>Admin</li>
                    </ul>
                </nav>
                <div class="header_cart">
                    <button type="button" class="btn btn-secondary position-relative boton_Cart">
                        <img src="./img/cart.png" width="50px" alt="Cart">
                        <span class="position-absolute top-0 start-1 translate-middle badge rounded-pill bg-primary boton_text">
                        99+
                        <span class="visually-hidden">0</span>
                        </span>
                    </button>
                </div>
            </div>
        </header>

        <main>

            <section class="ProductList_">
                <h5>Our Products List</h5>
                <div class="DayOffer_">
                    <i class="HR_"></i>
                    <img src="./img/productslist.png" width="100px" alt="Ours Products">
                </div>
            </section>
            
            <section class="ProductList_section">
                <div class="row">
                    <div class="col-2">
                        <h5 class="mb-2">Advanced Search</h5>
                        <div class="Filter_">
                           <div class="Filter_Price_Range">
                                <label for="txtRangePrice" class="label-control">Price Range
                                    <input type="text" id="txtRangePrice" name="txtRangePrice" class="form-control" placeholder="Range">
                                </label>
                                <label>Min 
                                    <input onchange="ChangeValueRangeTXT();" type="range" min="20" max="100" name="RangeMin" minlength="20" maxlength="100" id="RangeMin"/>
                                </label>
                                <label>Max
                                    <input onchange="ChangeValueRangeTXT();" type="range" min="20" max="100" name="RangeMin" minlength="20" maxlength="100" name="RangeMax" id="RangeMax"  />
                                </label>
                           </div>
                           <div class="Filter_Color">
                                <select id="FilterColorSelected" class="form-select" aria-label="Colors">
                                    <option selected>Color</option>
                                    <option>Red</option>
                                    <option>Brown</option>
                                    <option>Blue</option>
                                    <option>White</option>
                                    <option>Black</option>
                                </select>
                           </div>
                           <div class="Filter_Size">
                                <select id="FilterSizeSelected" class="form-select" aria-label="Sizes">
                                    <option selected>Size</option>
                                    <option>40</option>
                                    <option>41</option>
                                    <option>42</option>
                                </select>
                           </div>
                           <div class="Filter_Style">
                                <select id="FilterStyleSelected" class="form-select" aria-label="Styles">
                                    <option selected>Style</option>
                                    <?php require('./db/ListStyle.php');  ?>
                                </select>
                           </div>
                           <div class="Filter_Brand">
                                <select id="FilterBrandSelected" class="form-select" aria-label="Brands" >
                                    <option selected>Brand</option>
                                    <?php require('./db/ListBrand.php');  ?>
                                </select>
                           </div>
                           <div class="Bottons_Filter">
                            <button type="button" id="btnFind" class="btn btn-secondary">Find</button>
                            <button type="button" class="btn btn-secondary">Reset</button>
                           </div>
                        </div>
                    </div>

                    <div class="col-10">
                        <h5 class="text-end mb-2">Products List</h5>
                        <div class="productList_List">
                            <?php
                                include('./db/ListProducts.php');
                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body ProductID">
                    <?php
                        include('./db/ListProductsID.php');
                    ?>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            </div>

        </main>



        <footer>
            <div class="row footer_section">

                <div class="col-8">
                    <ul>
                        <li><a href="#">Contact us</a></li>
                        <li>|</li>
                        <li><a href="#">Products</a></li>
                        <li>|</li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>

                <div class="col-4">
                    <div class="social_media">
                        <a href=""><img src="./img/instagram.png" alt="Instagran"></a>
                        <a href=""><img src="./img/twitter.png" alt="Twitter"></a>
                        <a href=""><img src="./img/facebook.png" alt="FaceBook"></a>
                        <a href=""><img src="./img/linkedin.png" alt="Linkedin"></a>
                    </div>
                </div>

            </div>
        </footer>

</div>
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/brands.min.js"></script>
    <script src="./js/fontawesome.min.js"></script>
    <script src="./js/regular.min.js"></script>
    <script src="./js/solid.min.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>