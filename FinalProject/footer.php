<head>
    <style>
        .footer a, .footer li, .footer p {
            font-weight: 100;
            color: #4A4A4A;
            line-height: 1.8;
            text-decoration: none;
        }
        .small-title {
            display: inline-block;
            font-weight: 700;
            font-size: 0.75rem;
            color: #4A4A4A;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            line-height: 1.1;
        }
        .download-logo {
            height: 2.2rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
    </style>

</head>
<footer class="footer" style="background-color: #FFFFFF;
    z-index: 1000;margin-top: 3%">
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer__menu">
                <ul class="list-unstyled">
                    <li><h3 class="small-title">We're Mom's</h3></li>
                    <li><a href="/Home/About">About Us</a></li>
                    <li><a href="/Home/AvailableAreas">Available Areas</a></li>
                    <li><a href="/Home/DeliveryCharge">Delivery Charges</a></li>
                    <li><a href="https://blog.foodmandu.com/" target="_blank">Blog</a></li>
                </ul>
                <p>

                    <br><h3 class="small-title">Service Hour</h3>
                <span style="font-size:80%">11:00 AM to 8:30 PM (NST)</span>

                </p>
            </div>

            <div class="col-md-2 footer__menu" ng-controller="OldVersionController">
                <ul class="list-unstyled">
                    <li><h3 class="small-title">Get Help</h3></li>
                    <li><a href="/Home/HowToOrder">How to Order?</a></li>
                    <li><a href="/Home/Faqs">FAQs</a></li>
                    <li><a href="/Home/Contact">Contact Us</a></li>
                </ul>


            </div>

            <div class="col-md-3 footer__menu footer__menu--info">
                <ul class="list-unstyled">
                    <li><h3 class="small-title">Call us</h3></li>
                    <li>Kathmandu: 4444177, 4440979, 9802034008</li>
                    <li><h3 class="small-title">Call us</h3></li>
                    <li>Pokhara: 9802859990, 9802853330  </li>
                </ul>
            </div>

            <div class="col-md-4 footer__menu footer__menu--download">
                <h3 class="small-title block">Download App</h3>
                <a href="https://itunes.apple.com/np/app/foodmandu/id983591001"><img src="Images/itunes.png" alt="" class="download-logo"></a>
                <a href="https://play.google.com/store/apps/details?id=com.app.foodmandu"><img src="Images/play.png" alt="" class="download-logo"></a>
            </div>

            <div class="col-md-12 footer__tnc">
                <hr>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="/Home/TermsOfUse">Terms of Usage</a></li> |
                    <li class="list-inline-item"><a href="/Home/PrivacyPolicy"> Privacy Policy</a></li>
                    <li class="list-inline-item float-md-right">&copy; 2020 Mom's Pvt. Ltd. All Rights Reserved.</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
