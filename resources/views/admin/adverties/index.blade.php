@extends('admin.layouts.master')
@section('head-tag')
<title>آگهی‌ها</title>
@endsection
@section('content')
         <!-- CONTAINER -->
         <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">فهرست آگهی‌ها</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">برنامه‌ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">فهرست آگهی‌ها</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW OPEN -->
            <div class="row row-cards">
                <div class="col-lg-12 col-xl-12">
                    <form class="mb-5" action="{{ route('admin.advertise.search') }}" method="GET">
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
                            <a class="btn btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" href="{{ route('admin.advertise.create') }}">ایجاد آگهی جدید</a>

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
                                            <th>دسته بندی</th>
                                            <th>حقوق</th>
                                            <th>ساعت کاری</th>
                                            <th>نوع قرارداد</th>
                                            <th>تاریخ ساخت</th>

                                            <th>وضعیت</th>
                                            <th>تغییر وضعیت</th>

                                            <th class="text-center">عملکردها</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($adverties as $advert)
                                        <tr>
                                            <td class="align-middle text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center">{{ $advert->title }}</td>
                                            <td class="align-middle text-center">{{ $advert->category->value ?? "دسته بندی حذف شده" }}</td>
                                            <td class="align-middle text-center">{{ $advert->salary_range }}</td>
                                            <td class="align-middle text-center">{{ $advert->work_houres }}</td>
                                            <td class="align-middle text-center">{{ $advert->contract_type_value }}</td>
                                            <td class="align-middle text-center">{{ jalaliDate($advert->created_at) }}</td>
                                            <td> <div class="mt-sm-1 d-block">
                                                @if ($advert->status == 0)
                                                <span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3">درانتظار تایید</span>

                                                    @elseif ($advert->status == 1)
                                                    <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">تایید شده</span>
                                                    @elseif ($advert->status == 2)
                                                    <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">رد شده</span>
                                                @endif
                                            </div></td>
                                            <td class="text-left" style="width: 14%">
                                            @if ($advert->status == 0)
                                            <button
                                            type="button"
                                             data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $advert->id }}"
                                              class="btn btn-danger btn-sm"><i class="fa fa-clock"></i>عدم
                                             تایید</button>
                                                    <a href="{{ route('admin.advertise.approved', $advert->id) }}"
                                                        type="submit" class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-check"></i>تایید</a>
                                            @elseif($advert->status == 1)
                                            <button
                                                   type="button"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $advert->id }}"
                                                     class="btn btn-danger btn-sm"><i class="fa fa-clock"></i>عدم
                                                    تایید</button>
                                                        @elseif($advert->status == 2)
                                                <a href="{{ route('admin.advertise.approved', $advert->id) }}"
                                                    type="submit" class="btn btn-success btn-sm text-white"><i
                                                        class="fa fa-check"></i> تایید</a>
                                            @endif
                                        </td>
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <a class="btn btn-sm text-primary" data-target="#advert-form-modal" data-target="#advert-form-modal" data-bs-toggle="tooltip" title data-bs-original-title="ویرایش" href="{{ route('admin.advertise.edit', $advert->id) }}"><span class="fe fe-edit fs-14"></span></a>
                                                    <form action="{{ route('admin.advertise.destroy', $advert->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm text-danger delete" type="submit" data-target="#advert-form-modal" data-bs-toggle="tooltip" title data-bs-original-title="حذف"><span class="fe fe-trash-2 fs-14"></span></button></form>
                                                    <button class="btn btn-sm text-warning" data-target="#advert-form-modal" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#detail-{{ $advert->id }}" data-target="#advert-form-modal"><span  data-bs-toggle="tooltip" title data-bs-original-title="جزییات" class="fe fe-eye fs-14"></span></button>

                                                </div>
                                            </td>
                                        </tr>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal-{{ $advert->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">دلیل رد</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.advertise.reject', $advert->id) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="form-group col-12 mt-2">
                <label for="reject_message">دلیل رد</label>

                <textarea placeholder="دلیل رد" name="reject_message" id="reject_message" class="form-control form-control-sm"rows="4">{{ old('reject_message') }}</textarea>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
          <button type="submit" class="btn btn-primary">ثبت</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="detail-{{ $advert->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">جزییات آگهی</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row border">
            <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>عنوان : </p>
                <p>{{ $advert->title }}</p>
             </div>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>دسته بندی : </p>
                <p>{{ $advert->category->value ?? "دسته بندی حذف شده" }}</p>
             </div>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>حقوق : </p>
                <p>{{ $advert->salary_range }}</p>
             </div>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>ساعت کاری : </p>
                <p>{{ $advert->work_houres }}</p>
             </div>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>مزایا : </p>
                <p>{{ $advert->benefites }}</p>
             </div>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>نوع قرارداد : </p>
                <p>{{ $advert->contract_type_value }}</p>
             </div>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>تماس باما : </p>
                <p>{{ $advert->contact_type_value }}</p>
             </div>
             @if ($advert->contact_type == 1)
             <div class="row">
             <p>راه‌های ارتباطی : </p>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>تلگرام : </p>
                <p>{{ $advert->contact_ways['telegram'] }} </p>

             </div>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>واتس آپ : </p>
                <p>{{ $advert->contact_ways['whatsapp'] }} </p>

             </div>
             </div>
             @endif

             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>جنسیت : </p>
                <p>{{ $advert->sex_value }}</p>
             </div>
             <div class="d-flex justify-between my-2 col-md-6 col-12 gap-2">
                <p>وضعیت : </p>
                <div class="d-block">
                    @if ($advert->status == 0)
                    <span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3">درانتظار تایید</span>

                        @elseif ($advert->status == 1)
                        <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">تایید شده</span>
                        @elseif ($advert->status == 2)
                        <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">رد شده</span>
                    @endif
                </div>             </div>
                <div class="d-flex justify-center my-2 col-12 gap-2">
                    <p>تاریخ ساخت : </p>
                    <p>{{ jalaliDate($advert->created_at) }}</p>
                 </div>
             <div class="d-flex justify-between my-2 col-12 gap-2">
                <p>توضیحات : </p>
                <p>{!! $advert->content !!}</p>
             </div>
             <div>
                <p>عکس : </p>
                <img src="{{ asset($advert->imageAdvert()->path['indexArray'][$advert->imageadvert()->path['currentImage']]) }}"
                alt="{{ $advert->title }}" width="300" height="300" />                  <div>
             <hr />
             @if (!empty($advert->reject_message))
             <div class="d-flex justify-between my-2 col-12 gap-2">
                <p class="text-danger">دلیل رد : </p>
                <p class="text-danger">{{ $advert->reject_message }}</p>
             </div>
             @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        {{ $adverties->links('vendor.pagination.bootstrap-5') }}

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
