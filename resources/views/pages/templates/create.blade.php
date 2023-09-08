@extends(env('LAYOUT_TEMPLATE'), ['title' => 'Message Tempalte'])
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">New Template Message</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Template</li>
    </ol>
@endsection
@section('topbutton')
    <a href="{{route('template.index')}}" class="btn btn-primary btn-icon-text my-2 me-2">
        <i class="fe fe-arrow-left me-2"></i> Back
    </a>
@endsection
@section('content')
    <div class="row row-sm pb-4">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
               <form action="{{route('template.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <h6 class="main-content-label mb-1">Template Category</h6>
                                <p class="text-muted card-sub-title">Your template should fall under one of these
                                    categories.</p>
                            </div>
                            <div class="form-group">
                                <select name="category" class="form-control select2" required>
                                    <option value="MARKETING" >MARKETING</option>
                                    <option value="UTILITY">UTILITY</option>
                                   
                                    <option value="AUTHENTICATION">AUTHENTICATION</option>
                                </select>
                                @error('category')
                                    <small class="text-danger text-muted"> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <h6 class="main-content-label mb-1">Template Language</h6>
                                <p class="text-muted card-sub-title">You will need to specify the language in which message template is submitted.</p>
                            </div>
                            <div class="form-group ">
                                <select name="language" class="form-control select2" required>
                                    <option value="en" selected>English</option>
                                    <option value="en_US" selected>English(US)</option>
                                    <option value="en_GB" selected>English(UK)</option>
                                    <option value="hi">Hindi</option>
                                </select>
                                @error('language')
                                    <small class="text-danger text-muted"> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <h6 class="main-content-label mb-1">Template Name</h6>
                                <p class="text-muted card-sub-title">Name can only be in lowercase alphanumeric characters and underscores. Special characters and white-space are not allowed
                                    e.g. - app_verification_code</p>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" value="{{old('name')}}" class="form-control" name="name" required>
                                </div>
                                @error('name')
                                    <small class="text-danger text-muted"> {{$message}}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <h6 class="main-content-label mb-1">Template Type</h6>
                                <p class="text-muted card-sub-title">Your template type should fall under one of these categories.</p>
                            </div>
                            <div class="form-group ">
                                <select name="type" id="type" class="form-control" required>
                                    <option value="TEXT" selected>TEXT</option>
                                    <option value="IMAGE">IMAGE</option>
                                    <option value="VIDEO">VIDEO</option>
                                    <option value="DOCUMENT">FILE</option>
                                    <option value="LOCATION">LOCATION</option>
                                </select>
                                @error('type')
                                    <small class="text-danger text-muted"> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-6 col-md-6" id="headerDiv" style="display: none;">
                            <div>
                                <h6 class="main-content-label mb-1">Template Header <span class="text-capitalice text-muted">(Optional)</span></h6>
                                <p class="text-muted card-sub-title">Your message content. Upto 60 characters are allowed.</p>
                            </div>
                            <div class="form-group ">
                                 <input type="text" name="msg_header" class="form-control" maxlength="60">
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <h6 class="main-content-label mb-1">Template Format</h6>
                                <p class="text-muted card-sub-title">Use text formatting - *bold* , _italic_ & ~strikethrough~
                                    Your message content. Upto 1024 characters are allowed.
                                    e.g. - Hello @{{1}}, your code will expire in @{{2}} mins.</p>
                            </div>
                            <div class="form-group">
                                <textarea name="format" id="" class="form-control"  rows="2" required maxlength="1024">{{old('format')}}</textarea>
                                @error('format')
                                    <small class="text-danger text-muted"> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <h6 class="main-content-label mb-1">Template Footer <span class="text-capitalice text-muted">(Optional)</span></h6>
                                <p class="text-muted card-sub-title">Your message content. Upto 60 characters are allowed.</p>
                            </div>
                            <div class="form-group ">
                                 <input type="text" name="msg_footer" class="form-control" maxlength="60">
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="template_action" id="action1" value="None" checked onclick="handleRadioButtonClick('None');">
                                <label class="form-check-label" for="action1">None</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="template_action" id="action2" value="Call to Actions" onclick="handleRadioButtonClick('Call to Actions');">
                                <label class="form-check-label" for="action2">Call to Actions</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="template_action" id="action3" value="Quick Replies" onclick="handleRadioButtonClick('Quick Replies');">
                                <label class="form-check-label" for="action3">Quick Replies</label>
                            </div>
                        </div>

                        <div class="col-lg-12" id="quickRepliesDiv" style="display: none;">
                           <div class="row">
                                <div class="col-12">
                                    <table id="quickRepliesTable" width="50%">
                                        <tr>
                                          <td>Quick Reply: </td>
                                          <td>
                                            <input type="text" placeholder="Button title" maxlength="25" name="quick_reply[]" class="form-control">
                                          </td>

                                          <td>
                                            <button type="button" class="btn ripple btn-light btn-icon" onclick="removeQuickReplyRow(this)"><i class="fa fa-times" aria-hidden="true"></i></button>
                                          </td>
                                        </tr>
                                      </table>
                                        <button type="button" id="addQuickReplyButton" class="btn ripple btn-light btn-rounded" onclick="addQuickReplyRow()"> <i class="fa fa-plus" aria-hidden="true"></i> Quick Reply </button>

                                </div>
                           </div>
                        </div>


                        <div class="col-lg-12" id="callToActionDiv" style="display: none;">
                           <div class="row">
                            <div class="col-12">
                                <table id="actionTable" width="100%">
                                  <tr>
                                    <td>Call to Action: </td>
                                    <td>
                                      <select name="action_type[]" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        <option value="PHONE_NUMBER">Phone Number</option>
                                        <option value="URL">URL</option>
                                      </select>
                                    </td>
                                    <td>
                                      <input type="text" placeholder="Button title" maxlength="25" name="button_title[]" class="form-control">
                                    </td>
                                    <td>
                                      <input type="text" placeholder="Button Value" class="form-control" name="button_value[]">
                                    </td>
                                    <td>
                                      <button type="button" class="btn ripple btn-light btn-icon" onclick="removeRow(this)"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </td>
                                  </tr>
                                </table>

                                <button id="addButton" type="button" class="btn ripple btn-light btn-rounded" onclick="addRow()"> <i class="fa fa-plus" aria-hidden="true"></i> Call to Action </button>
                              </div>
                        </div>


                    </div>


                    <div class="row row-sm py-3">
                        <div class="float-right">
                            <button type="submit" class="btn ripple btn-main-primary">Submit</button>
                        </div>
                    </div>


                </div>
               </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>


function toggleDiv(elementId) {
        var div = document.getElementById(elementId);
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }

    function handleRadioButtonClick(value) {
        var callToActionDiv = document.getElementById('callToActionDiv');
        var quickRepliesDiv = document.getElementById('quickRepliesDiv');

        if (value === 'None') {
            callToActionDiv.style.display = 'none';
            quickRepliesDiv.style.display = 'none';
        } else if (value === 'Call to Actions') {
            callToActionDiv.style.display = 'block';
            quickRepliesDiv.style.display = 'none';

        } else if (value === 'Quick Replies') {
            quickRepliesDiv.style.display = 'block';
            callToActionDiv.style.display = 'none';
        } else {
            callToActionDiv.style.display = 'none';
            quickRepliesDiv.style.display = 'none';
        }
    }

// ================= === Dynamic QuickReply ==========================
    var rowCountQuickReply = 1;
    function addQuickReplyRow(){
        var table = document.getElementById('quickRepliesTable');

      if (rowCountQuickReply <= 3) {
        var newRow = table.insertRow();

        var cell1 = newRow.insertCell(0);
        cell1.innerHTML = 'Quick Reply' + ': ';

        var cell3 = newRow.insertCell(1);
        var titleInput = document.createElement('input');
        titleInput.type = 'text';
        titleInput.placeholder = 'Button title';
        titleInput.maxLength = 25;
        titleInput.name = 'quick_reply[]';
        titleInput.className = 'form-control';
        cell3.appendChild(titleInput);

        var cell5 = newRow.insertCell(2);
        var deleteButton = document.createElement('button');
        deleteButton.className = 'btn ripple btn-light btn-icon';
        deleteButton.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
        deleteButton.onclick = function() {
          table.deleteRow(newRow.rowIndex);
          rowCount--;
          updateButtonVisibilitynew();
        };
        cell5.appendChild(deleteButton);

        rowCount++;
        updateButtonVisibilitynew();
      }
    }

    function updateButtonVisibilitynew() {
      var addButton = document.getElementById('addQuickReplyButton');
      if (rowCount >= 3) {
        addButton.style.display = 'none';
      } else {
        addButton.style.display = 'block';
      }
    }

    function removeQuickReplyRow(button) {
    var row = button.parentNode.parentNode;
    var table = document.getElementById('quickRepliesTable');
    table.deleteRow(row.rowIndex);
    rowCount--;
    updateButtonVisibilitynew();
  }

  updateButtonVisibilitynew();

// ===================== Dynamic row Call To Action===================
    var rowCount = 1;

    function addRow() {
      var table = document.getElementById('actionTable');

      if (rowCount <= 1) {
        var newRow = table.insertRow();

        var cell1 = newRow.insertCell(0);
        cell1.innerHTML = 'Call to Action ' + ': ';

        var cell2 = newRow.insertCell(1);
        var selectElement = document.createElement('select');
        selectElement.name = 'action_type[]';
        selectElement.className = 'form-control';
        var option1 = new Option('Phone Number', 'PHONE_NUMBER');
        var option2 = new Option('URL', 'URL');
        selectElement.appendChild(option1);
        selectElement.appendChild(option2);
        cell2.appendChild(selectElement);

        var cell3 = newRow.insertCell(2);
        var titleInput = document.createElement('input');
        titleInput.type = 'text';
        titleInput.placeholder = 'Button title';
        titleInput.maxLength = 25;
        titleInput.name = 'button_title[]';
        titleInput.className = 'form-control';
        cell3.appendChild(titleInput);

        var cell4 = newRow.insertCell(3);
        var valueInput = document.createElement('input');
        valueInput.type = 'text';
        valueInput.placeholder = 'Button Value';
        valueInput.className = 'form-control';
        valueInput.name = 'button_value[]';
        cell4.appendChild(valueInput);

        var cell5 = newRow.insertCell(4);
        var deleteButton = document.createElement('button');
        deleteButton.className = 'btn ripple btn-light btn-icon';
        deleteButton.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
        deleteButton.onclick = function() {
          table.deleteRow(newRow.rowIndex);
          rowCount--;
          updateButtonVisibility();
        };
        cell5.appendChild(deleteButton);

        rowCount++;
        updateButtonVisibility();
      }
    }

    function updateButtonVisibility() {
      var addButton = document.getElementById('addButton');
      if (rowCount >= 2) {
        addButton.style.display = 'none';
      } else {
        addButton.style.display = 'block';
      }
    }

    function removeRow(button) {
    var row = button.parentNode.parentNode;
    var table = document.getElementById('actionTable');
    table.deleteRow(row.rowIndex);
    rowCount--;
    updateButtonVisibility();
  }

  updateButtonVisibility();
// ===================== Dynamic row Call To Action===================


    function toggleHeader() {
        var selectElement = document.getElementById('type');
        var headerDiv = document.getElementById('headerDiv');

        if (selectElement.value === 'TEXT') {
            headerDiv.style.display = 'block';
        } else {
            headerDiv.style.display = 'none';
        }
    }

    document.addEventListener("DOMContentLoaded", function () {

        toggleHeader();

        var selectElement = document.getElementById('type');
        selectElement.addEventListener('change', toggleHeader);
    });
</script>
@endsection
