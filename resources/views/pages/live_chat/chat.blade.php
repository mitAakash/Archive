@extends(env('LAYOUT_TEMPLATE'), ['title' => 'Message Tempalte'])
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">Live Chat</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Live Chat</li>
    </ol>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/emoji/emojionearea.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
        .main-chat-body {
            background-image: url("{{ asset('images/background_image.png') }}"); /* Replace with your image URL */
            background-size: cover; /* Adjust to your needs */
            background-repeat: no-repeat;
            background-position: center;
            /* Add any other styles you need for the main-chat-body */
        }
        .main-chat-body .media.flex-row-reverse .main-msg-wrapper {
            background-color: #d2f7d2 !important;
        }
        .main-chat-footer {
            height: 85px !important;
        }
        .on_hover_template:hover{
            border: 1px solid blue;
        }


</style>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-3">
        <div class="card custom-card">
            <div class="main-content-app pt-0">
                <div class="main-content-left main-content-left-chat">

                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ...">
                            <span class="">
                                <button class="btn ripple btn-primary" type="button">Search</button>
                            </span>
                        </div>
                    </div>
                    <nav class="nav main-nav-line main-nav-line-chat card-body">
                        <a class="nav-link active" data-bs-toggle="tab" href="#ChatList">Recent Chat</a>
                    </nav>
                    <div class="main-chat-list">
                        <div class="" id="ChatList">
                            <div class="main-chat-list tab-pane">
                                <a class="media new" href="#">
                                    <div class="main-img-user online">
                                        <img alt="" src="{{ asset('images/crm_file.png') }}"> <span>2</span>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-contact-name">
                                            <span>Socrates Itumay</span> <span>2 hours</span>
                                        </div>
                                        <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
                                    </div>
                                </a>

                                <a class="media border-bottom-0" href="#">
                                    <div class="main-img-user"><img alt="" src="../assets/img/users/6.jpg"></div>
                                    <div class="media-body">
                                        <div class="media-contact-name">
                                            <span>Samuel Lerin</span> <span>7 days</span>
                                        </div>
                                        <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
                                    </div>
                                </a>
                            </div><!-- main-chat-list -->
                        </div><!-- main-chat-list -->
                    </div>
                    <!-- main-chat-list -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-7 col-xl-6">
        <div class="card custom-card">
            <div class="main-content-app pt-0">
                <div class="main-content-body main-content-body-chat">
                    <div class="main-chat-header pt-3">
                        <div class="main-img-user online"><img alt="avatar" src="../assets/img/users/1.jpg"></div>
                        <div class="main-chat-msg-name">
                            <h6>Sonia Taylor</h6>
                            <span class="dot-label bg-success"></span><small class="me-3">online</small>
                        </div>
                    </div><!-- main-chat-header -->
                    <div class="main-chat-body" id="ChatBody">
                        <div class="content-inner">
                            <label class="main-chat-time"><span>3 days ago</span></label>
                            <div class="media flex-row-reverse">
                                <div class="main-img-user online"><img alt="avatar" src="../assets/img/users/2.jpg"></div>
                                <div class="media-body">
                                    <div class="main-msg-wrapper">
                                        Nulla consequat massa quis enim. Donec pede justo, fringilla vel
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, commodi?
                                    </div>
                                    <div>
                                        <span class="text-white">9:48 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="main-img-user online"><img alt="avatar" src="../assets/img/users/1.jpg"></div>
                                <div class="media-body">
                                    <div class="main-msg-wrapper">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    </div>
                                    <div>
                                        <span class="text-white">9:32 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="main-chat-footer">
                        <nav class="nav">

                            <a class="nav-link" data-bs-toggle="tooltip" href="javascript:void(0);" title="link"><i class="fas fa-link"></i></a>
                            <a class="nav-link" data-bs-target="#scrollmodal" data-bs-toggle="modal" data-bs-toggle="tooltip" href="javascript:void(0);" title="Open Media"><i class="fas fa-images"></i></a>
                            <a class="nav-link" data-bs-toggle="tooltip" href="javascript:void(0);" title="Template"><i class="fa fa-bolt"></i></a>
                        </nav>

                        <form method="post">
                        </form>

                        <a class="main-msg-send" id=""><i class="far fa-paper-plane"></i></a>
                    </div> --}}

                    <div class="row">

                        <div class="col-12">
                            <textarea class="form-control col-12  file_url_required" id="summernote" name="editordata" placeholder="Type your message here..."></textarea>
                        </div>
                        <div class="col-12 px-3">
                                <div class="row">
                                    <div class="col-4">
                                        <div class=" d-flex align-items-center">
                                            <nav class="nav">
                                                <a id="fileLink" class="nav-link" data-bs-toggle="tooltip" href="javascript:void(0);" title="link"><i class="fas fa-link"></i></a>
                                                <input type="file" id="fileInput" style="display: none;">
                                                <a class="nav-link" data-bs-target="#scrollmodal" data-bs-toggle="modal"  href="javascript:void(0);" title="Open Media"><i class="fas fa-images"></i></a>
                                                <a class="nav-link" data-bs-target="#scrollmodal_template_get" data-bs-toggle="modal" href="javascript:void(0);" title="Template" onclick="templateGet();"><i class="fa fa-bolt"></i></a>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div id="selectedFiles"></div>
                                    </div>
                                    <div class="col-4 float-right justify-end pt-1">
                                        <div  style="float: right !important; padding-right: 20px !important;">
                                            <p class="main-msg-send" id=""><i class="far fa-paper-plane"></i></p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
        <div class="card custom-card chat-account">
            <div class="main-content-app d-block pt-0">
                <div class="card-body text-center">
                    <div class="user-lock text-center">
                        {{-- <div class="dropdown text-end">
                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                        </div> --}}
                        <a><img alt="avatar" class="rounded-10" src="../assets/img/users/1.jpg"></a>
                    </div>
                    <a><h5 class=" mb-1 mt-3 main-content-label">Harvey Mattos</h5></a>
                </div>
                <div class="card-body">
                    <h6 class="mb-3 tx-semibold">Contact Details</h6>
                    <div class="d-flex">
                        <div>
                            <p class="contact-icon text-primary m-0"><i class="fe fe-phone"></i></p>
                        </div>
                        <div class="ms-3">
                            <p class="tx-13 mb-0 tx-semibold">Phone</p>
                            <p class="tx-12 text-muted">+1 135792468</p>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <h6 class="mb-3 tx-semibold">Status</h6>
                    <table>
                        <tbody style="font-size: 12px !important;">
                         <tr>
                             <td>Status</td>
                             <td>Intervened</td>
                            </tr>
                            <tr>
                             <td>Intervened By</td>
                             <td>Rohit Yadav</td>
                            </tr>
                            <tr>
                             <td>Last Active</td>
                             <td>8/10/2023, 5:03 PM</td>
                            </tr>
                            <tr>
                             <td>Template Messages</td>
                             <td>0</td>
                            </tr>
                            <tr>
                             <td>Session Messages</td>
                             <td>22</td>
                            </tr>
                            <tr>
                             <td>Unresolved Queries</td>
                             <td>1</td>
                            </tr>
                            <tr>
                             <td>Source</td>
                             <td>ORGANIC</td>
                            </tr>
                            <tr>
                             <td>First Message</td>
                             <td>....</td>
                            </tr>
                            <tr>
                             <td>WA Conversation</td>
                             <td>Inactive</td>
                            </tr>
                            <tr>
                             <td>MAU Status</td>
                             <td>Active</td>
                            </tr>
                            <tr>
                             <td>Incoming</td>
                             <td>Allowed</td>
                            </tr>
                            <tr>
                             <td>Opted In</td>
                             <td>
                                 <label class="custom-switch">
                                     <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                                     <span class="custom-switch-indicator"></span>

                                 </label>
                             </td>
                            </tr>
                        </tbody>

                     </table>
                     <center><button class="btn btn-light text-danger mt-3 rounded-pill " type="button"><i class="fa fa-ban" aria-hidden="true"></i> Block Incoming Messages</button></center>

                </div>
            </div>
        </div>
    </div>
</div>



{{-- model image upload  --}}
<div class="modal" id="scrollmodal">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Media Library</h6><button type="button" aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <form id="mediaForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <input type="text" name="media_name" class="form-control"
                                    placeholder="Enter media name" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="input-group">
                                <input class="form-control" name="media_file" type="file" required
                                    accept=".mp4,.avi,.mov,.png,.jpg,.jpeg,.pdf,.xlsx,.csv,.mp3" max-size="16000000">
                            </div>
                            <span class="text-danger" id="fileError" style="display: none;"></span>
                        </div>
                        <div class="col-12 col-md-2">
                            <button class="btn ripple btn-primary" type="submit">
                                <i class="fa fa-upload"></i> Upload
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="progress mt-2" style="display: none;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>
                <div class="row" id="mediaContainer">
                </div>
                <hr>
                <div class="row" id="mediaContainerAll">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- model image upload  --}}
{{-- ================= scrollmodal_template_get ============  --}}
<div class="modal" id="scrollmodal_template_get">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Templates</h6>
                <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="p-3">
                <div class="input-group">
                    <input type="search" class="form-control" id="template_serach" placeholder="Search by template name">
                    <span class="input-group-btn">
                        <button id="template_serach_btn" class="btn ripple btn-primary" type="button">
                            <span class="input-group-btn"><i class="fa fa-search"></i></span>
                        </button>
                        <button id="template_serach_btn_reset" class="btn ripple btn-info" type="button">
                            <span class="input-group-btn"><i class="fa fa-close"></i></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="modal-body">
                <!-- Loader Spinner -->
                <div id="loader" class="text-center" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <table>
                     <tbody id="template_json_data">

                     </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- ================= scrollmodal_template_get ============  --}}
@endsection

@section('script')
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/chat.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/execcommand.js/2.0.1/execcommand.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/emoji/emojionearea.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">

            function templateGet(value = '') {
                // Show the loader spinner
                $('#loader').show();

                $.ajax({
                    url: "{{ route('template.get') }}",
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}",
                        "search": value,
                    },
                    success: function(response) {
                        $('#loader').hide();
                        if(response == ""){
                            document.getElementById("template_json_data").innerHTML = `<div class="p-3 text-center"><h4 class="text-center">Not Found!</h4></div>`;
                        }else{
                            document.getElementById("template_json_data").innerHTML = response;
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#loader').hide();
                        console.error(xhr.responseText);
                    }
                });
            }
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'strikethrough']],
                ],
                placeholder: 'Write your message here',
                tabsize: 2,
                height: 50
            });

            // ------------- link of file ---------------


            $('#fileLink').click(function() {
                $('#fileInput').click();
            });

            $('#fileInput').change(function() {
                var files = $(this)[0].files;
                var selectedFilesContainer = $('#selectedFiles');

                selectedFilesContainer.empty(); // Clear previous selections

                if (files.length > 0) {
                    for (var i = 0; i < files.length; i++) {
                        var fileElement = $('<div class="file-item"></div>');
                        fileElement.append('<span>' + files[i].name + '</span>');
                        fileElement.append('<a class="remove-file px-4 text-danger" data-index="' + i + '"><i class="fa fa-close"></i></a>');
                        selectedFilesContainer.append(fileElement);
                    }
                } else {
                    // selectedFilesContainer.append('<p>No files selected</p>');
                }
            });

            $('#selectedFiles').on('click', '.remove-file', function() {
                var index = $(this).data('index');
                var selectedFilesContainer = $('#selectedFiles');

                // Remove the selected file from the container
                $(this).closest('.file-item').remove();

                // Reset the file input to clear previous selections
                var fileInput = document.getElementById('fileInput');
                fileInput.value = '';

                // Trigger the change event to update the displayed list of selected files
                $(fileInput).trigger('change');
            });
            // ------------- link of file ---------------


            // ------------ Template Fetch --------------
            $("#template_serach_btn").on('click', function(e) {
                e.preventDefault();
                var search = $("#template_serach").val();
                templateGet(search);
            });
            $("#template_serach_btn_reset").on('click', function(e) {
                e.preventDefault();
                var search = $("#template_serach").val('');
                templateGet();
            });

            // ------------ Template Fetch --------------

        });


    </script>

<script>
    function copyToClipboard(text) {
        if (!navigator.clipboard) {
            var textarea = document.createElement("textarea");
            textarea.value = text;
            textarea.style.opacity = "0";
            document.body.appendChild(textarea);
            textarea.focus();
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
        } else {
            navigator.clipboard.writeText(text).then(function() {
                alert("Copied to clipboard");
                console.log("Copied to clipboard");

                // Set copied text to the input field
                var fileUrlInput = document.getElementById("summernote");
                fileUrlInput.value = text;

                // Dismiss the modal
                $('#scrollmodal').modal('hide');
            }, function(error) {
                console.log(error);
            });
        }
        }


                function DeleteMedia(id) {
                   $.ajax({
                       url: "{{ route('media.ajax.delete') }}",
                       type: "POST",
                       data: {
                           _token: "{{ csrf_token() }}",
                           media_id: id
                       },
                       success: function(response) {
                           alert(response.message);
                           fetchMedia();
                           fetchMediaAll();
                       },
                       error: function(xhr, status, error) {
                           console.error(xhr.responseText);
                       }
                   });
               }

            function fetchMedia() {
               $.ajax({
                   url: "{{ route('media.recent.uploaded') }}",
                   type: "POST",
                   data: {
                       _token: "{{ csrf_token() }}"
                   },
                   success: function(response) {
                       $('#mediaContainer').html(response);
                   },
                   error: function(xhr, status, error) {
                       console.error(xhr.responseText);
                   }
               });
           }
       function fetchMediaAll() {
               $.ajax({
                   url: "{{ route('media.all.uploaded') }}",
                   type: "POST",
                   data: {
                       _token: "{{ csrf_token() }}"
                   },
                   success: function(response) {
                       $('#mediaContainerAll').html(response);
                   },
                   error: function(xhr, status, error) {
                       console.error(xhr.responseText);
                   }
               });
           }

       $(document).ready(function() {
           fetchMedia();
           fetchMediaAll()
           $('#mediaForm').submit(function(e) {
               e.preventDefault();

               var formData = new FormData(this);
               var mediaName = formData.get('media_name');
               var mediaFile = formData.get('media_file');

               if (!mediaName || !mediaFile) {
                   alert('Both name and file are required.');
                   return;
               }

               var maxFileSize = 16000000; // 16 MB in bytes
               if (mediaFile.size > maxFileSize) {
                   alert(
                       'File size exceeds the maximum allowed limit (16 MB). Please choose a smaller file.');
                   return;
               }

               var progressBar = $('.progress');
               var progressBarInner = $('.progress-bar');
               var fileError = $('#fileError');

               progressBar.show();
               fileError.hide();

               $.ajax({
                   url: "{{ route('media.store') }}",
                   type: 'POST',
                   data: formData,
                   processData: false,
                   contentType: false,
                   xhr: function() {
                       var xhr = new window.XMLHttpRequest();
                       xhr.upload.addEventListener("progress", function(evt) {
                           if (evt.lengthComputable) {
                               var percentComplete = (evt.loaded / evt.total) * 100;
                               progressBarInner.width(percentComplete + '%');
                           }
                       }, false);
                       return xhr;
                   },
                   success: function(response) {
                       progressBar.hide();
                       progressBarInner.width('0%');

                       alert(response.message);
                       fetchMedia();
                       // Reset the form fields and clear errors
                       $('#mediaForm')[0].reset();
                       fileError.hide();
                   },
                   error: function(xhr, status, error) {
                       progressBar.hide();
                       progressBarInner.width('0%');

                       if (xhr.status === 422) {
                           var errors = xhr.responseJSON.errors;
                           if (errors.media_file) {
                               fileError.text(errors.media_file[0]).show();
                           }
                       } else {
                           console.error(xhr.responseText);
                       }
                   }
               });
           });
       });

   </script>


@endsection
