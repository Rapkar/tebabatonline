@extends('website.layouts.app')

@section('content')

<div class="container visit h-auto d-flex flex-column mt5 pt-5  ">
    <div class="row">

        <div class="col-lg-6 d-flex align-items-center flex-column justify-content-center headvisit">
            <h1>ویزیت و مشاوره آنلاین</h1>
            <p>آنلاین ویزیت و مزاج شناسی شوید</p>
            <span class="audio mt-5" style="">توضیحی در رابطه با چگونگی پر کردن فرم<audio attr-c="45" preload="none">
                    <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/45.wav">
                    <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/45.mp3">
                    کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                </audio><button class="play-button play" attr-c="45"> <span class="play"></span></button></span>
        </div>
        <div class="col-lg-6">
            <img src="{{asset('images/slide4.webp')}}">
        </div>
    </div>
    <div class="row">
        <p><strong>کاربرگرامی</strong></p>
        <p>۱- با توجه به اینکه تشخیص و بررسی دقیق اکثر بیماری‌ها نیاز به اطلاعات کامل طبعی و مزاجی بیمار دارد، لطفاً سوالات زیر را با دقت پاسخ داده و هر چیزی که به بیماری‌تان مربوط است، بیان بفرمایید تا بیماری‌تان دقیق‌تر مورد بررسی قرار گیرد.
        </p>
        <p> ۲- در صورتی که پاسخ شما در بین گزینه‌های موجود وجود نداشت، می‌توانید با انتخاب گزینه توضیحات بیشتر، توضیحات مربوط به پاسخ خود را آنجا بنویسید.
        </p>
        <p> ۳- برای جابجایی در بین صفحات فرم، از دکمه‌های زیر فرم استفاده نموده و از کلید بازگشت صفحه کلید گوشی، یا مرورگر استفاده نفرمایید.

            برایتان سلامتی آرزومندیم. </p>
        <p><strong>برایتان سلامتی آرزومندیم.</strong></p>
    </div>
    <form class="col-lg-12 mb-4 visitform " method="post" action="{{route('storevisit')}}" id="visitform">
        @csrf
        <section step="1" class="row step active">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-lg-6">
                            نام
                            @auth
                            <input type='text' placeholder="نام" id="name" dir="ltr" name="name" value="{{Auth::user()->name }}">
                            @else
                            <input type='text' placeholder="نام" id="name" dir="ltr" name="name">
                            @endauth
                        </label>

                        <label class="col-lg-6">
                            نام خانوادگی
                            <input type='text' placeholder="نام خانوادگی" name="family" value="{{ Auth::user()->usermetas->lastname }}">
                        </label>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <label class="col-lg-6">
                            استان وشهرستان
                            <select name="states" class="text-center">

                                @foreach($states as $state)

                                <option value="{{$state->id}}" {{ (Auth::user()->usermetas && Auth::user()->usermetas->state == $state->id) ? 'selected=true' : '' }}>{{$state->name}}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="col-lg-6">
                            شهر
                            <select name="cities" class="text-center" value="{{ Auth::user()->usermetas->city }}">
                                <option>{{ Auth::user()->usermetas->city }}</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <label class="col-lg-12">
                            شماره همراه
                            @auth
                            <input type='text' id="phone_number" dir="ltr" name="phone" value="{{Auth::user()->phone }}">
                            @else
                            <input type='text' id="phone_number" dir="ltr" name="phone">
                            @endauth
                        </label>
                        <label class="col-lg-6"></label>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-lg-12">
                            شغل و فعالیت روزانه
                            <input type='text' placeholder="معلم هستم متوسط" name="jobs" value="{{ Auth::user()->usermetas->job }}">
                        </label>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-lg-12">
                            وزن
                            <input type='number' placeholder="72" min="10" dir="ltr" name="weight" value="{{ Auth::user()->usermetas->height }}">
                        </label>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-lg-12">
                            قد
                            <input type='number' placeholder="172" min="10" dir="ltr" name="height">
                        </label>
                        <label class="col-lg-6"></label>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-6">
                            جنسیت
                            <select name="gender">
                                <option value="آقا">آقا</option>
                                <option value="خانم">خانم</option>
                            </select>
                        </label>

                        <label class="col-lg-6">
                            وضعیت تاهل
                            <select name="relationship" class="text-center" value="{{ Auth::user()->usermetas->relationship }}">
                                <option value="متاهل" {{ (Auth::user()->usermetas && Auth::user()->usermetas->relationship == 'متاهل') ? 'selected=true' : '' }}>متاهل</option>
                                <option value="مجرد" {{ (Auth::user()->usermetas && Auth::user()->usermetas->relationship == 'مجرد') ? 'selected=true' : '' }}>مجرد</option>
                                <option value="متارکه" {{ (Auth::user()->usermetas && Auth::user()->usermetas->relationship == 'متارکه') ? 'selected=true' : '' }}>متارکه</option>
                            </select>
                        </label>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-4">
                            تاریخ تولد
                            <select name="age_day" class="text-center">
                                @php
                                $days = range(1, 31);
                                @endphp
                                @foreach($days as $day)
                                <option value="{{$day}}">{{$day}}</option>
                                @endforeach
                            </select>

                        </label>
                        <label class="col-lg-4">
                            &nbsp;
                            <select name="age_mounth" class="text-center">
                                @php
                                $mounths = range(1, 12);
                                @endphp
                                @foreach($mounths as $mounth)
                                <option value="{{$mounth}}">{{$mounth}}</option>
                                @endforeach
                            </select>

                        </label>
                        <label class="col-lg-4">
                            &nbsp;
                            <select name="age_year" class="text-center">
                                @php
                                $years = range(1320, 1404);
                                @endphp
                                @foreach($years as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>

                        </label>

                    </div>
                </div>
                <div class="col-lg-12"><button class="next-button">بعدی</button></div>
            </div>
        </section>
        <section step="2" class="step ">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-12">
                            <div class="titlebox">
                                <audio attr-c="2" preload="none">
                                    <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/1.mp3">
                                    کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                                </audio>
                                <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                                لطفاً مشکل یا بیماری‌ خود را به طور کامل در کادر زیر بیان فرمایید
                            </div>
                            <textarea type='text' name="problem"></textarea>
                        </label>
                    </div>

                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            کدام یک از مشکلات گوارشی زیر را دارید؟
                        </div>
                    </label>
                    <div class="row radiobox  justify-content-between ">
                        <label class="col-lg-5 radio">
                            نفخ
                            <input type="checkbox" value="نفخ" name="digestive_problems">
                        </label>
                        <label class="col-lg-6 radio">
                            ترش کردن
                            <input type="checkbox" value=" ترش کردن" name="digestive_problems">
                        </label>
                        <label class="col-lg-5 radio">
                            ورم معده
                            <input type="checkbox" value=" ورم معده" name="digestive_problems">
                        </label>
                        <label class="col-lg-6 radio">
                            سر و صدا و قار و قور شکم
                            <input type="checkbox" value="سر و صدا و قار و قور شکم" name="digestive_problems">
                        </label>
                        <label class="col-lg-5 radio">
                            دفع زیاد گاز معده
                            <input type="checkbox" value="دفع زیاد گاز معده" name="digestive_problems">
                        </label>
                        <label class="col-lg-6 radio">
                            هیچکدام
                            <input class="mr-3 active nothing" type="checkbox" value="هیچکدام" name="digestive_problems">
                        </label>
                        <textarea name="digestive_problems_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/3.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            شکم شما در طول روز چند نوبت کار می‌کند؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            2 یا 3 مرتبه
                            <input type="radio" value="2 یا 3 مرتبه" name="bowel_movement">
                        </label>
                        <label class="col-lg-6 radio">
                            1 یا 2 مرتبه
                            <input type="radio" value=" 1 یا 2 مرتبه" name="bowel_movement">
                        </label>
                        <label class="col-lg-6 radio">
                            کمتر از دو بار و گاهی هم روز در میان
                            <input type="radio" value="کمتر از دو بار و گاهی هم روز در میان" name="bowel_movement">
                        </label>
                        <label class="col-lg-5 radio">
                            هر چند روز یکبار کار می‌کند
                            <input type="radio" value="هر چند روز یکبار کار می‌کند" name="bowel_movement">
                        </label>
                        <label class="col-lg-12 radio">
                            گاهی شل و گاهی سفت است
                            <input type="radio" value="گاهی شل و گاهی سفت است" name="bowel_movement">
                        </label>
                        <textarea name="bowel_movement_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/4.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا دیابت دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="diabetes">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="diabetes">
                        </label>

                        <textarea name="diabetes_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/5.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا فشار خون بالا دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="Hypertension">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="Hypertension">
                        </label>

                        <textarea name="Hypertension_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/6.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا چربی خون بالا دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="Hyperlipidemia">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="Hyperlipidemia">
                        </label>

                        <textarea name="Hyperlipidemia_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/7.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا شب‌ها کف پایتان داغ می‌شود؟ به گونه‌ای که بخواهید از زیر پتو بیرون بدهید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="hotfeet">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="hotfeet">
                        </label>

                        <textarea name="hotfeet_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/8.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا مشکل کم کاری یا پر کاری تیرویید دارید؟
                        </div>

                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="thyroid">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="thyroid">
                        </label>

                        <textarea name="thyroid_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12"><button class="next-button  ">بعدی</button> <button class="prev-button">قبلی</button></div>
            </div>
        </section>
        <section step="3" class="step ">
            <div class="row">

                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/9.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            رنگ پوست
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            سفید
                            <input type="checkbox" value="سفید" name="color">
                        </label>
                        <label class="col-lg-6 radio">
                            سرخ و سفید
                            <input type="checkbox" value="سرخ و سفید" name="color">
                        </label>
                        <label class="col-lg-5 radio">
                            گندمگون
                            <input type="checkbox" value="گندمگون" name="color">
                        </label>
                        <label class="col-lg-6 radio">
                            سبزه
                            <input type="checkbox" value="سبزه" name="color">
                        </label>


                        <textarea name="color_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/10.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خواب رفتگی دست و پا دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="Numbness">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="radio" value="خیر" name="Numbness">
                        </label>

                        <textarea name="Numbness_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/11.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا اسپاسم، انقباض، درد و گرفتگی عضلات دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="Spasms">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="Spasms">
                        </label>

                        <textarea name="Spasms_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/12.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا در قسمت‌هایی از بدن خارش دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="itching">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="itching">
                        </label>

                        <textarea name="itching_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/13.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            در کدام قسمت از بدن خارش دارید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">


                        <textarea name="itchingw_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/14.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خستگی، کسالت، بی حالی، بی رمقی و بی انرژی بودن دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="lethargy">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="lethargy">
                        </label>

                        <textarea name="lethargy_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/15.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خواب سنگین دارید یا مدام چرتی و خواب آلود هستید؟
                        </div>

                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="heavy_sleep">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="heavy_sleep">
                        </label>

                        <textarea name="heavy_sleep_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/16.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا کم خونی دارید؟ زیر پلک چشم شما سفید یا صورتی کم رنگ است؟
                        </div>

                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="anemia">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="anemia">
                        </label>

                        <textarea name="anemia_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12"><button class="next-button  ">بعدی</button> <button class="prev-button">قبلی</button></div>

            </div>
        </section>
        <section step="4" class="step ">
            <div class="row">

                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/17.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا داغی بدن یا گر گرفتگی دارید؟ عدم تحمل گرما، لذت بردن از باد سرد و هوای خنک؟
                        </div>
                    </label>
                    <div class="row radiobox ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="checkbox" value="بلی" name="hotflash">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" value="خیر" name="hotflash">
                        </label>
                        <textarea name="hotflash_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/18.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا زیاد تشنه می‌شوید و دائما دوست دارید آب یا مایعات بنوشید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="Polydipsia">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="radio" value="خیر" name="Polydipsia">
                        </label>

                        <textarea name="Polydipsia_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/19.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            روزانه چند لیوان آب، چای یا مایعات دیگه می‌نوشید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            1 یا 2 لیوان یا کمتر
                            <input type="radio" value=" 1 یا 2 لیوان یا کمتر" name="daily_water_intake">
                        </label>
                        <label class="col-lg-5 radio" name="daily_water_intake">
                            3 یا 4 لیوان
                            <input type="radio" value=" 3 یا 4 لیوان" name="daily_water_intake">
                        </label>
                        <label class="col-lg-5 radio">
                            5 تا 7 لیوان
                            <input type="radio" value="5 تا 7 لیوان" name="daily_water_intake">
                        </label>
                        <label class="col-lg-5 radio">
                            بیشتر از 7 لیوان
                            <input type="radio" value="بیشتر از 7 لیوان" name="daily_water_intake">
                        </label>
                        <textarea name="daily_water_intakeـdes" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/20.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا تعریق زیاد بدن دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="sweating">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="sweating">
                        </label>

                        <textarea name="sweating_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/21.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا تلخی دهان دارید؟ مخصوصاً صبح‌ها که از خواب پا می‌شوید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="bitter_mouth">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="bitter_mouth">
                        </label>

                        <textarea name="bitter_mouth_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/22.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا زود عصبانی می‌شوید و داد و بیداد و پرخاش می‌کنید و زود هم آرام می‌شوید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-12 radio">
                            بله، زود از کوره در میروم و زود هم آرام میشم و همه چیز رو سریع فراموش می‌کنم
                            <input type="radio" value="بله، زود از کوره در میروم و زود هم آرام میشم و همه چیز رو سریع فراموش می‌کنم
" name="angry">
                        </label>
                        <label class="col-lg-6 radio">
                            بله، زود عصبانی میشم، اما سریع آروم نمیشم و مدتی طول می‌کشه تا عصبانیتم فروکش کنه
                            <input type="radio" value="بله، زود عصبانی میشم، اما سریع آروم نمیشم و مدتی طول می‌کشه تا عصبانیتم فروکش کنه" name="angry">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر، زود عصبانی نمیشم و کلاً آدم آرومی هستم
                            <input type="radio" value="خیر، زود عصبانی نمیشم و کلاً آدم آرومی هستم" name="angry">
                        </label>
                        <label class="col-lg-12 radio  ">
                            برای عصبانی شدن، اول خیلی خودخوری می‌کنم و افکار آزاردهنده مثل خوره در مغزم جولان میدن و بعد از خودخوری فراوان مثل کوه آتشفشان منفجر میشم و عصبانیتم رو نشون میدم و برای آروم شدن هم مدتی طول می‌کشه تا آروم بشم
                            <input type="radio" value="برای عصبانی شدن، اول خیلی خودخوری می‌کنم و افکار آزاردهنده مثل خوره در مغزم جولان میدن و بعد از خودخوری فراوان مثل کوه آتشفشان منفجر میشم و عصبانیتم رو نشون میدم و برای آروم شدن هم مدتی طول می‌کشه تا آروم بشم" name="angry">
                        </label>
                        <textarea name="angry_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>

                <div class="col-lg-12"><button class="next-button  ">بعدی</button> <button class="prev-button">قبلی</button></div>

            </div>
        </section>
        <section step="5" class="step ">
            <div class="row">

                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/23.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا فکر و خیال، استرس، اضطراب و دلهره دارید؟
                        </div>
                    </label>
                    <div class="row radiobox ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="checkbox" value="بلی" name="anxiety">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" value="خیر" name="anxiety">
                        </label>
                        <textarea name="anxiety_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/24.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا بدن‌تان پر مو است؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" value="بلی" name="hairy_body">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="radio" value="خیر" name="hairy_body">
                        </label>

                        <textarea name="hairy_body_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/25.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا در بدن‌تان خال زیاد دارید؟ یا اخیراً زیاد شده باشد؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بله
                            <input type="radio" value="بله" name="a_mole">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="a_mole">
                        </label>
                        <textarea name="a_mole_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/26.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا شب‌ها خیلی راحت تا سرتونو بذارید روی بالشت به خواب میرید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input value="بلی" type="radio" name="sleep">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input value="خیر" type="radio" name="sleep">
                        </label>

                        <textarea name="sleep_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/27.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            چقدر طول می‌کشه توی بستر تا به خواب برید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            ۱۰ دقیقه الی یک ربع
                            <input type="radio" value="۱۰ دقیقه الی یک ربع" name="sleep_time">
                        </label>
                        <label class="col-lg-5 radio">
                            حدود نیم ساعت
                            <input type="radio" value="حدود نیم ساعت" name="sleep_time">
                        </label>
                        <label class="col-lg-5 radio">
                            تقریبا یک ساعت
                            <input type="radio" value="تقریبا یک ساعت" name="sleep_time">
                        </label>
                        <label class="col-lg-5 radio">
                            چند ساعت طول می‌کشه تا خوابم ببره
                            <input type="radio" value="چند ساعت طول می‌کشه تا خوابم ببره" name="sleep_time">
                        </label>

                        <textarea name="sleep_time_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/28.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خواب راحت، آرامش بخش و ریلکسی دارید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بله
                            <input type="radio" value="بله" name="sleep_relax">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" value="خیر" name="sleep_relax">
                        </label>
                        <textarea name="sleep_relax_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/29.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            اگر خواب آرامش بخشی ندارید، چه مشکلی در خواب‌تون دارید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-12 radio">
                            همش خواب‌های آشفته، ترسناک و پریشان کننده می‌بینم
                            <input type="radio" value="همش خواب‌های آشفته، ترسناک و پریشان کننده می‌بینم" name="sleep_problem">
                        </label>
                        <label class="col-lg-12 radio">
                            در عمق خواب فرو نمیرم و تمام اتفاقات اطرافم رو حتی زمانی که خوابیدم حس می‌کنم
                            <input type="radio" value="در عمق خواب فرو نمیرم و تمام اتفاقات اطرافم رو حتی زمانی که خوابیدم حس می‌کنم" name="sleep_problem">
                        </label>
                        <textarea name="sleep_problem_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>

                <div class="col-lg-12"><button class="next-button  ">بعدی</button> <button class="prev-button">قبلی</button></div>

            </div>
        </section>
        <section step="6" class="step ">
            <div class="row">

                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/30.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا آب دهان‌تان زیاد است؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-center ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input value="بلی" type="checkbox" name="drooling">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input value="خیر" type="checkbox" name="drooling">
                        </label>
                        <textarea name="drooling_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/31.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا موقع خواب آب دهان‌تان روی بالشت می‌ریزد؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input value="بلی" type="radio" name="drooling_pillow">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input value="خیر" type="radio" name="drooling_pillow">
                        </label>

                        <textarea name="drooling_pillow_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/32.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا آب دهان‌تان لزج و چسبنده است؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بله
                            <input value="بلی" type="radio" name="drooling_slimy">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input value="خیر" type="radio" name="drooling_slimy">
                        </label>
                        <textarea name="drooling_slimy_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/33.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خلط داخل گلو دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input value="بلی" type="radio" name="sputum">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input value="خیر" type="radio" name="sputum">
                        </label>

                        <textarea name="sputum_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/34.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا انگشتان دست و پایتان سرد یا یخ است؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            ۱۰ دقیقه الی یک ربع
                            <input value=" ۱۰ دقیقه الی یک ربع" type="radio" name="coldhand">
                        </label>
                        <label class="col-lg-5 radio">
                            حدود نیم ساعت
                            <input value="حدود نیم ساعت" type="radio" name="coldhand">
                        </label>
                        <label class="col-lg-5 radio">
                            تقریبا یک ساعت
                            <input value=" تقریبا یک ساعت" type="radio" name="coldhand">
                        </label>
                        <label class="col-lg-5 radio">
                            چند ساعت طول می‌کشه تا خوابم ببره
                            <input value=" چند ساعت طول می‌کشه تا خوابم ببره" type="radio" name="coldhand">
                        </label>

                        <textarea name="coldhand_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/35.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا در هوای سرد اذیت می‌شوید و تحمل هوای سرد رو ندارید و بیشتر عاشق هوای گرم هستید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بله
                            <input value="بله" type="radio" name="love_he_heat">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input value="خیر" type="radio" name="love_the_heat">
                        </label>
                        <textarea name="love_the_heat" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/36.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا مقدار ادرارتان در طول روز زیاد هست؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بله
                            <input value="بله" type="radio" name="urine">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input value="خیر" type="radio" name="urine">
                        </label>
                        <textarea name="urine_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/37.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا شب‌ها برای ادرار از خواب بلند می‌شوید؟ (برای سرویس رفتن)

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بله
                            <input value="بله" type="radio" name="weekupurine">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input value="خیر" type="radio" name="weekupurine">
                        </label>
                        <textarea name="weekupurine_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/38.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            اگر بلند می‌شوید چند نوبت؟

                        </div>
                    </label>
                    <div class="row  justify-content-between ">

                        <textarea name="wake_count_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>


                <div class="col-lg-12"><button class="next-button  ">بعدی</button> <button class="prev-button">قبلی</button></div>

            </div>
        </section>
        <section step="7" class="step ">
            <div class="row">

                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/39.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا برنامه عادت ماهیانه منظم دارید یا خیر؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input value="بلی" type="checkbox" name="menstruation">
                        </label>
                        <label class="col-lg-6 radio ">
                            خیر
                            <input value="خیر" type="checkbox" name="menstruation">
                        </label>
                        <textarea name="menstruation_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/40.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            اگر عادت ماهیانه نامنظمی دارید، لطفاً دقیق بفرمایید چه مشکلی دارید؟ آیا دیر به دیر و با تأخیر اتفاق می‌افتد و یا زود به زود و یا لکه بینی دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input value="بلی" type="radio" name="menstruation_problem">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input value="خیر" type="checkbox" name="menstruation_problem">
                        </label>

                        <textarea name="menstruation_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/41.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا ترشحات یا عفونت زنانگی هم دارید یا خیر؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بله
                            <input value="بلی" type="radio" name="Feminine_secretions">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input value="خیر" type="radio" name="Feminine_secretions">
                        </label>
                        <textarea name="Feminine_secretions_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/42.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            از لحاظ مسایل جنسی میل کافی در بدن‌تون وجود دارد یا خیر، آدم سرد مزاجی هستید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            گرم مزاج
                            <input value="گرم مزاج" type="radio" name="cold_temper">
                        </label>
                        <label class="col-lg-5 radio">
                            سرد
                            <input value="سرد" type="radio" name="cold_temper">
                        </label>
                        <label class="col-lg-5 radio">
                            متوسط
                            <input value="متوسط" type="radio" name="cold_temper">
                        </label>

                        <textarea name="cold_temper_des" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/43.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            در صورتی که قصد ارسال عکس زبان یا مدارک پزشکی خود دارید از این قسمت می‌توانید آنها را بارگذاری نمایید

                        </div>
                    </label>
                    <div class="row radiobox  justify-content-center text-center ">
                        <label class="col-lg-12 ">
                            <div class="dropzone text-center " id="uservisitimg">
                                <input type="hidden" id="image" name="image">
                            </div>
                            <p class="text-center">
                                توجه! با توجه به اینکه سؤالات لازم برای تشخیص طبع و مزاج شما به اندازه کافی گویا بود، ارسال تصویر اختیاری است و الزامی برای ارسال تصویر وجود ندارد </p>
                        </label>

                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/44.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            در پایان، در صورتی مطلب دیگری نیاز به بیان دارد، بفرمایید

                        </div>
                    </label>
                    <div class="row   justify-content-between ">

                        <textarea name="comment" placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>



                <div class="col-lg-12"><button type="submit" class=" ">ثبت</button> <button class="prev-button">قبلی</button></div>

            </div>
        </section>
    </form>
</div>
@endsection