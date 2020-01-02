<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Title Page-->
    <title>Schepisi Communications</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="https://cdn.anychart.com/releases/8.7.0/css/anychart-ui.min.css?hcode=a0c21fc77e1449cc86299c5faa067dc4" rel="style" media="all">

    <!-- data tables scrips and styles -->
  <link href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link href="assets/css/dataTables.bootstrap4.css">
    <!--end data tables -->
    <style type="text/css">
        #pieChartContainer, #barChartContainer{
            width: 100%;
            height: 400px;
            margin: 0;
            padding: 0;
        }
        div#lineGraphContainer {
            height: 450px;
        }
        tbody#allTransaction, #example1 thead, #example1 tfoot {
            color: #000;
        }
        table#example1 {
            font-size: 12px;
            margin-bottom: 15px;
        }
        /*div.dataTables_wrapper div.dataTables_info {
            padding-top: 0.85em;
            white-space: nowrap;
        }
        div.dataTables_wrapper div.dataTables_paginate {
            margin: 0;
            white-space: nowrap;
            text-align: right;
        }
        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin: 2px 0;
            white-space: nowrap;
            justify-content: flex-end;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }*/

        div#example1_paginate {
    border: 1px solid #999;
    float: right;
    border-radius: 5px;
    font-size: 0.7em;
 }

.dataTables_info {
    /* width: 30%; */
    color: #000;
    font-size: 0.9em;
    float: left;
}
.paginate_button{
    padding: 10px;
}
a.paginate_button.current {
    border-color: #007bff;
    background: #007bff;
    color: #fff;
    padding: 10px;
    white-space: nowrap;
}
.paginate_button:hover{
    cursor: pointer;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}

ul#cost-centre-data {
    font-size: 0.8em;
}

.overview-wrap > span {
    display: none;
}
</style>
</head>

<body>
    <!-- timer warning -->
    <div id="inactivity_warning" class="modal hide fade" data-backdrop="static" style="top:30%">
  <div class="modal-header">
    <button type="button" class="close inactivity_ok" data-dismiss="modal" aria-hidden="true">&times;</button>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div id="custom_alert_message" class="span12">
       
     </div>
   </div>
  <div class="modal-footer">
    <a href="javascript:void(0)" class="btn inactivity_ok" data-dismiss="modal" aria-hidden="true">O.K</a>
   </div>
  </div>
</div>
<input id="user_activity" name="user_activity" type="hidden" value="active" />
<input id="user_logged_in" name="user_logged_in" type="hidden" value="true" />
<!-- end timer warning -->
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="assets/img/schimg.png" alt="Schepisi mobile" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Upload Files</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#" id="userName"></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="orgname">
                                                    <span class="email organization"></span>
                                                    </h5>
                                                    <h5 class="userRole">
                                                    <span class="email"></span>
                                                    </h5>
                                                    <span class="email">Mobile Number</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a id="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>

        <div id="timer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
             <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="assets/img/schimg.png" alt="Schepisi Logo" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Upload Files</a>
                        </li>
                        
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

