<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="{{ url('/') }}"><img src="{{url('img/1.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="{{ url('/') }}">Homepage</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p style="color: gray">
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Platform is developed <i class="fa fa-heart" style="color: red" aria-hidden="true"></i> by <a href="https://www.instagram.com/jay_tarpada/" target="_blank">Jay Tarpada</a>
              </p>

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->