@extends('layouts.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-lg-0">
        <div class="card mb-0">
          <div class="card-header d-flex justify-content-between align-items-center">
            <small class="text-muted float-end">Whatsapp sender</small>
          </div>


          <div class="card-body">
            <div id="status_sender" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
              <form id="form-wa-sender" enctype="multipart/form-data" id="myform">
              @csrf
                <div class="mb-3">
                  <select class="form-select" name="type_sender" id="type_sender" aria-label="Default select example">
                    <option value="0" selected>Tipe Pesan</option>
                    <option value="text">Text</option>
                    <option value="image">Image</option>
                    <option value="document">document</option>
                  </select>
                </div> 

              <div class="col-md-2">
                <div class="form-group">
                    <label class="form-label" for="filterByProdi">Pilih Kontak Sesuai Prodi</label>
                    <select class="form-control" name="filterByProdi" id="filterByProdi">
                      <option value="0" selected>Program Studi</option>
                      @foreach ($get_contacts as $contact)
                      <option value="{{ $contact->progdi}}">{{$contact->progdi }}</option>
                  @endforeach 
                  </select>
                </div>
            </div>

              <div id="result_input_file"></div>
                
                <div class="mb-3" id="input_message">
                  <label class="form-label" for="data_pesan">Message</label>
                  <textarea
                    name="data_pesan"
                    id="data_pesan"
                    class="form-control"
                    placeholder="Silahkan masukan pesan ..................."
                    name="pesan_sender"
                  ></textarea>
                </div>
                
              <button type="button" id="btn_send" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
    <script>
      $('#type_sender').change(function() {
        let html, caption;

        // script image
        if($(this).val() === 'image') {
          html = `
            <div class="col mb-3">
              <label for="formFile" class="form-label">Upload Image</label>
                <input class="form-control" id="media_image" name="media_image" type="file" />
              </div>
            `;
          caption = `<div class="col mb-3">
            <label for="caption_image" class="form-label">Caption</label>
              <input type="text" id="caption_image" class="form-control" name="caption_image" placeholder="Caption image" />
            </div>`;
            $('#input_message').css('display', 'none');

          // script document
        } else if($(this).val() === 'document') {
          html = `
            <div class="col mb-3">
              <label for="formFile" class="form-label">Upload Document</label>
                <input class="form-control" id="media_document" name="media_document" type="file" required />
              </div>
            `;
            $('#input_message').css('display', 'none');
        
          // script text
        } else if($(this).val() === 'text' || $(this).val() === '0') {
            $('#result_input_file').empty();
            $('#input_message').css('display', 'block');
        }

        $('#result_input_file').html(html);
        if(caption !== undefined) $('#result_input_file').append(caption);
      });
    </script>
@endpush