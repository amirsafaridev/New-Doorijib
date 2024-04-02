@extends('admin.layouts.master')
@section('head-tag')
<title>پلن‌های اشتراک</title>
@endsection
@section('content')
         <!-- CONTAINER -->
         <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">فهرست پلن‌های اشتراک</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">برنامه‌ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> فهرست پلن‌های اشتراک</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW OPEN -->
            <div class="row row-cards">
                <div class="col-lg-12 col-xl-12">
                    <form class="mb-5" action="{{ route('admin.sales-plan.search') }}" method="GET">
                    @csrf
                    <div class="input-group mb-2">
                        <input type="text" name="search" class="form-control" placeholder="جستجو براساس عنوان ...">
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
                            <a class="btn btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" href="{{ route('admin.sales-plan.create') }}">ایجاد کاربر جدید</a>

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
                                            <th>عنوان</th>
                                            <th>قیمت</th>
                                            <th>توضیحات</th>
                                            <th>تاریخ ایجاد</th>
                                            <th class="text-center">عملکردها</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salesPlan as $salePlan)
                                        <tr>
                                            <td class="align-middle text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center">{{ $salePlan->title }}</td>
                                            <td class="text-nowrap align-middle">{{ priceFormat($salePlan->price) }}</td>
                                            <td class="text-nowrap align-middle">{{ Str::limit($salePlan->description, 60, '...') }}</td>
                                            <td class="text-nowrap align-middle"><span>{{ jalaliDate($salePlan->created_at) }}</span></td>
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <a class="btn btn-sm text-primary" data-target="#user-form-modal"  data-target="#sales-plan-form-modal" data-bs-toggle="tooltip" title data-bs-original-title="ویرایش" href="{{ route('admin.sales-plan.edit', $salePlan->id) }}"><span class="fe fe-edit fs-14"></span></a>
                                                    <form action="{{ route('admin.sales-plan.destroy', $salePlan->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm text-danger delete" type="submit"  data-target="#sales-plan-form-modal" data-bs-toggle="tooltip" title data-bs-original-title="حذف"><span class="fe fe-trash-2 fs-14"></span></button></form>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        {{ $salesPlan->links('vendor.pagination.bootstrap-5') }}

                    </div>
                </div>
                <!-- COL-END -->
            </div>
            <!-- ROW CLOSED -->
        </div>
        <!-- CONTAINER CLOSED -->




@endsection
@section('scripts')
@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
