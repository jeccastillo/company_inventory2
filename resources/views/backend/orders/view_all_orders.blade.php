@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Furniture Suppliers</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{route('supplierfurniture.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Supplier </a> <br>  <br>               

                    <h4 class="card-title">Suppliers Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>                            
                            <th>Action</th>

                        </thead>


                        <tbody>

                        	@foreach($orders as $key => $item)
                        <tr>
                            <td> {{ $item->id }} </td>
                            <td> {{ $item->customer_name }} </td>                             
                            <td>
                                <a href="{{route('orders.view',$item->id)}} " class="btn btn-info sm" title="Edit Data">  <i class="fas fa-eye"></i> </a>                                
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection