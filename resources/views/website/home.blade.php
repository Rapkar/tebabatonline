@extends('website.layouts.app')

@section('content')
<div class="container">
    <div class=" px-5">
        <div class="swiper headerslider ">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background: linear-gradient(270.37deg, #FFFFFF 0.31%, #EBEBEB 99.69%);">
                    <div class="row">

                        <div class="col-lg-6 d-flex align-items-center justify-content-center flex-column">
                            <h2>طبابت آنلاین</h2>
                            <h3>ویزیت آنلاین، مزاج شناسی و مشاوره</h3>
                            <p>با طبابت آنلاین دیگر طبابت و درمان از دسترس هیچ کس دور نیست</p>
                            <p><b>طبابت آنلاین = طبیب در دستان شما</b></p>
                            <a href="#">ویزیت آنلاین</a>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{asset('images/website/slide2.webp')}}">
                        </div>
                    </div>

                </div>
                <div class="swiper-slide" style="">
                    <div class="row">

                        <div class="col-lg-6 d-flex align-items-center justify-content-center flex-column ">
                            <h2>تا زمانی که طبیبت آنلاینه</h2>
                            <h3>تو نباید از هیچ بیماری ای درد بکشی !</h3>
                            <p>میتونی همه ی مشکلاتت رو به طبابت آنلاین بگی و براشون راهکار بگیری</p>
                            <a href="#">ویزیت آنلاین</a>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{asset('images/website/slide1.webp')}}">
                        </div>
                    </div>

                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>



</div>
<div class="container-fluid popular-products d-flex flex-column">
    <h2>محصولات پرفروش</h2>
    <div class="swiper productslider mt-5 w-100 container mb-5">
        <div class="swiper-wrapper">
            @foreach($products as $product)
            @if($product->status==1)
            <a href="{{route('products', $product->slug)}}" class="swiper-slide">
                <div class="card pb-4">
                    <div class="head">
                        <img src="{{ asset($product->image) }}" alt="posttitle">
                    </div>
                    <h2>{{$product->name}}</h2>
                    <p>{{$product->expert}}</p>

                    <h5 class="d-flex" href="#">{{$product->price}} تومان</h5>
                    <form method="post" name="addtocart" action="{{ route('addtocart',$product->id)}}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit">افزودن به سبد خرید</button>
                    </form>
                </div>
            </a>
            @endif
            @endforeach

        </div>

    </div>
    <div class="productnav ">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<div class="container-fluid mensec pt-5">
    <div class="row pt-5 ">
        <div class="col-lg-12 pt-5  highlight d-flex flex-column justify-content-center align-items-center ">
            <h2 class="mb-5 pb-5 mt-5 pt-5 title">بیماری ها بر اساس اعضای بدن</h2>


            <p>ما برای راحتی شما عزیزان، در این قسمت تمام بیماری‌هایی که برای هر کس ممکنه به وجود بیاد رو بر اساس تک تک اعضای بدن دسته بندی کردیم</p>
            <p>شما می‌تونید بر اساس هر عضو، بیماری‌های اون قسمت رو بررسی کنید و راهکارهای درمانی‌شو مورد مطالعه قرار بدید</p>
            <p>پس همین حالا با کلیک روی هر قسمتی از بدن، بیماری های مربوط به عضو رو ببینید</p>
        </div>
        <div class="col-lg-12 justify-content-center d-flex men" style="background-image: url({{ asset('images/website/img.webp') }})">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-end">
                    <ul>
                        <li><a href="#">مشکلات روحی روانی</a></li>
                        <li style="margin-right: -1rem;"><a href="#">نوزادان و کودکان</a></li>
                        <li style="margin-right: -2rem;"><a href="#">مشکلات پوستی</a></li>
                        <li style="margin-right: -3rem;"><a href="#">چاقی و لاغری</a></li>
                        <li style="margin-right: -4rem;"><a href="#">کیست و سرطان ها</a></li>
                        <li style="margin-left: 3rem;margin-right: -3rem;"><a href="#">دستگاه تناسلی اقایان و بانوان</a></li>
                        <li><a href="#">پاها</a></li>
                        <li><a href="#">رگ ها و اندام عصبی</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-start">
                    <ul class="align-items-end">
                        <li><a href="#">سر(چشم،گوش،بینی و... )</a></li>
                        <li style="margin-left: -1rem;"><a href="#">خواب</a></li>
                        <li style="margin-left: -2rem;"><a href="#">گردن و گلو (مری و...)</a></li>
                        <li style="margin-left: -8rem;"><a href="#">قفسه سینه(قلب،ریه , ..)</a></li>
                        <li style="margin-left: -4rem;"><a href="#">شکم، معده، کبد</a></li>
                        <li style="margin-right: 3rem;margin-left: -3rem;"><a href="#">طبایع چهارگانه</a></li>
                        <li><a href="#">عضلات</a></li>
                        <li><a href="#">استخوان ها و مفاصل</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<section class=" mt-5 d-flex flex-column justify-content-center align-items-center text-center support">

    <h2 class="title"> خدمات ما </h2>
    <p class="mt-4" >درباره خدمات ما اطلاعات بیشتر کسب کنید</p>


    <div class="container content-box mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="item">
                    <img src="{{asset('images/website/lifestyles.png') }}">
                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item">
                <img src="{{asset('images/website/lunch.png') }}">
                    
                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="item">
                <img src="{{asset('images/website/direct.png') }}">

                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="item">
                <img src="{{asset('images/website/prescription.png') }}">

                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item">
                <img src="{{asset('images/website/shop.png') }}">

                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item">
                <img src="{{asset('images/website/tutrial.png') }}">

                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container ">
    <div class="orderalert " style="background-image: url({{ asset('images/website/TrackOrders.webp') }})">
        <h2>پیگیری سفارشات</h2>
        <p>کاربران عزیز شما میتوانید با کلیک بر روی دکمه زیر سفارشات خود را پیگیری کنید</p>
        <a href="#">پیگیری سفارشات</a>
    </div>
</div>
<section class=" mt-5 d-flex flex-column justify-content-center align-items-center text-center support">

    <h2 class="title"> چرا طبابت آنلاین؟</h2>
    <p class="mt-4" >در مورد ویزیت آنلاین، چندین مزیت وجود داره که ممکنه شما رو ترغیب کنه تا ویزیت آنلاین رو انتخاب کنید:</p>


    <div class="container content-box mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="item">
                    <img src="{{asset('images/website/lifestyles.png') }}">
                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item">
                <img src="{{asset('images/website/lunch.png') }}">
                    
                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="item">
                <img src="{{asset('images/website/direct.png') }}">

                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="item">
                <img src="{{asset('images/website/prescription.png') }}">

                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item">
                <img src="{{asset('images/website/shop.png') }}">

                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item">
                <img src="{{asset('images/website/tutrial.png') }}">

                    <h3>اصلاح سبک زندگی</h3>
                    <h4>درباره اصلاح سبک زندگی اطلاعات بیشتر کسب کنید</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid pb-3 mb-5 mt-5 blogs">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center text-center">
                <h2 class="title" >وبلاگ</h2>


            </div>
        </div>
        <div class="swiper blogslider mt-5 w-100">
            <div class="swiper-wrapper">
                @foreach($posts as $post)
                @if($post->status==1)
                <div href="#" class="swiper-slide">
                    <div class="card">
                        <div class="head">
                            <img src="{{ asset( $post->image) }}" alt="posttitle">
                        </div>
                        <h2>{{$post->name}}</h2>
                        <p>{{$post->expert}}</p>
                        <h5 href="#">ادامه مطلب</h5>

                    </div>
                </div>
                @endif
                @endforeach

            </div>

            <div class="swiper-pagination"></div>
        </div>

    </div>
</div>

<div class="expret container">
    <h2 class="py-5">خلاصه ای درباره ما</h2>
    <img class="w-100" src="{{asset('images/expret.webp') }}">
    <div class="d-flex justify-content-center flex-column pt-4" style="background: linear-gradient(180deg, #C7E3E3 0%, rgba(227, 241, 241, 0.36) 99.99%, rgba(255, 255, 255, 0.58) 100%);">
        <p>
            سال‌ها قبل از اینکه طب اسلامی به شکل امروزی گسترش پیدا کند و اصلاً کسی طب اسلامی را بشناسد، هر زمان از جلوی بیمارستان‌ها عبور می‌کردم و چشمم به مردم دردمند می‌افتاد، در درون خودم به این فکر می‌افتادم که ای کاش میشد برای این عزیزان رنجور کاری کرد؛ تا با تحقیقات و مطالعاتی که داشتم، متوجه شدم در سراسر دنیا هر ملت و قومیتی غیر از طب رایج و جدید، مکاتب درمانی خاص خود را دارند که از آن برای درمان بیماری‌ها استفاده می‌کنند و سرآمد همه مکاتب درمانی، طب اسلامی بود که از جانب پروردگار (خالق بدن‌ها) از طریق وحی به پیغمبر اکرم (صلی‌الله‌علیه‌وآله) و اهل‌بیت (علیهم‌السلام) و پس از آنها به ما انسان‌ها رسیده و ما اگر خود، راهکار درمانی رسیده از جانب آفریننده این بدن را به کار نبندیم، هر چه درد بکشیم و از سلامتی به دور باشیم، خود این را انتخاب کرده‌ایم، چرا که خداوند راه رسیدن به سلامتی را به ما نشان داده، اما ما با به کار نبستن این رو‌ش‌های درمانی، خود را از این راهکار محروم نموده‌ایم
        </p>
    </div>
    <div class="row counter mt-3">
        <div class="col-lg-3">
            <p>+15</p><span>بیش از ۱۵ سال فعالیت در زمینه طب اسلامی</span>
        </div>
        <div class="col-lg-3">
            <p>10K</p><span>بیش از ۱۰ هزار درمان موفق</span>
        </div>
        <div class="col-lg-3">
            <p>100%</p><span>۹۸٪ رضایت مشتریان</span>
        </div>
        <div class="col-lg-3">
            <p>98%</p><span>۱۰۰٪ تضمین کیفیت محصول</span>
        </div>
    </div>
</div>
@endsection