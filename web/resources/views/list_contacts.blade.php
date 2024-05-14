@extends('layouts.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    

    <div class="card">
        
            <div class="mx-1">
            <button type="button" class="btn btn-success float-right" data-bs-toggle="modal" data-bs-target="#tambah_contact" style="margin:10px">
            Tambah contact
        </button> 
         <button class="btn btn-info float-right" data-bs-toggle="modal" data-bs-target="#import_contact" style="margin:10px">Import contact</button>
        <a class="btn btn-warning float-right" href="{{ route('file-export-contact') }}" style="margin:10px">Export contact</a>
        <a class="btn btn-danger float-right" href="#" style="margin:10px" id="hapus_semua_contacts">Hapus semua</a></small>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        {{$error}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        
        <div class="table-responsive text-nowrap px-3">
        <table class="table table-bordered" id="contact_datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Name</th>
                    <th>Progdi</th>
                    <th>number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($get_contacts as $contact)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $contact->nim }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->progdi }}</td>
                    <td>{{ $contact->number }}</td>
                    <td><a href="#" class="edit btn btn-success btn-sm" data-id="{{ $contact->id }}" data-nim="{{ $contact->nim }}" data-name="{{ $contact->name }}" data-progdi="{{ $contact->progdi }}" data-number="{{ $contact->number }}" id="edit_contact">Edit</a> <a href="#" class="delete btn btn-danger btn-sm" data-id="{{ $contact->id }}" id="delete_contact">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        </div>

      </div>
</div>

<!-- Tambah modal -->
<div class="modal fade" id="tambah_contact" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Tambah contact</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
        <form action="{{route('add-contact')}}" method="POST">
            @csrf
          <div class="row">
            <div class="col mb-3">
              <label for="nim_contact" class="form-label">Nim</label>
              <input type="text" id="nim_contact" class="form-control" name="nim_contact" placeholder="19.240.0035" required />
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="nama_contact" class="form-label">Nama</label>
              <input type="text" id="nama_contact" class="form-control" name="nama_contact" placeholder="Rizki" required />
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <!-- <label for="progdi_contact" class="form-label">Progdi</label> -->
              <select class="form-select" name="progdi_contact" id="progdi_contact" aria-label="Default select example">
                    <option value="0" selected>Program Studi</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Manajemen Informatika">Manajemen Informatika</option>
                    <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                  
                </select>
              <!-- <input type="text" id="progdi_contact" class="form-control" name="progdi_contact" placeholder="Teknik Informatika" required /> -->
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="nama_contact" class="form-label">Number</label><br>
              <small class="text-danger">Isi number dengan berawalan dari 62</small>
              <input type="number" id="number_contact" class="form-control" name="number_contact" placeholder="62" required />
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Tambah modal end -->

  <!-- Import modal -->
<div class="modal fade" id="import_contact" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Import data excel</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('file-import-contact') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col mb-3">
              <label for="formFile" class="form-label">File excel</label>
                <input class="form-control" name="file_import_contact" type="file" required />
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
<!-- Import modal end -->

<!-- Edit modal -->
<div class="modal fade" id="edit-modal-contact" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit data contact</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
      <form action="{{route('edit-contact')}}" method="POST">
          @csrf
          <input type="hidden" name="edit_contact_id" id="edit_contact_id">
          <div class="row">
          <div class="col mb-3">
            <label for="keyword" class="form-label">Nim</label>
            <input type="text" id="edit_contact_nim" class="form-control" name="edit_contact_nim" required />
          </div>
        </div>

        <div class="row">
          <div class="col mb-3">
            <label for="keyword" class="form-label">Name</label>
            <input type="text" id="edit_contact_name" class="form-control" name="edit_contact_name" required />
          </div>
        </div>

        <div class="row">
          <div class="col mb-3">
            <label for="keyword" class="form-label">Program Studi</label>
            
            <!-- <input type="text" id="edit_contact_progdi" class="form-control" name="edit_contact_progdi" required /> -->
            <select class="form-select" name="edit_contact_progdi" id="edit_contact_progdi" aria-label="Default select example">
                    <!-- <option value="0" selected>Program Studi</option> -->
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Manajemen Informatika">Manajemen Informatika</option>
                    <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                </select>
          </div>
        </div>

        <div class="row">
          <div class="col mb-3">
            <label for="keyword" class="form-label">Number</label>
            <input type="number" id="edit_contact_number" class="form-control" name="edit_contact_number" required />
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit modal end -->
  @endsection

@push('script')
<script>
    $('#contact_datatables').DataTable({
        responsive: true
    });

    $('#contact_datatables').on('click', '#edit_contact', function(e) {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var nim = $(this).data('nim');
        var progdi = $(this).data('progdi');
        var number = $(this).data('number');

        $('#edit_contact_id').val(id);
        $('#edit_contact_name').val(name);
        $('#edit_contact_nim').val(nim);
        $('#edit_contact_progdi').val(progdi);
        $('#edit_contact_number').val(number);

        $('#edit-modal-contact').modal('show');
        e.preventDefault();
      });
</script>

<script>
  $('#hapus_semua_contacts').on('click', function(e) {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Klik hapus semua untuk melanjutkan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus semua'
  }).then((result) => {
    if (result.isConfirmed) {
          $.ajax({
            type:'POST',
            url:"{{ route('delete-all-contacts') }}",
            data:{id:'ok'},
            success:function(data){
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: data.success,
                showConfirmButton: false,
                timer: 3000
              }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                  window.location.href = "{{ route('list-contacts') }}";
                }
              });
            }
      });
    }
  })
  e.preventDefault();
});

$('#contact_datatables').on('click', '#delete_contact', function(e) {
        var id = $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Klik hapus untuk melanjutkan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus'
        }).then((result) => {
          if (result.isConfirmed) {
                $.ajax({
                  type:'POST',
                  url:"{{ route('delete-contact') }}",
                  data:{id:id},
                  success:function(data){
                    Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: data.success,
                      showConfirmButton: false,
                      timer: 3000
                    }).then((result) => {
                      if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = "{{ route('list-contacts') }}";
                      }
                    });
                  }
            });
          }
        })
        e.preventDefault();
      });
</script>
@endpush