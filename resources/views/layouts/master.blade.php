<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @yield('custom_css')
  </head>
  <body>
    <div class="container">
      <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
       
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                {{-- <section>
                  <h4>{{Auth::user()->name}} <i class="fa fa-angle-down"></i></h4>
                  </span></h2>
              </section> --}}
              {{-- <section>
                <h4><i class="fa fa-angle-down"></i> {{Auth::user()->name}}</h4>
            </section> --}}
            <section style="position: absolute; top: 2; right: 0; margin-right:10px;padding-right:40px;">
              <h4>{{Auth::user()->name}} <i class="fa fa-angle-down"></i></h4>
          </section>
          
            
                <li>
                    <a href="@if(Auth::user()->usertype == 'owner'){{ url('/employeeList') }} @else {{ url('/check-in') }} @endif" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                </li>
                @if (Auth::user()->usertype == 'owner') 
                <li><a href="{{url('employee-reports')}}" class="text-sm text-gray-700 dark:text-gray-500 underline">Employee Report List</a></li>
                @endif
                @if (Auth::user()->usertype == 'employee') 
                <li><a href="{{url('check-in')}}" class="text-sm text-gray-700 dark:text-gray-500 underline">Check In</a></li>
                @endif
                <li>
                    <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                  </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
              


                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        @yield('content')
        </div> 
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  @yield('custom_js')
  </body>
</html>