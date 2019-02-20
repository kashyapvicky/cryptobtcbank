
    <!-- header area start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="breadcrumb-lists">
                            <ul>
                                <li>
                                    <a href="index-2.html">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li>Dashboard</li>
                            </ul>
                            <h1 class="page-title">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area end -->

<!-- dashboard navigation start -->
<div class="dashboard-nav section-bg-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="left-content-area"><!-- left content area -->
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-dashboard-tab" data-toggle="tab" href="#nav-dashboard" role="tab" aria-controls="nav-dashboard" aria-selected="true">
                           <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                           <span class="name"> dashboard</span>
                        </a>
                        <a class="nav-item nav-link" id="nav-mining-tab" data-toggle="tab" href="#nav-mining" role="tab" aria-controls="nav-mining" aria-selected="false">
                            <span class="icon"><i class="fas fa-server"></i></span>
                            <span class="name">MINING ALLOCATION</span>
                        </a>
                        <a class="nav-item nav-link" id="nav-payout-tab" data-toggle="tab" href="#nav-payout" role="tab" aria-controls="nav-payout" aria-selected="false">
                           <span class="icon"><i class="fas fa-money-bill-alt"></i></span>
                            <span class="name">payouts</span>
                        </a>
                        <a class="nav-item nav-link" id="nav-bonus-tab" data-toggle="tab" href="#nav-bonus" role="tab" aria-controls="nav-bonus" aria-selected="false">
                          <span class="icon"><i class="fas fa-suitcase"></i></span>
                            <span class="name">bonus payouts</span>
                        </a>
                        <a class="nav-item nav-link" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-account" aria-selected="false">
                           <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="name">My Account</span>
                        </a>
                        <a class="nav-item nav-link" id="nav-order-tab" data-toggle="tab" href="#nav-order" role="tab" aria-controls="nav-order" aria-selected="false">
                            <span class="icon"><i class="fas fa-box-open"></i></span>
                            <span class="name">My order</span>
                        </a>
                    </div>
                </div><!-- //.left content area -->
                <div class="right-content-area"><!-- right content area -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item dropdown">
                            <a class="nav-link " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                               <span class="name"> Smith Wright</span> <i class="fas fa-angle-down"></i>
                                <div class="img-wrapper">
                                    <img src="assets/img/profile-pictrue.jpg" alt="profile picture">
                                </div>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Edit Profile</a>
                                <a class="dropdown-item" href="#">Change Password</a>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div><!-- //. right content area -->
            </div>
        </div>
    </div>
</div>
<!-- dashboard navigation end -->

<!-- dashboard tab content area start -->
<div class="dashboard-tab-content-area section-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">
                       <div class="dashboard-tab-content-area"><!-- dashboard tab content area -->
                           <div class="section-title text-center">
                               <span class="subtitle">Hashrate</span>
                               <h2 class="title">Currency Hashrate</h2>
                           </div>
                           <div class="content-area">
                               <div class="row">
                                   <div class="col-lg-4 col-md-6">
                                       <div class="single-dashboard-box"><!-- single dashboard box -->
                                        <span class="bg-icon">
                                            <i class="ci ci-btc"></i>
                                        </span>
                                           <div class="icon">
                                               <i class="ci ci-btc"></i>
                                           </div>
                                           <div class="content">
                                               <h4 class="name">BITCOIN HASHRATE</h4>
                                               <div class="counter--area">
                                                    <span class="count-num">1.0037</span>
                                                    <span class="count-num-text"> TH/S</span>
                                               </div>
                                           </div>
                                       </div><!-- //.single dashboard box -->
                                   </div>
                                   <div class="col-lg-4 col-md-6">
                                       <div class="single-dashboard-box"><!-- single dashboard box -->
                                        <span class="bg-icon">
                                                <i class="ci ci-eth"></i>
                                        </span>
                                           <div class="icon">
                                               <i class="ci ci-eth"></i>
                                           </div>
                                           <div class="content">
                                               <h4 class="name">ETHEREUM HASHRATE</h4>
                                               <div class="counter--area">
                                                    <span class="count-num">1.0037</span>
                                                    <span class="count-num-text"> TH/S</span>
                                               </div>
                                           </div>
                                       </div><!-- //.single dashboard box -->
                                   </div>
                                   <div class="col-lg-4 col-md-6">
                                       <div class="single-dashboard-box"><!-- single dashboard box -->
                                        <span class="bg-icon">
                                            <i class="ci ci-ltc"></i>
                                        </span>
                                           <div class="icon">
                                               <i class="ci ci-ltc"></i>
                                           </div>
                                           <div class="content">
                                               <h4 class="name">LITECOIN HASHRATE</h4>
                                               <div class="counter--area">
                                                    <span class="count-num">2.3037</span>
                                                    <span class="count-num-text"> TH/S</span>
                                               </div>
                                           </div>
                                       </div><!-- //.single dashboard box -->
                                   </div>
                                   <div class="col-lg-4 col-md-6">
                                       <div class="single-dashboard-box"><!-- single dashboard box -->
                                        <span class="bg-icon">
                                           <i class="ci ci-ada"></i>
                                        </span>
                                           <div class="icon">
                                               <i class="ci ci-ada"></i>
                                           </div>
                                           <div class="content">
                                               <h4 class="name">IOTA HASHRATE</h4>
                                               <div class="counter--area">
                                                    <span class="count-num">1.1537</span>
                                                    <span class="count-num-text"> TH/S</span>
                                               </div>
                                           </div>
                                       </div><!-- //.single dashboard box -->
                                   </div>
                                   <div class="col-lg-4 col-md-6">
                                       <div class="single-dashboard-box"><!-- single dashboard box -->
                                        <span class="bg-icon">
                                            <i class="ci ci-dash"></i>
                                        </span>
                                           <div class="icon">
                                               <i class="ci ci-dash"></i>
                                           </div>
                                           <div class="content">
                                               <h4 class="name">DASH HASHRATE</h4>
                                               <div class="counter--area">
                                                    <span class="count-num">1.2317</span>
                                                    <span class="count-num-text"> TH/S</span>
                                               </div>
                                           </div>
                                       </div><!-- //.single dashboard box -->
                                   </div>
                                   
                                   <div class="col-lg-4 col-md-6">
                                       <div class="single-dashboard-box"><!-- single dashboard box -->
                                        <span class="bg-icon">
                                            <i class="ci ci-xrp"></i>
                                        </span>
                                           <div class="icon">
                                               <i class="ci ci-xrp"></i>
                                           </div>
                                           <div class="content">
                                               <h4 class="name">RIPPLE HASHRATE</h4>
                                               <div class="counter--area">
                                                    <span class="count-num">4.0037</span>
                                                    <span class="count-num-text"> TH/S</span>
                                               </div>
                                           </div>
                                       </div><!-- //.single dashboard box -->
                                   </div>
                               </div>
                           </div>
                       </div><!-- //. dashboard tab content area -->
                    </div>
                    <div class="tab-pane fade" id="nav-mining" role="tabpanel" aria-labelledby="nav-mining-tab">
                       <div class="mining-tab-conent-area">
                           <div class="section-title text-center">
                               <span class="subtitle">Mining List</span>
                               <h2 class="title">Mining Progress</h2>
                           </div>
                           <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Created</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Hashpower</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="nav-payout" role="tabpanel" aria-labelledby="nav-payout-tab">
                       <div class="payout-tab-content">
                           <div class="section-title text-center">
                               <span class="subtitle">Payout List</span>
                               <h2 class="title">Pending Payouts</h2>
                           </div>
                           <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Created</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Hashpower</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="nav-bonus" role="tabpanel" aria-labelledby="nav-bonus-tab">
                       <div class="bonus-tab-conent-area">
                           <div class="section-title text-center">
                               <span class="subtitle">Bonus List</span>
                               <h2 class="title">Pending Bouus</h2>
                           </div>
                           <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Created</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Hashpower</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                       <div class="my-account-content-area">
                           <div class="row justify-content-center">
                               <div class="col-lg-8">
                                    <div class="section-title text-center">
                               <span class="subtitle">My Account</span>
                               <h2 class="title">Edit Profile</h2>
                           </div>
                            <div class="myaccount-form-wrapper">
                                <form action="http://idealbrothers.thesoftking.com/html/mirex/dashboard.html">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-element margin-bottom-30">
                                                    <input type="text" class="input-field" id="first_name" placeholder="First Name*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-element margin-bottom-30">
                                                    <input type="text" class="input-field" id="last_name" placeholder="Last Name*">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-element margin-bottom-30">
                                                    <input type="email" class="input-field" id="email" placeholder="Your E-mail*">
                                                </div>
                                                <div class="form-element margin-bottom-30">
                                                    <textarea rows="30" cols="10" placeholder="Address*" class="input-field textarea" id="message"></textarea>
                                                </div>
                                                <input type="submit" class="submit-btn btn-center" value="Update Account">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                               </div>
                           </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                        <div class="order-tab-content-area">
                            <div class="section-title text-center">
                               <span class="subtitle">Orders List</span>
                               <h2 class="title">Pending Orders</h2>
                           </div>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Created</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Hashpower</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="td-separator">
                                            <span class="separator"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Felkon</td>
                                        <td>6th July 2018</td>
                                        <td>9th July 2018</td>
                                        <td>200 Th/s</td>
                                        <td>Mining</td>
                                        <td>$500.00 USD</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- dashboard tab content area end -->

<!-- upgrade area start -->
<div class="upgrade-area section-bg-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="single-upgrade-item rmb-40"><!-- single upgrade item -->
                    <div class="left-content">
                        <div class="icon">
                            <i class="fas fa-database"></i>
                            <div class="small-icon"><i class="far fa-lightbulb"></i></div>
                        </div>
                        <div class="content">
                            <h4 class="name">Mining Allocation</h4>
                            <span class="details">Allocate your hashpower</span>
                        </div>
                    </div>
                    <div class="right-content">
                        <a href="#" class="boxed-btn btn-rounded">Confihure</a>
                    </div>
                </div><!-- //.single upgrade item -->
            </div>
            <div class="col-lg-6">
                <div class="single-upgrade-item"><!-- single upgrade item -->
                    <div class="left-content">
                        <div class="icon">
                            <i class="fas fa-database"></i>
                            <div class="small-icon"><i class="fas fa-hourglass-half"></i></div>
                        </div>
                        <div class="content">
                            <h4 class="name">Upgrade Hashpower</h4>
                            <span class="details">Purchase hashpower</span>
                        </div>
                    </div>
                    <div class="right-content">
                        <a href="#" class="boxed-btn btn-rounded">Upgrade</a>
                    </div>
                </div><!-- //.single upgrade item -->
            </div>
        </div>
    </div>
</div>
<!-- upgrade area end -->

<!-- earning area start -->
<div class="earning-area section-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="left-content"><!-- left content area -->
                    <h3 class="sinner-title">Earning Chart</h3>
                    <div class="earning-chart-wrapper">
                        <div class="chart-wrapper">
                            <h4 class="chart-title"><span class="icon"><i class="ci ci-btc"></i></span>   Bitcoin <small>(Earnings in USD)</small></h4>
                            <canvas id="canvas"></canvas>
                        </div>
                    </div>
                </div><!-- //. left content area -->
            </div>
            <div class="col-lg-4">
                <div class="right-content-wrapper">
                    <h3 class="sinner-title">Crypto Prices</h3>
                    <div class="crypto-prices-wrapper">
                        <table class="table-responsive crypto-table">
                            <thead>
                                <tr>
                                    <th>Crypto currency</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/01.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">Bitcoin(BTC)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $5500.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/02.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">Ethereum (ETH)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $6930.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/03.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">Ripple (XRP)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $9202.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/04.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">Bitcoin Cash (BCH)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $3400.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/05.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">Litecoin (LTC)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $4800.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/06.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">Cardano (ADA)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $1230.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/07.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">IOTA (MIOTA)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $5670.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/08.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">Monero (XMR)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $5210.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/09.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">NEM (XEM)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $9800.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icon-details">
                                            <div class="icon">
                                                <img src="assets/img/coin-icons/10.jpg" alt="coin image">
                                            </div>
                                            <h4 class="name">Dash (DASH)</h4>
                                        </div>
                                    </td>
                                    <td>
                                        $1700.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- earning area end -->

    <!-- subscription area start -->
    <section class="subscription-area section-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 remove-col-padding">
                    <div class="subscription-inner">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="left-content-area">
                                    <!-- left content area -->
                                    <span class="bg-icon">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                    <span class="subtitle">Enter Your Email To Request Access</span>
                                    <h4 class="title">Start Mining Now</h4>
                                </div>
                                <!-- //.left content area -->
                            </div>
                            <div class="col-lg-6">
                                <div class="right-content-area">
                                    <!-- right content area -->
                                    <div class="subsform-wrapper">
                                        <form action="http://idealbrothers.thesoftking.com/html/mirex/index.html">
                                            <div class="form-element">
                                                <input type="text" class="input-field" placeholder="Enter your email address......">
                                            </div>
                                            <input type="submit" class="submit-btn" value="get started">
                                        </form>
                                    </div>
                                </div>
                                <!-- //.right content area-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscription area end -->

    <!-- footer top area start -->
    <div class="footer-top logo-carousel section-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel" id="logo-carousel">
                        <!-- logo carousel -->
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="assets/img/brands/01.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="assets/img/brands/02.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="assets/img/brands/03.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="assets/img/brands/04.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="assets/img/brands/05.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="assets/img/brands/06.png" alt="brand logo">
                            </a>
                        </div>
                    </div>
                    <!-- //.logo carousel -->
                </div>
            </div>
        </div>
    </div>
    <!-- footer top area end -->

   