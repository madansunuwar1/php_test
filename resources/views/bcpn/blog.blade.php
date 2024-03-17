@extends('layouts.app')
@section('content')
        <!-- Content
		============================================= -->
        <section id="content">
            <div class="content-wrap py-0">

                <div class="section dark p-0 m-0 h-100 position-absolute"></div>

                <div class="section bg-color bg-opacity-10 my-0 pt-6 pb-4">
                    <div class="container">

                        <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                            <h3>Blog Title</h3>
                            <div class="gradient-border"></div>
                        </div>

                        <!-- Entry Image
                        ============================================= -->
                        <div class="entry-image mb-0">
                            <img src="images/img1.jpg" alt="Blog Single" class="align-wide-full">
                            <div class="p-4 bg-white position-relative shadow-sm rounded text-center align-wide-lg"
                                style="transform: translateY(-50%);">

                                <!-- Entry Meta
                                ============================================= -->
                                <div class="entry-meta mb-0 pb-0">
                                    <ul>
                                        <li><i class="uil uil-schedule"></i>10th July 2021</li>
                                    </ul>
                                </div><!-- .entry-meta end -->

                            </div>
                        </div>

                        <div class="single-post mw-sm mx-auto">

                            <!-- Single Post
                            ============================================= -->
                            <div class="entry">

                                <div class="clear"></div>

                                <!-- Entry Content
                                ============================================= -->
                                <div class="entry-content">

                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia
                                        odio sem
                                        nec elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus,
                                        porta ac
                                        consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel
                                        scelerisque nisl
                                        consectetur et.</p>

                                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. <a href="#">Curabitur
                                            blandit
                                            tempus porttitor</a>. Integer posuere erat a ante venenatis dapibus posuere
                                        velit
                                        aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum
                                        id
                                        ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget
                                        metus.
                                        Vestibulum id ligula porta felis euismod semper.</p>

                                    <blockquote>
                                        <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est
                                            at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam
                                            venenatis
                                            vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula,
                                            eget
                                            lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor
                                            fringilla.
                                            Vestibulum id ligula porta felis euismod semper.</p>
                                    </blockquote>

                                    <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis
                                        consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget
                                        metus.</p>

                                    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia
                                        bibendum
                                        nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget
                                        quam. <a href="#">Nullam quis risus eget urna</a> mollis ornare vel eu leo.
                                        Integer
                                        posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia
                                        odio sem
                                        nec elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus,
                                        porta ac
                                        consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel
                                        scelerisque nisl
                                        consectetur et.</p>

                                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus
                                        porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
                                        Cras
                                        justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                                        porta felis
                                        euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id
                                        ligula
                                        porta felis euismod semper.</p>
                                    <!-- Post Single - Content End -->

                                    <!-- Tag Cloud
                                    ============================================= -->
                                    <div class="tagcloud mb-5">
                                        <a href="#">general</a>
                                        <a href="#">information</a>
                                        <a href="#">media</a>
                                        <a href="#">press</a>
                                        <a href="#">gallery</a>
                                        <a href="#">illustration</a>
                                    </div><!-- .tagcloud end -->

                                    <!-- Post Single - Share
                                    ============================================= -->
                                    <div class="card my-4 border rounded border-default">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6 class="fs-6 fw-semibold mb-0">Share:</h6>
                                                <div class="d-flex">
                                                    <a href="#"
                                                        class="social-icon si-small text-white border-transparent rounded-circle bg-facebook"
                                                        title="Facebook">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </a>

                                                    <a href="#"
                                                        class="social-icon si-small text-white border-transparent rounded-circle bg-twitter"
                                                        title="Twitter">
                                                        <i class="fa-brands fa-twitter"></i>
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>

                                                    <a href="#"
                                                        class="social-icon si-small text-white border-transparent rounded-circle bg-pinterest"
                                                        title="Pinterest">
                                                        <i class="fa-brands fa-pinterest-p"></i>
                                                        <i class="fa-brands fa-pinterest-p"></i>
                                                    </a>

                                                    <a href="#"
                                                        class="social-icon si-small text-white border-transparent rounded-circle bg-whatsapp"
                                                        title="Whatsapp">
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                    </a>

                                                    <a href="#"
                                                        class="social-icon si-small text-white border-transparent rounded-circle bg-rss"
                                                        title="RSS">
                                                        <i class="fa-solid fa-rss"></i>
                                                        <i class="fa-solid fa-rss"></i>
                                                    </a>

                                                    <a href="#"
                                                        class="social-icon si-small text-white border-transparent rounded-circle bg-email3 me-0"
                                                        title="Mail">
                                                        <i class="fa-solid fa-envelope"></i>
                                                        <i class="fa-solid fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- Post Single - Share End -->

                                </div>
                            </div><!-- .entry end -->

                            <!-- Post Navigation
                            ============================================= -->
                            <div class="row text-center text-md-start justify-content-between my-5">
                                <div class="col-md-auto col-6">
                                    <a href="#" class="d-inline-flex align-items-center text-dark h-text-color"><i
                                            class="uil uil-angle-left-b fs-3 me-1"></i><span>15 Ways to create Healthy
                                            Habits</span></a>
                                </div>
                                <div class="col-md-auto col-6">
                                    <a href="#"
                                        class="d-inline-flex align-items-center text-dark h-text-color"><span>The Next
                                            big thing is AI</span><i class="uil uil-angle-right-b fs-3 ms-1"></i></a>
                                </div>
                            </div><!-- .post-navigation end -->
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #content end -->

        <!-- #content end -->
@endsection