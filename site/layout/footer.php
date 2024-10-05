<footer>
    <div class="footer-area pt-50 bg-white">
        <div class="container">
            <div class="row pb-30">
                <?php 
                $j = 0;
                for ($i = 1; $i <= 5; $i++) { 
                    $counter = 1;
                    ?>
                    <div class="col">
                        <ul class="float-right ml-30 font-medium">
                            <?php foreach($categoriesList as $category){ 
                                if(isset($categoriesList[$j])){
                                ?>
                                
                            <li class="cat-item cat-item-2"><a href="<?= $SITE_PATH ?>/category/category-big.php?category=<?= $category['id'] ?>"><?= $categoriesList[$j]['name'] ?></a></li>
                            <?php }
                            $j += 1;
                            $counter += 1;
                            if($counter == 9)
                                    break;
                            } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area bg-white text-muted">
        <div class="container">
            <div class="footer-border pt-20 pb-20">
                <div class="row d-flex mb-15">
                    <div class="col-12">
                        <ul class="list-inline font-small">
                            <?php foreach ($categoriesList as $category) { ?>
                                <li class="list-inline-item"><a href="<?= $URL_PATH ?>/category/category-big?category=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-12">
                        <div class="footer-copy-right">
                            <p class="font-small text-muted">© 1400 ، نیوز وایرال | کلیه حقوق محفوظ است | راستچین شده
                                توسط <a href="#" target="_blank">لوکس تم</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>