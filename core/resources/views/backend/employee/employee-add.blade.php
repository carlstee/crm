@extends('backend.master')
@section('site-title')
    Add New Employee
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- END PAGE BAR -->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Add New Employee
            </h3>
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
            <!-- END PAGE TITLE-->
            <form method="POST" action="{{route('employee.post')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="row ">
                    <div class="col-md-6 col-sm-6">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Personal Details
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                    <img src="">
                                                </div>
                                                 <span class="btn red btn-outline btn-file">
                                                 <span class="fileinput-new"> Select image </span>
                                                 <span class="fileinput-exists"> Change </span>
                                                 <input type="file" name="image"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="Employee Name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Father's Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="f_name" placeholder="Father Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date of Birth</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="b_date" readonly value="">
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
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="phone" placeholder="Contact Number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Local Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="local_add" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Permanent Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="per_add" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <h4><strong>Account Login</strong></h4>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="oldpassword">
                                            <input type="password" name="password" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Company Details
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Employee ID<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="employee_id" placeholder="Employee ID" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Department</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2me" id="department" name="dept_id">

                                                @foreach($department as $dep)
                                                <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                @endforeach
                                                    {{csrf_field()}}

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Designation</label>
                                        <div class="col-md-9">
                                            <select  class="select2me form-control" name="deg_id" id="designation" >

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date of Joining</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="date" readonly value="">
                                                <span class="input-group-btn">
                                 <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Joining Salary</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="salary" placeholder="Current Salary" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Bank Account Details
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Holder Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ac_name" placeholder="Account Holder Name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ac_num" placeholder="Account Number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="bank_name" placeholder="BANK Name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">IFSC Code(Optional)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="code" placeholder="IFSC Code" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">PAN Number(Optional)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pan_num" placeholder="PAN Number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Branch</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="branch" placeholder="BRANCH" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet box dark">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Documents
                                    </div>
                                </div>
                                <div class="portlet-body">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                    <i class="fa fa-plus"></i>	Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('change','#department',function(){
                var id = $(this).val();
                //alert(id)
                $.ajax({
                    type:"POST",
                    url:"{{route('designation.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('#designation').html("");
                        $('#designation').append(data)
                    }
                });
            });
        });
    </script>
@endsection

