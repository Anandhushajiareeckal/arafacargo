@extends('layouts.app')

@section('content')
<style>
.head {
    background-color:#002dd1;
    color:#fff;
    padding:5px 10px;
    font-size:24px;
    text-transform: uppercase;
    font-weight:bold;
}
.desc {
    padding:10px 0px 10px 10px;
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
                <div class="row clearfix" style="border-left:1px solid;border-right:1px solid; border-top:1px solid;">
                    <div class="col-md-6" style="padding-left:0px; border-right:1px solid;">
                        <div class="head">Customer</div>
                        <div class="desc">
                            <table style="width:100%">
                                <tr>
                                    <th style="width:30%">Mobile</th>  
                                    <th >: {{ $shipment->sender->phone ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Customer Name</th>  
                                    <th>: {{ $shipment->sender->name ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Email</th>  
                                    <th>: {{ $shipment->sender->name ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Customer Address</th>  
                                    <th>: {{ $shipment->sender->address->address ?? ""}}</th>  
                                </tr> 
                            </table>
                        </div>                        
                    </div>

                    <div class="col-md-6" style="padding-right:0px;">
                    <div class="head">Sender</div> 
                    <div class="desc">
                            <table style="width:100%">
                                <tr>
                                    <th style="width:30%">Name :</th>  
                                    <th>{{ $shipment->sender->name ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Name :</th>  
                                    <th>{{ $shipment->sender->email ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Emirates/ State :</th>  
                                    <th>{{ $shipment->sender->address->state->name ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Country :</th>  
                                    <th>{{ $shipment->sender->address->country->name ?? ""}}</th>  
                                </tr> 
                                <tr>
                                    <th>Phone :</th>  
                                    <th>{{ $shipment->sender->phone ?? ""}}</th>  
                                </tr> 
                                <tr>
                                    <th>Address :</th>  
                                    <th>{{ $shipment->sender->address->address ?? ""}}</th>  
                                </tr> 
                                <tr>
                                    <th>Document No :</th>  
                                    <th>{{ $shipment->sender->identification_number ?? ""}}</th>  
                                </tr> 
                                <tr>
                                    <th>Document Type :</th>  
                                    <th>{{ $shipment->sender->identification_type ?? ""}}</th>  
                                </tr> 
                            </table>
                        </div>    


                    </div>
                </div>


                <div class="row clearfix" style="border-left:1px solid;border-right:1px solid;">
                    <div class="col-md-6" style="padding-left:0px;  border-right:1px solid;">
                        <div class="head">Receiver</div>
                        <div class="desc">
                            <table style="width:100%">
                            <tr>
                                    <th style="width:30%">Name :</th>  
                                    <th >{{ $shipment->receiver->name ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Email :</th>  
                                    <th>{{ $shipment->receiver->email ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Emirates/ State :</th>  
                                    <th>{{ $shipment->receiver->address->state->name ?? "" }}</th>  
                                </tr>
                                <tr>
                                    <th>Country :</th>  
                                    <th>{{ $shipment->receiver->address->country->name ?? ""}}</th>  
                                </tr> 
                                <tr>
                                    <th>Phone :</th>  
                                    <th>{{ $shipment->receiver->phone ?? ""}}</th>  
                                </tr>
                                <tr>
                                    <th>Ohter Phone :</th>  
                                    <th>{{ $shipment->receiver->whatsapp_number ?? ""}}</th>  
                                </tr> 
                                <tr>
                                    <th>Address :</th>  
                                    <th>{{ $shipment->receiver->address->address ?? ""}}</th>  
                                </tr> 
                                <tr>
                                    <th>Document No :</th>  
                                    <th>{{ $shipment->receiver->identification_number ?? ""}}</th>  
                                </tr> 
                                <tr>
                                    <th>Document Type :</th>  
                                    <th>{{ $shipment->sender->identification_type ?? ""}}</th>  
                                </tr> 
                            </table>
                        </div>  
                    </div>

                    <div class="col-md-6" style="padding-right:0px;">
                    <div class="head">Collection Details</div>
                    <div class="desc">
                            <table style="width:100%">
                                <tr>
                                    <th style="width:30%">Booking No :</th><th>{{ $shipment->booking_number }}</th>
                                </tr> 
                                <tr>
                                    <th>Shipment No. : </th>
                                    <th  >{{  $shipment->company->shipment_reference_id ?? "" }}</th>
                                </tr>   
                                <tr>
                                    <th> Status : </th>
                                    <th>{{ $shipment->statusVal->name ?? "" }}</th>
                                </tr>
                                <tr>
                                    <th>Driver Name : </th>
                                    <th>{{ isset($shipment->driver->name) ? $shipment->driver->name :'' }}</th>
                                </tr>
                                <tr>
                                    <th>Courier Company : </th>
                                    <th>{{ $shipment->courier_company }}</th>
                                </tr>
                                <tr>
                                    <th>Shiping Date : </th>
                                    <th>{{ date('d-m-Y', strtotime($shipment->shiping_date)) }}</th>
                                </tr>
                                <tr>
                                    <th>Receipt Number : </th>
                                    <th>{{ $shipment->receipt_number }}</th>
                                </tr> 
                                <tr>
                                    <th>Packing  Type : </th>
                                    <th>{{ $shipment->packing_type }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Method : </th>
                                    <th>{{ $shipment->shiping_method }}</th>
                                </tr>                                
                                <tr> 
                                    <th>No. of Pcs : </th>
                                    <th>{{ $shipment->number_of_pcs }}</th>
                                </tr>
                                <tr> 
                                    <th>Weight : </th>
                                    <th>{{ $shipment->normal_weight }}</th>
                                </tr>
                                <tr>
                                    <th>Width : </th>
                                    <th>{{ $shipment->width }}</th>
                                </tr>
                                <tr>
                                    <th>Height  : </th>
                                    <th>{{ $shipment->height }}</th>
                                </tr>
                                <tr>
                                    <th>Length : </th>
                                    <td>{{ $shipment->length }}</td>
                                </tr>    
                                <tr>
                                    <th>Moving Type : </th>
                                    <td>{{ $shipment->movingType->name??'' }}</td>
                                </tr>                                
                            </table>
                        </div>  
 
                    </div>
                </div>


                <div class="row clearfix" style="border-left:1px solid;border-right:1px solid;">
                    <div class="col-md-6" style="padding-left:0px; border-right:1px solid;">
                        <div class="head">Box Status</div>
                        <div class="desc">
                            <table style="width:100%">
                                <tr>
                                    <th style="width:30%">Status :</th>  
                                    <th>{{ $shipment->statusVal->name ?? "" }}</th>  
                                </tr>
                               
                            </table>
                        </div>  
                    </div>

                    <div class="col-md-6"  style="padding-right:0px;">
                        <div class="head">Charges & Payments</div>
                        <div class="desc">
                            <table style="width:100%">
                                <tr>
                                    <th style="width:30%">Payment Method : </th><th>{{ $shipment->payment_method }}</th>
                                </tr>
                                <tr>
                                    <th>Other Charge : </th><th>{{ $shipment->other_charges }}</th>
                                </tr>
                                <tr>
                                <th>Payment Status : </th><th>{{ $shipment->payment_status }}</th>
                                </tr>
                                <tr>
                                    <th>Paacking Charge : </th><th>{{ $shipment->packing_charge }}</th>  
                                </tr>
                                <tr>
                                    <th>Discount : </th><th>{{ $shipment->discount }}</th>
                                </tr>
                                <tr>
                                    <th>Total Amount : </th><th>{{ $shipment->total_amount }}</th>
                                </tr>
                                
                            </table>
                        </div>  
                    </div>
                </div>


                <div class="row clearfix" style="border:1px solid;">
                    <div class="col-md-12"  style="padding-left:0px; padding-right:0px;">
                        <div class="head">Other Details</div>
                        <div class="desc">
                            <table>
                                <tr>
                                    <th>Cargo Details :</th>  
                                    <th>
                                        @foreach($shipment->packages as $key =>  $package)  
                                                 {{ $package->description }} -{{$package->quantity}}, 
                                        @endforeach
                                    </th>  
                                </tr> 
                                <tr>
                                    <th>Staff Remark :</th>  
                                    <th>
                                        
                                    </th>  
                                </tr> 
                            </table>
                        </div>  
                    </div> 
                </div> 

                   
        </div>

    </div>
    <!-- end container-fluid -->

</div>
<!-- end content -->

@endsection
@section('styles')
    @include('layouts.datatables_style')
@endsection

@section('scripts')
    @include('layouts.datatables_js')
@endsection
