@extends('admin.layouts.master')
@section('head-tag')
<title>کاربران کارفرما</title>
@endsection
@section('content')
         <!-- CONTAINER -->
         <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">فهرست کاربران</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">برنامه‌ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">فهرست کاربران</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW OPEN -->
            <div class="row row-cards">
                <div class="col-lg-12 col-xl-12">
                    <form class="mb-5" action="{{ route('admin.users.employer-users.search') }}" method="GET">
                    @csrf
                    <div class="input-group mb-2">
                        <input type="text" name="search" class="form-control" placeholder="جستجو  ...">
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
                            <a class="btn btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" href="{{ route('admin.users.employer-users.create') }}">ایجاد کاربر جدید</a>

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
                                            <th>نام</th>
                                            <th>نام کاربری</th>
                                            <th>موبایل</th>
                                            <th>تاریخ ایجاد</th>
                                            <th class="text-center">عملکردها</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employers as $employer)
                                        <tr>
                                            <td class="align-middle text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center">{{ $employer->full_name }}</td>
                                            <td class="text-nowrap align-middle">{{ $employer->user_name }}</td>
                                            <td class="text-nowrap align-middle">{{ $employer->mobile }}</td>
                                            <td class="text-nowrap align-middle"><span>{{ jalaliDate($employer->created_at) }}</span></td>
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <a class="btn btn-sm text-primary" data-target="#user-form-modal"  data-target="#user-form-modal" data-bs-toggle="tooltip" title data-bs-original-title="ویرایش" href="{{ route('admin.users.employer-users.edit', $employer->id) }}"><span class="fe fe-edit fs-14"></span></a>
                                                    @if (auth()->user()->id != $employer->id)
                                                    <form action="{{ route('admin.users.employer-users.destroy', $employer->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm text-danger delete" type="submit"  data-target="#user-form-modal" data-bs-toggle="tooltip" title data-bs-original-title="حذف"><span class="fe fe-trash-2 fs-14"></span></button></form>
                                                    @endif

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
                        {{ $employers->links('vendor.pagination.bootstrap-5') }}

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
