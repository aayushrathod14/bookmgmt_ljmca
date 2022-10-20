<div class="card boolist_card">
<img class="card-img-top" src="<?=BASE_URL.$book['image']?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title book_title"><?=$book['title']?></h5>
        <p class="card-text book_description"><?=$book['description']?></p>
        <div class="row">
            <div class="col-">
                <span class="book_price">MRP : ₹<?=$book['price']?></span>
            </div>
        </div>
        <?php
        if(isset($book['is_purchased']) && $book['is_purchased']){
             ?>
            <span>Order No. : #<?=$book['order_no']?></span> <br>
            <span>Quantity : <?=$book['quantity']?></span>  <br>
            <button class="btn btn-success">Purchased</button>
        <?php }
        else{ ?>
        <div class="row">
            <div class="col-7">
                <?php
                if(current_file()=='cart.php'){ ?>
                    <select name="quantity[]" data-fid="<?=$book['id']?>" class="itemListQuantity form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                <?php } else{  ?>
                    <form action="app/userFormController.php" method="post">
                        <button type='submit' <?=$book['cart_id']?'disabled':''?> name="addtocart" value="<?=$book['id']?>" class="btn btn-warning btn-fixe-size"><i class="fa fa-shopping-cart"></i> <?=$book['cart_id']?'Added':'Add to Cart'?></button>
                    </form>
                <?php } ?>
            </div>
            <div class="col-5">
                <form action="/app/userFormController.php" method="post">
                    <input type="hidden" id="total_quantity<?=$book['id']?>" name="total_quantity" value="1">
                    <button type='submit' name="butnowForm" value="<?=$book['id']?>" class="btn btn-success  btn-fixe-size">Buy Now</button>
                </form>
            </div>
            </div>
            <?php } ?>
        <?php
        if(current_file()=='cart.php'){ ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <form action="app/userFormController.php" method="post">
                    <button type="submit" name="removefcart" value="<?=$book['cart_id']?>" class="btn btn-danger align-center">Remove</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>