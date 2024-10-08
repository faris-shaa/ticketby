@extends('front.master', ['activePage' => 'home'])
@section('title', __('Home'))
@section('content')

@php
use Illuminate\Support\Facades\Http;
if (session('direction') == 'rtl') {
$lang = 'ar';
}else{
$lang = 'en';
}

$citys = null;
try {
// Use environment variable for the base URL
$baseUrl = env('API_BASE_URL', 'https://ticketby.pixicard.com');
$response = Http::withOptions(['verify' => false])->get("{$baseUrl}/api/city");

if ($response->successful()) {
$citys = $response->json();
} else {
$error = $response->json();
}
} catch (\Exception $e) {
// Handle the exception
// Log the exception message or display an error message
}

$categorys = null;
try {
// Use environment variable for the base URL
$baseUrl = env('API_BASE_URL', 'https://ticketby.pixicard.com');
$response = Http::withOptions(['verify' => false])->get("{$baseUrl}/api/user/category");

if ($response->successful()) {
$categorys = $response->json();
} else {
$error = $response->json();
}
} catch (\Exception $e) {
// Handle the exception
// Log the exception message or display an error message
}

@endphp
<div class="lg:bg-primary_color_15 hero rounded-b-3xl">
   <div class="container mt-12 pb-0 lg:pb-44 overflow-hidden">
      <div class="grid grid-cols-1 lg:grid-cols-2 items-center">
         <div class=" tiket-info order-2 lg:order-1 mt-7">
            @foreach ( $banner as $item )
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="{{ $item['id']}}">
               <div class="lg:min-h-40">
                  <div class="overflow-hidden">
                     <h1 class="text-h4 lg:text-h2  xl:text-h9 font-medium anim-tiket-h text-center lg:text-left">{{ $lang == 'ar' ? $item->event->name_arabic : $item->event->name }}</h1>
                  </div>
                  <div class="overflow-hidden text-center lg:text-left">
                     <p class="mt-1 lg:mt-4 text-primary_color_4 anim-tiket-p text-h6 lg:text-h5 ">{{ $lang == 'ar' ? $item->event->name_arabic : $item->event->name }}</p>
                  </div>
               </div>
               <div class="hidden md:flex gap-4 mt-7 overflow-hidden relative z-10">
                  <a href="{{ url('event/' . $item->event->id . '/' . Str::slug($item->event->name) . '?scroll=tickets_section') }}"
                     class="rounded-5xl bg-primary_color_8 text-center py-2 px-4 lg:px-12 w-full lg:w-48 f-bri l leading-5 block">
                     {{ __('Get Ticket') }}
                  </a> <a href="{{ url('event/' . $item->event->id . '/' . Str::slug($item->event->name)) }}"
                     class=" rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">
                     {{__('Learn More')}}
                  </a>
               </div>
            </div>
            @endforeach
         </div>
         <div class="swiper-hero order-1 lg:order-2 m-auto ">
            <div class="swiper-wrapper">
               @foreach ( $banner as $item )
               <div class="swiper-slide" id="{{$item['id']}}"
                  style="background-image:url('{{ asset('/images/upload/' . $item->image) }}')">
                  <a class="block w-full h-full" href="{{ url('event/' . $item->event->id . '/' . Str::slug($item->event->name)) }}"></a>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>

<div class="container hidden md:block">
   <div class="bg-primary_color_10 py-7 px-2 md:px-8 xl:px-24 rounded-2xl -mt-20 flex items-center gap-6 justify-between flex-wrap xl:flex-nowrap">
      <div class="w-full sm:w-auto">
         <span class="flex items-center gap-1 mb-1">
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path
                  d="M15.8438 15.1562C16.0312 15.3438 16.0312 15.6875 15.8438 15.875C15.75 15.9688 15.625 16 15.5 16C15.3438 16 15.2188 15.9688 15.0938 15.875L10.6875 11.4375C9.53125 12.4375 8.0625 13 6.46875 13C2.90625 13 0 10.0938 0 6.5C0 2.9375 2.875 0 6.46875 0C10.0312 0 12.9688 2.9375 12.9688 6.5C12.9688 8.125 12.4062 9.59375 11.4062 10.75L15.8438 15.1562ZM6.5 12C9.53125 12 12 9.5625 12 6.5C12 3.46875 9.53125 1 6.5 1C3.4375 1 1 3.46875 1 6.5C1 9.53125 3.4375 12 6.5 12Z"
                  fill="#EEE8F4" />
            </svg>
            <label for="">{{__('Event title')}}</label>
            <div class="ms-auto hidden" id="Searchbtn"> <i class="fa-solid fa-right-to-bracket"></i>
            </div>
         </span>
         <input type="text" name="" id="SearchEventName" value="" placeholder="Search by event name"
            class="text-h4 placeholder-primary_color_6 w-full min-w-60 f-bri bg-transparent text-primary_color_6 border-0 border-b border-primary_color_6 py-3 border   outline-0">

      </div>
      <div class="w-full sm:w-auto">
         <span class="flex items-center gap-1 mb-1">
            <svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M8.83325 6C8.83325 7.40625 7.70825 8.5 6.33325 8.5C4.927 8.5 3.83325 7.40625 3.83325 6C3.83325 4.625 4.927 3.5 6.33325 3.5C7.70825 3.5 8.83325 4.625 8.83325 6ZM6.33325 7.5C7.14575 7.5 7.83325 6.84375 7.83325 6C7.83325 5.1875 7.14575 4.5 6.33325 4.5C5.4895 4.5 4.83325 5.1875 4.83325 6C4.83325 6.84375 5.4895 7.5 6.33325 7.5ZM12.3333 6C12.3333 8.75 8.677 13.5938 7.052 15.625C6.677 16.0938 5.95825 16.0938 5.58325 15.625C3.95825 13.5938 0.333252 8.75 0.333252 6C0.333252 2.6875 2.9895 0 6.33325 0C9.64575 0 12.3333 2.6875 12.3333 6ZM6.33325 1C3.552 1 1.33325 3.25 1.33325 6C1.33325 6.5 1.4895 7.15625 1.83325 8C2.177 8.8125 2.64575 9.6875 3.20825 10.5625C4.27075 12.2812 5.52075 13.9375 6.33325 14.9375C7.1145 13.9375 8.3645 12.2812 9.427 10.5625C9.9895 9.6875 10.4583 8.8125 10.802 8C11.1458 7.15625 11.3333 6.5 11.3333 6C11.3333 3.25 9.08325 1 6.33325 1Z" fill="#EEE8F4" />
            </svg>
            <label for="">{{__('Place')}}</label>
         </span>
         <div class="min-w-60 f-bri bg-transparent text-primary_color_6 border-0 border-b border-primary_color_6 py-3 border">
            <select name="" id="SearchEventCity" placeholder="Search by event place" class="text-h4 select2 placeholder-primary_color_6 w-full min-w-60 f-bri  text-primary_color_6    outline-0" style="width: 100%;" data-minimum-results-for-search="Infinity">
               <option value="all">{{__('Any place')}}</option>
               @foreach ($citys['city'] as $city)
               <option value="{{$city['id']}}">{{ $lang == 'ar' ? $city['arabic_name'] : $city['name'] }}</option>
               @endforeach
            </select>
         </div>
      </div>
      <div class="w-full sm:w-auto">
         <span class="flex items-center gap-1 mb-1">
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M8.16675 3.5C8.16675 3.25 8.3855 3 8.66675 3C8.91675 3 9.16675 3.25 9.16675 3.5V7.75L11.9167 9.59375C12.1667 9.75 12.2292 10.0625 12.073 10.2812C11.9167 10.5312 11.6042 10.5938 11.3855 10.4375L8.3855 8.4375C8.22925 8.34375 8.1355 8.1875 8.1355 8L8.16675 3.5ZM8.66675 0C13.073 0 16.6667 3.59375 16.6667 8C16.6667 12.4375 13.073 16 8.66675 16C4.22925 16 0.666748 12.4375 0.666748 8C0.666748 3.59375 4.22925 0 8.66675 0ZM1.66675 8C1.66675 11.875 4.79175 15 8.66675 15C12.5105 15 15.6667 11.875 15.6667 8C15.6667 4.15625 12.5105 1 8.66675 1C4.79175 1 1.66675 4.15625 1.66675 8Z" fill="#EEE8F4" />
            </svg>
            <label for="">{{__('Date')}}</label>
            <span class="ms-auto  cursor-pointer clear-datepicker hidden">
               <i class="fa-regular fa-circle-xmark fa-lg "></i>
            </span>
         </span>
         <div id="event_date" class=" min-w-60 f-bri bg-transparent text-primary_color_6 border-0 border-b border-primary_color_6 py-3 border">
            <select name="" id="SearchEventDate" placeholder="Search by event date" class="text-h4 select2 placeholder-primary_color_6 w-full    outline-0" style="width: 100%;" data-minimum-results-for-search="Infinity">
               <option value="All">{{__('all')}}</option>
               <option value="Today">{{__('Today')}}</option>
               <option value="Tommorow">{{__('Tommorow')}}</option>
               <option value="This Week">{{__('This Week')}}</option>
               <option value="choose_date">{{__('choose date')}}</option>
            </select>
         </div>
         <input type="text" name="" placeholder="choose event date" id="datepicker" class="datepicker hidden placeholder-primary_color_6 w-full min-w-60 f-bri bg-transparent text-primary_color_6 border-0 border-b border-primary_color_6 py-3 border   outline-0">
      </div>
   </div>
</div>


<div class="container mt-9 md:mt-40 xl:mt-32 hidden lg:block" id="UpcomingEventsSection">
   <div class="flex justify-between flex-wrap gap-y-4">
      <h2 class="text-h5 lg:text-h2 text-primary_color_6 lg:text-white">{{__('Upcoming Events')}}</h2>
      <div class="flex gap-2 flex-wrap gap-y-4">
         <div
            class=" text-h6 rounded-full  bg-gray_f bg-opacity-5 gap-x-1  py-3 px-6 flex items-center  justify-between   h-8">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path
                  d="M8.61328 1.1875L11.2383 5.5625C11.4023 5.83594 11.4023 6.16406 11.2383 6.4375C11.1016 6.71094 10.8008 6.875 10.5 6.875H5.25C4.92188 6.875 4.62109 6.71094 4.48438 6.4375C4.32031 6.16406 4.32031 5.83594 4.48438 5.5625L7.10938 1.1875C7.27344 0.914062 7.54688 0.75 7.875 0.75C8.17578 0.75 8.44922 0.914062 8.61328 1.1875ZM7.875 9.28125C7.875 8.67969 8.33984 8.1875 8.96875 8.1875H12.9062C13.5078 8.1875 14 8.67969 14 9.28125V13.2188C14 13.8477 13.5078 14.3125 12.9062 14.3125H8.96875C8.33984 14.3125 7.875 13.8477 7.875 13.2188V9.28125ZM3.5 14.75C1.55859 14.75 0 13.1914 0 11.25C0 9.33594 1.55859 7.75 3.5 7.75C5.41406 7.75 7 9.33594 7 11.25C7 13.1914 5.41406 14.75 3.5 14.75Z"
                  fill="#666666" />
            </svg>
            <select name="" id="SearchEventCat" style="width: 100%;" class=" select2 placeholder-primary_color_6 outline-0" data-minimum-results-for-search="Infinity">
               <option value="">category</option>
               @foreach ($categorys['data'] as $cat)
               <option value="{{ $cat['id']}}">{{ $lang == 'ar' ? $cat['ar_name'] : $cat['name'] }}</option>
               @endforeach
            </select>
         </div>
      </div>
   </div>
   <div class="mt-16 grid grid-cols-2 lg:grid-cols-3 gap-2 xl:gap-20 upcomingEventsCon" id="upcomingEventsCon"></div>
   <div class="flex justify-center">
      <button id="load_more"
         class=" mt-16  rounded-5xl border border-light   text-center    py-2 px-4 lg:px-9   lg:w-48 f-bri l leading-5  inline-block">
         {{__('Load More')}}</button>
   </div>
</div>

<div class="container mt-9 md:mt-40 xl:mt-32">
   <div class=" lg:text-center mb-4 lg:mb-8">
      <h2 class="text-h5 lg:text-h2 text-primary_color_6 lg:text-white text-primary_color_6 lg:text-white"> <span class="hidden lg:inline-block">{{__('Discover the lovely ')}}</span> {{__('categories')}}</h2>
      <p class="text-gray_6 mt-1"></p>
   </div>
</div>
<div class="xl:px-72 m-auto">
   <div class="swiper swiper-cat order-1 lg:order-2 m-auto">
      <div class="swiper-wrapper">
         @foreach ($categorys['data'] as $cat)
         <div class="swiper-slide text-center flex items-center flex-col ">
            <a href="/all-events">
               <!-- <a href="/all-events/{{$cat['id']}}"> -->
               <div
                  class=" mx-auto flex items-center justify-center w-16 h-16 lg:w-24 lg:h-24 rounded-full bg-light bg-opacity-5  border border-primary_color_o10_1   ">
                  <img class="w-9 lg:w-2/4" src="{{ url('images/upload/' .$cat['app_icon']) }}" alt="{{ $cat['name']}}">
               </div>
               <h5 class="mt-3 text-h6 lg:text-h5">{{ $lang == 'ar' ? $cat['ar_name'] : $cat['name'] }}</h5>
            </a>
         </div>
         @endforeach
      </div>
   </div>
</div>



<div class="container mt-9 md:mt-40 xl:mt-32 block lg:hidden overflow-hidden" id="">
   <div class="flex justify-between flex-wrap gap-y-4">
      <h2 class="text-h5 lg:text-h2 text-primary_color_6 lg:text-white">{{__('Upcoming Events')}}</h2>
   </div>
   <div class="upcomingEventsConswiper">
      <div class="mt-4 lg:mt-16  swiper-wrapper upcomingEventsCon" id=""></div>
   </div>

</div>

<div class="container mt-9 md:mt-40 xl:mt-32">
   <div class="text-start lg:text-center mb-4 lg:mb-8">
      <h2 class="text-h5 lg:text-h2 text-primary_color_6 lg:text-white hidden lg:block">{{__('Discover the lovely cities')}}</h2>
      <h2 class="text-h5 lg:text-h2 text-primary_color_6 lg:text-white lg:hidden">{{__('Cities to discover')}}</h2>
      <p class="text-gray_6 mt-1 hidden lg:block">{{__('Discover the lovely cities')}}</p>
   </div>
</div>
<div class="md:container">
   <div class="relative">
      <div class="swiper swiper-city order-1 lg:order-2 m-auto">
         <div class="swiper-wrapper">
            @foreach ($citys['city'] as $city)
            <div class="swiper-slide text-center flex items-center flex-col">
               <a href="/all-events">
                  <div class="lg:w-24 w-32 h-20 lg:h-28  md:h-52 md:w-48  xl:h-h-270  xl:w-w-256 rounded-lg rounded-2xl overflow-hidden">
                     <img class="w-full h-full object-cover"
                        src="{{ url('images/upload/' .$city['image']) }}"
                        alt="">
                  </div>
                  <h3 class="lg:text-h3 text-h6 mt-3">{{ $lang == 'ar' ? $city['arabic_name'] : $city['name'] }}</h3>
               </a>
            </div>
            @endforeach
         </div>
      </div>
      <div class="swiper-pagination hidden lg:block"></div>
   </div>
</div>

<div class="container mt-9 md:mt-40 xl:mt-32 hidden lg:block">
   <div class="">
      <h2 class="text-h5 lg:text-h2 text-primary_color_6 lg:text-white">{{__('Previous Events')}}</h2>
   </div>
   <div class="mt-16 grid grid-cols-2 lg:grid-cols-3 gap-2 ">
      @foreach ($pervious_events as $item)
      <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}">
         <div class="h-full bg-light hover:bg-primary_color_o25_9 bg-opacity-5 rounded-2xl border border-primary_color_o10_1 overflow-hidden grayscale-hover ">
            <div class="h-32 md:h-48">
               <img class="w-full h-full object-cover grayscale transition-all "
                  src="{{ url('images/upload/' . $item->image) }}"
                  alt="">
            </div>
            <div class="flex gap-2 md:gap-4 p-1 md:p-4 flex-wrap md:flex-nowrap">
               <div class="text-center flex  items-baseline gap-1 md:gap-0 md:flex-col ">
                  <span class="text-primary_color_7 text-h7 font-bold uppercase f-bri">
                     {{ Carbon\Carbon::parse($item->start_time)->format('M') }}
                  </span>
                  <span class="font-bold text-h3  f-bri">
                     {{ Carbon\Carbon::parse($item->start_time)->format('d') }}
                  </span>
               </div>
               <div>
                  <h5 class="text-h6 md:text-h5 font-medium  md:mb-2">
                     {{ $lang == 'ar' ? $item->name_arabic : $item->name }}
                  </h5>
                  <p class="pline2 f-bri text-gray_6 text-h6">
                     {{ $lang == 'ar' ? $item->description_arabic : $item->description }}
                  </p>
               </div>
            </div>
         </div>
      </a>
      @endforeach
   </div>
   <div class="flex justify-center">
      <a href="/all-events"
         class=" m-auto mt-16  rounded-5xl border border-light   text-center    py-2 px-4 lg:px-9    f-bri l leading-5  inline-block text-h6 md:text-h5 ">
         {{__('Discover all previous events')}}</a>
   </div>
</div>

<div class="container mt-9 md:mt-40 xl:mt-32 block lg:hidden overflow-hidden">
   <div class="">
      <h2 class="text-h5 lg:text-h2 text-primary_color_6 lg:text-white">{{__('Previous Events')}}</h2>
   </div>
   <div class="upcomingPreviousEvents">
      <div class="mt-4 lg:mt-16 swiper-wrapper ">
         @foreach ($pervious_events as $item)
         <div class="swiper-slide ">
            <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}">
               <div class=" h-full bg-light hover:bg-primary_color_o25_9 bg-opacity-5 rounded-2xl border border-primary_color_o10_1 overflow-hidden grayscale-hover ">
                  <div class="h-32 md:h-48">
                     <img class="w-full h-full object-cover grayscale transition-all "
                        src="{{ url('images/upload/' . $item->image) }}"
                        alt="">
                  </div>
                  <div class="flex gap-1 md:gap-4 p-1 md:p-4 flex-wrap md:flex-nowrap flex-col lg:flex-row">
                     <div class="text-center flex  items-baseline gap-1 md:gap-0 md:flex-col ">
                        <span class="text-primary_color_7 text-h7 font-bold uppercase f-bri">
                           {{ Carbon\Carbon::parse($item->start_time)->format('M') }}
                        </span>
                        <span class="font-bold text-h7 lg:text-h3 f-bri text-primary_color_7 lg:text-white">
                           {{ Carbon\Carbon::parse($item->start_time)->format('d') }}
                        </span>
                     </div>
                     <div>
                        <h5 class="text-h6 md:text-h5 font-medium  md:mb-2">
                           {{ $lang == 'ar' ? $item->name_arabic : $item->name }}
                        </h5>
                        <p class="pline2 f-bri text-gray_6 text-h6">
                           {{ $lang == 'ar' ? $item->description_arabic : $item->description }}
                        </p>
                     </div>
                  </div>
               </div>
            </a>
         </div>
         @endforeach
      </div>
   </div>
   <div class="flex justify-center">
      <a href="/all-events"
         class=" m-auto mt-16  rounded-5xl border border-light   text-center    py-2 px-4 lg:px-9    f-bri l leading-5  inline-block text-h6 md:text-h5 ">
         {{__('Discover all previous events')}}</a>
   </div>
</div>
@endsection



@if (session('direction') == 'rtl'))
<script>
   var lang = 'ar';
</script>
@else
<script>
   var lang = 'en';
</script>
@endif


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script script>
   $(document).ready(function() {

      let limit = 3;

      function updateLimitBasedOnScreenSize() {
         if (window.innerWidth <= 768) { // 1024px is the breakpoint for 'lg' in Tailwind CSS
            limit = -1;
         } else {
            limit = 3;
         }
      }

      // Initial check
      updateLimitBasedOnScreenSize();

      // Update limit on window resize
      window.addEventListener('resize', updateLimitBasedOnScreenSize);

      console.log(limit); // You can remove this line; it's just for testing

      $("#load_more").click(function() {
         limit += 3
         fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);
      });

      function scroll() {
         $('html, body').animate({
            scrollTop: $("#UpcomingEventsSection").offset().top
         }, 800);
      }

      var SearchEventName = ''
      $('#SearchEventName').on('keyup', function() {
         $("#Searchbtn").removeClass('hidden');
         SearchEventName = $(this).val();
         if (SearchEventName == '') {
            $("#Searchbtn").addClass('hidden');
            fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);
         }
      });

      $("#Searchbtn").on("click", function() {
         fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);
         scroll()
      })
      var SearchEventCity = ''
      $('#SearchEventCity').on('change', function() {
         SearchEventCity = $(this).val();
         console.log(SearchEventCity);
         fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);
         scroll()
      });
      var SearchEventDate = ''
      $('#SearchEventDate').on('change', function() {
         SearchEventDate = $(this).val();
         fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);
         scroll()
      });
      var SearchEventCat = ''
      $('#SearchEventCat').on('change', function() {
         SearchEventCat = $(this).val();
         fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);
      });

      fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);

      function fetchEvents(query = '', date = '', city_id = '', category_id = '', limit = 3) {
         let url = `{{url('api/user/search-event/web')}}`;
         $.ajax({
            url: url,
            method: 'POST',
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
               search: query,
               date: date,
               city_id: city_id,
               category_id: category_id,
               limit: limit
            },
            success: function(data) {
               $('.upcomingEventsCon').html('');
               let events = [];
               if (Array.isArray(data)) {
                  events = data;
               } else if (data.data && Array.isArray(data.data)) {
                  events = data.data;
               }
               if (events.length === 0) {
                  let eventHtml = `<p> nothing found</p>`
                  $('.upcomingEventsCon').append(eventHtml);
               }
               events.forEach(item => {
                  let gallery = '';
                  if (item.gallery && item.gallery.length > 0) {
                     gallery = item.gallery.split(',').map(image => {
                        return `<div class="swiper-slide h-32 md:h-48"> <img class='w-full h-full object-cover' src="${item.imagePath}${image}" alt="${item.name}"> </div>`;
                     }).join('');
                  }
                  let day = dateFormat(item.time).day;
                  let month = dateFormat(item.time).shortMonth;
                  let eventHtml = `
                        <a href="/event/${item.id}/${item.slug}" class="swiper-slide">
                            <div class="ticket-wahlist h-full bg-light hover:bg-primary_color_o25_9 bg-opacity-5 rounded-2xl border border-primary_color_o10_1 hover:border-gray_9 overflow-hidden">
                            <div class="h-32 md:h-48">
                                 ${item.gallery && item.gallery.length > 0 ? 
                                    `<div class="swiper-event">
                                          <div class="swiper-wrapper">
                                            ${gallery}
                                          </div>
                                    </div>` 
                                    : 
                                    `<img class="w-full h-full object-cover" src="${item.imagePath}${item.image}" alt="${item.name}">`
                                 }
                              </div>
                                <div class="relative flex gap-1 md:gap-4 p-1 md:p-4 flex-wrap md:flex-nowrap flex-col lg:flex-row">
                                    <div class="text-center flex  items-baseline gap-1 md:gap-0 md:flex-col">
                                        <span class="text-primary_color_7 text-h7 font-bold uppercase f-bri">${month}
                                        </span>
                                        <span class="font-bold text-h7 lg:text-h3 f-bri text-primary_color_7 lg:text-white">${day}
                                        </span>
                                    </div>
                                    <div>
                                        <h5 class="text-h6 md:text-h5 font-medium  md:mb-2">
                                    ${ lang == 'ar' ? item.name_arabic : item.name }
                                        </h5>
                                        <p class="pline2 f-bri text-gray_6 text-h6">
                                        ${ lang == 'ar' ? item.short_description : item.short_description }
                                        </p>
                                    </div>
                                    <div class="wahlist  lg:hidden" id="${item.id}">
                                    <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M12.4531 3.39014L13.0156 2.87451C14.5625 1.32764 16.7656 0.624512 18.875 0.999512C22.1094 1.51514 24.5 4.32764 24.5 7.60889V7.84326C24.5 9.81201 23.6562 11.687 22.25 12.9995L13.7656 20.9214C13.4375 21.2495 12.9688 21.3901 12.5 21.3901C11.9844 21.3901 11.5156 21.2495 11.1875 20.9214L2.70312 12.9995C1.29688 11.687 0.5 9.81201 0.5 7.84326V7.60889C0.5 4.32764 2.84375 1.51514 6.07812 0.999512C8.1875 0.624512 10.3906 1.32764 11.9375 2.87451L12.4531 3.39014ZM12.4531 5.54639L10.8594 3.90576C9.6875 2.73389 8 2.17139 6.3125 2.45264C3.82812 2.87451 1.95312 5.03076 1.95312 7.60889V7.84326C1.95312 9.39014 2.60938 10.8433 3.73438 11.8745L12.2188 19.7964C12.2656 19.8901 12.3594 19.8901 12.4531 19.8901C12.5938 19.8901 12.6875 19.8901 12.7344 19.7964L21.2188 11.8745C22.3438 10.8433 23 9.39014 23 7.84326V7.60889C23 5.03076 21.125 2.87451 18.6406 2.45264C16.9531 2.17139 15.2656 2.73389 14.0938 3.90576L12.4531 5.54639Z" fill="#FBF9FD" fill-opacity="0.32"/>
                                   </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
                  $('.upcomingEventsCon').append(eventHtml);
               });
               setTimeout(initializeSwiper, 1000);

            }
         });
      }

      function dateFormat(date) {
         let dateObject = new Date(date);
         let dayOptions = {
            day: 'numeric'
         };
         let day = dateObject.toLocaleDateString('en-US', dayOptions);
         let monthOptions = {
            month: 'long'
         };
         let month = dateObject.toLocaleDateString('en-US', monthOptions);
         let shortMonth = month.substring(0, 3);

         return {
            day,
            shortMonth
         }
      }
   });

   $(document).ready(function() {
      $(function() {
         $(".datepicker").datepicker();
      });

      $('#event_date').change(function() {
         var selectedValue = $('#event_date select').val();
         if (selectedValue === 'choose_date') {
            $(this).hide();
            $('.clear-datepicker').show();
            $('#datepicker').removeClass('hidden').datepicker('show');
         }
      });

      $('.clear-datepicker').click(function() {
         $(this).hide();

         if ($('#event_date selec').val('all')) {
            $("#event_date select").val('all').trigger("change");
            $('#event_date ').show();
            $('#datepicker').addClass('hidden');
         }
      });

   });
</script>