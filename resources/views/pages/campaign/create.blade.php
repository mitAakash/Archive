@extends(env('LAYOUT_TEMPLATE'), ['title' => 'Message Tempalte'])
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">New Campaigns</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Campaigns</li>
    </ol>
@endsection

@section('css')
    <!-- InternalFileupload css-->
    <link href="../assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css" />

    <!-- InternalFancy uploader css-->
    <link href="../assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
@endsection
@section('topbutton')
    <a href="{{ route('campaign.index') }}" class="btn btn-primary btn-icon-text my-2 me-2">
        <i class="fe fe-arrow-left me-2"></i> Back
    </a>
@endsection

@section('content')
    <div class="row row-sm pb-4">
        <div class="col-12 col-lg-8 col-md-8 mx-auto">
            <div class="card custom-card">
                <form action="{{ route('campaign.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <div>
                                    <h6 class="main-content-label mb-1">Campaign Name <span class="text-danger">*</span>
                                    </h6>
                                    <p class="text-muted card-sub-title">Pick something that describes your audience &
                                        goals.</p>
                                </div>
                                <div class="form-group ">
                                    <input type="text" name="campaign_name" placeholder="Enter Campaign Name"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div>
                                    <h6 class="main-content-label mb-1">Upload CSV File <span class="text-danger">*</span>
                                    </h6>
                                    <p class="text-muted card-sub-title"></p>
                                </div>
                                <div>
                                    <input type="file" name="csv_file" class="dropify" accept=".csv" data-height="100"
                                        data-width="100%" required />
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div>
                                    <h6 class="main-content-label mb-1">Template Name <span class="text-danger">*</span>
                                        <span id="name_template"></span>
                                    </h6>
                                    <p class="text-muted card-sub-title">Select one from your WhatsApp approved template
                                        messages</p>
                                </div>
                                <div class="form-group">
                                    <select id="templateSelect" name="template_name" class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($template as $item)
                                            <option type="{{ $item->type }}" name="{{ $item->name }}"
                                                format="{{ $item->msg_body }}" value="{{ $item->id }}">
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('template')
                                        <small class="text-danger text-muted"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <p id="format-data"></p>
                                    <p id="format-type"></p>
                                </div>
                                <div id="inputFields"></div>


                            </div>

                            <div class="col-12 mt-3" id="mediaDiv" style="display: none;">
                                <div>
                                    <h6 class="main-content-label mb-1">Media<span class="text-danger">*</span></h6>
                                    <p class="text-muted card-sub-title">File & Media Max Size < 16MB</p>
                                </div>
                                <div>
                                    <input id="file_url_required" type="url" name="file_url" placeholder="Media Url"
                                        class="form-control" />
                                </div>

                                <p class="text-center"><strong>Or</strong></p>

                                <center><button type="button" class="btn btn-info" data-bs-target="#scrollmodal"
                                        data-bs-toggle="modal"> <i class="fa fa-upload"></i> Upload from Media
                                        Library</button></center>
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                </form>
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
    <div class="progress" style="display: none;">
        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    {{-- model image upload  --}}
@endsection
@section('script')
    <!-- Internal Fileuploads js-->
    <script src="../assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="../assets/plugins/fileuploads/js/file-upload.js"></script>

    <!-- InternalFancy uploader js-->
    <script src="../assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
    <script src="../assets/plugins/fancyuploder/jquery.fileupload.js"></script>
    <script src="../assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
    <script src="../assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
    <script src="../assets/plugins/fancyuploder/fancy-uploader.js"></script>

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

                    // Set copied text to the input field
                    var fileUrlInput = document.getElementById("file_url_required");
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
                        'File size exceeds the maximum allowed limit (16 MB). Please choose a smaller file.'
                    );
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


    <script>
        document.getElementById("templateSelect").addEventListener("change", function() {
            var selectedOption = this.options[this.selectedIndex];
            var type = selectedOption.getAttribute("type");

            if (type !== 'TEXT') {
                document.getElementById("mediaDiv").style.display = "block";

                var fileUrlInput = document.getElementById("file_url_required");
                fileUrlInput.setAttribute("required", "required");
            } else {
                document.getElementById("mediaDiv").style.display = "none";

                var fileUrlInput = document.getElementById("file_url_required");
                fileUrlInput.removeAttribute("required");
            }

            var format = selectedOption.getAttribute("format");

            document.getElementById("format-data").textContent = "Format - " + format;
            document.getElementById("name_template").textContent = selectedOption.getAttribute("name");
            document.getElementById("format-type").textContent = "Type - " + type;


            var inputFieldsDiv = document.getElementById("inputFields");
            inputFieldsDiv.innerHTML = "";


            var placeholders = format.match(/\{\{\d+\}\}/g) || [];
            placeholders.forEach(function(placeholder, index) {
                var input = document.createElement("input");
                input.type = "text";
                input.className = "form-control mt-3";
                input.name = "format_value_of_text[]";
                input.setAttribute("required", "required")
                input.placeholder = placeholder;
                input.id = "input" + (index + 1);
                inputFieldsDiv.appendChild(input);

                // input.addEventListener("input", function() {
                //     updateFormattedOutput(format, placeholders);
                // });

                // Add hidden input field for storing the value of each placeholder
                var hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "format_hidden_input[]";
                hiddenInput.value = placeholder;
                hiddenInput.id = "hiddenInput" + (index + 1);
                inputFieldsDiv.appendChild(hiddenInput);
            });

            var fileUrlInput = document.getElementById("file_url_required");
            fileUrlInput.value = "";


            // updateFormattedOutput(format, placeholders);
        });

        // function updateFormattedOutput(format, placeholders) {
        //     var formattedOutput = format;
        //     placeholders.forEach(function(placeholder, index) {
        //         var inputValue = document.getElementById("input" + (index + 1)).value;
        //         formattedOutput = formattedOutput.replace(placeholder, inputValue);
        //     });

        //     document.getElementById("formattedOutput").textContent = "Formatted Output: " + formattedOutput;
        // }
    </script>
@endsection
