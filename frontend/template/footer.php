
        <!-- *** FOOTER ***
 _________________________________________________________ -->
 <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>購物須知</h4>

                        <ul>
                            <li><a href="contact.php">聯絡我們</a>
                            </li>
                            <li><a href="faq.php">常見問題</a>
                            </li>
                            
                        </ul>

                        <hr>

                        <h4>會員專區</h4>

                        <ul>
                            <?php if(isset($_SESSION["member"]) && $_SESSION['member'] != null){ ?>
                             <li><a href="customer-account.php">會員專區</a>
                            </li>
                            <li><a href="logout.php">登出</a>
                            </li>
                            <?php }else{?>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">會員登入</a>
                            </li>
                            <li><a href="register.php">加入會員</a>
                            </li>
                            <?php } ?>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>產品分類</h4>
                        <?php foreach($categories as $footer_categories){  ?>
                        <a href="product_list.php?categoryID=<?php echo $footer_categories['product_categoryID']; ?>&category=<?php echo $footer_categories["category"]; ?>">
                        <h5><?php echo $footer_categories['category']; ?></h5></a>
                        <?php } ?>  
                       
                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>門市地點</h4>

                        <p>320
                                    <br>桃園市中壢區健行路229號
                                    
                                </p>
                        <a href="contact.php">前往聯絡我們頁面</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>訂閱電子報</h4>

                        <p class="text-muted">若想得到我們的最新活動訊息，請輸入您的E-mail，於認證後即可收到我們的電子報。 </p>
                        <p> 電子報為免費訂閱，無須負擔任何費用。</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">訂閱!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>追蹤我們</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2018 Cake House All Right Reserved.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Designed by <a href="https://bootstrapious.com/e-commerce-templates">Kemie 
                         <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="../js/jquery-1.11.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-ui/jquery-ui.min.js"></script>
    <script src="../js/jquery.cookie.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/modernizr.js"></script>
    <script src="../js/bootstrap-hover-dropdown.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/front.js"></script>
    <script src="../js/validator.min.js"></script>
    <script src="../js/jquery.twzipcode.min.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a1683cb198bd56b8c03cd65/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



