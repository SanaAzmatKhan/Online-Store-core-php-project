<?php

include_once("navbar.php");

if (isset($_GET['action'])) {


  if ($_GET['action'] == 'add') {
    if (isset($_SESSION['cart'])) {
      $Item_IDD = array_column($_SESSION['cart'], 'item_ID');

      if (!in_array($_GET['ID'], $Item_IDD)) {  //check data alread exist or not


        $item_array = array(

          'item_ID' => $_GET['ID'],
          'item_qty' => '1'

        );

        $count = count($_SESSION['cart']);


        $_SESSION['cart'][$count] = $item_array;
        echo "<script>javascript:history.go(-1)</script>";
      } else {


        echo '<script>alert("item already exist");</script>';
        echo "<script>javascript:history.go(-1)</script>";
      }   //check data alread exist or not



    } else {  //First Time 

      $item_array = array(

        'item_ID' => $_GET['ID'],
        'item_qty' => '1'

      );

      $_SESSION['cart'][0] = $item_array;
      echo "<script>javascript:history.go(-1)</script>";
    }
  }
}



if (!empty($_SESSION['cart'])) {
  if (isset($_GET['action'])) {


    if ($_GET['action'] == 'decrement') {


      foreach ($_SESSION['cart'] as $varr => $valuueee) {


        if ($valuueee['item_ID'] == $_GET['ID']) {
          if ($_SESSION['cart'][$varr]['item_qty'] > 1) {
            $_SESSION['cart'][$varr]['item_qty']--;
          } else {
            echo "<script>alert('or delete nahi kr skte');</script>";
          }
        }
      }
    }
  }
}



if (!empty($_SESSION['cart'])) {
  if (isset($_GET['action'])) {


    if ($_GET['action'] == 'increment') {


      foreach ($_SESSION['cart'] as $varr => $valuueee) {


        if ($valuueee['item_ID'] == $_GET['ID']) {
          $_SESSION['cart'][$varr]['item_qty']++;
        }
      }
    }
  }
}
if (!empty($_SESSION['cart'])) {
  if (isset($_GET['action'])) {


    if ($_GET['action'] == 'delete') {


      foreach ($_SESSION['cart'] as $varr => $valuueee) {


        if ($valuueee['item_ID'] == $_GET['ID']) {

          array_splice($_SESSION['cart'], $varr, $varr + 1);
        }
      }
    }
  }
}




?>
<br />
<br />
<br />
<div class="site-wrap">


  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php $AllTotal = 0; ?>
                <?php if (isset($_SESSION['cart'])) {

                  foreach ($_SESSION['cart'] as $iddd) {
                    $IDI = $iddd["item_ID"];
                    $query = "SELECT * FROM `products` WHERE PRO_ID=$IDI";
                    $result = $con->query($query);
                    $obj = $result->fetch_object();
                    $qty = $iddd["item_qty"];
                    $Total = $obj->PRO_PRICE;

                    $AllTotal = ($Total * $qty) + $AllTotal;
                ?>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="<?php echo $obj->PRO_IMAGE; ?>" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black"><?php echo $obj->PRO_NAME; ?></h2>
                      </td>
                      <td><?php echo $obj->PRO_PRICE; ?></td>
                      <td>

                        <div class="input-group mb-3" style="max-width: 120px;">
                          <div class="input-group-prepend">
                            <a class="btn btn-outline-primary js-btn-minus" href="cart.php?action=decrement&ID=<?php echo $IDI ?>">&minus;</a>
                          </div>
                          <input disabled="" type="text" class="form-control text-center" value="<?php echo $iddd["item_qty"]; ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                          <div class="input-group-append">
                            <a class="btn btn-outline-primary js-btn-plus" href="cart.php?action=increment&ID=<?php echo $IDI ?>">&plus;</a>
                          </div>
                        </div>

                      </td>
                      <td><?php echo $subTotaall = $Total * $qty; ?></td>
                      <td><a href="cart.php?action=delete&ID=<?php echo $IDI ?>" class="btn btn-primary btn-sm">X</a></td>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>

                    <th colspan="6" style="text-align: center;">There is no Item Exits</th>

                  </tr>


                <?php } ?>
              </tbody>
            </table>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">

            </div>
            <div class="col-md-6">
              <a class="btn btn-outline-primary btn-sm btn-block" href="index.php">Continue Shopping</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="text-black h4" for="coupon">Coupon</label>
              <p>Enter your coupon code if you have one.</p>
            </div>
            <div class="col-md-8 mb-3 mb-md-0">
              <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
            </div>
            <div class="col-md-4">
              <button class="btn btn-primary btn-sm">Apply Coupon</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black"><?php echo $AllTotal; ?></strong>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black"><?php echo $AllTotal; ?></strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='cart.php?action=checkout'">Proceed To Checkout</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<br />
<br />
<br />



<?php

if (isset($_GET['action'])) {


  if ($_GET['action'] == 'checkout') {
    $oID = uniqid();
    $_SESSION['USERIDD'] = 1;
    $userId = $_SESSION['USERIDD'];
    $crruntdate = date('Y-m-d');

    $query1 = "INSERT INTO `order_detail` (`ORDER_ID`, `ORDER_DATE`, `U_ID`, `ORDER_COST`) VALUES ('$oID', '$crruntdate', '$userId', '$AllTotal');";
    $resul1 = $con->query($query1);
    if ($resul1) {

      foreach ($_SESSION['cart'] as $value) {
        # code...
        $proID = $value["item_ID"];
        $proqty = $value["item_qty"];
        $query3 = "SELECT * FROM `products` WHERE PRO_ID=$proID";
        $result3 = $con->query($query3);
        $obj1 = $result3->fetch_object();
        $Total1 = $obj1->PRO_PRICE;
        $TotatlPrize = $Total1 * $proqty;

        $query2 = "INSERT INTO `order_done` (`OD_ID`, `OR_ID`, `PRO_ID`, `PRO_QTY`, `PRO_AMOUNT`) VALUES (NULL, '$oID', '$proID', '$proqty', '$TotatlPrize');";
        $result2 = $con->query($query2);
      }


      if ($result2) {

        unset($_SESSION['cart']);
        echo "<script>window.location.href='index.php'</script>";
      }
    } else {
    }
  }
}



?>
<?php include_once('footer.php') ?>