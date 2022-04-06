@extends("layouts.admins")

@section("content")
 @if(session('status'))
            <div class="text-center alert alert-success">
                {{ session('status') }}
            </div>
             @endif

                <div class="row">


                    <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4">
                      {{-- <a href="/admin/about"> --}}
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <div class="text-right dash-widget-info">
                                <h3>{{-- $about --}}</h3>
                                <span class="widget-title2">Categoris<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        {{-- <a> --}}
                    </div>

                    <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4">
                    {{-- <a href="/admin/achievements"> --}}
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-files-o"></i></span>
                            <div class="text-right dash-widget-info">
                                <h3>{{-- $achievement --}}</h3>
                                <span class="widget-title3">Readers<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        {{-- <a> --}}
                    </div>



                    <div class="col-md-4 col-sm-6 col-lg-4 col-xl-4">
                        {{-- <a href="/admin/banners"> --}}
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-image"></i></span>
                            <div class="text-right dash-widget-info">
                                <h3>{{-- $banner --}}</h3>
                                <span class="widget-title4">banners<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        {{-- <a> --}}
                    </div>

        </div>

@endsection

@section("scripts")

@endsection
