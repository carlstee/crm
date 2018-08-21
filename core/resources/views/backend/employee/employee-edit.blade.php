@extends('backend.master')
@section('site-title')
    Employee Edit
@endsection
@section('main-content')


    <div class="page-content-wrapper">

        <div class="page-content">
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Employee Edit/View
            </h3>
            <!-- END PAGE TITLE-->

            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="clearfix">
            </div>
            <div class="row ">
                <div class="col-md-6 col-sm-6">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Personal Details
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.update', $employee->id)}}" class="form-horizontal" id="personal_details_form" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}

                                <div class="form-body">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">Photo</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    <img style="height: 100px;" src="{{asset('assets/images/employee/images/'. $employee->image)}}">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="file" name="image">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                        Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                 <span class="label label-danger">
                                 NOTE! </span> Image Size must be (872px by 724px)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="name" class="form-control" value="{{$employee->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Father's Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="f_name" class="form-control" value="{{$employee->f_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date of Birth</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="b_date" readonly value="{{$employee->b_date}}" >
                                                <span class="input-group-btn">
                                 <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="gender">
                                                <option value="male" @if($employee->gender == 'male') selected  @endif >Male</option>
                                                <option value="female" @if($employee->gender == 'female') selected  @endif >Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone</label>
                                        <div class="col-md-9">
                                            <input type="text" name="phone" class="form-control" value="{{$employee->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address</label>
                                        <div class="col-md-9">
                              <textarea name="local_add" class="form-control" rows="3">{{$employee->local_add}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Permanent Address</label>
                                        <div class="col-md-9">
                              <textarea name="per_add" class="form-control" rows="3">{{$employee->per_add}}</textarea>
                                        </div>
                                    </div>
                                    <h4><strong>Account Login</strong></h4>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" class="form-control" value="{{$employee->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="actions col-md-12">
                                            <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm dark col-md-12">
                                                <i class="fa fa-save" ></i> Update </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Company Details
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.company.update', $employee->id)}}" class="form-horizontal" id="company_details_form">

                                {{csrf_field()}}
                                {{method_field('put')}}

                                <div id="alert_company">
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Employee ID<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="employee_id" class="form-control" value="{{$employee->employee_id}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Department<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select class="form-control select2me" id="department" name="dept_id">
                                                @foreach($dep as $val)
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                {{csrf_field()}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Designation<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select  class="select2me form-control" name="deg_id" id="designation" >

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date of Joining</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="date" readonly value="{{$employee->date}}">
                                                <span class="input-group-btn">
                                 <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Exit Date</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="exit_date" disabled="disabled" readonly value=" ">
                                                <span class="input-group-btn">
                                 <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4><strong>Salary  ( <i class="fa fa-money"></i> )</strong>  {{$general->currency}}</h4>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <input class="form-control form-control-inline"  type="text" name="salary" value="{{$employee->salary}}" placeholder="Salary"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm dark col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Bank Account Details
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.bank.update', $employee->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_bank"></div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Holder Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="ac_name" class="form-control" value="{{$employee->ac_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Number</label>
                                        <div class="col-md-9">
                                            <input type="text" name="ac_num" class="form-control" value="{{$employee->ac_num}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="bank_name" class="form-control" value="{{$employee->bank_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">IFSC Code(Optional)</label>
                                        <div class="col-md-9">
                                            <input type="text" name="code" class="form-control" value="{{$employee->code}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">PAN Number(Optional)</label>
                                        <div class="col-md-9">
                                            <input type="text" name="pan_num" class="form-control" value="{{$employee->pan_num}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Branch</label>
                                        <div class="col-md-9">
                                            <input type="text" name="branch" class="form-control" value="{{$employee->branch}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm dark col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="row ">
                    <div class="col-md-12 col-sm-12">
                        <div class="portlet box blue-chambray">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Documents
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="portlet-body">
                                    <form method="POST" action="{{route('employee.document.update', $employee->id)}}" class="form-horizontal" id="documents_details_form" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('put')}}

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Resume</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                            </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="resume">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/resume/'. $employee->resume)}}" target="_blank" class="btn dark">View Resume</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Offer Letter</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                                </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="offer_letter">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/offeringLetter/'.$employee->offer_letter)}}" target="_blank" class="btn dark">Offer Letter</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Joining Letter</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                            </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="join_letter">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/joiningLetter/'. $employee->join_letter)}}" target="_blank" class="btn dark">View Joining Letter</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Contract and Agreement</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                            </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="con_letter">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>

                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/contractLetter/'. $employee->con_letter)}}" target="_blank"  class="btn dark">View Contract</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">ID Proof</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                             </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="proof">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/idProof/'. $employee->proof)}}" target="_blank"  class="btn dark">View ID Proof</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="actions col-md-12">
                                                <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm dark col-md-12">
                                                    <i class="fa fa-save" ></i> Update </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body" id="info">
                                <p>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="button" data-dismiss="modal" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title"><strong>New Salary</strong></h4>
                            </div>
                            <div class="modal-body">
                                <div class="portlet-body form">
                                    <!-------------- BEGIN FORM------------>
                                    <form method="POST" action=" " class="form-horizontal ">

                                      {{csrf_field()}}
                                        {{method_field('put')}}

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" data-loading-text="Updating..."  class="demo-loading-btn btn green"><i class="fa fa-check"></i> Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -----------END FORM-------->
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('change','#department', function () {
                var id = $(this).val();

                $.ajax({
                    type:"POST",
                    url:"{{route('designation.pass')}}",
                    data:{
                        'id' : id,
                        '_token': $('input[name=_token]').val()
                    },
                    success:function (data) {
                        $('#designation').html("");
                        $('#designation').append(data)
                    }
                })
            })
        })
    </script>
@endsection


