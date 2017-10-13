@extends('frontend.layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="col-lg-3">
            <div class="panel panel-minimal">
                <div class="side-menu pb-0">
                    <ul class="nav">
                        <li>
                            <a href="JavaScript:Void(0);" data-toggle="collapse" data-target="#signs">
                                <i class="fa fa-map-signs mr-10" aria-hidden="true"></i>
                                <span>Traffic Signs & Symbols</span>
                                <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            </a>
                            <ul class="pl-0 list-unstyled collapse nav in" id="signs">
                                <li class="active">
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Mandatory</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Cautionary</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Informatory</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Traffic Lights</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Road Marking</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Hand Signals</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="JavaScript:Void(0);" data-toggle="collapse" data-target="#offences">
                                <i class="fa fa-money mr-10" aria-hidden="true"></i>
                                <span>Offences and Penalties</span>
                                <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            </a>
                            <ul class="pl-0 list-unstyled collapse nav" id="offences">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Traffic Offences and Penalties</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Compounding of Offences</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="JavaScript:Void(0);" data-toggle="collapse" data-target="#safety">
                                <i class="fa fa-road mr-10" aria-hidden="true"></i>
                                <span>Road Safety</span>
                                <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            </a>
                            <ul class="pl-0 list-unstyled collapse nav" id="safety">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Causes of Road Accidents</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Road Safety Tips</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>How To Avoid Accidents</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="JavaScript:Void(0);" data-toggle="collapse" data-target="#statistics">
                                <i class="fa fa-bar-chart-o mr-10" aria-hidden="true"></i>
                                <span>Statistics</span>
                                <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            </a>
                            <ul class="pl-0 list-unstyled collapse nav" id="statistics">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Accident During Last 3 years</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-circle-o mr-10 ml-5"></i>
                                        <span>Suspension of Licences</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- panel -->
        </div><!-- col-lg-3 -->

        <div class="col-lg-9">
            <div class="panel panel-minimal">
                <div class="panel-heading">
                    <h4 class="pl-15 pr-15">Mandatory Signs</h4>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>STOP</strong></p>
                                <p>This sign is used on roadways where traffic is required to stop before entering a major road. The vehicle shall proceed past the stop line only after ascertaining that ths will not cause any damage to traffic on the main road.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/stop.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>GIVE WAY</strong></p>
                                <p>This sign is used to assign right-of-way to traffic on certain roadways and intersections, the intention being that the vehicles controlled by the sign must give way to the other traffic having the right-of-way.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/give-way.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>STRAIGHT PROHIBITED OR NO ENTRY</strong></p>
                                <p>These signs are located at places where the vehicles are not allowed to enter. It is generally erected at the end of one-way-road to prohibit traffic entering the roadway in the wrong direction and also at each intersection along the one-way road.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/Straight-prohibited.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>ONE WAY</strong></p>
                                <p>These signs are located at the entry to the one-way street and repeated at intermediate intersections on that street.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/one-way.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>VEHICLES RROHIBITED IN BOTH DIRECTIONS</strong></p>
                                <p>This sign is used at the approact end of the roads where entry to all types of vehicular traffic is prohibited, especially in areas which have been designed as pedestrian malls.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/vehicle-prohibited-in-both-direction.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>HORN PROHIBITED</strong></p>
                                <p>This sign is used on stretches of the road where sounding of horn is not allowed, near hospitals and in silence zones.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/horn-prohibited.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>CYCLE PROHIBITED</strong></p>
                                <p>This sign is erected on each entry to the road where cycles are to be prohibited.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/cycles_prhibited.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>PEDESTRIAN PROHIBITED</strong></p>
                                <p>This sign is erected on each entry to the road where pedestrians are to be prohibited.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/pedestrian_prohibited.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>RIGHT/LEFT TURN PROHIBITED</strong></p>
                                <p>These signs are used at places where vehicles are not allowed to make a turn to the right or left. The signs are also used at the inter-sections of one-way street to supplement the one-way sign.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/left_turn_prohibited.jpg" alt="" width="100" height="100" border="0">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/right_turn_prohibited.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>U-TURN PROHIBITED</strong></p>
                                <p>This sign is used at places where vehicles are forbidden to make a turn to the reverse direction of travel between the sign and the next inter-section beyond it.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/u_turn_prohibited.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-10">
                                <p><strong>OVERTAKING PROHIBITED</strong></p>
                                <p>This sign is erected at the beginning of such sections of highways where sight distance is restricted and overtaking will be dangerous.</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="http://wbtrafficpolice.com/userfiles/image/sing_symbols/overtaking_prohibited.jpg" alt="" width="100" height="100" border="0">
                            </div>
                        </div>
                    </div>
                </div><!--panel body-->
            </div><!-- panel -->
        </div><!-- col-lg-9 -->
    </div><!-- /.container -->
</section>

@endsection