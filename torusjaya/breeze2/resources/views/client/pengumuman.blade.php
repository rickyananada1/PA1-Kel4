@php
  $informasitokos = DB::table('informasitokos')->get();
@endphp

<section class="latest-podcast-section section-padding pb-0" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Pengumuman</h4>
                        </div>
                    </div>
@foreach($informasitokos as $item)
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="#">
                                    {{$item->name}}
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="{{  asset('images/informasi/'.$item->image) }}"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                
                                    </p>
                                </div>

                                <p class="mb-0">{{$item->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>