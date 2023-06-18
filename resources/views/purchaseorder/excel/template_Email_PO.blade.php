{{-- <p>test email {{$data['customer_name']}}</p>
<table>
    <thead>
        <tr>
            <th>number item</th>
            <th>sku dch</th>
            <th>item name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['items'] as $r)
        <tr>
            <td>{{$r->number_item}}</td>
            <td>{{$r->sku_dch}}</td>
            <td>{{$r->item_name}}</td>
        </tr>
        @endforeach
    </tbody>
</table> --}}
<!DOCTYPE html>
<html>
<head>
	<title>Export PO</title>
</head>
<body>
    {{-- <img style="display: block; height:40px; width:150px; float:right;" src="{{ asset('img/brand/logo.svg') }}" alt=""> --}}
    <p>Permintaan Purchase Order baru telah diterima dengan Nomor PO : {{$data['no_order']}}</p>
    <h3 style="margin-bottom: 3px;">Detail Customer</h3>
    <table>
        <tr>
            <td>Nama Customer</td>
            <td>:</td>
            <td>{{$data['customer_name']}}</td>
        </tr>
        <tr>
            <td>No Telpon</td>
            <td>:</td>
            <td>{{$data['phone']}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$data['address']}}</td>
        </tr>
        <tr>
            <td>Remarks</td>
            <td>:</td>
            <td>{{$data['remarks']}}</td>
        </tr>
    </table>

    <h3 style="margin-bottom: 3px;">Detail Sales</h3>
    <table>
        <tr>
            <td>Nama Sales</td>
            <td>:</td>
            <td>{{$data['sales']}}</td>
        </tr>
        <tr>
            <td>Tanggal Order</td>
            <td>:</td>
            <td>{{$data['date']}}</td>
        </tr>
        <tr>
            <td>Tipe Order</td>
            <td>:</td>
            <td>{{$data['order_type']}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>
                @if($data['approval'] = true)
                Approve
                @else
                Reject
                @endif
            </td>
        </tr>
    </table>
</body>
</html>