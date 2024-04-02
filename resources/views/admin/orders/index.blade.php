@extends('admin.layouts.master')
@section('head-tag')
<title>سفارشات</title>
@endsection
@section('content')
         <!-- CONTAINER -->
         <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">فهرست سفارشات</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">برنامه‌ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">فهرست سفارشات</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW OPEN -->
            <div class="row row-cards">
                <div class="col-lg-12 col-xl-12">
                    <form class="mb-5" action="{{ route('admin.orders.search') }}" method="GET">
                    @csrf
                    <div class="input-group mb-2">
                        <input type="text" name="search" class="form-control" placeholder="جستجو براساس شماره موبایل ...">
                        <button type="submit" class="input-group-text btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                    @error('search')
                    <span class="rounded p-1 text-danger mb-3" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
                </form>

                    <div class="card">
                        <div class="card-header border-bottom-0">
                            {{-- <h2 class="card-title">1 - 30 از 546 کاربر</h2> --}}

                            {{-- <div class="page-options ms-auto">
                                <select class="form-control select2 w-100">
                                    <option value="asc">آخرین</option>
                                    <option value="desc">قدیمی ترین</option>
                                </select>
                            </div> --}}
                        </div>
                        <div class="e-table px-5 pb-5">
                            <div class="table-responsive table-lg">
                                <table class="table border-top table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                             #
                                            </th>
                                            <th>مدل</th>
                                            <th>نام کاربر</th>
                                            <th>پلن</th>
                                            <th>شناسه بانکی</th>
                                            <th>قیمت</th>
                                            <th>تخفیف</th>
                                            <th>تاریخ ساخت</th>
                                            <th>وضعیت</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)

                                        <tr>
                                            <td class="align-middle text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center">{{ $order->model_name }}</td>
                                            <td class="align-middle text-center">{{ $order->user->full_name }}</td>
                                            <td class="align-middle text-center">{{ $order->plan->title }}</td>
                                            <td class="align-middle text-center">{{ $order->bank_key ?? "-" }}</td>
                                            <td class="align-middle text-center">{{ priceFormat($order->price) }}</td>
                                            <td class="align-middle text-center">{{ priceFormat($order->discount) }}</td>
                                            <td class="align-middle text-center">{{ jalaliDate($order->created_at) }}</td>
                                            <td> <div class="mt-sm-1 d-block">
                                                @if ($order->status == 0)
                                                <span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3">درانتظار پرداخت</span>

                                                    @elseif ($order->status == 1)
                                                    <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">پرداخت شده</span>
                                                    @elseif ($order->status == 2)
                                                    <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">پرداخت ناموفق</span>
                                                @endif
                                            </div></td>


                                        </tr>
                          @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        {{ $orders->links('vendor.pagination.bootstrap-5') }}

                    </div>
                </div>
                <!-- COL-END -->
            </div>
            <!-- ROW CLOSED -->
        </div>
        <!-- CONTAINER CLOSED -->




@endsection

