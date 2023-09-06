@extends('templates.master')
@section('title', ($data['title']) ?? '')

@section('content')
<div class="content">
    @include('templates.partials.alerts')
    <!-- <pre> -->
    <section class="mx-md-n3 mb-3 dashboard-banner">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                </div>
                <!-- end row -->
            </div>
        </div>
    </section>
    <h2>Dashboard</h2>
    <section class="stat-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="dbox dbox--color-1">
                        <div class="dbox__icon">
                            <img src="assets/images/ratio-icon.png" alt="A/I Ratio Icon" width="40" />
                        </div>
                        <div class="dbox__body">
                            <span class="dbox__count">0</span>
                            <span class="dbox__title">Total Users</span>
                        </div>
                        
                        <div class="dbox__action">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dbox__action__btn">
                                        <span class="dbox__title2">Today</span>
                                        <span class="dbox__count2">0</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dbox__action__btn">
                                        <span class="dbox__title2">Last Week</span>
                                        <span class="dbox__count2">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>				
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dbox dbox--color-2">
                        <div class="dbox__icon">
                            <img src="assets/images/ratio-icon.png" alt="A/I Ratio Icon" width="40" />
                        </div>
                        <div class="dbox__body">
                            <span class="dbox__count">0</span>
                            <span class="dbox__title">Total Users</span>
                        </div>
                        
                        <div class="dbox__action">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dbox__action__btn">
                                        <span class="dbox__title2">Today</span>
                                        <span class="dbox__count2">0</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dbox__action__btn">
                                        <span class="dbox__title2">Last Week</span>
                                        <span class="dbox__count2">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>				
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dbox dbox--color-3">
                        <div class="dbox__icon">
                            <img src="assets/images/ratio-icon.png" alt="A/I Ratio Icon" width="40" />
                        </div>
                        <div class="dbox__body">
                            <span class="dbox__count">0</span>
                            <span class="dbox__title">Total Users</span>
                        </div>
                        
                        <div class="dbox__action">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dbox__action__btn">
                                        <span class="dbox__title2">Today</span>
                                        <span class="dbox__count2">0</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dbox__action__btn">
                                        <span class="dbox__title2">Last Week</span>
                                        <span class="dbox__count2">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>				
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
@endsection
