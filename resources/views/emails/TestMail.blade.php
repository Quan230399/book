<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail</title>

    <style>
        .header {
            width: 900px;
            height: auto;
            background-color: aliceblue;

        }

        .logo {
            width: 100px;
            height: 100px;
        }

        h3 {
            color: #777777;
        }

        h1 {
            font-size: 40px;
            font-family: serif;
        }

        .table-wrapper {
            margin: 10px 15px 30px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
        }

        #lbl1 {
            float: left;
            padding: 0px 0 0 250px;
            margin-top: 10px;
            letter-spacing: 0px;
            font-size: 18px;
        }

        #lbl2 {
            float: right;
            padding: 0px 0px 0 40px;
            margin-top: 0px;
            letter-spacing: -1px;
            font-size: 18px;
        }

        .fl-table {
            border-radius: 5px;
            font-size: 16px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td,
        .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #4FC3A1;
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }

        blockquote {
            margin-top: 0;
            line-height: 160%;
        }

        blockquote {
            font-family: 'Montserrat', sans-serif;
            font-size: 17px;
        }

        a {
            text-decoration: none;
            color: #3787DE;
        }

        a:hover {
            text-decoration: none;
            color: #F16E6E;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="table-wrapper">
            <img class="logo" src="{{$message->embed(public_path('images/logobook.png'))}}" alt="">
            <h1><b>
                    <center>?????t h??ng th??nh c??ng</center>
                </b></h1>
            <blockquote>
                <p>Qu?? kh??ch ???? ?????t h??ng th??nh c??ng s???n ph???m:</p>
            </blockquote>
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>???nh S???n Ph???m</th>
                        <th>T??n </th>
                        <th>S??? l?????ng</th>
                        <th>Gi??</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($name_products))
                    @for($i = 0; $i < count($name_products); $i++) <tr>
                        <td><img class="logo" src="{{$message->embed(public_path('images/product/'. $image_products[$i]))}}" alt=""></td>
                        <td>{{$name_products[$i]}}</td>
                        <td>{{$quantity_products[$i]}}</td>
                        <td>{{number_format($price[$i])}} VN??</td>
                        </tr>
                        @endfor
                        @endif
                        <tr>
                            <td colspan="3" class="hidden-xs"></td>
                            <td><strong style="font-size: 22px">T???ng ti???n :@if(Session::has('cart')) {{number_format($cart->totalPrice)}} VN??@endif</strong></td>
                        </tr>
                </tbody>
            </table>

            <blockquote>
                <p>H??? th???ng trang web b??n s??ch bookstore.com tr??n tr???ng c???m ??n qu?? kh??ch ???? tin d??ng c??c s???n ph???m s??ch c???a trang web,
                    xin ch??c qu?? kh??ch c?? m???t kho???ng th???i gian tuy???t v???i khi s??? d???ng s???n ph???m c???a ch??ng t??i.</p>
                <p>????? ki???m tra ????n h??ng, qu?? kh??ch c?? th??? nh???n v??o n??t d?????i ????y ????? chuy???n sang ????n h??ng c???a qu?? kh??ch:</p>

            </blockquote>
            <center>
                <h1 style="font-size: 26px;margin-top:10px ;"><a href="{{url('/info/'.$id_account)}}" target="_blank">????n H??ng</a></h1>
            </center>
            <h2 style="padding:0px 20px 20px 30px;
    letter-spacing: -1px;
    font-size: 18px;">N???u nh?? qu?? kh??ch nh???n v??o n??t tr??n nh??ng kh??ng ho???t ?????ng, qu?? kh??ch truy c???p tr???c ti???p v??o ???????ng link : <a href="{{url('/info/'.$id_account)}}" target="_blank">{{url('/info/'.$id_account)}}</a></h2>
        </div>
    </div>

</body>

</html>