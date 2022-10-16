<div class="card boolist_card">
<img class="card-img-top" src="assets/images/books-sample.jpg" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Mahashatra</h5>
        <p class="card-text">Some quick example book to build on the card title and make up the bulk of the card's content.</p>
        <div class="row">
            <div class="col-7">
                <?php if(current_file()=='cart.php'){ ?>
                    <select name="quantity" id="itemListQuantity" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                <?php } else{  ?>
                    <a href="#" class="btn btn-warning btn-fixe-size"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                <?php } ?>
            </div>
            <div class="col-5">
                <a href="#" class="btn btn-success  btn-fixe-size">Buy Now</a>
            </div>
        </div>
    </div>
</div>