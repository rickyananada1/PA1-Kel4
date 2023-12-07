@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body">
                        <div class="card-left pt-1 float-left">
                            <h3 class="mb-0 fw-r">
                                <span class="count">{{ $totalUsers }}</span>
                            </h3>
                            <p class="text-light mt-1 m-0">Total Pengguna</p>
                        </div><!-- /.card-left -->

                        <div class="card-right float-right text-right">
                            <i class="icon fade-5 icon-lg pe-7s-users"></i>
                        </div><!-- /.card-right -->
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body">
                        <div class="card-left pt-1 float-left">
                            <h3 class="mb-0 fw-r">
                                <span class="count">{{ $totalStock }}</span>
                            </h3>
                            <p class="text-light mt-1 m-0">Jumlah semua product</p>
                        </div><!-- /.card-left -->

                        <div class="card-right float-right text-right">
                            <div id="flotLine1" class="flotLine1"></div>
                        </div><!-- /.card-right -->

                    </div>

                </div>
            </div>
            <!--/.col-->



            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="fas fa-tools border-primary"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Bahan Bangunan</div>
                                    <div class="stat-text">Total:{{ $bahanBangunanStock }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="fas fa-bolt border-success"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Peralatan Listrik</div>
                                    <div class="stat-text">Total : {{ $alatListrikStock }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="fas fa-leaf border-primary"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Peralatan Tanaman</div>
                                    <div class="stat-text">Total : {{ $alatTanamanStock }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="fas fa-hammer border-success"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Peralatan Konstruksi</div>
                                    <div class="stat-text">Total: {{ $alatKonstruksiStock }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="fas fa-chair border-success"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Peralatan Rumah Tangga</div>
                                <div class="stat-digit">Total : {{ $alatRumahTanggaStock }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="fas fa-lock border-primary"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Peralatan Keamanan</div>
                                <div class="stat-digit">Total : {{ $alatKeamananStock }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .row -->
</div>
<!-- .animated -->
</div>
@endsection
