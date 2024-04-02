@extends('customer.account-layouts.master')
@section('head-tag')
    <title>رزومه‌های ارسالی</title>
@endsection
@section('content')
    <section class="employer-panel-page">
        <div class="page-title-des">
            <span>{{ $advert->title }}</span>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
        </div>
        <div class="employer-manage-p2-cv-box">
            @php
                $resumes = $advert->resumeUsers()->get();
            @endphp
            @foreach ($resumes as $resume)
                @php
                    $user = $resume->metas()->where('key', 'user')->first();
                @endphp
                <div class="employer-manage-p2-cv-item">
                    @if ($user->value['image'])
                        <img style="border-radius: 50%" src="{{ asset($user->value['image']['indexArray']['small']) }}"
                            alt="profile" class="employer-manage-p2-cv-img" />
                    @else
                        <img src="{{ asset('admin-assets/images/user-profile.png') }}" alt="profile"
                            class="employer-manage-p2-cv-img" />
                    @endif

                    <h4 class="employer-manage-p2-cv-name">
                        {{ $user->value['first_name'] . ' ' . $user->value['last_name'] }}
                    </h4>
                    <span class="employer-manage-p2-cv-field">{{ $user->value['study'] }}</span>
                    <span class="employer-manage-p2-cv-degree">{{ auth()->user()->grade_type_value }}</span>
                    @if ($resume->pivot->status == 0)
                        <span class="employer-manage-p2-cv-status employer-manage-p2-cv-status-waitting">در انتظار
                            بررسی</span>
                    @elseif ($resume->pivot->status == 1)
                        <span class="employer-manage-p2-cv-status employer-manage-p2-cv-status-accept">تایید شده</span>
                    @elseif ($resume->pivot->status == 2)
                        <span class="employer-manage-p2-cv-status employer-manage-p2-cv-status-fail">رد شده</span>
                    @endif
                    <a href="{{ asset($user->value['resume']) }}" download
                        class="employer-manage-p2-cv-download"><span>رزومه کارجو</span></a>
                    @if ($resume->pivot->status == 0)
                        <a href="{{ route('customer.advertise.approved', ['resume' => $resume, 'advert' => $advert]) }}"
                            class="employer-manage-p2-cv-btn"><img src="{{ asset('customer-assets/img/check.webp') }}"
                                alt="check"></a>
                        <a href="{{ route('customer.advertise.reject', ['resume' => $resume, 'advert' => $advert]) }}" class="employer-manage-p2-cv-btn"><img
                                src="{{ asset('customer-assets/img/cross.webp') }}" alt="cross"></a>
                    @elseif ($resume->pivot->status == 1)
                        <a href="{{ route('customer.advertise.waiting', ['resume' => $resume, 'advert' => $advert]) }}"
                            class="employer-manage-p2-cv-btn"><img src="{{ asset('customer-assets/img/waitting.webp') }}"
                                alt="waitting"></a>
                        <a href="{{ route('customer.advertise.reject', ['resume' => $resume, 'advert' => $advert]) }}" class="employer-manage-p2-cv-btn"><img
                                src="{{ asset('customer-assets/img/cross.webp') }}" alt="cross"></a>
                    @elseif ($resume->pivot->status == 2)
                        <a href="{{ route('customer.advertise.approved', ['resume' => $resume, 'advert' => $advert]) }}"
                            class="employer-manage-p2-cv-btn"><img src="{{ asset('customer-assets/img/check.webp') }}"
                                alt="check"></a>
                        <a href="{{ route('customer.advertise.waiting', ['resume' => $resume, 'advert' => $advert]) }}"
                            class="employer-manage-p2-cv-btn"><img src="{{ asset('customer-assets/img/waitting.webp') }}"
                                alt="waitting"></a>
                    @endif
                </div>
            @endforeach
        </div>
        {{-- <div class="pagination">
            {{ $resumes->links() }}
            <a href="#?" class="pagination-num pagination-active">1</a>
            <a href="#?" class="pagination-num">2</a>
            <a href="#?" class="pagination-num">3</a>
        </div> --}}
    </section>
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal-{{ $advert->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  </div> --}}
@endsection
