@extends('layout_index.master')
@section('content')
<style>
    div.dataTables_wrapper div.dataTables_length select {
        padding-left: 10px;
        height: -webkit-fill-available;
        display: inline-block;
    }
</style>
<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-innerbannercontent">
                    <h1>{{ __('Information') }}</h1>
                    <ol class="tg-breadcrumb">
                        <li> <a href="{{ route('index') }}">{{ __('hompage') }}</a></li>
                        <li class="tg-active">{{ __('Information') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!--************************************
				Inner Banner End
		*************************************-->
<!--************************************
				Main Start
		*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
    <!--************************************
					News Grid Start
			*************************************-->
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-products">
                                @if(Session::has('thongbao'))
                                <div class="alert alert-success">{{Session::get('thongbao')}}</div>
                                @endif
                                <div class="tg-sectionhead">
                                    <h2>{{ __("Information") }}</h2>
                                </div>
                                <form method="post" action="{{ route('changeinfo',Auth::user()->id)}}">
                                    @csrf
                                    <div class="form-group">
                                        <label>H??? t??n:</label>
                                        <input type="text" name="fullname" class="form-control" value="{{$customer->full_name}}" />
                                        @error('fullname')
                                        <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>S??? ??i???n tho???i:</label>
                                        <input type="text" name="phone" class="form-control" data-inputmask="'mask': '999-999-9999'" value="{{$customer->phone}}" />
                                        @error('phone')
                                        <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>?????a ch???:</label>
                                        <input type="text" name="address" class="form-control" value="{{$customer->address}}" />
                                        @error('address')
                                        <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input style="text-transform :none; " type="text" name="email" class="form-control" value="{{$customer->email}}" />
                                        @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-3">
                                        <button class="btn black">C???p nh???t th??ng tin </button>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <br>
                            <div class="tg-products">

                                <br>
                                <div class="tg-sectionhead">
                                    @if(Session::has('flag'))
                                    <div class="alert alert-{{Session::get('flag')}}">{{Session::get('messege')}}</div>
                                    @endif
                                </div>

                                <div class="col-sm-4">
                                    <form method="post" action="{{ route('updatePassword',Auth::user()->id)}}">
                                        @csrf
                                        <label>M???t Kh???u C??</label>
                                        <div class="form-group pass_show">
                                            <input type="password" name="password" class="form-control" placeholder="M???t Kh???u C??">
                                            @error('password')
                                            <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <label>M???t Kh???u M???i</label>
                                        <div class="form-group pass_show">
                                            <input type="password" name="new_password" class="form-control" placeholder="M???t Kh???u M???i">
                                            @error('new_password')
                                            <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <label>Nh???p L???i M???t Kh???u</label>
                                        <div class="form-group pass_show">
                                            <input type="password" name="re_password" class="form-control" placeholder="Nh???p L???i M???t Kh???u">
                                            @error('re_password')
                                            <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <button class="btn black">C???p nh???t th??ng tin </button>
                                        </div>
                                        <br>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <h2>????n h??ng c???a b???n</h2>
                            </div>
                            <div class="accordion-inner">
                                <table id="example" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>T??n kh??ch h??ng</th>
                                            <th>S??? L?????ng</th>
                                            <th>?????a ch???</th>
                                            <th>Ng??y ?????t</th>
                                            <th>T??nh Tr???ng </th>
                                            <th>T???ng ti???n</th>
                                            <th>S???n ph???m</th>
                                            <th>Chi ti???t</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($bill as $bills)
                                        <tr>
                                            <td>{{$bills->full_name}}</td>
                                            <td>{{$bills->quantity}}</td>
                                            <td>{{$bills->address}}</td>
                                            <td>{{$bills->date_order}}</td>
                                            <td> @if($bills->status == 0)
                                                <button type="button" class="btn btn-default">??ang x??? l??</button>
                                                @elseif($bills->status == 1)
                                                <button type="button" class="btn btn-primary">Ti???p nh???n</button>
                                                @elseif($bills->status == 2)
                                                <button type="button" class="btn btn-success">???? giao</button>
                                                @elseif($bills->status == 3)
                                                <button type="button" class="btn btn-danger">Th???t b???i</button>
                                                @endif
                                            </td>
                                            <td>{{number_format($bills->unit_price*$bills->quantity)}} VN??</td>
                                            <td>
                                                <div class="your-order-item" width="100%">
                                                    <div class="cart-item">
                                                        <div class="media">
                                                            <img style="width:100px;height:80px;" src="{{ asset('images/product/' . $bills->image) }}" class="pull-left">
                                                            <div class="media-body">
                                                                <span class="color-gray your-order-info pull-left"><b>T??n s??ch:</b> {{$bills->name}}</span><br>
                                                                <span class="color-gray your-order-info pull-left"><b>????n gi??:</b> {{number_format($bills->unit_price)}} VN??</span><br>
                                                                <span class="color-gray your-order-info pull-left"><b>S??? l?????ng:</b> *{{$bills->quantity}} </span>
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><button style="border-radius: 4px;" class='btn btn-flat btn-info'><i class='fa fa-eye'></i></button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                        <aside id="tg-sidebar" class="tg-sidebar">
                            <div class="tg-widget tg-widgetinstagram">
                                <div class="tg-widgettitle">
                                    <h3>Instagram</h3>
                                </div>
                                <div class="tg-widgetcontent">
                                    <ul>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-01.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-02.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-03.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-04.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-05.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-06.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-07.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-08.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="images/instagram/img-09.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>3000</em></a></figcaption>
                                            </figure>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width:auto">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel" style="color: red">Chi ti???t s???n ph???m</h3>
                        </div>
                        <div class="modal-body">
                            <div class="showBill"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">????ng</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--************************************
					News Grid End
			*************************************-->
</main>
<!--************************************
				Main End
		*************************************-->
@endsection
@section('show')
<link rel="stylesheet" type="text/css" href="DataTables-1.10.23/css/dataTables.bootstrap.min.css" />
<script type="text/javascript" src="DataTables-1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="DataTables-1.10.23/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    var table = $('#example').DataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "order": [],
        "bAutoWidth": true,
        "info": false,
        // hiding columns via datatable column.visivle API
        "columnDefs": [{
            "targets": [6],
            "visible": false
        }, {
            // adding a more info button at the end
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-info btn1' ><i class='fa fa-eye'></i></button>",
        }]
    });

    $('#example tbody').on('click', '.btn1', function() {
        var data = table.row($(this).parents('tr')).data(); // getting target row data
        $('.showBill').html(
            // Adding and structuring the full data
            '<table class="table table-bordered table-hover dataTable"><tr role="row"><th class="sorting_asc text-center"><h4 style="color:blue">Th??ng tin ????n h??ng</h4></th></tr><tbody><tr><td>' + data[6] +
            '</td></tr><tr><td><b style="font-size:18px; color:red">T???ng ti???n :</b><b class="text-red pull-right" style="color:red">' + data[5] + '</b></td></tr></table>'

        );
        $('#myModal').modal('show'); // calling the bootstrap modal
    });
</script>
@stop