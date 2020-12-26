@extends( 'layouts.universo' )

@section( 'page_title', 'Home' )

@section( 'content' )

    <!-- Page Content -->
    <div id="page-content">
        <!-- Slider -->
        <div id="homepage-carousel">
            <div class="container">
                <div class="homepage-carousel-wrapper">
                    <div class="row">
                        <div class="col-md-6 col-sm-7">
                            <div class="image-carousel">
                                <div class="image-carousel-slide"><img src="assets/img/slide-1.jpg" alt=""></div>
                                <div class="image-carousel-slide"><img src="assets/img/slide-2.jpg" alt=""></div>
                                <div class="image-carousel-slide"><img src="assets/img/slide-3.jpg" alt=""></div>
                            </div><!-- /.slider-image -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 col-sm-5" style="min-height: 350px;">
                            <div class="slider-content">
                                <div class="row">
                                    <div class="col-md-12" id="slider-right">
                                        @guest
                                        <h1>Join the community</h1>
                                        <form id="slider-form" role="form" action="{{ route('register') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control has-dark-background" name="name" id="slider-name" placeholder="Full Name" type="text" required>
                                                    </div>
                                                </div><!-- /.col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control has-dark-background" name="username" id="username" placeholder="Choose unique username" type="text" required>
                                                    </div>
                                                </div><!-- /.col-md-6 -->
                                            </div><!-- /.row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control has-dark-background" name="email" id="email" placeholder="Email" type="email" required>
                                                    </div>
                                                </div><!-- /.col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                                            <option value="">Level</option>
                                                            <option value="Beginner">Beginner</option>
                                                            <option value="Intermediate">Intermediate</option>
                                                            <option value="Advanced">Advanced</option>
                                                            <option value="Professional">Professional</option>
                                                        </select>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col-md-6 -->
                                            </div><!-- /.row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control has-dark-background" name="password" id="password" placeholder="Password" type="password" required>
                                                    </div>
                                                </div><!-- /.col-md-6 -->
                                                <div class="col-md-6">
                                                    <input class="form-control has-dark-background" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" type="password" required>
                                                </div><!-- /.col-md-6 -->
                                            </div><!-- /.row -->
                                            <button type="submit" id="slider-submit" class="btn btn-framed pull-right">Get started</button>
                                            <div id="form-status"></div>
                                        </form>
                                        @endguest
                                        @auth
                                        <h1>Welcome back,<br>{{ \Auth::user()->name }}</h1>
                                            @endauth
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.slider-content -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="background"></div>
                </div><!-- /.slider-wrapper -->
                <div class="slider-inner"></div>
            </div><!-- /.container -->
        </div>
        <!-- end Slider -->

        <!-- News, Events, About -->
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <section class="news-small" id="news-small">
                            <header>
                                <h2>News</h2>
                            </header>
                            <div class="section-content">
                                @foreach( $articles as $article )
                                <article>
                                    <figure class="date"><i class="fa fa-file-o"></i>{{ date( 'd M Y', strtotime( $article->created_at ) ) }}</figure>
                                    <header><a href="#">{{ $article->title }}</a></header>
                                </article><!-- /article -->
                                @endforeach
                            </div><!-- /.section-content -->
                            <a href="" class="read-more stick-to-bottom">All News</a>
                        </section><!-- /.news-small -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6">
                        <section class="events small" id="events-small">
                            <header>
                                <h2>Tournaments</h2>
                                <a href="" class="link-calendar">Calendar</a>
                            </header>
                            <div class="section-content">
                                @foreach( $tournaments as $tournament )
                                <article class="event nearest">
                                    <figure class="date">
                                        <div class="month">{{ date( 'M', strtotime( $tournament->start_at ) ) }}</div>
                                        <div class="day">{{ date( 'd', strtotime( $tournament->start_at ) ) }}</div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="#">{{ $tournament->title }}</a>
                                        </header>
                                        <div class="additional-info">{{ $tournament->user->name }}</div>
                                    </aside>
                                </article><!-- /article -->
                                @endforeach
                            </div><!-- /.section-content -->
                        </section><!-- /.events-small -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-12">
                        <section id="about">
                            <header>
                                <h2>About Learning Pawn</h2>
                            </header>
                            <div class="section-content">
                                <img src="assets/img/students.jpg" alt="" class="add-margin">
                                <p><strong>Welcome to Learning Pawn.</strong> Pramet, consectetur adipiscing elit. Donec laoreet semper tincidunt.
                                    Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                                <a href="" class="read-more stick-to-bottom">Read More</a>
                            </div><!-- /.section-content -->
                        </section><!-- /.about -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- end News, Events, About -->

        <!-- Testimonial -->
        <section id="testimonials">
            <div class="block">
                <div class="container">
                    <div class="author-carousel">
                        <div class="author">
                            <blockquote>
                                <figure class="author-picture"><img src="assets/img/student-testimonial.jpg" alt=""></figure>
                                <article class="paragraph-wrapper">
                                    <div class="inner">
                                        <header>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor.
                                            Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet.</header>
                                        <footer>Claire Doe</footer>
                                    </div>
                                </article>
                            </blockquote>
                        </div><!-- /.author -->
                        <div class="author">
                            <blockquote>
                                <figure class="author-picture"><img src="assets/img/student-testimonial.jpg" alt=""></figure>
                                <article class="paragraph-wrapper">
                                    <div class="inner">
                                        <header>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor.
                                            Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet.</header>
                                        <footer>Claire Doe</footer>
                                    </div>
                                </article>
                            </blockquote>
                        </div><!-- /.author -->
                    </div><!-- /.author-carousel -->
                </div><!-- /.container -->
            </div><!-- /.block -->
        </section>
        <!-- end Testimonial -->

        <!-- Academic Life, Campus Life, Newsletter -->
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <section id="programs">
                            <header>
                                <h2>Our Programs</h2>
                            </header>
                            <div class="section-content">
                                <ul class="list-links">
                                    <li><a href="#">Mathematics Tournaments</a></li>
                                    <li><a href="#">Chess tournaments</a></li>
                                    <li><a href="#">Chess education</a></li>
                                    <li><a href="#">Continuing Studies</a></li>
                                    <li><a href="#">International Activities</a></li>
                                    <li><a href="#">STEM contests</a></li>
                                </ul>
                            </div><!-- /.section-content -->
                        </section><!-- /.programs -->
                    </div><!-- /.col-md-4 -->

                    <div class="col-md-4 col-sm-4">
                        <section id="campus-life">
                            <header>
                                <h2>Leaderboard Life</h2>
                            </header>
                            <div class="section-content">
                                <ol class="list-links">
                                    <li><a href="#">Athletician</a></li>
                                    <li><a href="#">8ofClubs</a></li>
                                    <li><a href="#">HealthyPup</a></li>
                                    <li><a href="#">House31</a></li>
                                    <li><a href="#">ArtOfCheckMate</a></li>
                                    <li><a href="#">7ervices</a></li>
                                </ol>
                            </div><!-- /.section-content -->
                        </section><!-- /.campus-life -->
                    </div><!-- /.col-md-4 -->

                    <div class="col-md-4 col-sm-4">
                        <section id="newsletter">
                            <header>
                                <h2>Newsletter</h2>
                                <div class="section-content">
                                    <div class="newsletter">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Your e-mail">
                                            <span class="input-group-btn">
                                        <button type="submit" class="btn"><i class="fa fa-angle-right"></i></button>
                                    </span>
                                        </div><!-- /input-group -->
                                    </div><!-- /.newsletter -->
                                    <p class="opacity-50">Ut tincidunt, quam in tincidunt vestibulum, turpis ipsum porttitor nisi, et fermentum augue
                                        lit eu neque. In at tempor dolor, sit amet dictum lacus. Praesent porta orci eget laoreet ultrices.
                                    </p>
                                </div><!-- /.section-content -->
                            </header>
                        </section><!-- /.newsletter -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- end Academic Life, Campus Life, Newsletter -->

        <!-- Our Professors, Gallery -->
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <section id="our-professors">
                            <header>
                                <h2>Our Instructors</h2>
                            </header>
                            <div class="section-content">
                                <div class="professors">
                                    <article class="professor-thumbnail">
                                        <figure class="professor-image"><a href="member-detail.html"><img src="assets/img/professor.jpg" alt=""></a></figure>
                                        <aside>
                                            <header>
                                                <a href="member-detail.html">Mathew Davis</a>
                                                <div class="divider"></div>
                                                <figure class="professor-description">Applied Science and Engineering</figure>
                                            </header>
                                            <a href="member-detail.html" class="show-profile">Show Profile</a>
                                        </aside>
                                    </article><!-- /.professor-thumbnail -->
                                    <article class="professor-thumbnail">
                                        <figure class="professor-image"><a href="member-detail.html"><img src="assets/img/professor-02.jpg" alt=""></a></figure>
                                        <aside>
                                            <header>
                                                <a href="member-detail.html">Jane Stairway</a>
                                                <div class="divider"></div>
                                                <figure class="professor-description">Applied Science and Engineering</figure>
                                            </header>
                                            <a href="member-detail.html" class="show-profile">Show Profile</a>
                                        </aside>
                                    </article><!-- /.professor-thumbnail -->
                                    <a href="" class="read-more stick-to-bottom">All Professors</a>
                                </div><!-- /.professors -->
                            </div><!-- /.section-content -->
                        </section><!-- /.our-professors -->
                    </div><!-- /.col-md-4 -->

                    <div class="col-md-8 col-sm-8">
                        <section id="gallery">
                            <header>
                                <h2>Gallery</h2>
                            </header>
                            <div class="section-content">
                                <ul class="gallery-list">
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-01.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-02.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-03.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-04.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-05.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-06.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-07.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-08.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-09.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-10.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-11.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-12.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-13.jpg" alt=""></a></li>
                                    <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-14.jpg" alt=""></a></li>
                                </ul>
                                <a href="" class="read-more">Go to Gallery</a>
                            </div><!-- /.section-content -->
                        </section><!-- /.gallery -->
                    </div><!-- /.col-md-4 -->

                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- end Our Professors, Gallery -->

        <!-- Partners, Make a Donation -->
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <section id="partners">
                            <header>
                                <h2>Partners & Donors</h2>
                            </header>
                            <div class="section-content">
                                <div class="logos">
                                    <div class="logo"><a href=""><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                                    <div class="logo"><a href=""><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                                    <div class="logo"><a href=""><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                                    <div class="logo"><a href=""><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                                    <div class="logo"><a href=""><img src="assets/img/logo-partner-05.png" alt=""></a></div>
                                </div>
                            </div>
                        </section>
                    </div><!-- /.col-md-9 -->
                    <div class="col-md-3 col-sm-3">
                        <section id="donation">
                            <header>
                                <h2>Make a Donation</h2>
                            </header>
                            <div class="section-content">
                                <a href="" class="universal-button">
                                    <h3>Support the Learning Pawn!</h3>
                                    <figure class="date"><i class="fa fa-arrow-right"></i></figure>
                                </a>
                            </div><!-- /.section-content -->
                        </section>
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- end Partners, Make a Donation -->
    </div>
    <!-- end Page Content -->
    @stop
