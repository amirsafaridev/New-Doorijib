@extends('customer.account-layouts.master')
@section('head-tag')
    <title>
        مشخصات سازمانی</title>
@endsection
@section('content')
    <section class="employer-panel-page">
        <div class="page-title-des">
            <span>پروفایل سازمانی</span>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div>
            <form action="{{ route('customer.account.company-profile.store') }}" class="employer-profile-form" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="text" name="company_name" value="{{ old('company_name', $company->value['company_name']) }}"
                    placeholder="نام شرکت" />
                <input type="text" name="subject" value="{{ old('subject', $company->value['subject']) }}"
                    placeholder="موضوع فعالیت" />
                <input type="text" name="phone_number" value="{{ old('phone_number', $company->value['phone_number']) }}"
                    placeholder="تلفن" />
                <input type="text" name="site_name" value="{{ old('site_name', $company->value['site_name']) }}"
                    placeholder="وبسایت" />
                <input type="email" name="email" value="{{ old('email', $company->value['email']) }}"
                    placeholder="ایمیل" />
                <input type="text" name="telephone_number"
                    value="{{ old('telephone_number', $company->value['telephone_number']) }}"
                    placeholder="شماره تماس مجموعه" />
                <input type="text" name="postal_code" value="{{ old('postal_code', $company->value['postal_code']) }}""
                    placeholder="کد پستی" />
                <input type="text" name="address" value="{{ old('address', $company->value['address']) }}"
                    placeholder="آدرس" />
                <input type="file" name="image"
                    value="{{ old('image', $company->value['image']['indexArray']['medium']) }}" id="image"
                    style="display: none;" />
                <label for="image" class="upload-logo"><img src="{{ asset('customer-assets/img/group_283.webp') }}"
                        alt="image" />
                    <div class="d-none" style="margin-bottom: 3px;margin-top: 3px;display:none"
                        id="image-preview-container">
                        <img id="imgPreview" width="150" height="150" src="#" alt="image" />
                    </div>
                    @if ($company->value['image'])
                        <div style="margin-top: 15px" id="edit-image">
                            <img src="{{ asset($company->value['image']['indexArray']['medium']) }}" width="150"
                                height="150" alt="advert-image">
                        </div>
                    @endif
                </label>
                <button type="submit" class="panel-button">ذخیره</button>
            </form>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#image').change(function() {
                $('#image-preview-container').attr('style', 'margin-top: 15px');
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
