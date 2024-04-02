@extends('admin.layouts.master')
@section('head-tag')
<title>استان</title>
@endsection
@section('content')
         <!-- CONTAINER -->
         <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">فهرست استان</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">برنامه‌ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">فهرست استان</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW OPEN -->
            <div class="row row-cards">
                <div class="col-lg-12 col-xl-12">


                    <div class="card">
                        <div class="card-header border-bottom-0">

                            <a class="btn btn-primary badge" data-target="#category-form-modal" data-bs-toggle="" href="{{ route('admin.province.create') }}">ایجاد استان جدید</a>

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
                                            <th>نام استان</th>
                                            <th class="text-center">عملکردها</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($provinces as $province)
                                        <tr>
                                            <td class="align-middle text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center">{{ $province->name }}</td>
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <a class="btn btn-sm text-primary" data-target="#category-form-modal" data-target="#category-form-modal" data-bs-toggle="tooltip" title data-bs-original-title="ویرایش" href="{{ route('admin.province.edit', $province->id) }}"><span class="fe fe-edit fs-14"></span></a>
                                                    <form action="{{ route('admin.province.destroy', $province->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm text-danger delete" type="submit" data-target="#category-form-modal" data-bs-toggle="tooltip" title data-bs-original-title="حذف"><span class="fe fe-trash-2 fs-14"></span></button></form>

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
                        {{ $provinces->links('vendor.pagination.bootstrap-5') }}
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
