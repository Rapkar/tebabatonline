@extends('medic_panel.layouts.app')
@section('content')
<div class="container-fluid patient-detail">

    <table class=" table table-striped table-bordered table-rtl">
        <thead class="position-fixed w-100 d-table">
            <th>سوال</th>
            <th>پاسخ</th>
            <th>توضیحات بیشتر</th>
        </thead>
        <tbody>
            <!-- Users list goes here -->

            @foreach($result as $item)

            <tr>
                <th>نام</th>
                <td> {{$item['data']->name}} </td>
            </tr>
            <tr>
                <th>خانوادگی</th>
                <td> {{$item['data']->family}} </td>
            </tr>
            <tr>
                <th>استان</th>
                <td> {{$item['data']->states}} </td>
            </tr>
            <tr>
                <th>شهر</th>
                <td> {{$item['data']->cities}} </td>
            </tr>
            <tr>
                <th>شماره تماس</th>
                <td> {{$item['data']->phone}} </td>
            </tr>
            <tr>
                <th>شغل و فعالیت روزانه</th>
                <td> {{$item['data']->jobs}} </td>
            </tr>
            <tr>
                <th>وزن</th>
                <td> {{$item['data']->weight}} </td>
            </tr>
            <tr>
                <th>قد</th>
                <td> {{$item['data']->height}} </td>
            </tr>
            <tr>
                <th>وزن</th>
                <td> {{$item['data']->weight}} </td>
            </tr>
            <tr>
                <th>جنسیت</th>
                <td> {{$item['data']->gender}} </td>
            </tr>
            <tr>
                <th> وضعیت تاهل</th>
                <td> {{$item['data']->relationship}} </td>
            </tr>
            <tr>
                <th> تاریخ تولد</th>
                <td> {{$item['data']->age_day}},{{$item['data']->age_mounth}},{{$item['data']->age_year}} </td>
            </tr>
            <tr>
                <th>مشکل یا بیماری‌</th>
                <td> {{$item['data']->problem}} </td>
            </tr>
            <tr>
                <th> مشکلات گوارشی </th>
                <td> {{$item['data']->digestive_problems ?? ''}} </td>
                <td> {{$item['data']->digestive_problems_des ?? ''}} </td>
            </tr>
            <tr>
                <th>کار کرد شکم در طول روز</th>
                <td> {{$item['data']->bowel_movement?? ''}} </td>
                <td> {{$item['data']->bowel_movement_des ?? ''}} </td>
            </tr>
            <tr>
                <th>دیابت</th>
                <td> {{$item['data']->diabetes ?? '' }} </td>
                <td> {{$item['data']->diabetes_des ?? '' }} </td>
            </tr>
            <tr>
                <th>فشار خون بالا </th>
                <td> {{$item['data']->Hypertension ?? '' }} </td>
                <td> {{$item['data']->Hypertension_des ?? '' }} </td>
            </tr>
            <tr>
                <th>چربی خون بالا </th>
                <td> {{$item['data']->Hyperlipidemia ?? '' }} </td>
                <td> {{$item['data']->Hyperlipidemia_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا شب‌ها کف پایتان داغ می‌شود؟ به گونه‌ای که بخواهید از زیر پتو بیرون بدهید؟
                </th>
                <td> {{$item['data']->hotfeet ?? '' }} </td>
                <td> {{$item['data']->hotfeet_des ?? '' }} </td>
            </tr>
            <tr>
                <th> آیا مشکل کم کاری یا پر کاری تیرویید دارید؟
                </th>
                <td> {{$item['data']->thyroid ?? '' }} </td>
                <td> {{$item['data']->thyroid_des ?? '' }} </td>
            </tr>
            <tr>
                <th>رنگ پوست
                </th>
                <td> {{$item['data']->color ?? '' }} </td>
                <td> {{$item['data']->color_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا خواب رفتگی دست و پا دارید؟
                </th>
                <td> {{$item['data']->Numbness ?? '' }} </td>
                <td> {{$item['data']->Numbness_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا اسپاسم، انقباض، درد و گرفتگی عضلات دارید؟

                </th>
                <td> {{$item['data']->Spasms ?? '' }} </td>
                <td> {{$item['data']->Spasms_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا در قسمت‌هایی از بدن خارش دارید؟
                </th>
                <td> {{$item['data']->itching ?? '' }} </td>
                <td> {{$item['data']->itching_des ?? '' }} </td>
            </tr>
            <tr>
                <th>در کدام قسمت از بدن خارش دارید؟
                </th>
                <td> {{$item['data']->itchingw_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا خستگی، کسالت، بی حالی، بی رمقی و بی انرژی بودن دارید؟

                </th>
                <td> {{$item['data']->lethargy ?? '' }} </td>
                <td> {{$item['data']->lethargy_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا خواب سنگین دارید یا مدام چرتی و خواب آلود هستید؟

                </th>
                <td> {{$item['data']->heavy_sleep ?? '' }} </td>
                <td> {{$item['data']->heavy_sleep_des ?? '' }} </td>
            </tr>
            <tr>
                <th>کم خونی دار د؟ زیر پلک چشم شما سفید یا صورتی کم رنگ است؟

                </th>
                <td> {{$item['data']->anemia ?? '' }} </td>
                <td> {{$item['data']->anemia_des ?? '' }} </td>
            </tr>
            <tr>
                <th>داغی بدن یا گر گرفتگی دارد؟ عدم تحمل گرما، لذت بردن از باد سرد و هوای خنک؟

                </th>
                <td> {{$item['data']->hotflash ?? '' }} </td>
                <td> {{$item['data']->hotflash_des ?? ''}} </td>
            </tr>
            <tr>
                <th> زیاد تشنه می‌شو د و دائما دوست دارید آب یا مایعات بنوشد

                </th>
                <td> {{$item['data']->Polydipsia ?? '' }} </td>
                <td> {{$item['data']->Polydipsia_des ?? '' }} </td>
            </tr>
            <tr>
                <th>روزانه چند لیوان آب، چای یا مایعات دیگه می‌نوشد

                </th>
                <td> {{$item['data']->daily_water_intake ?? '' }} </td>
                <td> {{$item['data']->daily_water_intakeـdes ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا تعریق زیاد بدن دارید؟

                </th>
                <td> {{$item['data']->sweating ?? '' }} </td>
                <td> {{$item['data']->sweating_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا تلخی دهان دارید؟ مخصوصاً صبح‌ها که از خواب پا می‌شوید؟
                </th>
                <td> {{$item['data']->bitter_mouth ?? '' }} </td>
                <td> {{$item['data']->bitter_mouth_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا زود عصبانی می‌شوید و داد و بیداد و پرخاش می‌کنید و زود هم آرام می‌شوید؟

                </th>
                <td> {{$item['data']->angry ?? '' }} </td>
                <td> {{$item['data']->angry_des ?? ''}} </td>
            </tr>
            <tr>
            <tr>
                <th> آیا فکر و خیال، استرس، اضطراب و دلهره دارید؟

                </th>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <th> آیا بدن‌تان پر مو است؟

                </th>
                <td> {{$item['data']->hairy_body ?? '' }} </td>
                <td> {{$item['data']->hairy_body_des ?? ''}} </td>
            </tr>
            <tr>
                <th> آیا در بدن‌تان خال زیاد دارید؟ یا اخیراً زیاد شده باشد؟

                </th>
                <td> {{$item['data']->a_mole ?? '' }} </td>
                <td> {{$item['data']->a_mole_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا شب‌ها خیلی راحت تا سرتونو بذارید روی بالشت به خواب میرید؟
                </th>
                <td> {{$item['data']->sleep ?? '' }} </td>
                <td> {{$item['data']->sleep_des ?? ''}} </td>
            </tr>
            <tr>
                <th>چقدر طول می‌کشه توی بستر تا به خواب برید؟
                </th>
                <td> {{$item['data']->sleep_time ?? '' }} </td>
                <td> {{$item['data']->sleep_time_des ?? '' }} </td>
            </tr>
            <tr>
                <th>آیا خواب راحت، آرامش بخش و ریلکسی دارید؟
                </th>
                <td> {{$item['data']->sleep_relax ?? '' }} </td>
                <td> {{$item['data']->sleep_relax_des ?? '' }} </td>
            </tr>
            <tr>
                <th>اگر خواب آرامش بخشی ندارید، چه مشکلی در خواب‌تون دارید؟
                </th>
                <td> {{$item['data']->sleep_problem}} </td>
                <td> {{$item['data']->sleep_problem_des}} </td>
            </tr>
            <tr>
                <th>آیا آب دهان‌تان زیاد است؟
                </th>
                <td> {{$item['data']->drooling}} </td>
                <td> {{$item['data']->drooling_des}} </td>
            </tr>
            <tr>
                <th>آیا موقع خواب آب دهان‌تان روی بالشت می‌ریزد؟
                </th>
                <td> {{$item['data']->drooling_pillow}} </td>
                <td> {{$item['data']->drooling_pillow_des}} </td>
            </tr>
            <tr>
                <th> آیا آب دهان‌تان لزج و چسبنده است؟
                </th>
                <td> {{$item['data']->drooling_slimy}} </td>
                <td> {{$item['data']->drooling_slimy_des}} </td>
            </tr>
            <tr>
                <th> آیا خلط داخل گلو دارید؟
                </th>
                <td> {{$item['data']->sputum}} </td>
                <td> {{$item['data']->sputum_des}} </td>
            </tr>
            <tr>
                <th>آیا انگشتان دست و پایتان سرد یا یخ است؟
                </th>
                <td> {{$item['data']->coldhand}} </td>
                <td> {{$item['data']->coldhand_des}} </td>
            </tr>
            <tr>
                <th>آیا در هوای سرد اذیت می‌شوید و تحمل هوای سرد رو ندارید و بیشتر عاشق هوای گرم هستید؟
                </th>
                <td> {{$item['data']->love_he_heat}} </td>
                <td> {{$item['data']->love_the_heat}} </td>
            </tr>
            <tr>
                <th>آیا مقدار ادرارتان در طول روز زیاد هست؟
                </th>
                <td> {{$item['data']->urine}} </td>
                <td> {{$item['data']->urine_des}} </td>
            </tr>
            <tr>
                <th>اگر بلند می‌شوید چند نوبت؟
                </th>
                <td> {{$item['data']->wake_count_des}} </td>
            </tr>
            <tr>
                <th>آیا برنامه عادت ماهیانه منظم دارید یا خیر؟
                </th>
                <td> {{$item['data']->menstruation}} </td>
                <td> {{$item['data']->menstruation_des}} </td>
            </tr>
            <tr>
                <th> عادت ماهیانه نامنظمی دارد، لطفاً دقیق بفرمایید چه مشکلی دارید؟ آیا دیر به دیر و با تأخیر اتفاق می‌افتد و یا زود به زود و یا لکه بینی دارد؟

                </th>
                <td> {{$item['data']->menstruation}} </td>
                <td> {{$item['data']->menstruation_des}} </td>
            </tr>
            <tr>
                <th>ترشحات یا عفونت زنانگی هم دارید یا خیر؟
                </th>
                <td> {{$item['data']->Feminine_secretions}} </td>
                <td> {{$item['data']->Feminine_secretions_des}} </td>
            </tr>
            <tr>
                <th> از لحاظ مسایل جنسی میل کافی در بدن‌تون وجود دارد یا خیر، آدم سرد مزاجی هستید؟
                </th>
                <td> {{$item['data']->cold_temper}} </td>
                <td> {{$item['data']->cold_temper_des}} </td>
            </tr>
            <tr>
                <th> مدارک پزشکی
                </th>
                <td>
                    <a class="example-image-link" href="{{$item['data']->image}}" data-lightbox="example-1"><img class="example-image patient-img" src="{{$item['data']->image}}" alt="image-1" /></a>
                </td>
            </tr>
            <tr>
                <th> توضیحات
                </th>
                <td> {{$item['data']->comment}} </td>
            </tr>
            <tr>
                <th>عملیات</th>
                <td> <a href=" " class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"> درحال بررسی</a></td>
                <td> <a href=" " class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف">عدم پاسخ صحیح </a></td>
            </tr>
            </tr>
            @endforeach

            <!-- More users list goes here -->
        </tbody>
    </table>

</div>
<hr>
<hr>
<div class="container-fluid position-relative " style="z-index:999">
    <table class="w-100  table table-striped table-bordered table-rtl">
        <input type="hidden" value="{{$item['id']}}" name="visit_id">
        <tbody>
            <tr>
                <th>تشخیص طبیب</th>
                <td>                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medicine">
                        افزودن تشخیص
                    </button></td>
            </tr>
            <tr>
                <th>توصیه‌های اختصاصی</th>
                <td><textarea></textarea></td>
            </tr>
            <tr>
                <th> مشکلاتی که دارید</th>
                <td><textarea></textarea></td>
            </tr>
            <tr>
                <th> داروهای تجویزی</th>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medicine">
                        افزودن دارو
                    </button>
                </td>
                <td class="w-100">
                    <table class="w-100">
                        <thead>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>تعداد</th>
                            <th>قیمت کل</th>
                            <th>عملیات</th>
                        </thead>
                        <tbody id="products" >

                            @php $total=[] @endphp
                            @foreach($selected_products as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$price=$item->price}} تومان</td>
                                <td>{{$count=$item->pivot->count}} </td>
                                <td>{{$subtotal = $item->price * $item->pivot->count}}تومان </td>
                                <td>
                                    <a href="{{ route('removeproducttopatient', ['visit_id' => $item->pivot->visit_id, 'product_id' => $item->pivot->product_id]) }}">
                                        حذف
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <thead>
                            قیمت کل
                        </thead>
                        <tbody id="totalprice">
                            <tr>
                                <td>{{ $total = collect($selected_products)->sum(function($item) {
                return $item->price * $item->pivot->count;
            }) }} تومان</td> <!-- Calculate total using collection -->
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <th> توصیه‌های درمانی</th>
                <td>            
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Recommendation">
                        افزودن توصیه
                    </button>
           </td>
            </tr>
 
            <tr>
                <th> تاریخ ویزیت</th>
                <td><textarea></textarea></td>
                <th> نوبت بعدی ویزیت</th>
                <td><textarea></textarea></td>
            </tr>
            <tr>
                <th>تایید و ارسال</th>
                <td><a href="#" >ارسال نسخه</a></td>
                <th>ذخیره پیش نویس</th>
                <td><a href="#">ذخیره نسخه</a></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- Button to trigger the modal -->


<!-- The modal itself -->
<div class="modal fade" id="medicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">لیست محصولات</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row">
                    @csrf
                    <label class="col-lg-3">
                        نام محصول
                        <select name="product">
                            @foreach($products as $product)
                            <option value="{{$product->id}}"> {{$product->name}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-lg-7">تعداد
                        <input name="productcount" type="number" min="1" value="1">
                    </label>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">بستن</button>
                <button type="button" id="addproducttopatient" class="btn btn-primary">افزودن محصول</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Recommendation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">لیست توصیه ها</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row">
                    @csrf
                    <label class="col-lg-3">
                        توصیه
                        <select name="product">
                            @foreach($Recommendations as $item)
                            <option value="{{$item->id}}"> {{$item->content}}</option>
                            @endforeach
                        </select>
                    </label>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">بستن</button>
                <button type="button" id="addproducttopatient" class="btn btn-primary">افزودن محصول</button>
            </div>
        </div>
    </div>
</div>
@endsection