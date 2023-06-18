{{-- <p>{{$data['emailData']['customer_name']}}</p> --}}

<!DOCTYPE html>
<html>
<head>
	<title>Export PO</title>
</head>
<body>
    <!-- <img style="display: block; height:40px; width:150px;" src="https://www.dchauriga.com/web_assets/images/logo.svg" alt="">
    <p>Permintaan Purchase Order baru telah masuk dengan Nomor PO : PO-19287892</p>
    <h3>Detail Customer</h3> -->
    {{-- <h3>PT.DCH Auriga Indonesia</h3> --}}
    {{-- <table>
        <tr>
            <td>Request Delivery</td>
            <td>:</td>
            <td>{{$data['emailData']['date']}}</td>
        </tr>
        <tr>
            <td>No Order</td>
            <td>:</td>
            <td>{{$data['emailData']['no_order']}}</td>
        </tr>
    </table> --}}
    @php
        $startCell = $startCell ?? 'A1';
        list($startColumn, $startRow) = sscanf($startCell, '%[A-Z]%d');
        $nextRow = $startRow + 1;
    @endphp
    <table border="1" cellpadding="8">
        <tbody>
            <tr>
                <td rowspan="2" class="head_po">No</td>
                <td rowspan="2" class="head_po">ITEM NUMBER</td>
                <td rowspan="2" class="head_po">SKU DCH</td>
                <td rowspan="2" class="head_po">ITEM NAME</td>
                <td rowspan="2" class="head_po">UOM</td>
                <td colspan="2" class="head_po">PRICE/PCS</td>
                <td colspan="3" class="head_po">ORDER</td>
            </tr>
            <tr>
                <td class="head_po">Exclude</td>
                <td class="head_po">Include</td>
                <td class="head_po">QTY PCS</td>
                <td class="head_po">DISC</td>
                <td class="head_po">VALUE</td>
            </tr>
            @foreach($data['emailData']['items'] as $u)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$u->number_item}}</td>
                    <td>{{$u->sku_dch}}</td>
                    <td>{{$u->item_name}}</td>
                    <td>{{$u->uom}}</td>
                    <td>{{$u->price_exclude}}</td>
                    <td>{{$u->price_include}}</td>
                    <td>{{$u->qty}}</td>
                    <td>{{$u->disc}}</td>
                    <td>{{$u->value}}</td>
                </tr>
            @endforeach

            <!-- FOOTER -->
            <tr>
                <td style="border:0px;" colspan="5" rowspan="5"></td>
                <td colspan="2">TOTAL</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">DISCOUNT</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">TOTAL AFTER DISCOUNT</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">PPN(11%)</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">GRAND TOTAL</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    @php
        $tableRange = $startCell . ':C' . $nextRow;
        $sheet->getStyle($tableRange)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle($tableRange)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    @endphp
</body>
</html>