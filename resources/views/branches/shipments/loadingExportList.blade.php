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
                            <h4 class="page-title">Loading Export List</h4>

                        </div>
                    </div>

                </div>

                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="body p-2">
                                <div class="table-responsive">
                                    <table id="shipsTable" class="table center-aligned-table">
                                        <thead>
                                        <tr>
                                            <th>DATE</th>
                                            <th>BOOKING NO:</th>
                                            <th>INVOICE NO:</th>
                                            <th>No: of Pcs</th>
                                            <th>WEIGHT</th>
                                            <th>DEST</th>
                                            <th>MODE</th>
                                            <th>ITEM LIST</th>
                                            <th>OFFICE</th>
                                            <th>STATUS</th>
                                        </tr>
                                        </thead>
                                        <tbody  id="bookingData">
                                        <?php

                                        $res ='';
                                        $tot_weight = 0;
                                        $tot_value = 0;
                                        $tot_temp =0;
                                        $totalPieces =0;

                                        foreach( $datas as $booking) { 
 
                                            $tot_temp= $booking->weight;
                                            $tot_weight +=$tot_temp;
                                            $tot_value += $booking->shipment->grand_total;
                                            $totalPieces += 1; 
                                            
                                            $itemList = [];
                                            $packages = collect($booking->shipment->packages)->where('box_id', $booking->id);
                                            foreach($packages as $item) {
                                                $itemList[] = $item->description;
                                            }
                                            $List = implode(', ', $itemList);

                                            if(($booking->boxStatuses != null)) {
                                                $status = collect($booking->boxStatuses)->last();
                                                $shipmentStatus = collect($booking->shipment->shipmentStatus)->last();
                                                $lastStatus = (!empty($status)) ? $status->status->name : $shipmentStatus->status->name ;
                                            }
                                            ?>                                            
                                            <tr>
                                                <td style="text-align:center">{{ !empty($booking->shipment->created_date) ? date('d-m-Y', strtotime($booking->shipment->created_date)) : '' }}</td>
                                                <td style="text-align:center" >{{ $booking->shipment->booking_number}}</td>  
                                                <td style="text-align:center" >{{$booking->box_name}}</td>  
                                                <td style="text-align:center" >{{ count($packages) }}</td>  
                                                <td style="text-align:center">{{ number_format($booking->shipment->total_weight + $booking->shipment->msic_weight, 2) }}</td>
                                                <td style="text-align:center">{{ $booking->shipment->receiver->address->state->name }}</td>
                                                <td style="text-align:center">{{$mode->shipmentMethodTypes->name}}</td>
                                                <td style="text-align:center">{{ $List }}</td>
                                                <td style="text-align:center">{{ $booking->shipment->branch->name }}</td>
                                                <td style="text-align:center">{{ $lastStatus }}</td>
                                            </tr>  
                                            <?php     
                                            }
                                            ?>
                                                    
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- end container-fluid -->

        </div>


@endsection
@section('styles')
    @include('layouts.datatables_style')
    <style>
        .floatRight {float:right;}
        .m-l-10 {margin-left:10px!important;}
    </style>
@endsection

@section('scripts')
    @include('layouts.datatables_js')

    <script>
        $(function () {
            $('#shipsTable').DataTable( {
                ordering: false,
                searching: false,
                info: false,
                bPaginate: false,
                dom: 'Bfrtip',
                autoWidth: false,
                scrollX: true,
                buttons: [
                {
                    extend: 'excel',
                    title: '<?=$excelName?>',
                }]
            } );
        });

 </script>

@endsection
