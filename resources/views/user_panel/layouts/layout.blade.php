<div class="col-lg-4">
            <table dir="rtl">
                <tbody>
                    <tr>
                        <td>
                            <h2>{{ Auth::user()->name }}</h2>
                            <p>{{ Auth::user()->phone }}</p>
                        </td>
                        <td><a href="{{route('editprofile', Auth::user()->id)}}"><img src="{{ asset('images/edit.svg') }}"></a></td>
                    </tr>
                    <tr>
                        <td><a href="">سفارش ها</a></td>
                    </tr>
                    <tr>
                        <td><a href="">سبدخرید</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('forms')}}">فرم های ویزیت</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>