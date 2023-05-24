@section('title', '| Purchase Order')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Master Data') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('po.index') }}">{{ __('Purchase Order') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('po.create') }}">{{ __('Detail Purchase Order') }}</a>
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
              <form method="POST" id="signup-form" class="needs-validation">
                <h3>
                  <span class="title_text">Detail Devilery To</span>
                </h3>
                <fieldset>
                  <div class="fieldset-content">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Customer Name</label>
                          <input type="text" class="form-control" id="customerName" placeholder="Input Customer Name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Address</label>
                          <input type="text" class="form-control" id="address" placeholder="Input Address">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Phone Number</label>
                          <input type="" class="form-control" id="phoneNumber" placeholder="Input Phone Number">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Remarks</label>
                          <div class="row" style="padding-left: 15px; padding-top: 10px;">
                            <div class="custom-control custom-checkbox mb-3 col-sm-3">
                              <input class="custom-control-input" id="customCheck4" type="checkbox">
                              <label class="custom-control-label" for="customCheck4">E-SELLER</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3 col-sm-3">
                              <input class="custom-control-input" id="customCheck5" type="checkbox">
                              <label class="custom-control-label" for="customCheck5">CONSIGN</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3 col-sm-3">
                              <input class="custom-control-input" id="customCheck6" type="checkbox">
                              <label class="custom-control-label" for="customCheck6">E-COMM</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3 col-sm-3">
                              <input class="custom-control-input" id="customCheck7" type="checkbox">
                              <label class="custom-control-label" for="customCheck7">MEDICAL</label>
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
                          <input type="text" class="form-control" id="salesName" placeholder="Input Customer Name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Approval</label>
                            <div class="custom-control custom-checkbox mb-3" style="padding-top: 10px;">
                              <input class="custom-control-input" id="customCheck1" type="checkbox">
                              <label class="custom-control-label" for="customCheck1">Approve</label>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Date Order</label>
                          <input type="text" class="form-control" id="dateOrder" placeholder="Input Date Order">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Order Type</label>
                          <div class="row" style="padding-left: 15px; padding-top: 10px;">
                            <div class="custom-control custom-checkbox mb-3 col-sm-3">
                              <input class="custom-control-input" id="customCheck2" type="checkbox">
                              <label class="custom-control-label" for="customCheck2">Regular</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3 col-sm-3">
                              <input class="custom-control-input" id="customCheck3" type="checkbox">
                              <label class="custom-control-label" for="customCheck3">Urgent</label>
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
                  <div class="fieldset-content">
                    <div class="table-responsive">
                      <table class="table align-items-center table-flush">
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
                            <th>Disc</th>
                            <th>Value</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <a class="text-muted">1</a>
                            </td>
                            <td>
                              <a class="text-muted">67999602</a>
                            </td>
                            <td>
                              <a class="text-muted">D701999602U</a>
                            </td>
                            <td>
                              <a class="text-muted">RINSO PRO DTV PWD BAG 12X1KG</a>
                            </td>
                            <td>
                              <a class="text-muted">12</a>
                            </td>
                            <td>
                              <a class="text-muted">165931,2</a>
                            </td>
                            <td>
                              <a class="text-muted">184.184</a>
                            </td>
                            <td>
                              <a class="text-muted">150</a>
                            </td>
                            <td>
                              <a class="text-muted">10%</a>
                            </td>
                            <td>
                              <a class="text-muted"> 22.400.712,00</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <a class="text-muted">2</a>
                            </td>
                            <td>
                              <a class="text-muted">67995678</a>
                            </td>
                            <td>
                              <a class="text-muted">GT61999602U</a>
                            </td>
                            <td>
                              <a class="text-muted">RINSO PRO DTV PWD BAG 12X1KG</a>
                            </td>
                            <td>
                              <a class="text-muted">12</a>
                            </td>
                            <td>
                              <a class="text-muted">165931,2</a>
                            </td>
                            <td>
                              <a class="text-muted">184.184</a>
                            </td>
                            <td>
                              <a class="text-muted">150</a>
                            </td>
                            <td>
                              <a class="text-muted">10%</a>
                            </td>
                            <td>
                              <a class="text-muted"> 21.000.000</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
