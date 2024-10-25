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
                        <label class="col-lg-12 radio">
                            کمتر از دو بار و گاهی هم روز در میان
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            هر چند روز یکبار کار می‌کند
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
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
                        <label class="col-lg-12 radio">
                            کمتر از دو بار و گاهی هم روز در میان
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-5 radio">
                            هر چند روز یکبار کار می‌کند
                            <input type="radio" name="r">
                        </label>
                        <label class="col-lg-6 radio">
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
                <div class="col-lg-12"><button class="next-button d-none">بعدی</button> <button class="prev-button">قبلی</button></div>
            </div>
        </section>
    </form>
</div>
@endsection