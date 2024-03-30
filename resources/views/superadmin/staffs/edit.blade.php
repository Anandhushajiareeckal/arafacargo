@extends('layouts.app')

@section('content')

    <div class="content-page" id="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                {!! breadcrumbs() !!}
                            </div>
                            <h4 class="page-title">{{page_title()}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">

                            <form action="{{update_url($staff->id)}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="propertyname">Staff Name</label>
                                            <input type="text" name="name" value="{{old('name',$staff->full_name)}}" class="form-control"
                                                   id="propertyname" required
                                                   placeholder="Enter Full Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="propertyname">Staff Password</label>
                                            <input type="text" name="password" value="" class="form-control"
                                                   id="propertyname"
                                                   placeholder="Enter Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="propertyname">Staff Branch</label>

                                            <select class="form-control" name="branch_id" required>
                                                <option value>Selct Branch</option>
                                                @foreach(\App\Models\Branches::all() as $branch)

                                                    <option value="{{$branch->id}}"  @if($staff->branch_id==$branch->id) selected @endif>{{$branch->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="propertyname">Staff Status</label>
                                            <select class="form-control" name="staff_status" required>
                                                <option value>Selct Status</option>
                                                <option value="active"  @if($staff->staff_status=='active') selected @endif>Active</option>
                                                    <option value="inactive"  @if($staff->branch_id=='inactive') selected @endif>Inactive</option>
                                                    <option value="cancel"  @if($staff->branch_id=='cancel') selected @endif>Cancel</option>
                                         
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="visa_expiry_date">Visa Expiry Date</label>
                                            <input type="date" name="visa_expiry_date" class="form-control" id="visa_expiry_date" required
                                                   placeholder="Enter Visa Expiry Date" value="{{old('visa_expiry_date',$staff->visa_expiry_date)}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="propertyname">Finger capture</label><br>
                                            <input type="submit" id="btnCapture" value="Capture" class=" capturebuttonpadding btn btn-primary btn-sm submit_buttom_padding" onclick="return Capture()" />                                           

                                            <img id="imgFinger" width="145px" height="188px" Falt="Finger Image" class="padd_top" />

                                        </div>


                                        <div class="form-group">
                                            <label for="propertyname">Document Type</label> 
                                            <select class="form-control" name="document_type_id" required> 
                                                <option value="0">Select</option> 
                                                    @foreach($documentTypes as $documentType)
                                                        <option value="{{$documentType->id}}" @if($staff->document_type_id == $documentType->id) selected @endif>{{$documentType->name}}</option> 
                                                    @endforeach
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                        <label for="">Upload Document</label>
                                        <input type="file" class="form-control" name="document_path" id="document_path" placeholder="document">
                                        </div> 





                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Upload Photo</label>
                                            <input type="file" class="form-control" name="profile_photo" id="profile_photo" placeholder="document">
                                        </div> 

                                        <div class="form-group">
                                            <label for="propertyname">Staff ID</label>
                                            <input type="staff_id" name="staff_id" value="{{old('staff_id',$staff->staff_id)}}" class="form-control"
                                                   id="staff_id" required readonly
                                                   placeholder="Enter Staff Id">
                                            @error('email')
                                            <ul class="parsley-errors-list filled" id="parsley-id-45">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="propertyname">Staff Email</label>
                                            <input type="email" name="email" value="{{old('email',$staff->user->email)}}" class="form-control"
                                                   id="propertyname" required
                                                   placeholder="Enter Email">
                                            @error('email')
                                            <ul class="parsley-errors-list filled" id="parsley-id-45">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="propertyname">Staff Role</label>

                                            <select class="form-control" name="role" required>
                                                <option value>Selct Role</option>
                                                @foreach(\Spatie\Permission\Models\Role::where("name","!=","Admin")->get() as $role)
                                                    <option value=" {{$role->name}}"  @if($staff->user->roles->first()->name==$role->name) selected @endif>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="propertyname">FingerPrint Mandatory</label>
                                            <select class="form-control" name="fingerprint_mandatory" required> 
                                                    <option value="yes"  @if($staff->fingerprint_mandatory=='yes') selected @endif>yes</option> 
                                                    <option value="no" @if($staff->fingerprint_mandatory=='no') selected @endif>No</option> 
                                            </select>
                                        </div> 
                                     
                                        <div class="form-group">
                                            <label for="propertyname">Date of Appointment</label>
                                            <input type="date" class="form-control" name="appointment_date" value="{{old('appointment_date',$staff->appointment_date)}}" required>
                                        </div> 


                                        <div class="form-group">
                                            <label for="propertyname">Type of Visa</label>
                                            <select class="form-control" name="visa_type" required> 
                                                <option value="0">Select</option> 
                                                    @foreach($visaTypes as $visaType)
                                                        <option value="{{$visaType->id}}" @if($staff->visa_type_id == $visaType->id) selected @endif>{{$visaType->name}}</option> 
                                                    @endforeach
                                            </select>
                                        </div> 

                                        <div class="form-group">
                                            <label for="propertyname">Visa Status</label>
                                            <select class="form-control" name="visa_status" required> 
                                                    <option value="1" @if($staff->visa_status == "1") selected @endif>Active</option> 
                                                    <option value="0" @if($staff->visa_status == "0") selected @endif>Inactive</option> 
                                            </select>
                                        </div> 

                                        <div class="form-group">
                                            <label for="propertyname">Daily Wage</label>
                                            <input type="text" class="form-control" name="daily_wage" value="{{old('daily_wage',$staff->daily_wage)}}" required>
                                        </div> 

                                        <div class="form-group">
                                            <label for="propertyname">Dcoument ID</label>
                                            <input type="text" class="form-control" name="document_number"  value="{{old('document_number',$staff->document_number)}}" required>
                                        </div>



                                    </div>


                                </div>
                                <!-- end row -->


                                <div class="panel" style="display:none;">
                                            <table width="100%">
                                                <tr class="hide">
                                                    <td>
                                                        <input type="text" value="" id="txtStatus" class="form-control hide" />
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Quality:
                                                    </td>
                                                    <td>
                                                        <input type="text" value="" id="txtImageInfo" class="form-control" />
                                                    </td>
                                                </tr>
                                                
                                                <tr class="hide">
                                                    <td>
                                                        Base64Encoded ISO Template
                                                    </td>
                                                    <td>
                                                        <textarea id="txtIsoTemplate" name="txtIsoTemplate" style="width: 100%; height:50px;" value="" class="form-control">{{$staff->fingerprint}}</textarea>
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Base64Encoded ANSI Template
                                                    </td>
                                                    <td>
                                                        <textarea id="txtAnsiTemplate" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Base64Encoded ISO Image
                                                    </td>
                                                    <td>
                                                        <textarea id="txtIsoImage" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Base64Encoded Raw Data
                                                    </td>
                                                    <td>
                                                        <textarea id="txtRawData" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Base64Encoded Wsq Image Data
                                                    </td>
                                                    <td>
                                                        <textarea id="txtWsqData" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Encrypted Base64Encoded Pid/Rbd
                                                    </td>
                                                    <td>
                                                        <textarea id="txtPid" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Encrypted Base64Encoded Session Key
                                                    </td>
                                                    <td>
                                                        <textarea id="txtSessionKey" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Encrypted Base64Encoded Hmac
                                                    </td>
                                                    <td>
                                                        <input type="text" value="" id="txtHmac" class="form-control" />

                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Ci
                                                    </td>
                                                    <td>
                                                        <input type="text" value="" id="txtCi" class="form-control" />
                                                    </td>
                                                </tr>
                                                <tr class="hide">
                                                    <td>
                                                        Pid/Rbd Ts
                                                    </td>
                                                    <td>
                                                        <input type="text" value="" id="txtPidTs" class="form-control" />
                                                    </td>
                                                </tr>
                                            </table>                   
                                        </div>



                                <div class="text-center">
                                    <input type="hidden" name="user_id" value="{{$staff->user_id}}" />
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit
                                    </button>
                                    <a href="{{index_url()}}" type="button"
                                       class="btn btn-danger waves-effect waves-light">Cancel
                                    </a>
                                </div>
                            </form>
                            <!-- end form -->

                        </div>
                        <!-- end card-box -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->


        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        2018 - 2020 &copy; Zircos theme by <a href="#">Coderthemes</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
@endsection
@section('styles')
    @include('layouts.datatables_style')
@endsection

@section('scripts')
    @include('layouts.datatables_js')
@endsection
