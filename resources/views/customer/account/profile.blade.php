@extends('customer.account-layouts.master')
@section('head-tag')
    <title>مشخصات فردی</title>
@endsection
@section('content')
    <section class="job-seeker-panel-page">
        <div class="page-title-des">
            <span>مشخصات فردی</span>
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
            <form method="POST" action="{{ route('customer.account.profile.store') }}" enctype="multipart/form-data"
                class="job-seeker-profile-form">
                @csrf
                <input name="first_name" value="{{ old('first_name', $userMeta->value['first_name']) }}" type="text"
                    placeholder="نام">

                <input name="last_name" value="{{ old('last_name', $userMeta->value['last_name']) }}" type="text"
                    placeholder="نام خانوادگی">

                <input name="email" value="{{ old('email', $userMeta->value['email']) }}" type="text"
                    placeholder="ایمیل">

                <select name="grade" id="">
                    <option value="0" disabled selected>آخرین مقطع تحصیلی</option>
                    <option value="1" @if (old('grade', $userMeta->value['grade']) == 1) selected @endif>دیپلم</option>
                    <option value="2" @if (old('grade', $userMeta->value['grade']) == 2) selected @endif>لیسانس</option>
                    <option value="3" @if (old('grade', $userMeta->value['grade']) == 3) selected @endif>فوق لیسانس</option>
                    <option value="4" @if (old('grade', $userMeta->value['grade']) == 4) selected @endif>دکترا</option>
                </select>

                <input type="text" value="{{ old('study', $userMeta->value['study']) }}" name="study"
                    placeholder="رشته تحصیلی">

                <input type="text" value="{{ old('skill', $userMeta->value['skill']) }}"" name="skill"
                    placeholder="مهارت های حرفه ای">

                <input name="image" type="file" id="image" style="display: none;" value="{{ old('image') }}">
                <div class="job-seeker-upload-box">
                    <label for="image" class="upload-img"><img src="{{ asset('customer-assets/img/upload-img.webp') }}"
                            alt="profile-image-upload">
                        <div class="d-none" style="margin-bottom: 3px;margin-top: 3px;display:none"
                            id="image-preview-container">
                            <img id="imgPreview" width="150" height="150" src="#" alt="image" />
                        </div>
                        @if ($userMeta->value['image'])
                            <div style="margin-top: 15px" id="edit-image">
                                <img src="{{ asset($userMeta->value['image']['indexArray']['medium']) }}" width="150"
                                    height="150" alt="advert-image">
                            </div>
                        @endif
                    </label>
                    <input type="file" name="resume" id="cv" style="display: none;"
                        value="{{ old('resume') }}" />
                    <label for="cv" class="upload-cv"><img src="{{ asset('customer-assets/img/upload-cv.webp') }}"
                            alt="resume-file-upload" />

                        <span class="form-notif-succes" id="resume-label" style="display: none">فایل آپلود شد!</span>
                    </label>
                </div>
                <textarea name="experience" style="margin-top: 15px" id="" cols="30" rows="10"
                    placeholder="تجربیات کاری">{{ old('experience', $userMeta->value['experience']) }}</textarea>

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
            $('#cv').change(function() {
                $('#resume-label').attr('style', '');
            });
        });
    </script>
@endsection
