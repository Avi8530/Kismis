 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Footer Example</title>
  <style>
    /*=========================
      Start Footer CSS
    ===========================*/
    .footer {
      position: relative;
    }

    .footer .footer-top {
      padding: 40px 0;
      position: relative;
      background: #1A76D1;
    }

    .footer .footer-top:before {
      position: absolute;
      content: "";
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      background: #000;
      opacity: 0.1;
      z-index: 0;
    }

    .footer .single-footer {
      position: relative;
      z-index: 1;
    }

    .footer .single-footer .social {
      margin-top: 25px;
      padding: 0;
      list-style: none;
    }

    .footer .single-footer .social li {
      display: inline-block;
      margin-right: 10px;
    }

    .footer .single-footer .social li:last-child {
      margin-right: 0;
    }

    .footer .single-footer .social li a {
      height: 34px;
      width: 34px;
      line-height: 34px;
      text-align: center;
      border: 1px solid #fff;
      border-radius: 100%;
      display: block;
      color: #fff;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .footer .single-footer .social li a:hover {
      color: #1A76D1;
      background: #fff;
      border-color: transparent;
    }

    .footer .single-footer.f-link li a i {
      margin-right: 10px;
    }

    .footer .single-footer.f-link li {
      display: block;
      margin-bottom: 12px;
    }

    .footer .single-footer.f-link li:last-child {
      margin: 0;
    }

    .footer .single-footer.f-link li a {
      display: block;
      color: #fff;
      text-transform: capitalize;
      transition: all 0.4s ease;
      font-weight: 400;
      text-decoration: none;
    }

    .footer .single-footer.f-link li a:hover {
      padding-left: 8px;
    }

    .footer .single-footer h2 {
      color: #fff;
      font-size: 20px;
      font-weight: 600;
      text-transform: capitalize;
      padding-bottom: 20px;
      position: relative;
    }

    .footer .single-footer h2::before {
      position: absolute;
      content: "";
      left: 0;
      bottom: 0;
      height: 3px;
      width: 50px;
      background: #fff;
    }

    .footer .single-footer .time-sidual {
      margin-top: 15px;
      overflow: hidden;
      padding-left: 0;
      list-style: none;
    }

    .footer .single-footer .time-sidual li {
      display: block;
      color: #fff;
      width: 100%;
      margin-bottom: 5px;
    }

    .footer .single-footer .time-sidual li span {
      float: right;
    }

    .footer .single-footer .day-head .time {
      font-weight: 400;
      float: right;
    }

    .footer .single-footer p {
      color: #fff;
      line-height: 1.5;
    }

    .footer .single-footer .newsletter-inner {
      margin-top: 20px;
      position: relative;
    }

    .footer .single-footer .newsletter-inner input {
      background: transparent;
      border: 1px solid #fff;
      height: 50px;
      width: 100%;
      margin-right: 15px;
      color: #fff;
      padding-left: 18px;
      padding-right: 70px;
      display: inline-block;
      float: left;
      border-radius: 5px;
      transition: all 0.4s ease;
      font-weight: 400;
    }

    .footer .single-footer .newsletter-inner input:hover {
      padding-left: 22px;
    }

    .footer input::placeholder {
      opacity: 1;
      color: #fff !important;
    }

    .footer .single-footer .newsletter-inner .button {
      position: absolute;
      right: 0;
      top: 0;
      height: 50px;
      width: 50px;
      background: #fff;
      border-left: 1px solid #fff;
      border-radius: 0 5px 5px 0;
      color: #1A76D1;
      font-size: 25px;
      cursor: pointer;
      transition: all 0.4s ease;
      border: none;
    }

    .footer .single-footer .newsletter-inner .button i {
      transition: all 0.4s ease;
    }

    .footer .single-footer .newsletter-inner .button:hover i {
      color: #2C2D3F;
    }

    .footer .copyright {
      background: #1A76D1;
      padding: 25px 0;
      text-align: center;
    }

    .footer .copyright .copyright-content p {
      color: #fff;
      margin: 0;
    }

    .footer .copyright .copyright-content p a {
      color: #fff;
      font-weight: 400;
      text-decoration: underline;
      margin-left: 4px;
    }

    /*=========================
      End Footer CSS
    ===========================*/
  </style>

  <!-- icofont CSS for icons -->
  <link rel="stylesheet" href="css/icofont.css" />
</head>

<body>
  <footer id="footer" class="footer">
    <!-- Footer Top -->
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <!-- Footer Logo -->
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer">
              <a href="index.php">
                <img src="img/logo/logo2.png" alt="Kismis Logo" />
              </a>
            </div>
          </div>

          <!-- About Us -->
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer">
              <h2>About Us</h2>
              <p>
                Kismis is a healthy snack full of energy.<br />
                Eating kismis daily is good for digestion and immunity.
              </p>
              <!-- Social Icons -->
              <ul class="social">
                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                <li>
                  <a href="https://www.instagram.com/leeladhr23?igsh=MXUxdWRtdTk2N2R4ZQ==" target="_blank" rel="noopener noreferrer">
                    <i class="icofont-instagram"></i>
                  </a>
                </li>
                <li><a href="#"><i class="icofont-twitter"></i></a></li>
              </ul>
            </div>
          </div>

          <!-- Open Hours -->
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer">
              <h2>Open Hours</h2>
              <p>We are available at the following times:</p>
              <ul class="time-sidual">
                <li class="day">Monday - Friday <span>8.00 - 20.00</span></li>
                <li class="day">Saturday <span>9.00 - 18.30</span></li>
                <li class="day">Sunday <span>9.00 - 15.00</span></li>
              </ul>
            </div>
          </div>

          <!-- Contact Info -->
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer">
              <h2>Contact Us</h2>
              <ul class="contact-info" style="list-style:none; padding-left:0; color:#fff;">
                <li><i class="icofont-phone"></i> +123 456 7890</li>
                <li><i class="icofont-email"></i> info@kismis.com</li>
                <li><i class="icofont-location-pin"></i> 123 Street Name, City</li>
              </ul>
              <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                <input
                  name="email"
                  placeholder="Your email address"
                  class="common-input"
                  onfocus="this.placeholder=''"
                  onblur="this.placeholder='Your email address'"
                  required
                  type="email"
                />
                <button class="button" type="submit">
                  <i class="icofont-paper-plane"></i>
                </button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End Footer Top -->

    <!-- Copyright -->
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="copyright-content">
              <p>© Copyright 2025 | All Rights Reserved by <b>@avi</b></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Copyright -->
  </footer>
</body>

</html>
