@section('title', '| Purchase Order')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Transaksi') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('po.index') }}">{{ __('Purchase Order') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('po.create') }}">{{ __('Detail Purchase Order') }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Completing Data Purchase Orders</h3>
                    </div>
                    <!-- Light table -->
                    <div class="card-body">
                        <form onsubmit="alert('stop submit'); return false;" id="signup-form" class="needs-validation"
                            enctype="multipart/form-data">
                            @csrf
                            <h3>
                                <span class="title_text">Detail Devilery To</span>
                            </h3>
                            <fieldset>
                                <div class="fieldset-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Customer Name</label>
                                                <input type="text" class="form-control" id="customerName"
                                                    placeholder="Input Customer Name" name="customer_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Address</label>
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="Input Address" name="address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Phone Number</label>
                                                <input type="number" class="form-control" id="phoneNumber"
                                                    placeholder="Input Phone Number" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Remarks</label>
                                                <div class="row" style="padding-left: 15px; padding-top: 10px;">
                                                    <div class="custom-control custom-radio mb-3 col-sm-3">
                                                        <input class="custom-control-input" id="customCheck1" type="radio"
                                                            name="remarks" value="E-SELLER">
                                                        <label class="custom-control-label"
                                                            for="customCheck1">E-SELLER</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3 col-sm-3">
                                                        <input class="custom-control-input" id="customCheck2" type="radio"
                                                            name="remarks" value="CONSIGN">
                                                        <label class="custom-control-label"
                                                            for="customCheck2">CONSIGN</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3 col-sm-3">
                                                        <input class="custom-control-input" id="customCheck3" type="radio"
                                                            name="remarks" value="E-COMM">
                                                        <label class="custom-control-label"
                                                            for="customCheck3">E-COMM</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3 col-sm-3">
                                                        <input class="custom-control-input" id="customCheck4" type="radio"
                                                            name="remarks" value="MEDICAL">
                                                        <label class="custom-control-label"
                                                            for="customCheck4">MEDICAL</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="fieldset-footer">
                                    <span>Step 1 of 3</span>
                                </div>
                            </fieldset>
                            <h3>
                                <span class="title_text">Detail Order By</span>
                            </h3>
                            <fieldset>
                                <div class="fieldset-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Sales Name</label>
                                                <input type="text" class="form-control" id="salesName"
                                                    placeholder="{{ $auth }}" name="sales"
                                                    value="{{ $auth }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Approval</label>
                                                <div class="custom-control custom-switch ml-4" style="padding-top: 10px;">
                                                    <input class="custom-control-input" style="width:40px; height:40px" id="approval" type="checkbox"
                                                        name="approval" value="1">
                                                    <label class="custom-control-label" for="approval">Approve</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Date Order</label>
                                                <input type="date" class="form-control" id="dateOrder"
                                                    placeholder="Input Date Order" name="date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Order Type</label>
                                                <div class="row" style="padding-left: 15px; padding-top: 10px;">
                                                    <div class="custom-control custom-radio mb-3 col-sm-3">
                                                        <input class="custom-control-input" id="customCheck6"
                                                            type="radio" name="order_type" value="Regular">
                                                        <label class="custom-control-label"
                                                            for="customCheck6">Regular</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3 col-sm-3">
                                                        <input class="custom-control-input" id="customCheck7"
                                                            type="radio" name="order_type" value="Urgent">
                                                        <label class="custom-control-label"
                                                            for="customCheck7">Urgent</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fieldset-footer">
                                    <span>Step 2 of 3</span>
                                </div>
                            </fieldset>
                            <h3>
                                <span class="title_text">Items Purchase Orders</span>
                            </h3>
                            <fieldset>
                                <div class="fieldset-content" style="height: max-content">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush" id="table-product-po"
                                            style="width: 100%">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Number Item</th>
                                                    <th>SKU DCH</th>
                                                    <th>Item Name</th>
                                                    <th>UOM</th>
                                                    <th>Price/Pcs Exclude</th>
                                                    <th>Price/Pcs Include</th>
                                                    <th>QYT Pcs</th>
                                                    <th>Disc (%)</th>
                                                    <th>Value</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            {{-- <tbody>
                                                @foreach ($PoDetail as $pd)
                                                    <tr>
                                                        <td>
                                                            <a class="text-muted">{{ $loop->iteration }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->number_item }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->sku_dch }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->item_name }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->uom }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->price_exclude }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->price_include }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->qty }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->disc }}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-muted">{{ $pd->value }}</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody> --}}
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-4 mt-4">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target=".bd-add-product">{{ __('Add Product') }}</button>
                                            @include('purchaseorder.modal.create')
                                        </div>
                                        <div class="col-lg-8 col-8 mt-4 text-right">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h2>TOTAL</h2>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h2 id="text-total">Rp. 0</h2>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h2>DISCOUNT</h2>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h2 id="text-discount">Rp. 0</h2>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h2>TOTAL AFTER DISC</h2>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h2 id="text-after-disc">Rp. 0</h2>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h2>PPN (11%)</h2>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h2 id="text-ppn">Rp. 0</h2>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h1>GRAND TOTAL</h1>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h1 id="text-grand-total">Rp. 0</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fieldset-footer">
                                    <span>Step 3 of 3</span>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>

    @include('purchaseorder.remove_script')
@endsection

@section('custom-script')
    <script>
        (function() {
            //$('#testing').append($('#customerName'));
            // custom script
            let btnProduct = document.querySelectorAll('#btn-add-product');
            btnProduct.forEach(el => {
                el.addEventListener('click', function(event) {
                    event.preventDefault();
                    let jsonData = JSON.parse(el.parentElement.getAttribute('data-json'));
                    storeProductToTable(jsonData);
                    //close modal
                    $('#bd-add-product').modal('hide');
                });
            })

            document.querySelector('a[href="#finish"]').addEventListener('click', function(event) {
                console.clear();
                storeProduct();
            });

            var tableProduct = $('#table-product-po').DataTable({
                paging: false,
                searching: false,
                sorting: false,
                info: false,
            });

            function storeProductToTable(json) {
                let dataToAppend = [
                    tableProduct.rows().count() + 1,
                    json.item_number,
                    json.sku_dch,
                    json.item_name,
                    json.uom,
                    integerToRupiah(json.price),
                    integerToRupiah(json.price * 1.11),
                    '<input class="form-control qty-product" style="width:50px;" type="text" value="1" placeholder="QTY" type="text" name="qty_product">',
                    '<input class="form-control disc-product" style="width:50px; no-spinner" type="number" step=".01" value="0" placeholder="Disc" type="text" name="disc_product">',
                    integerToRupiah(json.price),
                    '<button type="button" class="btn btn-sm btn-danger btn-remove-product" id="btn-remove-product"><i class="fas fa-trash"></i></button>'
                ];

                tableProduct.row.add(dataToAppend).draw();
                addingChangeListener();
                updateNominalData();
            }

            function addingChangeListener() {
                const qtyProduct = document.querySelectorAll('.qty-product');
                const discProduct = document.querySelectorAll('.disc-product');
                const btnRemoveProduct = document.querySelectorAll('.btn-remove-product');
                // loop with check if element have change event
                qtyProduct.forEach(el => {
                    el.addEventListener('change', function(event) {
                        if (event.target.value < 1) {
                            event.target.value = 1;
                        }
                        let row = el.closest('tr');
                        let rowData = tableProduct.row(row).data();

                        //updating row data
                        let price = rupiahToInteger(rowData[5]);
                        let qty = event.target.value;
                        let disc = el.closest('tr').querySelector('.disc-product').value;
                        rowData[7] = '<input class="form-control qty-product" style="width:50px;" type="text" value="' +
                            qty + '" placeholder="QTY" type="text" name="qty_product">';
                        rowData[8] =
                            '<input class="form-control disc-product no-spinner" style="width:50px;" type="number" step=".01" value="' +
                            disc + '" placeholder="Disc" type="text" name="disc_product">';
                        rowData[9] = integerToRupiah((price - (price * (disc / 100))) * qty);
                        tableProduct.row(row).data(rowData).draw();
                        addingChangeListener();
                        updateNominalData();
                    });
                });

                discProduct.forEach(el => {
                    el.addEventListener('change', function(event) {
                        if (event.target.value < 0) {
                            event.target.value = 0;
                        }

                        if (event.target.value > 100) {
                            event.target.value = 100;
                        }

                        let row = el.closest('tr');
                        let rowData = tableProduct.row(row).data();


                        //updating row data
                        let price = rupiahToInteger(rowData[5]);
                        let qty = el.closest('tr').querySelector('.qty-product').value;
                        let disc = event.target.value;
                        rowData[7] = '<input class="form-control qty-product" style="width:50px;" type="text" value="' +
                            qty + '" placeholder="QTY" type="text" name="qty_product">';
                        rowData[8] =
                            '<input class="form-control disc-product no-spinner" style="width:50px;" type="number" step=".01" value="' +
                            disc + '" placeholder="Disc" type="text" name="disc_product">';
                        rowData[9] = integerToRupiah((price - (price * (disc / 100))) * qty);
                        tableProduct.row(row).data(rowData).draw();
                        addingChangeListener();
                        updateNominalData();
                    });
                });

                btnRemoveProduct.forEach(el => {
                    el.addEventListener('click', function(event) {
                        event.preventDefault();
                        let row = el.closest('tr');
                        tableProduct.row(row).remove().draw();
                        addingChangeListener();
                        updateNominalData();
                    });
                })
            }

            function updateNominalData() {
                let tableData = tableProduct.data().toArray();
                let total = 0;
                let ppn = 0;
                let grandTotal = 0;
                let disc = 0;
                let afterDisc = 0;
                let elementDisc = document.querySelectorAll('.disc-product');
                let elementQty = document.querySelectorAll('.qty-product');
                tableData.forEach((el, index) => {
                    total += rupiahToInteger(el[5]) * elementQty[index].value;
                    disc += rupiahToInteger(el[5]) * elementQty[index].value - rupiahToInteger(el[9]);
                });

                afterDisc = total - disc;
                ppn = afterDisc * 0.11;
                grandTotal = afterDisc + ppn;

                document.querySelector('#text-total').innerHTML = integerToRupiah(total);
                document.querySelector('#text-discount').innerHTML = integerToRupiah(disc);
                document.querySelector('#text-after-disc').innerHTML = integerToRupiah(afterDisc);
                document.querySelector('#text-ppn').innerHTML = integerToRupiah(ppn);
                document.querySelector('#text-grand-total').innerHTML = integerToRupiah(grandTotal);
            }

            function rupiahToInteger(rupiah) {
                return parseInt(rupiah.split(',')[0].replace(/[^0-9]/g, '')) || 0;
            }

            function integerToRupiah(number) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(number);
            }

            function storeProduct() {
                const form = new FormData();
                const tableData = tableProduct.data().toArray();
                const elementDisc = document.querySelectorAll('.disc-product');
                const elementQty = document.querySelectorAll('.qty-product');
                const customerName = document.querySelector('#customerName').value;
                const address = document.querySelector('#address').value;
                const phone = document.querySelector('#phoneNumber').value;
                const remaks = document.querySelector('input[name="remarks"]:checked')?.value || null;
                const dateOrder = document.querySelector('#dateOrder').value;
                const approval = document.querySelector('#approval').checked;
                const orderType = document.querySelector('input[name="order_type"]:checked')?.value || null;

                //validate
                if (tableData.length < 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please add product!',
                    })
                    return;
                }

                if (customerName == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill customer name!',
                    })
                    return;
                }

                if (address == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill address!',
                    })
                    return;
                }

                if (phone == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill phone number!',
                    })
                    return;
                }

                if (dateOrder == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill date order!',
                    })
                    return;
                }

                //append id from url
                const idBu = new URLSearchParams(window.location.search).get('id');
                form.append('id_bu', idBu);
                form.append('sales','{{ $auth }}');
                form.append('customer_name', customerName);
                form.append('address', address);
                form.append('phone', phone);
                form.append('remarks', remaks);
                form.append('date', dateOrder);
                form.append('approval', approval);
                form.append('order_type', orderType);
                form.append('grand_total', rupiahToInteger(document.querySelector('#text-grand-total').innerHTML));
                
                //csrf
                form.append('_token', '{{ csrf_token() }}');

                tableData.forEach((el, index) => {
                    form.append('qty[]', elementQty[index].value);
                    form.append('disc[]', elementDisc[index].value);
                    form.append('number_item[]', el[1]);
                    form.append('sku_dch[]', el[2]);
                    form.append('item_name[]', el[3]);
                    form.append('uom[]', el[4]);
                    form.append('price_exclude[]', rupiahToInteger(el[5]));
                    form.append('price_include[]', rupiahToInteger(el[6]));
                    form.append('value[]', rupiahToInteger(el[9]));
                });

                //console log form data
                // for (var pair of form.entries()) {
                //     console.log(pair[0] + ', ' + pair[1]);
                // }

                $.ajax({
                    url: "{{ route('po.store') }}",
                    method: "POST",
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('po.create') }}";
                                }
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error!',
                            text: xhr.responseText,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    }
                });
            }
        })();
    </script>
@endsection
