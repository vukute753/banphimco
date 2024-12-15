<!-- product -->
<?php


$getAll = getAll($conn);
$num_rows = mysqli_num_rows($getAll);



$prd_dsp = 15; //so san pham muon hien thi
$total = ceil($num_rows / $prd_dsp); //tong so nut page hien thi

if (isset($_GET['btn-page'])) {
    $btn_page = $_GET['btn-page'];
} else {
    $btn_page = 1;
}


$getlocation = ($btn_page - 1) * $prd_dsp; // lay vi tri cua san pham

$getSearch;

//Search
if(isset($_POST['search_value'])){
    $value = $_POST['search_value'];  
    $normalizeString = normalizeString($value);
    $getSearch = searchPrd($conn, $value);
}
else if(isset($_GET['keyboard'])){
    $getSearch = getType1($conn);
}
else if(isset($_GET['keycap'])){
    $getSearch = getType3($conn);
}
else if(isset($_GET['phukien'])){
    $getSearch = getType4($conn);
}
else if(isset($_GET['tuidungbanphim'])){
    $getSearch = getType13($conn);
}
else if(isset($_GET['daulube'])){
    $getSearch = getType7($conn);
}
else if(isset($_POST['btnPrice'])){
    $minprice = $_POST['minprice'];
    $maxprice = $_POST['maxprice'];


    $getSearch = getLimitPrice($conn, $minprice, $maxprice);
}       





//ALL PRODUCT
else {
$getSearch = getLimit($conn, $getlocation, $prd_dsp);  //lay san pham bat dau tu $getlocation va lay ra $prd-dsp san pham
}

?>

<?php 

$row = mysqli_num_rows($getSearch);
if($row) { ?>


<style>

.main {
    background-color: #fff;
    border-radius: 15px;
    width: 400px;
}



/* Styles for the price input container */
.price-input-container {
    width: 100%;
}

.price-input .price-field {
    display: flex;
    margin-bottom: 22px;
}

.price-field span {
    margin-right: 10px;
    margin-top: 6px;
    font-size: 17px;
}

.price-field input {
    flex: 1;
    height: 35px;
    font-size: 15px;
    font-family: "DM Sans", sans-serif;
    border-radius: 9px;
    text-align: center;
    border: 0px;
    background: #e4e4e4;
}

.price-input {
    width: 100%;
    font-size: 19px;
    color: #555;
}

/* Remove Arrows/Spinners */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.slider-container {
    width: 100%;
}

.slider-container {
    height: 6px;
    position: relative;
    background: #e4e4e4;
    border-radius: 5px;
}

.slider-container .price-slider {
    height: 100%;
    left: 100%;
    right: 100%;
    position: absolute;
    border-radius: 5px;
    background: #01940b;
}

.range-input {
    position: relative;
}

.range-input input {
    position: absolute;
    width: 100%;
    height: 5px;
    background: none;
    top: -5px;
    pointer-events: none;
    cursor: pointer;
    -webkit-appearance: none;
}

/* Styles for the range thumb in WebKit browsers */
input[type="range"]::-webkit-slider-thumb {
    height: 18px;
    width: 18px;
    border-radius: 70%;
    background: #555;
    pointer-events: auto;
    -webkit-appearance: none;
}

@media screen and (max-width: 768px) {
    .main {
        width: 80%;
        margin-right: 5px;
    }

    .custom-wrapper {
        width: 100%;
        left: 0;
        padding: 0 10px;
    }

    .projtitle {
        width: 100%;
        position: relative;
        right: 26px;
    }

    .price-input {
        flex-direction: column;
        align-items: center;
    }

    .price-field {
        margin-bottom: 10px;
        
    }
}
    
</style>


<div id="PhuKien" class="wrapper align-content2 hproduct-content2">
    <H1 id="content2-keyboard_title">TẤT CẢ SẢN PHẨM</H1>
    <form action="server.php?page=product.php" style="display:flex;" method="post">
    <div class="main">
        <div class="custom-wrapper">
            <div class="price-input-container">
                <div class="price-input">
                    <div class="price-field">
                        <span style="width:150px;">Giá thấp nhất</span>
                        <input type="number" 
                               class="min-input" 
                               value="0"
                               name="minprice">
                               
                    </div>
                    <div class="price-field">
                        <span style="width:150px;">Giá cao nhất</span>
                        <input type="number" 
                               class="max-input" 
                               value="0"
                               name="maxprice">
                    </div>
                </div>
                <div class="slider-container">
                    <div class="price-slider">
                    </div>
                </div>
            </div>

            <!-- Slider -->
            <div class="range-input">
                <input type="range" 
                       class="min-range" 
                       min="0" 
                       max="10000000" 
                       value="0" 
                       step="1">
                <input type="range" 
                       class="max-range" 
                       min="0" 
                       max="10000000" 
                       value="0" 
                       step="1">
            </div>
            
        </div>
        
    </div>
    <div class="btnPrice" style="display:flex; align-items: end; margin-left:20px;">
        <button type="submit" name="btnPrice" class="btn btn-primary" data-mdb-ripple-init>Lọc</button>    </div>
    </form>
    <div class="content2">
        <?php while ($row = mysqli_fetch_assoc($getSearch)) { ?>
            <div class="content2-keyboard">
                <div class="content2-card">
                    <a href="./php/detailproduct.php?id=<?php echo $row['masanpham']; ?>"><img style="height: 170px; width: 215px;" src="../QUANLI/ASSETS/img/IMG-Product/<?php echo $row['hinhanh']; ?>" alt="" class="content2-keyboard_product"></a>
                    <a href="./php/detailproduct.php?id=<?php echo $row['masanpham']; ?>">
                        <div class="content2-keyboard_discription">
                            <?php echo $row['tensanpham']; ?>
                        </div>
                    </a>
                    <a href="./php/detailproduct.php?id=<?php echo $row['masanpham']; ?>">
                        <button class="content2-keyboard_newprice">
                            <p><?php echo number_format($row['gia']) . '<span style="font-size: 8px"> VNĐ</span>'; ?></p>
                        </button>
                    </a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<?php echo ('<div class="btn-page">');
for ($btn = 1; $btn <= $total; $btn++) {
    if (isset($_SESSION['username'])) {
        echo ('<a href="server.php?page=product.php&btn-page=' . $btn . '" class="nav-link" id="' . $btn . '">' . $btn . '</a>');
    } else {
        echo ('<a href="server.php?page=product.php&btn-page=' . $btn . '" class="nav-link" id="' . $btn . '">' . $btn . '</a>');
    }
    
};
echo ('</div>');
?>

<?php } else { ?>

    <div class="ctn" style="display: flex;
            justify-content: center;
            align-items: center;     
            height: 100vh;">
        <h1 style="font-size: 36px; 
            text-align: center;">KHÔNG TÌM THẤY SẢN PHẨM</h1>
    </div>

<?php } ?>

<!-- end product -->



</body>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Lấy giá trị tham số btn-page từ URL
    const urlParams = new URLSearchParams(window.location.search);
    const btnPage = urlParams.get('btn-page'); // Giá trị của btn-page trong URL

    // Kiểm tra xem giá trị btn-page có tồn tại và tô màu nút tương ứng
    if (btnPage) {
        const activeButton = document.getElementById(btnPage);
        if (activeButton) {
            activeButton.style.backgroundColor = "#007bff"; // Thay đổi màu nút khi nó được chọn
            activeButton.style.color = "#fff"; // Tô chữ màu trắng
        }
    }
});
</script>

</html>


<script>
    //  Script.js
const rangevalue = 
    document.querySelector(".slider-container .price-slider");
const rangeInputvalue = 
    document.querySelectorAll(".range-input input");

// Set the price gap
let priceGap = 500;

// Adding event listners to price input elements
const priceInputvalue = 
    document.querySelectorAll(".price-input input");
for (let i = 0; i < priceInputvalue.length; i++) {
    priceInputvalue[i].addEventListener("input", e => {

        // Parse min and max values of the range input
        let minp = parseInt(priceInputvalue[0].value);
        let maxp = parseInt(priceInputvalue[1].value);
        let diff = maxp - minp

        if (minp < 0) {
            alert("minimum price cannot be less than 0");
            priceInputvalue[0].value = 0;
            minp = 0;
        }

        // Validate the input values
        if (maxp > 10000000) {
            alert("maximum price cannot be greater than 10000");
            priceInputvalue[1].value = 10000000;
            maxp = 10000000;
        }

        if (minp > maxp - priceGap) {
            priceInputvalue[0].value = maxp - priceGap;
            minp = maxp - priceGap;

            if (minp < 0) {
                priceInputvalue[0].value = 0;
                minp = 0;
            }
        }

        // Check if the price gap is met 
        // and max price is within the range
        if (diff >= priceGap && maxp <= rangeInputvalue[1].max) {
            if (e.target.className === "min-input") {
                rangeInputvalue[0].value = minp;
                let value1 = rangeInputvalue[0].max;
                rangevalue.style.left = `${(minp / value1) * 100}%`;
            }
            else {
                rangeInputvalue[1].value = maxp;
                let value2 = rangeInputvalue[1].max;
                rangevalue.style.right = 
                    `${100 - (maxp / value2) * 100}%`;
            }
        }
    });

    // Add event listeners to range input elements
    for (let i = 0; i < rangeInputvalue.length; i++) {
        rangeInputvalue[i].addEventListener("input", e => {
            let minVal = 
                parseInt(rangeInputvalue[0].value);
            let maxVal = 
                parseInt(rangeInputvalue[1].value);

            let diff = maxVal - minVal
            
            // Check if the price gap is exceeded
            if (diff < priceGap) {
            
                // Check if the input is the min range input
                if (e.target.className === "min-range") {
                    rangeInputvalue[0].value = maxVal - priceGap;
                }
                else {
                    rangeInputvalue[1].value = minVal + priceGap;
                }
            }
            else {
            
                // Update price inputs and range progress
                priceInputvalue[0].value = minVal;
                priceInputvalue[1].value = maxVal;
                rangevalue.style.left =
                    `${(minVal / rangeInputvalue[0].max) * 100}%`;
                rangevalue.style.right =
                    `${100 - (maxVal / rangeInputvalue[1].max) * 100}%`;
            }
        });
    }
}
</script>