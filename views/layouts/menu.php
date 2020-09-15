<?php

use yii\helpers\Url;

?>

<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="<?php echo Url::to(['/']) ?>"><i class="ti-home"></i>Dashboard</a>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="ti-package"></i>UI Elements</a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="ui-alerts.html">Alerts</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-carousel.html">Carousel</a></li>
                                <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                <li><a href="ui-grid.html">Grid</a></li>
                                <li><a href="ui-images.html">Images</a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><a href="ui-lightbox.html">Lightbox</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                                <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                                <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-video.html">Video</a></li>
                                <li><a href="ui-general.html">General</a></li>
                                <li><a href="ui-colors.html">Colors</a></li>
                                <li><a href="ui-rating.html">Rating</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="ti-harddrives"></i>Components</a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Email</a>
                            <ul class="submenu">
                                <li><a href="email-inbox.html">Inbox</a></li>
                                <li><a href="email-read.html">Email Read</a></li>
                                <li><a href="email-compose.html">Email Compose</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="calendar.html">Calendar</a>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Forms</a>
                            <ul class="submenu">
                                <li><a href="form-elements.html">Form Elements</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-advanced.html">Form Advanced</a></li>
                                <li><a href="form-editors.html">Form Editors</a></li>
                                <li><a href="form-uploads.html">Form File Upload</a></li>
                                <li><a href="form-xeditable.html">Form Xeditable</a></li>
                                <li><a href="form-repeater.html">Form Repeater</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-mask.html">Form Mask</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#">Charts</a>
                            <ul class="submenu">
                                <li><a href="charts-morris.html">Morris Chart</a></li>
                                <li><a href="charts-chartist.html">Chartist Chart</a></li>
                                <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                                <li><a href="charts-flot.html">Flot Chart</a></li>
                                <li><a href="charts-knob.html">Jquery Knob Chart</a></li>
                                <li><a href="charts-echart.html">E - Chart</a></li>
                                <li><a href="charts-sparkline.html">Sparkline Chart</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#">Tables</a>
                            <ul class="submenu">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Data Table</a></li>
                                <li><a href="tables-responsive.html">Responsive Table</a></li>
                                <li><a href="tables-editable.html">Editable Table</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Icons</a>
                            <ul class="submenu">
                                <li><a href="icons-material.html">Material Design</a></li>
                                <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                <li><a href="icons-ion.html">Ion Icons</a></li>
                                <li><a href="icons-themify.html">Themify Icons</a></li>
                                <li><a href="icons-dripicons.html">Dripicons</a></li>
                                <li><a href="icons-typicons.html">Typicons Icons</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Maps</a>
                            <ul class="submenu">
                                <li><a href="maps-google.html"> Google Map</a></li>
                                <li><a href="maps-vector.html"> Vector Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="ti-archive"></i> Authentication</a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="pages-login.html">Login 1</a></li>
                                <li><a href="pages-register.html">Register 1</a></li>
                                <li><a href="pages-recoverpw.html">Recover Password 1</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen 1</a></li>

                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><a href="pages-login-2.html">Login 2</a></li>
                                <li><a href="pages-register-2.html">Register 2</a></li>
                                <li><a href="pages-recoverpw-2.html">Recover Password 2</a></li>
                                <li><a href="pages-lock-screen-2.html">Lock Screen 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="ti-support"></i>Extra Pages</a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="pages-timeline.html">Timeline</a></li>
                                <li><a href="pages-invoice.html">Invoice</a></li>
                                <li><a href="pages-directory.html">Directory</a></li>
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-404.html">Error 404</a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><a href="pages-pricing.html">Pricing</a></li>
                                <li><a href="pages-gallery.html">Gallery</a></li>
                                <li><a href="pages-maintenance.html">Maintenance</a></li>
                                <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                                <li><a href="pages-faq.html">Faq</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="ti-bookmark-alt"></i>Email Templates</a>
                    <ul class="submenu">
                        <li><a href="email-template-basic.html">Basic Action Email</a></li>
                        <li><a href="email-template-Alert.html">Alert Email</a></li>
                        <li><a href="email-template-Billing.html">Billing Email</a></li>
                    </ul>
                </li>

            </ul>
            <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div> <!-- end navbar-custom -->