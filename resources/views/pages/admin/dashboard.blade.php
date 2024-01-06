@extends('template.base')
@section('content')
<h3>Dashboard Admin</h3>
<div class="row">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-user"></i>
            </div>
            <div class="count">179</div>

            <h3>Total User</h3>
            <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-book"></i>
            </div>
            <div class="count">179</div>

            <h3>Total Buku</h3>
            <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-refresh fa-spin"></i>
            </div>
            <div class="count">179</div>

            <h3>Total Peminjaman</h3>
            <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-undo"></i>
            </div>
            <div class="count">179</div>

            <h3>Bayar Nanti</h3>
            <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
    </div>
</div>
<div class="w-100  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Radar <small>Sessions</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe"
                style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
            <canvas id="canvasRadar" width="694" height="346" style="width: 347px; height: 173px;"></canvas>
        </div>
    </div>
</div>
@endsection