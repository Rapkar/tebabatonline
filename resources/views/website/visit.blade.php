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
    <form class="col-lg-12 mb-4 visitform " method="post" id="visitform">
        @csrf
        <section step="1" class="row step active">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-lg-6">
                            نام
                            @auth
                            <input type='text' id="name" dir="ltr" name="name" value="{{Auth::user()->name }}">
                            @else
                            <input type='text' id="name" dir="ltr" name="name">
                            @endauth
                        </label>

                        <label class="col-lg-6">
                            نام خانوادگی
                            <input type='text' name="name">
                        </label>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <label class="col-lg-6">
                            استان وشهرستان
                            <select name="states" class="text-center">
                                @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="col-lg-6">
                            شهر
                            <select name="cities" class="text-center">
                                <option>لطفا یک استان را انتخاب کنید</option>
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
                            <input type='text' name="name">
                        </label>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-lg-12">
                            وزن
                            <input type='number' min="10" dir="ltr" name="name">
                        </label>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-lg-12">
                            قد
                            <input type='number' min="10" dir="ltr" name="name">
                        </label>
                        <label class="col-lg-6"></label>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-6">
                            جنسیت
                            <select>
                                <option value="آقا">آقا</option>
                                <option value="خانم">خانم</option>
                            </select>
                        </label>

                        <label class="col-lg-6">
                            وضعیت تاهل
                            <select>
                                <option value="مجرد">مجرد</option>
                                <option value="متاهل">متاهل</option>
                                <option value="مطلقه">مطلقه</option>
                            </select>
                        </label>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-4">
                            تاریخ تولد
                            <select name="day" class="text-center">
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
                            <select name="mounth" class="text-center">
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
                            <select name="year" class="text-center">
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
                                    <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                    <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                    کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                                </audio>
                                <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                                لطفاً مشکل یا بیماری‌ خود را به طور کامل در کادر زیر بیان فرمایید
                            </div>
                            <textarea type='text' name="name"></textarea>
                        </label>
                    </div>

                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            کدام یک از مشکلات گوارشی زیر را دارید؟
                        </div>
                    </label>
                    <div class="row radiobox ">
                        <label class="col-lg-5 radio">
                            نفخ
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            ترش کردن
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            ورم معده
                            <input type="checkbox">
                        </label>
                        <label class="col-lg-6 radio">
                            سر و صدا و قار و قور شکم
                            <input type="checkbox">
                        </label>
                        <label class="col-lg-5 radio">
                            دفع زیاد گاز معده
                            <input type="checkbox">
                        </label>
                        <label class="col-lg-6 radio">
                            هیچکدام
                            <input class="mr-3 active nothing" type="checkbox">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            شکم شما در طول روز چند نوبت کار می‌کند؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            2 یا 3 مرتبه
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            1 یا 2 مرتبه
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            کمتر از دو بار و گاهی هم روز در میان
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            هر چند روز یکبار کار می‌کند
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-12 radio">
                            گاهی شل و گاهی سفت است
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا دیابت دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا فشار خون بالا دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا چربی خون بالا دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا شب‌ها کف پایتان داغ می‌شود؟ به گونه‌ای که بخواهید از زیر پتو بیرون بدهید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا مشکل کم کاری یا پر کاری تیرویید دارید؟
                        </div>

                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
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
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            رنگ پوست
                        </div>
                    </label>
                    <div class="row radiobox ">
                        <label class="col-lg-5 radio">
                            سفید
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            سرخ و سفید
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            گندمگون
                            <input type="checkbox">
                        </label>
                        <label class="col-lg-6 radio">
                            سبزه
                            <input type="checkbox">
                        </label>


                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خواب رفتگی دست و پا دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا اسپاسم، انقباض، درد و گرفتگی عضلات دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا در قسمت‌هایی از بدن خارش دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            در کدام قسمت از بدن خارش دارید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">


                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خستگی، کسالت، بی حالی، بی رمقی و بی انرژی بودن دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خواب سنگین دارید یا مدام چرتی و خواب آلود هستید؟
                        </div>

                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا کم خونی دارید؟ زیر پلک چشم شما سفید یا صورتی کم رنگ است؟
                        </div>

                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
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
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا داغی بدن یا گر گرفتگی دارید؟ عدم تحمل گرما، لذت بردن از باد سرد و هوای خنک؟
                        </div>
                    </label>
                    <div class="row radiobox ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا زیاد تشنه می‌شوید و دائما دوست دارید آب یا مایعات بنوشید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            روزانه چند لیوان آب، چای یا مایعات دیگه می‌نوشید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            1 یا 2 لیوان یا کمتر
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            3 یا 4 لیوان
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            5 تا 7 لیوان
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            بیشتر از 7 لیوان
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا تعریق زیاد بدن دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا تلخی دهان دارید؟ مخصوصاً صبح‌ها که از خواب پا می‌شوید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">


                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا زود عصبانی می‌شوید و داد و بیداد و پرخاش می‌کنید و زود هم آرام می‌شوید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-12 radio">
                            بله، زود از کوره در میروم و زود هم آرام میشم و همه چیز رو سریع فراموش می‌کنم
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            بله، زود عصبانی میشم، اما سریع آروم نمیشم و مدتی طول می‌کشه تا عصبانیتم فروکش کنه
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر، زود عصبانی نمیشم و کلاً آدم آرومی هستم
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-12 radio  ">

                            برای عصبانی شدن، اول خیلی خودخوری می‌کنم و افکار آزاردهنده مثل خوره در مغزم جولان میدن و بعد از خودخوری فراوان مثل کوه آتشفشان منفجر میشم و عصبانیتم رو نشون میدم و برای آروم شدن هم مدتی طول می‌کشه تا آروم بشم
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
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
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا فکر و خیال، استرس، اضطراب و دلهره دارید؟
                        </div>
                    </label>
                    <div class="row radiobox ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا بدن‌تان پر مو است؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا در بدن‌تان خال زیاد دارید؟ یا اخیراً زیاد شده باشد؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بله
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا شب‌ها خیلی راحت تا سرتونو بذارید روی بالشت به خواب میرید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            چقدر طول می‌کشه توی بستر تا به خواب برید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            ۱۰ دقیقه الی یک ربع
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            حدود نیم ساعت
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            تقریبا یک ساعت
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            چند ساعت طول می‌کشه تا خوابم ببره
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خواب راحت، آرامش بخش و ریلکسی دارید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بله
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            اگر خواب آرامش بخشی ندارید، چه مشکلی در خواب‌تون دارید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-12 radio">
                            همش خواب‌های آشفته، ترسناک و پریشان کننده می‌بینم
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-12 radio">
                            در عمق خواب فرو نمیرم و تمام اتفاقات اطرافم رو حتی زمانی که خوابیدم حس می‌کنم
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
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
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا آب دهان‌تان زیاد است؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-center ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا موقع خواب آب دهان‌تان روی بالشت می‌ریزد؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا آب دهان‌تان لزج و چسبنده است؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بله
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا خلط داخل گلو دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا انگشتان دست و پایتان سرد یا یخ است؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            ۱۰ دقیقه الی یک ربع
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            حدود نیم ساعت
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            تقریبا یک ساعت
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            چند ساعت طول می‌کشه تا خوابم ببره
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 3 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا در هوای سرد اذیت می‌شوید و تحمل هوای سرد رو ندارید و بیشتر عاشق هوای گرم هستید؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بله
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا مقدار ادرارتان در طول روز زیاد هست؟

                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بله
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            اگر بلند می‌شوید چند نوبت؟

                        </div>
                    </label>
                    <div class="row  justify-content-between ">

                        <textarea placeholder="توضیحات بیشتر"></textarea>
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
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا برنامه عادت ماهیانه منظم دارید یا خیر؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="checkbox" name="r">
                        </label>
                        <label class="col-lg-6 radio ">
                            خیر
                            <input type="checkbox" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            اگر عادت ماهیانه نامنظمی دارید، لطفاً دقیق بفرمایید چه مشکلی دارید؟ آیا دیر به دیر و با تأخیر اتفاق می‌افتد و یا زود به زود و یا لکه بینی دارید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بلی
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
                            خیر
                            <input type="checkbox" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <!-- part 2 -->
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            آیا ترشحات یا عفونت زنانگی هم دارید یا خیر؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between">
                        <label class="col-lg-5 radio">
                            بله
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            خیر
                            <input type="radio" name="r">
                        </label>
                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            از لحاظ مسایل جنسی میل کافی در بدن‌تون وجود دارد یا خیر، آدم سرد مزاجی هستید؟
                        </div>
                    </label>
                    <div class="row radiobox justify-content-between ">
                        <label class="col-lg-5 radio">
                            گرم مزاج
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            سرد
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            متوسط
                            <input type="radio" name="r">
                        </label>

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="col-lg-12">
                        <div class="titlebox">
                            <audio attr-c="2" preload="none">
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
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
                                <source type="audio/wav" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.wav">
                                <source type="audio/mpeg" src="https://tebabat-online.ir/wp-content/uploads/visit_form/2.mp3">
                                کاربر عزیز! مرورگر شما از این فایل صوتی پشتیبانی نمی کند.
                            </audio>
                            <button class="play-button play" attr-c="2"> <span class="play"></span></button>
                            در پایان، در صورتی مطلب دیگری نیاز به بیان دارد، بفرمایید

                        </div>
                    </label>
                    <div class="row   justify-content-between ">

                        <textarea placeholder="توضیحات بیشتر"></textarea>
                    </div>
                </div>



                <div class="col-lg-12"><button class="next-button  ">بعدی</button> <button class="prev-button">قبلی</button></div>

            </div>
        </section>
    </form>
</div>
@endsection