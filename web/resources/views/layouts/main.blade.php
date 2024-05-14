<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Whatsapp Gateway</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global lets & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" /> -->

    <link rel="stylesheet" href="/datetimepicker-master/build/jquery.datetimepicker.min.css">
    
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="#" alt class="w-px-40 h-auto rounded-circle" /></span>
              <span class="app-brand-text demo menu-text fw-bolder ms-1"></span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
              <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
          
            <li class="menu-item {{ request()->is('wa-sender') ? 'active' : '' }}">
              <a href="{{route('wa-sender')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-whatsapp"></i>
                <div data-i18n="Analytics">Kirim Pesan</div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('list-contacts') ? 'active' : '' }}">
              <a href="{{route('list-contacts')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Analytics">Kontak</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text"></span>
            </li>
            <li class="menu-item {{ request()->is('') ? 'active' : '' }}">
              <a href="login" class="menu-link">
                <i class="bx bx-power-off me-2"></i>
                <div data-i18n="Analytics">Log Out</div>
              </a>
            </li>
          
            <!-- Layouts -->
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                <h4 class="fw-bold py-3 mb-1">
                  <span class="text-muted fw-light">
                  </span></h4>
                </div>
              </div>
            </div>
          </nav>

          <!-- / Navbar -->
          <div class="content-wrapper">
@yield('container')



  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>

@stack('script')

<script>
    let socket = io('127.0.0.1:3000');
        $('#btn_act').on('click', '#scan_btn', (e) => {
            e.preventDefault();
            $('#scan_image').attr('src', '/assets/img/loader.gif');
        socket.emit('rdy', 'scan');
        });

        $('#btn_act').on('click', '#disconnect_btn', (e) => {
            e.preventDefault();
            $('#scan_image').attr('src', '/assets/img/loader.gif');
        socket.emit('rdy', 'disconnect');
        });

        socket.on('ready_qr', (data) => {
            $('#scan_image').attr('src', data.qrnya);
        });

        socket.on('savecontact', (data) => {
                let getData = data;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
            $.ajax({
                type:'POST',
                url:"{{ route('save-contact') }}",
                data: {name:getData.name,pushname:getData.pushname,number:getData.number},
                success:function(dta){
                  console.log(dta.success);
                }
          });
        });
        
        socket.on('on_ready_qr', (data) => {
            if (data.message === 'Client is ready') {
                $('#btn_act').html('<a href="#" id="disconnect_btn" class="btn btn-sm btn-outline-warning">disconnect</a>');
                $('#scan_image').attr('src', '../assets/img/illustrations/man-with-laptop-light.png');
                $('#text_on_ready').text(data.message);
                $('#text_on_description').html(data.description);
            } else {
                $('#btn_act').html('<a href="#" id="scan_btn" class="btn btn-sm btn-outline-primary">scan qr</a>');
                $('#scan_image').attr('src', '../assets/img/illustrations/man-with-laptop-light.png');
                $('#text_on_ready').text(data.message);
                $('#text_on_description').html(data.description);
            }
        });

        socket.on('status_sender', (data) => {
          $('#status_sender').css('display', 'block');
          if(data.status === 'error') {
            $('#status_sender').append(`<small class="text-danger">${data.message}</small><br>`);
          } else {
            $('#status_sender').append(`<small class="text-info">${data.message}</small><br>`);
          }
        });

        $('#btn_send').click(function(e) {
          let type = $('#type_sender').val();
          let number = $('#filterByProdi').val();
          let pesan = $('#data_pesan').val();
          let caption = $('#caption_image').val();
          let isGroup = $('#is_group').is(':checked');

// pengiriman text
    if(type === 'text') {
        if(number.length === 0 || type === '0' || pesan === '') {
          toastr.error('silahkan isi input yang kosong', 'error');
          return;
        }
      } else {
        if(number.length === 0 || type === '0') {
          toastr.error('silahkan isi input yang kosong', 'error');
          return;
        }
      }

// pengiriman image 
    if(type === 'image') {
        let fd = new FormData();
        let files = $('#media_image')[0].files;

        if(!validate_fileupload($('#media_image').val(), "jpg","png","jpeg")) {
          toastr.error('Allowed jpg,jpeg,png', 'error');
            return;
        }
          
          // Check file selected or not
        if(files.length > 0 ){
          fd.append('media_image',files[0]);

          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          let prodiType = document.querySelector("#filterByProdi");
          fd.append('prodi_type', prodiType.value)

          $.ajax({
              url: "{{ route('upload-image') }}",
              type: 'POST',
              data: fd,
              contentType: false,
              processData: false,
                success: function(response){
                    response.numbers.forEach(number => {
                      socket.emit('wa_sender', 
                      {type: type, number: number, type: type, image: response.success, 
                        caption: caption, ext: response.ext});
                      console.log(response);     
                    });
                },
          });

      } else{
          toastr.error('silahkan isi file', 'error');
            return;
        }
      }

//pengiriman document  
    if(type === 'document') {
        let fd = new FormData();
        let files = $('#media_document')[0].files;
        
        // Check file selected or not
      if(files.length > 0 ){
        fd.append('media_document',files[0]);
  
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        
        let prodiType = document.querySelector("#filterByProdi");
        fd.append('prodi_type', prodiType.value)
  
          $.ajax({
            url: "{{ route('upload-document') }}",
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
              success: function(response){
                response.numbers.forEach(number => {
                      socket.emit('wa_sender', 
                      {type: type, number: number, document: response.success, ext: response.ext});
                      console.log(response.ext, number, response.success);    
                }); 
              },
          });
          
        }else{
          toastr.error('silahkan isi file', 'error');
          return;
        }
      }
  

//pengiriman text
    if(type === 'text') {

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            url: "{{ route('get-nomor-hp-by-prodi') }}",
            type: 'POST',
            data: JSON.stringify({ data: number }),
            contentType: false,
            processData: false,
              success: function(response){
            // coba cek dulu hasil dari response nya
              console.log(number);
                response.forEach(number => {
            socket.emit('wa_sender', 
            {type: type, number: number, pesan: pesan});
              console.log(number);
            });
          },
        });
          
        }  
  
        $('#form-wa-sender')[0].reset();
        $('#filterByProdi').val('0').change();
        $('#number').val('0').change();

      e.preventDefault();
    });

      function validate_fileupload(fileName, ...allowed)
      {
          let allowed_extensions = new Array(...allowed);
          let file_extension = fileName.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

          for(let i = 0; i <= allowed_extensions.length; i++)
          {
              if(allowed_extensions[i]==file_extension)
              {
                  return true; // valid file extension
              }
          }

          return false;
      }
</script>
</body>
</html>