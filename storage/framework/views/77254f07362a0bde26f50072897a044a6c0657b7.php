<?php $__env->startSection('header'); ?>
##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
<!--carousel-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
    <!--indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol> <!--/.indicators-->
    <!--slides-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
            <!--Mask-->
            <div class="view">
                <!--Video source-->
                <video muted autoplay loop playsinline>
                    <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4"/>
                </video>
                <!--carousel content-->
                <div class="full-bg-img flex-center mask rgba-indigo-light white-text">
                    <ul class="animated fadeInUp col-md-12 list-unstyled list-inline">
                        <li><h1 class="font-weight-bold text-uppercase">Material Design for Bootstrap 4</h1></li>
                        <li><p class="font-weight-bold text-uppercase py-4">The most powerful and free UI KIT for Bootstrap</p></li>
                        <li class="list-inline-item"><a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-unique btn-lg btn-rounded mr-0">Sign up!</a></li>
                        <li class="list-inline-item"> <a target="_blank" href="https://mdbootstrap.com/material-design-for-bootstrap/" class="btn btn-cyan btn-lg btn-rounded ml-0">Learn more</a></li>
                    </ul>
                </div>
            </div><!--/mask-->
        </div><!--/first slide-->
        <!--second slide-->
        <div class="carousel-item">
            <!--mask color-->
            <div class="view"><!--video source-->
                <video muted autoplay loop playsinline>
                    <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4"/>
                </video> <!--carousel content-->
                <div class="full-bg-img flex-center mask rgba-purple-light white-text">
                    <ul class="animated fadeInUp col-md-12 list-unstyled">
                        <li><h1 class="font-weight-bold text-uppercase">Lots of tutorials at your disposal</h1></li>
                        <li> <p class="font-weight-bold text-uppercase py-4">And all of them are FREE!</p></li>
                        <li> <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-pink btn-rounded btn-lg">Start learning</a> </li>
                    </ul>
                </div>
            </div><!--/mask color-->
        </div><!--/second slide-->
        <!--third slide-->
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <!--Video source-->
                <video muted autoplay loop playsinline>
                    <source src="https://mdbootstrap.com/images/video/Tropical.mp4" type="video/mp4"/>
                </video> <!--carousel content-->
                <div class="full-bg-img flex-center mask rgba-blue-light white-text">
                    <ul class="animated fadeInUp col-md-12 list-unstyled">
                        <li><h1 class="font-weight-bold text-uppercase">Visit our support forum</h1></li>
                        <li> <p class="font-weight-bold text-uppercase py-4">Our community can help you with any question</p> </li>
                        <li> <a target="_blank" href="https://mdbootstrap.com/forums/forum/support/" class="btn btn-lg btn-indigo btn-rounded">Support forum</a> </li>
                    </ul>
                </div>
            </div><!--/mask color-->
        </div><!--/third slide-->
    </div><!--/.slides-->
    <!--controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a><!--/.controls--> 
</div><!--/.carousel-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <section>
        <div class="card my-5">
            <div class="card-body">
                <div class="row justify-content-md-center"> 
                    <div class="recommend py-5">
                        <h1 class="card-title"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;精彩视频</h1>
                        <video id="my-player" class="video-js vjs-theme-city" controls preload="auto" width="640" height="480" poster="//vjs.zencdn.net/v/oceans.png" data-setup='{}'>
                            <source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4"></source>
                            <source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm"></source>
                            <source src="//vjs.zencdn.net/v/oceans.ogv" type="video/ogg"></source>
                            <p class="vjs-no-js"> To view this video please enable JavaScript, and consider upgrading to a web browser that<a href="https://videojs.com/html5-video-support/" target="_blank"> supports HTML5 video</a></p>
                        </video>
                    </div>
                </div>

                <div class="title"><i class="far fa-thumbs-up"></i>&nbsp;&nbsp;推荐文章</div>

                <?php for($i = 0; $i < 2; $i++): ?>
                <div class="row justify-content-sm-center py-3">
                    <?php for($j = 0; $j < 2; $j++): ?> 
                    <div class="col-sm-5">
                            <!-- Card -->
                            <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">
                                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4"> 
                                    <div>
                                        <h5 class="pink-text"><i class="fas fa-chart-pie"></i>Marketing</h5>
                                        <h3 class="card-title pt-2"><strong>This is the card title</strong></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem, optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos. Odit sed qui, dolorum!.</p>
                                        <a class="btn btn-pink"><i class="fas fa-clone left"></i> View project</a>
                                    </div>
                                </div>
                            </div><!--card-->
                    </div>
                    <?php endfor; ?>
                </div>
                <?php endfor; ?>
            </div>
        </div><!--.card--->
    </section>

    <section">
        <div class="recommend">
        <h4 class=" title font-weight-bold"><strong>all posts</strong></h4>
        <hr class="red title-hr">
        <div class="row my-3"> 
            <?php for($j = 0; $j < 3; $j++): ?>
            <div class="col-sm-4">
            <!--card-->
            <div class="card ">
                <!--card image overlay-->
                <div class="view ">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap">
                    <a><div class="mask rgba-white-slight"></div></a>
                </div>
                <!--button -->
                <a class="btn-floating btn-action float-right ml-auto mr-4 mdb-color lighten-3"><i class="fas fa-chevron-right pl-1"></i></a>
                <!--card body -->
                <div class="card-body">
                    <!-- Title class="card-title"-->
                    <h4 >Card title</h4>

                    <hr>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                </div><!--card body -->
                <!--card footer-->
                <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                    <ul class="list-unstyled list-inline font-small">
                        <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>05/10/2015</li>
                        <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="far fa-comments pr-1"></i>12</a></li>
                        <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fab fa-facebook-f pr-1"></i>21</a></li>
                        <li class="list-inline-item"><a href="#" class="white-text"><i class="fab fa-twitter pr-1"> </i>5</a></li>
                    </ul>
                </div><!--.card footer-->
                
            </div><!--.card -->
            </div>
            <?php endfor; ?>
           
        </div>
        </div>
    </section><!--section-->

    <section>
        <div class="row">
            <div class="col-sm-4">
                <a class="float-left btn-floating btn-large disabled"><i class="fas fa-angle-left"></i></a>
            </div>
            <div class="col-sm-4 page-info">
                <div class="text-center b-text-gray">1 / 5</div>
            </div>
            <div class="col-sm-4">
                <a href="/page/2/" class="float-right btn-floating btn-large waves-effect waves-light bg-color"> <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<!---->
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
            /* WOW.js init */
            new WOW().init();
            // Material Select Initialization
            $(document).ready(function () {
            $('.mdb-select').material_select();
            });
            // MDB Lightbox Init
            $(function () {
                $("#mdb-lightbox-ui").load("../../../mdb-addons/mdb-lightbox-ui.html");
            });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/ourbox/resources/views/blog/index.blade.php ENDPATH**/ ?>