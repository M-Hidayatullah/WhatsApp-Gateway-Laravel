@extends('layouts.main')
@section('container')
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- -->
              <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary" id="text_on_ready">Server belum aktif</h5>
                          <p class="mb-4" id="text_on_description"></p>
                          <div id="btn_act"></div>
                        </div>
                      </div>


                      <!-- -->
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4" id="output_i">
                          <img
                            src=""
                            height="140"
                            alt="qr"
                            id="scan_image"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                
                <!-- $data['nomor_tersimpan_count'] -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Nomor Tersimpan</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['nomor_tersimpan_count'] }}</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-phone fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- $data['pesan_terkirim_tersimpan_count'] -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Pesan Terkirim</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['send_msg'] }}</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-phone fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
            
        </div>
              <div class="row">
                
                </div>
                  </div>
              
            <!-- / Content -->
            @endsection
