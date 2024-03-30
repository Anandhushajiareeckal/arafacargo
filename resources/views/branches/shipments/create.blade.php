@extends('layouts.app')

@section('content')
<style>
.boxContainer{
    border:1px solid black;
    padding:5px;
    margin-top:5px;
}
body{
	font-family:Verdana, Geneva, sans-serif;
	font-size:18px;
}
</style>
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

                            <form action="{{store_url()}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="header">
                                        <h4>Basic Info</h4>
                                    </div>

                                    <div class="row">

                                    {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Booking code .</label>
                                                <input type="text" name="booking_code"  id="booking_code"
                                                       value="" class="form-control"  >
                                                @error('booking_code')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Booking No.</label>
                                                <input type="text" name="booking_number"
                                                       value="{{ $nextBookingNumber }}" class="form-control"
                                                       required readonly >
                                                @error('booking_number')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Branch List</label>
                                                <select autofocus name="branch_id" id="branch_id"
                                                        class="form-control">
                                                    @foreach ($branches as $branch)
                                                        <option
                                                            {{ (branch()->id==$branch->id) ? 'selected' : "" }} value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h4>Sender Info</h4>
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <label>Sender/Customer</label>
                                                <select name="sender_id" id="sender_id" class="form-control" required>
                                                <option value='' selected="selected">Select </option>
                                                    @foreach (get_customers('sender') as $sender)
                                                        <option    value="{{ $sender->id }}"
                                                        data-phone="{{$sender->phone??""}}"  data-address="{{$sender->address->address??""}}">{{ strtoupper($sender->name) }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sender_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="AddSender" class="btn btn-primary mt-sm-4"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>

                                        </div>
                                        <div class="row form-group col-md-12">
                                            <label>Sender Address</label>
                                            <input readonly type="text" id="sender_address" class="form-control">
                                        </div>
                                        <div class="row form-group col-md-12">
                                            <label>Sender Phone</label>
                                            <input readonly type="text" id="sender_phone" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="header">
                                            <h4>Receiver Info</h4>
                                        </div>
                                        <div class=" row">
                                            <div class="form-group col-md-10">
                                                <label>Receiver/Customer</label>
                                                <select name="receiver_id" id="receiver_id"
                                                        class="form-control" required>
                                                        <option value='' selected="selected">Select </option>
                                                    @foreach (get_customers('receiver') as $receiver)
                                                        <option  value="{{ $receiver->id }}"
                                                        data-phone="{{$receiver->phone??""}}"  data-address="{{$receiver->address->address??""}}">{{ strtoupper($receiver->name) }}</option>
                                                    @endforeach
                                                </select>
                                                @error('receiver_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="AddReceiver" class="btn btn-primary mt-4"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="row form-group col-md-12">
                                            <label>Receiver Address</label>
                                            <input readonly type="text" id="receiver_address" class="form-control">
                                        </div>
                                        <div class="row form-group col-md-12">
                                            <label>Receiver Phone</label>
                                            <input readonly type="text" id="receiver_phone" class="form-control">
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="header">
                                        <h4>Shipping Info</h4>
                                    </div>
                                    <div class="body">

                                        <div class="row">
                                            <!-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Receipt Number</label>
                                                    <input type="text" value="{{ old('receipt_number') }}"
                                                           class="form-control"
                                                           name="receipt_number">
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Packaging Type</label>
                                                    <input type="text" value="{{ old('packing_type') }}"
                                                           name="packing_type"
                                                           class="form-control">
                                                </div>
                                            </div> -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Courier Company</label>
                                                    <select name="agency_id" class="form-control">
                                                        <!-- <option value="Best Express"> Best Express</option> -->
                                                        @foreach ($agencies as $agency)
                                                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    <!-- <input type="text" value="{{ old('agency_id') }}"
                                                           name="agency_id" class="form-control"> -->
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Shipping Methods</label>

                                                    <select name="shiping_method" class="form-control" id="shiping_method"  onchange="getVolume(this);">
                                                        <option value="" data-shipTypeId=""> Select </option>
                                                            @foreach( $ship_types as $key => $shipping_type )
                                                            <option value="{{$shipping_type->value}}" data-shipTypeId="{{$shipping_type->id}}">{{$shipping_type->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        <input type="hidden" name="shipping_method_id" value=""  id="shipping_method_id"/>

                                                        <?php /*
                                                        <option
                                                            {{ (old('shiping_method')=='Air') ? 'selected' : "" }} value="Air">
                                                            Air
                                                        </option>
                                                        <option
                                                            {{ (old('shiping_method')=='Sea') ? 'selected' : "" }} value="Sea">
                                                            Sea
                                                        </option>
                                                        <option
                                                            {{ (old('shiping_method')=='Raoad') ? 'selected' : "" }} value="Road">
                                                            Road
                                                        </option> */ ?>


                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Payment Method</label>
                                                    <select name="payment_method" class="form-control" id="">
                                                        <option
                                                           value="cash_payment">
                                                            Cash Payment
                                                        </option>
                                                        <option
                                                             value="credit">
                                                            Credit
                                                        </option>
                                                        <option
                                                             value="bank">
                                                            Bank
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status_id" class="form-control" id="" required>
                                                    <option value="">--- Select Status ---</option>
                                                        @foreach (status_list_admin() as $item)
                                                            <option
                                                                {{ $item->id == 15 ? 'selected' : "" }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('status_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label>Date</label>
                                                        <input type="date" value="{{ isset($ships->created_date) ? date('Y-m-d', strtotime($ships->created_date)) : date('Y-m-d')}}" max=""
                                                            class="form-control" id="propertyname" name="created_date"
                                                            placeholder="Enter title">
                                                </div>
                                            </div>
                                             <!-- <div class="col-md-3">
                                                <div class="form-group">

                                            </div>
                                            </div>   -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label  for="collected_by" >Collected By</label>
                                                    <select class="form-control" name="collected_by" id="collected_by" required>
                                                            <option value="" selected>Select</option>
                                                            <option value="driver">Driver</option>
                                                            <option value="staff">Office</option>
                                                    </select>
                                                </div>
                                            </div>




                                            <div class="col-md-3" id="driver_or_staff">
                                                <div class="form-group">
                                                {{-- @if(!empty($previous_booking->collected_by) == "driver")
                                                    <label>Driver Name</label>
                                                    <select class="form-control" name="driver_id">
                                                        <option value>Select Driver</option>
                                                        @foreach($drivers as $driver)
                                                            <option  {{ (!empty($previous_booking->driver_id) == $driver->id ) ? 'selected' : "" }} value="{{$driver->id}}">{{$driver->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @elseif(!empty($previous_booking->collected_by) == "staff")
                                                    <label>Staff Name</label>
                                                        <select class="form-control" name="staff_id">
                                                            <option value>Select Staff</option>
                                                            @foreach($staffs as $staff)
                                                                <option  {{ (!empty($previous_booking->staff_id) == $staff->id ) ? 'selected' : "" }} value="{{$staff->id}}">{{$staff->full_name}}</option>
                                                            @endforeach
                                                        </select>
                                                @else --}}
                                                    <label>Select Name</label>
                                                    <select class="form-control" name="">
                                                        <option value>Select </option>
                                                    </select>
                                                {{-- @endif --}}

                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>LRL Tracking Code</label>
                                                    <input type="text" name="lrl_tracking_code"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Delivery Type</label>

                                                    <select class="form-control" name="delivery_type" id="delivery_type" required>
                                                        <option value>Select</option>
                                                            <option   value="door_to_door">Door To Door</option>
                                                            <option  value="door_to_port">Door To Port</option>

                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="propertyname">Time</label>
                                                        <input type="time" name="time" value="{{!empty($shipment)?$shipment->time:date('H:i')}}" class="  form-control"
                                                            id="propertyname1" required
                                                            placeholder="Select Time" autocomplete="off" id="setTimeExample">
                                                    </div>


                                                </div>

                                        </div>

                                        </div>

                                    <div class="row">


                                    </div>
                                    <div style="display:none;" >
                                        <div id="boxContainer">


                                            <div class="package col-md-12"  id="package_ID" >
                                                <div class="header">
                                                    <div class="col-md-6"  style="float:left">
                                                    <h6 class="packageinfo-head">Package Info</h6>
                                                    </div>
                                                    <div class="col-md-6 text-right pb-2" style="float:left">
                                                    <button type="button" id="addpackage" class="btn btn-success">Add
                                                            Items
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="body" id="packageinfo">

                                                    <table class="table table-bordered packageinfo">
                                                        <tr>
                                                            <td width="40%">
                                                                <input type="text" placeholder="Enter description"
                                                                    name="description[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="number" placeholder="Enter quantity"
                                                                    name="qty[]"
                                                                    class="form-control qty">
                                                            </td>
                                                            <td>
                                                                <input type="number" placeholder="Enter unit price"
                                                                    name="unit[]"
                                                                    class="form-control unit">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="subtotal[]" readonly
                                                                    class="form-control value pkg-subtotal">
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>

                                                <div class="body" id="boxDimension">
                                                <div class="row">
                                                    <div class="col-md-2 box-title">
                                                        <h6>Box</h6>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Length</label>
                                                            <input type="text" name="length" value="" class="form-control box-length">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Width</label>
                                                            <input type="text" name="width" value="" class="form-control box-width">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Height</label>
                                                            <input type="text" name="height" value="" class="form-control box-height">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Weight</label>
                                                            <input type="number" name="weight" value="" class="form-control box-weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Unit Value</label>
                                                            <input type="number" name="unit_value" value="" class="form-control box-unit-value">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Total Value</label>
                                                            <input type="number" name="total_value" value="" class="form-control box-total-value total" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="body">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td width="25%"><h4>Amount : </h4></td>
                                                            <td width="25%"><h4><span id="totalAmt" class="package-total-amount"></span></h4></td>
                                                            <td width="25%"><h4>Quantity: </h4></td>
                                                            <td width="25%"><h4><span id="totalqty"></span></h4></td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="boxContainer1"> </div>

                                    <div id="Container">

                                    </div>

                                    <div class="col-md-12"  id="TotalDiv" style="display:none;">
                                        <div class="body">
                                            <table class="table table-bordered">
                                                <tr>

                                                    <td width="60%">
                                                        <div class="row">
                                                            <div class="col-md-6 pt-2"  style="text-align:right;">
                                                                <label>Weight</label>
                                                            </div>
                                                            <div class="col-md-6 pt-2">
                                                                <div class="">
                                                                    <input type="text" name="total_weight" value="" class="form-control" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col-md-6"  style="text-align:right;">
                                                                    <label>Misc weight</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="">
                                                                        <input type="number" name="msic_weight" value="" class="form-control msic_weight">
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col-md-6"  style="text-align:right;">
                                                                    <label>Total weight</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="">
                                                                        <input type="text" name="grand_total_weight" value="" class="form-control" readonly>
                                                                    </div>
                                                                </div>

                                                        </div>

                                                    </td>

                                                    <td width="40%">
                                                        <div class="row">
                                                                <div class="col-md-6 pt-2"  style="text-align:right;">
                                                                    <label>Total Value</label>
                                                                </div>
                                                                <div class="col-md-6 pt-2">
                                                                    <div class="">
                                                                        <input type="number" name="grand_total_box_value" value="" class="form-control" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 "  style="text-align:right;">
                                                                    <label>Total Freight</label>
                                                                </div>
                                                                <div class="col-md-6 ">
                                                                    <div class="">
                                                                        <input type="number" name="total_freight" value="" class="form-control total">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6"  style="text-align:right;">
                                                                    <label>Misc Freight</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="">
                                                                        <input type="number" name="misc_freight" value="" class="form-control total">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6"  style="text-align:right;">
                                                                    <label>Packing Charge</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="">
                                                                        <input type="number" name="packing_charge" value="" class="form-control total">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"  style="text-align:right;">
                                                                    <label>Other Charge</label>
                                                                </div>
                                                                <div class="col-md-6 ">
                                                                    <div class="">
                                                                        <input type="number" name="other_charges" value="" class="form-control total">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6"  style="text-align:right;">
                                                                    <label>Document Charge</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="">
                                                                        <input type="number" name="document_charge" value="" class="form-control  total">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6"  style="text-align:right;">
                                                                    <label>Discount</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="">
                                                                    <input type="number" value=""
                                                                    id="discount" name="discount" class="form-control discount">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6"  style="text-align:right;">
                                                                    <label>Grand Total</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="">
                                                                        <input type="text" name="grand_total" value="" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12"" style="display:none;">
                                    <div class="body" id="boxDimension1">
                                        <div class="row">
                                            <div class="col-md-2 box-title">
                                                <h6>Box</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Length</label>
                                                    <input type="text" name="length" value="" class="form-control box-length">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Width</label>
                                                    <input type="text" name="width" value="" class="form-control box-width">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Height</label>
                                                    <input type="text" name="height" value="" class="form-control box-height">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Weight</label>
                                                    <input type="number" name="weight" value="" class="form-control box-weight">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Unit Value</label>
                                                    <input type="number" name="unit_value" value="" class="form-control box-unit-value">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Total Value</label>
                                                    <input type="number" name="total_value" value="" class="form-control box-total-value total" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row" id="total-package" style="display:none;">

                                    <table class="table table-bordered">
                                                        <tbody><tr>
                                                            <td width="25%"><h4>Total Amount : </h4></td>
                                                            <td width="25%"><h4>
                                                                <span id="totalPackageAmt" class="package-total-amount"></span>
                                                            </h4>
                                                            <input type="hidden" name="package_total_amount" value="" >


                                                            </td>
                                                            <td width="25%"><h4>Total Quantity: </h4></td>
                                                            <td width="25%">
                                                                <h4><span id="totalPackageqty"></span></h4>
                                                                <input type="hidden" name="package_total_quantity" value="" >
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                    </table>
                                <div>

                                </div>
                                </div>

                                <div class="text-center" style="display:block;">
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



    </div>
    @include('branches.modals.add_client')
@endsection
@section('styles')
    @include('layouts.datatables_style')
@endsection

@section('scripts')
    <script>
        $(function () {
            // validation needs name of the element
            // initialize after multiselect

            $(document).ready(function () {
                $('.select2').select2();
                // addItems();

                $('input.timepicker').timepicker({
                    timeFormat: 'h:mm p',
                    interval: 1,
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true
                });

            });







            $('#number_of_pcs').on('change', function () {
                var number_of_pcs = $(this).val();
                $('#Container').html('');
                for (i = 0; i < $(this).val(); i++) {
                    var j = i+1;
                       var myClone =  $('#boxContainer').clone();

                        var k = i+1;
                        // var boxDimension =  $('#boxDimension').clone();
                        myClone.find('.box-title').html('<h6>Box ' + k+'</h6>' );
                        myClone.find('.box-length').attr('name','length'+k);
                        myClone.find('.box-height').attr('name','height'+k);
                        myClone.find('.box-width').attr('name','width'+k);
                        myClone.find('.box-unit-value').attr('name','unit_value'+k);
                        myClone.find('.box-weight').attr('data-weight', k);
                        myClone.find('.box-unit-value').attr('data-unit-value', k);
                        myClone.find('.box-total-value').attr('name','total_value'+k);
                        // myClone.clone().appendTo("#Container");

                         var myName = $(this).text();
                        myClone.find('.packageinfo-head').text( 'Package Info ' + j );
                        myClone.find('#addpackage').attr('id', 'addpackage'+j);
                        myClone.find('#additems').attr('id', 'additems'+j);
                        myClone.find('#packageinfo').attr('id', 'packageinfo'+j);
                        myClone.find('.packageinfo').attr('class', 'table table-bordered packageinfo'+j);
                        myClone.find('input[name="description[]"]').attr('name', 'description'+j+'[]');
                        myClone.find('input[name="qty[]"]').attr('name', 'qty'+j+'[]');
                        myClone.find('input[name="unit[]"]').attr('name', 'unit'+j+'[]');
                        myClone.find('input[name="unit'+j+'[]"]').attr('data-myAttri', j);
                        myClone.find('input[name="subtotal[]"]').attr('name', 'subtotal'+j+'[]');
                        myClone.find('#totalAmt').attr('id', 'totalAmt'+j);
                        myClone.find('#totalqty').attr('id', 'totalqty'+j);
                        myClone.clone().appendTo("#Container");



                }

                // $('#boxContainer').html('');
                // for (i = 0; i < $(this).val(); i++) {
                //     var k = i+1;
                //     var boxDimension =  $('#boxDimension').clone();
                //     boxDimension.find('.box-title').html('<h6>Box ' + k+'</h6>' );
                //     boxDimension.find('.box-length').attr('name','length'+k);
                //     boxDimension.find('.box-height').attr('name','height'+k);
                //     boxDimension.find('.box-weight').attr('name','weight'+k);
                //     boxDimension.find('.box-unit-value').attr('name','unit_value'+k);
                //     boxDimension.find('.box-weight').attr('data-weight', k);
                //     boxDimension.find('.box-unit-value').attr('data-unit-value', k);
                //     boxDimension.find('.box-total-value').attr('name','total_value'+k);
                //     boxDimension.clone().appendTo("#boxContainer");
                // }
                $("#TotalDiv").css({'display':'block'});
                $("#total-package").css({'display':'block'});

                addItems();
            });


            $('#sender_id').on('change', function () {
                var address = $(this).find(":selected").data('address');
                var phone = $(this).find(":selected").data('phone');
                $("#sender_address").val(address);
                $("#sender_phone").val(phone);
            });
            $('#receiver_id').on('change', function () {
                var address = $(this).find(":selected").data('address');
                var phone = $(this).find(":selected").data('phone');
                $("#receiver_address").val(address);
                $("#receiver_phone").val(phone);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#AddSender').click(function () {
                $('#AddClient h4.modal-title').text("Add Sender");
                $('#AddClient #clientType').val("sender");
                $('.id_no label').text("Sender Id");
                $('.id_type label').text("Sender Identification Type");





                $('#AddClient').modal('show');

            });

            $('#AddReceiver').click(function () {
                $('#AddClient h4.modal-title').text("Add Receiver");
                $('#AddClient #clientType').val("receiver");
                $('.id_no label').text("Receiver Id");
                $('.id_type label').text("Receiver Identification Type");
                $('#AddClient').modal('show');








                 




            });


            $('.modal').on('hidden.bs.modal', function (e) {
                $(this).find("input,textarea,select").val('').end()
                .find("input[type=checkbox], input[type=file], input[type=radio]")
                .prop("checked", "")
                .end();
            })


            var index = 1;

            function addItems() {
                $('#addpackage1').click(function () {
                    var tr = $('#tr').html();
                    var html = `<tr>
                                <td style="padding:10px" width="40%"><input placeholder="Enter description" type="text" name="description1[]" class="form-control"></td>
                                    <td style="padding:10px"><input placeholder="Enter quantity" type="number" name="qty1[]"  class="form-control qty"></td>
                                    <td style="padding:10px"><input type="number"  data-myAttri="1" placeholder="Enter unit price" name="unit1[]" class="form-control unit"></td>
                                    <td style="padding:10px"><input type="number" readonly name="subtotal1[]" class="form-control value pkg-subtotal"></td>

                                </tr>`;
                    $('#packageinfo1 table').append(html)
                })


                $('#addpackage2').click(function () {
                    var tr = $('#tr').html();
                    var html = `<tr>
                                <td style="padding:10px" width="40%"><input placeholder="Enter description" type="text" name="description2[]" class="form-control"></td>
                                    <td style="padding:10px"><input placeholder="Enter quantity" type="number" name="qty2[]"  class="form-control qty"></td>
                                    <td style="padding:10px"><input type="number"  data-myAttri="2" placeholder="Enter unit price" name="unit2[]" class="form-control unit"></td>
                                    <td style="padding:10px"><input type="number" readonly name="subtotal2[]" class="form-control value pkg-subtotal"></td>

                                </tr>`;
                    $('#packageinfo2 table').append(html)
                })


                $('#addpackage3').click(function () {
                    var tr = $('#tr').html();
                    var html = `<tr>
                                <td style="padding:10px" width="40%"><input placeholder="Enter description" type="text" name="description3[]" class="form-control"></td>
                                    <td style="padding:10px"><input placeholder="Enter quantity" type="number" name="qty3[]"  class="form-control qty"></td>
                                    <td style="padding:10px"><input type="number"  data-myAttri="3" placeholder="Enter unit price" name="unit3[]" class="form-control unit"></td>
                                    <td style="padding:10px"><input type="number" readonly name="subtotal3[]" class="form-control value pkg-subtotal"></td>

                                </tr>`;
                    $('#packageinfo3 table').append(html)
                })


                $('#addpackage4').click(function () {
                    var tr = $('#tr').html();
                    var html = `<tr>
                                <td style="padding:10px" width="40%"><input placeholder="Enter description" type="text" name="description4[]" class="form-control"></td>
                                    <td style="padding:10px"><input placeholder="Enter quantity" type="number" name="qty4[]"  class="form-control qty"></td>
                                    <td style="padding:10px"><input type="number"  data-myAttri="4" placeholder="Enter unit price" name="unit4[]" class="form-control unit"></td>
                                    <td style="padding:10px"><input type="number" readonly name="subtotal4[]" class="form-control value pkg-subtotal"></td>
                                </tr>`;
                    $('#packageinfo4 table').append(html)
                })

                $('#addpackage5').click(function () {
                    var tr = $('#tr').html();
                    var html = `<tr>
                                <td style="padding:10px" width="40%"><input placeholder="Enter description" type="text" name="description5[]" class="form-control"></td>
                                    <td style="padding:10px"><input placeholder="Enter quantity" type="number" name="qty5[]"  class="form-control qty"></td>
                                    <td style="padding:10px"><input type="number"  data-myAttri="5" placeholder="Enter unit price" name="unit5[]" class="form-control unit"></td>
                                    <td style="padding:10px"><input type="number" readonly name="subtotal5[]" class="form-control value pkg-subtotal"></td>
                                </tr>`;
                    $('#packageinfo5 table').append(html)
                })


                    $(document).on("input", ".box-weight", function () {
                        var sum_value = 0;
                        $('.box-weight').each(function(){
                            sum_value += +$(this).val();
                            $("input[name='total_weight']").val(sum_value);
                        })

                        var wgt = $(this).attr("data-weight");
                        var total_weight = parseFloat($("input[name='weight"+wgt+"']").val());
                        var total_unit_value = parseFloat($("input[name='unit_value"+wgt+"']").val());
                        $("input[name='total_value"+wgt+"']").val( total_weight * total_unit_value);

                        var box_total = 0;
                        $('.box-total-value').each(function(){
                            box_total += +$(this).val();
                            $("input[name='grand_total_box_value']").val(box_total);
                        })

                    })


                    $(document).on("input", ".box-unit-value", function () {
                        var wgt = $(this).attr("data-unit-value");
                        var total_weight = parseFloat($("input[name='weight"+wgt+"']").val());
                        var total_unit_value = parseFloat($("input[name='unit_value"+wgt+"']").val());
                        $("input[name='total_value"+wgt+"']").val( total_weight * total_unit_value);

                        var box_total = 0;
                        $('.box-total-value').each(function(){
                            box_total += +$(this).val();
                            $("input[name='grand_total_box_value']").val(box_total);
                        })

                    })

                    $(document).on("input", ".msic_weight", function () {
                        var total_weight = parseFloat($("input[name='total_weight']").val());
                        var msic_weight = parseFloat($("input[name='msic_weight']").val());
                        $("input[name='grand_total_weight']").val( total_weight + msic_weight);
                    })

                    // $(document).on("input", ".box-total-value", function () {
                    //     var sum_value = 0;
                    //     $('.box-total-value').each(function(){
                    //         sum_value += +$(this).val();
                    //         $("input[name='grand_total_box_value']").val(sum_value);
                    //     })
                    // })

                    $(document).on("input", ".total", function () {
                        var sum_value = 0;
                        $('.total').each(function(){
                            sum_value += +$(this).val();
                            if($("#discount").val() != '') {
                                var discount =  parseFloat($("#discount").val());
                            } else {
                                var discount = 0;
                            }
                            $("input[name='grand_total']").val(parseFloat(sum_value) - discount );
                        })
                    })

                    $(document).on("input", "#discount", function () {
                        $(".discount").val( $('#discount').val());

                        var sum_value = 0;
                        $('.total').each(function(){
                            sum_value += +$(this).val();
                            if($("#discount").val() != '') {
                                var discount =  parseFloat($("#discount").val());
                            } else {
                                var discount = 0;
                            }
                            $("input[name='grand_total']").val(parseFloat(sum_value) - discount );
                        });

                        // var sum_grand_total = parseFloat($("input[name='grand_total']").val());
                        // var sum_discount = parseFloat($("#discount").val());

                        // if( sum_grand_total != '' && sum_grand_total > 0){
                        //     if( sum_discount > 0) {
                        //         $("input[name='grand_total']").val( sum_grand_total - sum_discount );
                        //     } else {
                        //         $("input[name='grand_total']").val( sum_grand_total);
                        //     }
                        // }
                    })

                    $(document).on("input", ".form-control", function () {
                        $("input[name='unit1[]']").each(function () {
                            var qty = $(this).parent('td').prev('td').find('input').val()
                            var unit = $(this).val();
                            $(this).parent('td').next('td').find('input').val(qty * unit);
                        });
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='subtotal1[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalAmt1").text(sum);
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='qty1[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalqty1").text(sum);
                    })


                    $(document).on("input", ".form-control", function () {
                        $("input[name='unit2[]']").each(function () {
                            var qty = $(this).parent('td').prev('td').find('input').val()
                            var unit = $(this).val();
                            $(this).parent('td').next('td').find('input').val(qty * unit);
                        });
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='subtotal2[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalAmt2").text(sum);
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='qty2[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalqty2").text(sum);
                    })


                    $(document).on("input", ".form-control", function () {
                        $("input[name='unit3[]']").each(function () {
                            var qty = $(this).parent('td').prev('td').find('input').val()
                            var unit = $(this).val();
                            $(this).parent('td').next('td').find('input').val(qty * unit);
                        });
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='subtotal3[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalAmt3").text(sum);
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='qty3[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalqty3").text(sum);
                    })

                    $(document).on("input", ".form-control", function () {
                        $("input[name='unit4[]']").each(function () {
                            var qty = $(this).parent('td').prev('td').find('input').val()
                            var unit = $(this).val();
                            $(this).parent('td').next('td').find('input').val(qty * unit);
                        });
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='subtotal4[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalAmt4").text(sum);
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='qty4[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalqty4").text(sum);
                    })

                    $(document).on("input", ".form-control", function () {
                        $("input[name='unit5[]']").each(function () {
                            var qty = $(this).parent('td').prev('td').find('input').val()
                            var unit = $(this).val();
                            $(this).parent('td').next('td').find('input').val(qty * unit);
                        });
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='subtotal5[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalAmt5").text(sum);
                    })

                    $(document).on("input", ".form-control", function () {
                        var sum = 0;
                        $("input[name='qty5[]']").each(function () {
                            sum += +$(this).val();
                        });
                        $("#totalqty5").text(sum);
                    })


                     $(document).on("keyup", ".unit", function (event) {
                        var keyPressed = event.keyCode || event.which;
                        if (keyPressed == 16) {
                            var packageNo = $(this).attr("data-myAttri");
                            $("#addpackage"+packageNo).click();
                            event.preventDefault();
                            return false;
                        }

                        var box_total = 0;
                        $('.pkg-subtotal').each(function(){
                            box_total += +$(this).val();
                            $("#totalPackageAmt").html(box_total);
                            $("input[name='package_total_amount']").val(box_total  );
                        });
                    });

                    $(document).on("keyup", ".qty", function (event) {

                        var box_total = 0;
                        $('.pkg-subtotal').each(function(){
                            box_total += +$(this).val();
                            $("#totalPackageAmt").html(box_total);
                            $("input[name='package_total_amount']").val(box_total );
                        });

                        var box_qty_total = 0;
                        $('.qty').each(function(){
                            box_qty_total += +$(this).val();
                            $("#totalPackageqty").html(box_qty_total);
                            $("input[name='package_total_quantity']").val( box_qty_total );
                        });

                    });
            }


            $('#country_id').change(function () {
                var country_id = $(this).val();
                $('#loader').removeClass('d-none');
                const url = "{{route('states')}}?country_id=" + country_id;
                console.log(url);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result) {
                        // when call is sucessfull
                        console.log(result);
                        $('#loader').addClass('d-none');
                        let option = ``;
                        $('#state_id').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                        $('.country_code').val(result.phonecode);
                        if(result.phone_no_length!= null){
                            $("#phone").attr("placeholder", "Enter "+result.phone_no_length+" digits");
                            $("#whatsapp_number").attr("placeholder", "Enter "+result.phone_no_length+" digits");
                            $("#phone").attr("maxlength", result.phone_no_length);
                            $("#whatsapp_number").attr("maxlength", result.phone_no_length);

                        }
                        else {
                            $("#phone").attr("placeholder", "Enter phone");
                            $("#whatsapp_number").attr("placeholder", "Enter phone");
                        }


                    }, error: function (er) {
                        console.log(er);
                    }

                }); // ajax call closing
            })


            $('#state_id').change(function () {
                var state_id = $(this).val();
                $('#loader').removeClass('d-none');
                const url = "{{route('cities')}}?state_id=" + state_id;
                console.log(url);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result) {
                        // when call is sucessfull
                        console.log(result);
                        $('#loader').addClass('d-none');
                        let option = ``;
                        $('#city_id').html('<option value="">Select City</option>');
                        $.each(result, function (key, value) {
                            $("#city_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }, error: function (er) {
                        console.log(er);
                    }

                }); // ajax call closing
            })


            $('#state_id').change(function () {
                var state_id = $(this).val();
                $('#loader').removeClass('d-none');
                const url = "{{route('districts')}}?state_id=" + state_id;
                console.log(url);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result) {
                        // when call is sucessfull
                        console.log(result);
                        $('#loader').addClass('d-none');
                        let option = ``;
                        $('#district_id').html('<option value="">Select District</option>');
                        $.each(result, function (key, value) {
                            $("#district_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }, error: function (er) {
                        console.log(er);
                    }

                }); // ajax call closing
            })


            $("#country_code_whatsapp").change(function () {
                 var country_code = $(this).val();
                $('#loader').removeClass('d-none');
                const url = "{{route('getCountry')}}?country_code=" + country_code;
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result) {
                        // when call is sucessfull
                        console.log(result);
                        // return false;
                        $('#loader').addClass('d-none');

                        if(result.phone_no_length!= null)
                        {
                            // $("#phone").attr("placeholder", "Enter "+result.phone_no_length+" digits");
                            $("#whatsapp_number").attr("placeholder", "Enter "+result.phone_no_length+" digits");
                            // $("#phone").attr("max", result.phone_no_length);
                            $("#whatsapp_number").attr("max", result.phone_no_length);
                        } else {
                            // $("#phone").attr("placeholder", "Enter phone");
                            $("#whatsapp_number").attr("placeholder", "Enter phone");
                        }

                    }, error: function (er) {
                        console.log(er);
                    }
                }); // ajax call closing
            });



            $("#country_code_phone").change(function () {

                var country_code = $(this).val();
                $('#loader').removeClass('d-none');
                const url = "{{route('getCountry')}}?country_code=" + country_code;
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result) {
                        // when call is sucessfull
                        console.log(result);
                        // return false;
                        $('#loader').addClass('d-none');

                        if(result.phone_no_length!= null)
                        {
                            $("#phone").attr("placeholder", "Enter "+result.phone_no_length+" digits");
                            $("#phone").attr("max", result.phone_no_length);
                        } else {
                            $("#phone").attr("placeholder", "Enter phone");

                        }

                    }, error: function (er) {
                        console.log(er);
                    }
                }); // ajax call closing


            });


            $('#collected_by').change(function () {
                var collected = $(this).val();
                $('#loader').removeClass('d-none');
                const url = "{{route('branch.collectedBy')}}?collected=" + collected;
                console.log(url);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result) {
                        // when call is sucessfull
                        console.log(result);
                        $('#loader').addClass('d-none');

                        $('#driver_or_staff').html(result.res);
                        // let option = ``;
                        // $('#city_id').html('<option value="">Select City</option>');
                        // $.each(result, function (key, value) {
                        //     $("#city_id").append('<option value="' + value
                        //         .id + '">' + value.name + '</option>');
                        // });

                    }, error: function (er) {
                        console.log(er);
                    }

                }); // ajax call closing
            })




            function calculateTotal() {
                let weight = $('#weight').val()
                let rate = $('#rate').val();
                let packing_charge = $('#packing_charge').val();
                let other_charges = $('#other_charges').val();
                let discount = $('#discount').val();
                console.log(weight * rate);
                if (typeof weight === "undefined" || weight == null) {
                    weight = 0;
                }
                if (typeof rate === "undefined" || rate == null) {
                    rate = 0;
                }
                if (typeof packing_charge === "undefined" || packing_charge == null) {
                    packing_charge = 0;
                }
                if (typeof other_charges === "undefined" || other_charges == null) {
                    other_charges = 0;
                }
                if (typeof discount === "undefined" || discount == null) {
                    discount = 0;
                }
                let am = (weight * rate);
                let grossTotal = am + parseFloat(packing_charge) + parseFloat(other_charges)
                let total = grossTotal - discount;
                $('#total_amount').val(total);
            }

            // $('#weight, #rate, #packing_charge, #other_charges, #discount').on('blur', function () {
            //     calculateTotal();
            // })


            $("#add_client_shipments").submit(function (e) {
                e.preventDefault();
                $('.valid-err').hide()
                $('#loader').removeClass('d-none');
                //var data = $('#add_client_shipments').serialize();
                var formData = new FormData(this);
                for (var p of formData) {
                    let name = p[0];
                    let value = p[1];

                    console.log(name, value)
                }
                $.ajax({
                    url: `{{ route('branch.customers.store') }}`,
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        // when call is sucessfull
                        if (result.success === true) {
                            clearForm()
                            $('#loader').addClass('d-none');
                            var message = `<span class="alert alert-success">` + result.message + `</span>`;
                            console.log(result);
                            $('#msg').html(message)
                            $('#' + result.data.type + '_id').append(`<option value="` + result.data.id + `" selected>` + result.data.name + `<option>`);
                            toastr.info(result.data.address.address);
                            $('#' + result.data.type + '_address').val(result.data.address.address)
                            setTimeout(() => {
                                $('.modal').modal('hide');
                                $('.alert').hide();
                            }, 2000);
                        } else {
                            toastr.error(result.message);
                        }

                    },
                    error: function (err) {
                        // check the err for error details
                        console.log(err);
                        $('#loader').addClass('d-none');
                        $.each(err.responseJSON.errors, function (key, item) {
                            //$("#err").append("<li class='alert alert-danger'>"+item+"</li>")

                            $('#' + key).after('<label class="valid-err text-danger">' + item + '</label>')
                        });
                    }
                }); // ajax call closing

            });

        });


        function clearForm() {
            $('#name').val("");
            $('#email').val("");
            $('#phone').val("");
            $('#zip_code').val("");
            $('#address').val("");
            $('#client_identification_number').val("");
        }

        function getVolume(event){
            var selected_volume  =   event.value;
            $('.volume').val(selected_volume);
            var shiping_method =  $("#shiping_method option:selected").attr('data-shiptypeid');
            $("#shipping_method_id").val(shiping_method);

        }


        $('.btnAction').click(function () {

            $(this).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            $(this).attr('disabled', true);
            $('#basic-form').submit();
        });


        $('#booking_code').keyup(function () {
            var booking_code = $(this).val();
            $('#loader').removeClass('d-none');
            const url = "{{route('branch.booking_code')}}?booking_code=" + booking_code;  //collectedBy

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (result) {
                    // when call is sucessfull
                    console.log(result);
                    $('#loader').addClass('d-none');

                    $("#sender_id").val(result);
                    $("#sender_id").trigger("change");

            // });

            //         $('#sender_id').on('change', function () {
            //     var address = $(this).find(":selected").data('address');
            //     var phone = $(this).find(":selected").data('phone');
            //     $("#sender_address").val(address);
            //     $("#sender_phone").val(phone);
            // });

                    // $('#driver_or_staff').html(result.res);
                    // let option = ``;
                    // $('#city_id').html('<option value="">Select City</option>');
                    // $.each(result, function (key, value) {
                    //     $("#city_id").append('<option value="' + value
                    //         .id + '">' + value.name + '</option>');
                    // });

                }, error: function (er) {
                    console.log(er);
                }

            }); // ajax call closing
        })


    </script>

@endsection
