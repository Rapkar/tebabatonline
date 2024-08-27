@extends('website.layouts.app')

@section('content')
<div class="container">
    <div class="container px-5">
        <div class="swiper headerslider mt-5">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="item" style="background-image: url({{ asset('images/website/slide1.webp') }})">
                        <h2>طبابت آنلاین</h2>
                        <h3>ویزیت آنلاین، مزاج شناسی و مشاوره</h3>
                        <p>با طبابت آنلاین دیگر طبابت و درمان از دسترس هیچ کس دور نیست</p>
                        <p>طبابت آنلاین = طبیب در دستان شما</p>
                        <a href="#">ویزیت آنلاین</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item" style="background-image: url({{ asset('images/website/slide2.webp') }})">
                        <h2>تا زمانی که طبیب تو آنلاینه (طبابت آنلاین)</h2>
                        <h3>تو نباید از هیچ بیماری‌ای درد بکشی</h3>
                        <p>میتونی همه دردها و مشکلاتت رو به طبابت آنلاین بگی و براشون راهکار بگیری</p>
                        <a href="#">همین حالا ویزیت شو</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-5  highlight ">
            <h2 class="mb-5 pb-5 mt-5 pt-5 title">بیماری ها بر اساس اعضای بدن</h2>


            <p>ما برای راحتی شما عزیزان، در این قسمت تمام بیماری‌هایی که برای هر کس ممکنه به وجود بیاد رو بر اساس تک تک اعضای بدن دسته بندی کردیم</p>
            <p>شما می‌تونید بر اساس هر عضو، بیماری‌های اون قسمت رو بررسی کنید و راهکارهای درمانی‌شو مورد مطالعه قرار بدید</p>
            <p>پس همین حالا با کلیک روی هر قسمتی از بدن، بیماری های مربوط به عضو رو ببینید</p>
        </div>
        <div class="col-lg-7">
            <img src="{{ asset('images/website/img.webp') }}">
        </div>

    </div>
    <div class="row mt-5">
        <div class="col-lg-8">
            <h2 class="title"> خدمات ما </h2>
        </div>
        <div class="col-lg-4">
            <ul>
                <li><a href="#"><i class="far fa-address-card"></i></a></li>
                <li><a href="#"><i class="far fa-grin-alt"></i></a></li>
                <li><a href="#"></a><i class="fas fa-hand-holding-medical"></i></li>
                <li><a href="#"></a><i class="fas fa-heartbeat"></i></li>
                <li><a href="#"></a><i class="fas fa-hand-holding-heart"></i></li>
                <li><a href="#"><i class="fas fa-photo-video"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="container ">
        <div class="orderalert" style="background-image: url({{ asset('images/website/TrackOrders.webp') }})">
            <h2>پیگیری سفارشات</h2>
            <p>کاربران عزیز شما میتوانید با کلیک بر روی دکمه زیر سفارشات خود را پیگیری کنید</p>
            <a href="#">پیگیری سفارشات</a>
        </div>
    </div>
</div>
<div class="container-fluid bggray  pb-3 mb-5">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center">
                <h2>وبلاگ</h2>
                <div class="d-flex align-items-center flex-column">
                    <a href="#">دیدن همه</a>
                    <div class="blogsliderpaginate">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>
                </div>

            </div>
        </div>
        <div class="swiper blogslider mt-5">
            <div class="swiper-wrapper">
                @foreach($posts as $post)
                @if($post->status==1)
                <a href="#" class="swiper-slide">
                    <div class="card">
                        <div class="head">
                            <img src="{{ asset('storage/uploads/'.$post->image) }}" alt="posttitle">
                        </div>
                        <h2>{{$post->name}}</h2>
                        <p>{{$post->expert}}</p>
                        <h5 href="#">ادامه مطلب</h5>
                    </div>
                </a>
                @endif
                @endforeach

            </div>

            <div class="swiper-pagination"></div>
        </div>

    </div>
</div>
<div class="container">
    <div class="counter px-5 py-5" style="background-image: url({{ asset('images/website/slide4.webp') }})">
        <h2>خلاصه ای درباره ما</h2>
        <p class="col-lg-7">سال‌ها قبل از اینکه طب اسلامی به شکل امروزی گسترش پیدا کند و اصلاً کسی طب اسلامی را بشناسد، هر زمان از جلوی بیمارستان‌ها عبور می‌کردم و چشمم به مردم دردمند می‌افتاد، در درون خودم به این فکر می‌افتادم که ای کاش میشد برای این عزیزان رنجور کاری کرد؛ تا با تحقیقات و مطالعاتی که داشتم، متوجه شدم در سراسر دنیا هر ملت و قومیتی غیر از طب رایج و جدید، مکاتب درمانی خاص خود را دارند که از آن برای درمان بیماری‌ها استفاده می‌کنند و سرآمد همه مکاتب درمانی، طب اسلامی بود که از جانب پروردگار (خالق بدن‌ها) از طریق وحی به پیغمبر اکرم (صلی‌الله‌علیه‌وآله) و اهل‌بیت (علیهم‌السلام) و پس از آنها به ما انسان‌ها رسیده و ما اگر خود، راهکار درمانی رسیده از جانب آفریننده این بدن را به کار نبندیم، هر چه درد بکشیم و از سلامتی به دور باشیم، خود این را انتخاب کرده‌ایم، چرا که خداوند راه رسیدن به سلامتی را به ما نشان داده، اما ما با به کار نبستن این رو‌ش‌های درمانی، خود را از این راهکار محروم نموده‌ایم</p>
        <div class="col-lg-6">
            <div class="row items">
                <div class="col-lg-6">بیش از ۱۵ سال فعالیت در زمینه طب اسلامی <span>15+</span> </div>
                <div class="col-lg-6">بیش از ۱۰ هزار درمان موفق <span>10K</span> </div>
                <div class="col-lg-6">۱۰۰٪ تضمین کیفیت محصول <span class="100">100%</span> </div>
                <div class="col-lg-6">۹۸٪ رضایت مشتریان <span class="100">98%</span> </div>
            </div>
        </div>
    </div>
</div>
<input type="text" name="chat">
@endsection