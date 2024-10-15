@extends('front.master', ['activePage' => 'event'])
@section('title', __('Event Details'))
@php
$gmapkey = \App\Models\Setting::find(1)->map_key;
@endphp
@section('content')


@php

$minPrice = $data->paid_ticket->min('price');
$phone = \App\Models\Country::get();




use Illuminate\Support\Facades\Http;
$event_name=request()->route('name');


$event = null;

try {
// Use environment variable for the base URL
$baseUrl = env('API_BASE_URL', 'https://ticketby.co');
$response = Http::withOptions(['verify' => false])->get("{$baseUrl}/event/details/{$data->id}/{$event_name}");

if ($response->successful()) {
$event = $response->json();
//var_dump(value: $event['event']);
} else {
$error = $response->json();
}
} catch (\Exception $e) {
// Handle the exception
// Log the exception message or display an error message
}


$lang = session('direction') == 'rtl' ? 'ar' : 'en';

@endphp

<style type="text/css">
   .error {
      padding: 20px;
      color: #df3e3e;
   }
</style>

<div class="container mt-12 md:mt-16 ">
   <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-4">
      <div class="col-span-12 md:col-span-8 order-2 md:order-1 ">
         <h2 class="font-semibold text-h5 lg:text-h2">
            {{ $lang == 'ar' ? $event['event']['name_arabic'] :$event['event']['name'] }}
         </h2>
         <div class="mt-1 md:mt-2">
            <div class="flex items-center gap-1">
               <p class="flex gap-2  mt-2 items-center">
               <div>
                  <svg width="12" height="17" viewBox="0 0 12 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M8.5 6C8.5 7.40625 7.375 8.5 6 8.5C4.59375 8.5 3.5 7.40625 3.5 6C3.5 4.625 4.59375 3.5 6 3.5C7.375 3.5 8.5 4.625 8.5 6ZM6 7.5C6.8125 7.5 7.5 6.84375 7.5 6C7.5 5.1875 6.8125 4.5 6 4.5C5.15625 4.5 4.5 5.1875 4.5 6C4.5 6.84375 5.15625 7.5 6 7.5ZM12 6C12 8.75 8.34375 13.5938 6.71875 15.625C6.34375 16.0938 5.625 16.0938 5.25 15.625C3.625 13.5938 0 8.75 0 6C0 2.6875 2.65625 0 6 0C9.3125 0 12 2.6875 12 6ZM6 1C3.21875 1 1 3.25 1 6C1 6.5 1.15625 7.15625 1.5 8C1.84375 8.8125 2.3125 9.6875 2.875 10.5625C3.9375 12.2812 5.1875 13.9375 6 14.9375C6.78125 13.9375 8.03125 12.2812 9.09375 10.5625C9.65625 9.6875 10.125 8.8125 10.4688 8C10.8125 7.15625 11 6.5 11 6C11 3.25 8.75 1 6 1Z"
                        fill="#A986BF" />
                  </svg>
               </div>
               @if ( $event['event']['type']== 'online')
               <span> {{ __('Online Event') }}</span>
               @else
               <a target="_blank" href="@if( $event['event']['address_url']) {{$event['event']['address_url']}} @else # @endif"><span class="text-gray_9 md:text-white md:text-h5 text-h7">{{ $event['event']['address'] }}</span></a>
               @endif
               </p>
            </div>
            <div class="flex items-center gap-1 mt-1 md:mt-2">
               <p class="flex gap-2  mt-2 lg:mt-2 items-center">
               <div>
                  <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M3.5 0C3.75 0 4 0.25 4 0.5V2H10V0.5C10 0.25 10.2188 0 10.5 0C10.75 0 11 0.25 11 0.5V2H12C13.0938 2 14 2.90625 14 4V6.03125C13.8125 6.03125 13.6562 6 13.5 6C13.3125 6 13.1562 6.03125 13 6.03125V6H1V14C1 14.5625 1.4375 15 2 15H9.25C9.5625 15.4062 9.90625 15.7188 10.3125 16H2C0.875 16 0 15.125 0 14V4C0 2.90625 0.875 2 2 2H3V0.5C3 0.25 3.21875 0 3.5 0ZM12 3H2C1.4375 3 1 3.46875 1 4V5H13V4C13 3.46875 12.5312 3 12 3ZM13.4688 9C13.75 9 13.9688 9.25 13.9688 9.5V11H15C15.25 11 15.5 11.25 15.5 11.5C15.5 11.7812 15.25 12 15 12H13.4688C13.2188 12 12.9688 11.7812 12.9688 11.5V9.5C12.9688 9.25 13.2188 9 13.4688 9ZM9 11.5C9 9.03125 11 7 13.5 7C15.9688 7 18 9.03125 18 11.5C18 14 15.9688 16 13.5 16C11 16 9 14 9 11.5ZM13.5 15C15.4062 15 17 13.4375 17 11.5C17 9.59375 15.4062 8 13.5 8C11.5625 8 10 9.59375 10 11.5C10 13.4375 11.5625 15 13.5 15Z"
                        fill="#A986BF" />
                  </svg>
               </div>
               <span class="md:text-h5 text-h7 text-gray_9 md:text-white">
                  @if($event['event']['is_repeat']== 1 )
                  @if (session('direction') == 'rtl')
                  {{ Carbon\Carbon::now()->locale('ar')->translatedFormat('d M Y') }}
                  {{ Carbon\Carbon::parse($event['event']['start_time'])->locale('ar')->translatedFormat('h:i A') }}
                  @else
                  {{ Carbon\Carbon::now()->format('d M Y') }}
                  {{ Carbon\Carbon::parse($event['event']['start_time'])->translatedFormat('h:i A') }}
                  @endif
                  @else
                  {{ Carbon\Carbon::parse( $event['event']['end_time'])->format('d') }}
                  @if (session('direction') == 'rtl')
                  {{ Carbon\Carbon::parse($event['event']['end_time'])->locale('ar')->translatedFormat('M Y') }}
                  {{ Carbon\Carbon::parse($event['event']['end_time'])->locale('ar')->translatedFormat('h:i A') }}
                  @else
                  {{ Carbon\Carbon::parse($event['event']['end_time'])->format('M Y') }}
                  {{ Carbon\Carbon::parse($event['event']['end_time'])->translatedFormat('h:i A') }}
                  @endif
                  @endif
               </span>
               </p>
            </div>
         </div>
         <div class="mt-2 flex gap-2 flex-wrap">
            @php
            $tagsString = $event['event']['tags'];
            $tagsArray = array_filter(explode(',', $tagsString));
            $event['event']['tags'] = $tagsArray;
            @endphp

            @if(!empty($event['event']['tags']))
            @foreach($event['event']['tags'] as $tag)
            <div class="flex gap-1 items-center f-bri h7 bg-primary_color_8 bg-opacity-50 md:py-1 md:px-3 p-4-8  rounded-5xl w-fit">
               <svg class="hidden md:inline" width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.75 1.375C0.75 0.765625 1.24219 0.25 1.875 0.273438H5.36719C5.76562 0.273438 6.14062 0.414062 6.42188 0.695312L10.5469 4.82031C11.1328 5.40625 11.1328 6.36719 10.5469 6.95312L7.42969 10.0703C6.84375 10.6562 5.88281 10.6562 5.29688 10.0703L1.17188 5.94531C0.890625 5.66406 0.75 5.28906 0.75 4.89062V1.375ZM3.375 3.625C3.77344 3.625 4.125 3.29688 4.125 2.875C4.125 2.47656 3.77344 2.125 3.375 2.125C2.95312 2.125 2.625 2.47656 2.625 2.875C2.625 3.29688 2.95312 3.625 3.375 3.625Z" fill="#723995" />
               </svg>
               {{ $tag }}
            </div>
            @endforeach
            @endif

         </div>
      </div>
      <div class="col-span-12  md:col-span-4 bg-primary_color_16 md:bg-light md:rounded-xl rounded-lg  p-1 md:p-2 order-1 md:order-2">
         <div class="flex flex-row md:flex-col items-center  md:justify-center h-full	">
            <h5 class="text-gray_6 me-1 text-h8 md:text-h5"> <span class="hidden md:inline">{{__('Tickets')}}</span> {{__(key: ' starting at')}}</h5>
            <span class="md:text-h4 text-h7 text-dark font-medium">{{ __(key: $currency) }} {{$minPrice}}</span>
            <a href="#tickets_section" class="md:mt-4 rounded md:rounded-full bg-primary_color_8 p-1 md:p-12-24 flex items-center gap-2 cursor-pointer btn-hover-primary ms-auto md:ms-0 md:text-h5 text-h7">
               <span class="z-20">{{ __('Get Tickets') }}</span>
               <svg class="hidden md:block @if($lang == 'ar') rotate-180 @endif" width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                     d="M9.90625 1.24609L16.0938 7.15234C16.2695 7.32812 16.375 7.53906 16.375 7.78516C16.375 7.99609 16.2695 8.20703 16.0938 8.38281L9.90625 14.2891C9.58984 14.6055 9.02734 14.6055 8.71094 14.2539C8.39453 13.9375 8.39453 13.375 8.74609 13.0586L13.4219 8.62891H1.46875C0.976562 8.62891 0.625 8.24219 0.625 7.78516C0.625 7.29297 0.976562 6.94141 1.46875 6.94141H13.4219L8.74609 2.47656C8.39453 2.16016 8.39453 1.59766 8.71094 1.28125C9.02734 0.929688 9.55469 0.929688 9.90625 1.24609Z"
                     fill="#A986BF" />
               </svg>
            </a>
         </div>
      </div>
   </div>
</div>

<div class="container mt-4 lg:mt-16">
   @php
   $data->gallery = explode(',', $data->gallery);
   @endphp
   @if(is_array($data->gallery) && count($data->gallery) > 1)

   <div class="swiper event_details_swiper">
      <div class="swiper-wrapper">
         @foreach($data->gallery as $image)
         <div class="swiper-slide rounded-2xl">
            <img class="rounded-2xl" src="{{ url('images/upload/' . $image) }}" alt="">
         </div>
         @endforeach
      </div>
      @else
      <div class=" rounded-2xl  w-full h-full lg:w-96 lg:h-96 xl:w-w-500 xl:h-h-500 mx-auto">
         <img class="rounded-2xl h-full w-full object-cover" src="{{ url('images/upload/' . $data->image) }}" alt="Default Image">
      </div>
      @endif
   </div>
   <div class="swiper-scrollbar"></div>
</div>


<div class="container mt-12 md:mt-32">
   <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
      <div class=" bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1  p-2  md:p-32-24 ">
         <div class="flex gap-2 items-center">
            <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path
                  d="M11.125 8C11.125 9.75781 9.71875 11.125 8 11.125C6.24219 11.125 4.875 9.75781 4.875 8C4.875 6.28125 6.24219 4.875 8 4.875C9.71875 4.875 11.125 6.28125 11.125 8ZM8 9.875C9.01562 9.875 9.875 9.05469 9.875 8C9.875 6.98438 9.01562 6.125 8 6.125C6.94531 6.125 6.125 6.98438 6.125 8C6.125 9.05469 6.94531 9.875 8 9.875ZM15.5 8C15.5 11.4375 10.9297 17.4922 8.89844 20.0312C8.42969 20.6172 7.53125 20.6172 7.0625 20.0312C5.03125 17.4922 0.5 11.4375 0.5 8C0.5 3.85938 3.82031 0.5 8 0.5C12.1406 0.5 15.5 3.85938 15.5 8ZM8 1.75C4.52344 1.75 1.75 4.5625 1.75 8C1.75 8.625 1.94531 9.44531 2.375 10.5C2.80469 11.5156 3.39062 12.6094 4.09375 13.7031C5.42188 15.8516 6.98438 17.9219 8 19.1719C8.97656 17.9219 10.5391 15.8516 11.8672 13.7031C12.5703 12.6094 13.1562 11.5156 13.5859 10.5C14.0156 9.44531 14.25 8.625 14.25 8C14.25 4.5625 11.4375 1.75 8 1.75Z"
                  fill="#A986BF" />
            </svg>
            <h3 class="text-primary_color_6 font-medium text-h4 lg:text-h3">{{ __('Location') }}</h3>
         </div>
         <p class="text-h5 lg:h4 mt-4 font-light">
            {{ $lang == 'ar' ?$event['event']['name_arabic'] : $event['event']['name'] }}
         </p>
         <a href="https://maps.google.com/maps?daddr={{ $event['event']['lat']}},{{$event['event']['lang']}}&amp;ll=" class="mt-2 fs-h4 flex items-center gap-1 text-primary_color_3">{{__('Go to google maps')}}
            <svg class="@if($lang == 'ar') rotate-180 @endif" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M6.81405 2.73429L11.2444 7.48435C11.379 7.62888 11.4463 7.81444 11.4463 7.99997C11.4463 8.18554 11.379 8.37107 11.2444 8.5156L6.81405 13.2657C6.53328 13.5664 6.06599 13.5791 5.76996 13.295C5.47187 13.0098 5.46131 12.5333 5.7411 12.2344L9.69076 7.99997L5.7411 3.76554C5.46131 3.46672 5.47187 2.9921 5.76996 2.705C6.06599 2.42082 6.53328 2.4335 6.81405 2.73429Z" fill="#E0D3E8" />
            </svg>
         </a>
      </div>
      <div class=" bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1  p-2  md:p-32-24 ">
         <div class="flex gap-2 items-center">
            <svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M5.125 0.5C5.4375 0.5 5.75 0.8125 5.75 1.125V3H13.25V1.125C13.25 0.8125 13.5234 0.5 13.875 0.5C14.1875 0.5 14.5 0.8125 14.5 1.125V3H15.75C17.1172 3 18.25 4.13281 18.25 5.5V8.03906C18.0156 8.03906 17.8203 8 17.625 8C17.3906 8 17.1953 8.03906 17 8.03906V8H2V18C2 18.7031 2.54688 19.25 3.25 19.25H12.3125C12.7031 19.7578 13.1328 20.1484 13.6406 20.5H3.25C1.84375 20.5 0.75 19.4062 0.75 18V5.5C0.75 4.13281 1.84375 3 3.25 3H4.5V1.125C4.5 0.8125 4.77344 0.5 5.125 0.5ZM15.75 4.25H3.25C2.54688 4.25 2 4.83594 2 5.5V6.75H17V5.5C17 4.83594 16.4141 4.25 15.75 4.25ZM17.5859 11.75C17.9375 11.75 18.2109 12.0625 18.2109 12.375V14.25H19.5C19.8125 14.25 20.125 14.5625 20.125 14.875C20.125 15.2266 19.8125 15.5 19.5 15.5H17.5859C17.2734 15.5 16.9609 15.2266 16.9609 14.875V12.375C16.9609 12.0625 17.2734 11.75 17.5859 11.75ZM12 14.875C12 11.7891 14.5 9.25 17.625 9.25C20.7109 9.25 23.25 11.7891 23.25 14.875C23.25 18 20.7109 20.5 17.625 20.5C14.5 20.5 12 18 12 14.875ZM17.625 19.25C20.0078 19.25 22 17.2969 22 14.875C22 12.4922 20.0078 10.5 17.625 10.5C15.2031 10.5 13.25 12.4922 13.25 14.875C13.25 17.2969 15.2031 19.25 17.625 19.25Z" fill="#A986BF" />
            </svg>
            <h3 class="text-primary_color_6 font-medium text-h4 lg:text-h3">{{ __('Date and time') }}</h3>
         </div>
         <p class="text-h5 lg:h4 mt-4 font-light">
            {{ Carbon\Carbon::parse($event['event']['start_time'])->format('d M Y') }}
            {{__('till')}}
            {{ Carbon\Carbon::parse($event['event']['end_time'])->format('d M Y') }}
         </p>
         <a href="" class="mt-2 fs-h4 flex items-center gap-1 text-primary_color_3">{{__('Add to calendar')}}
            <svg class="@if($lang == 'ar') rotate-180 @endif" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M6.81405 2.73429L11.2444 7.48435C11.379 7.62888 11.4463 7.81444 11.4463 7.99997C11.4463 8.18554 11.379 8.37107 11.2444 8.5156L6.81405 13.2657C6.53328 13.5664 6.06599 13.5791 5.76996 13.295C5.47187 13.0098 5.46131 12.5333 5.7411 12.2344L9.69076 7.99997L5.7411 3.76554C5.46131 3.46672 5.47187 2.9921 5.76996 2.705C6.06599 2.42082 6.53328 2.4335 6.81405 2.73429Z" fill="#E0D3E8" />
            </svg>
         </a>
      </div>
   </div>
   <div class="h-40 lg:h-h-424 mt-4 lg:mt-8 bg-location bg-opacity-5 rounded-2xl border border-primary_color_o10_1  p-2  md:p-32-24 flex items-center justify-center">

   </div>
   <div class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1  p-2  md:p-32-24 mt-4 lg:mt-8">
      <h3 class="text-primary_color_6 font-medium text-h4 lg:text-h3">{{ __('About Event') }}</h3>
      <p class="h5 lg:h4 mt-4 paragraph-3 max-h-96 overflow-x-auto ">
         {!! $lang == 'ar' ?strip_tags($event['event']['description_arabic']): strip_tags($event['event']['description'] )!!}
      </p>
      <span class="flex items-center gap-2 mt-3 py-1 cursor-pointer">
         <span class="h7 lg:h4 showMore"><span class="more">{{__(key: 'Show more ...')}}</span> <span class="less hidden"> {{__(key: 'Show less ...')}}</span></span>
      </span>
   </div>
   <div class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1  p-2  md:p-32-24 mt-4 lg:mt-8">
      <div data-accordion="terms_conditions" class="accordion flex items-center   justify-between cursor-pointer">
         <h3 class="text-primary_color_6 font-medium text-h4 lg:text-h3">{{__( 'Terms and conditions')}}</h3>
         <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
               d="M7.28125 8.71875L1.28125 2.71875C0.875 2.34375 0.875 1.6875 1.28125 1.3125C1.65625 0.90625 2.3125 0.90625 2.6875 1.3125L8 6.59375L13.2812 1.3125C13.6562 0.90625 14.3125 0.90625 14.6875 1.3125C15.0938 1.6875 15.0938 2.34375 14.6875 2.71875L8.6875 8.71875C8.3125 9.125 7.65625 9.125 7.28125 8.71875Z"
               fill="#E0D3E8" />
         </svg>
      </div>
      <div id="terms_conditions" class="hidden h4 mt-4">
         <p>{{__(key: 'Content for Terms and conditions.')}}</p>
      </div>
   </div>
</div>


@if($event['event']['is_repeat']== 1 )

<div class="container mt-20 md:mt-32" id="tickets_section">
   <!-- ticket type -->
   <div class="mb-10 md:mb-16 ">
      <div>
         <h2 class="font-medium h3 lg:text-h2"> {{__(key: 'Select ticket type')}}</h2>
         <p class="text-gray_9 text-h4">{{__( 'Choose your suitable ticket type.')}}</p>
      </div>
   </div>
   <div class="mb-10 lg:mb-16 grid grid-cols-3 xl:grid-cols-6  gap-1">
      @foreach ($event['event']['paid_ticket'] as $ticket)
      <div id="{{$ticket['id']}}" data-start_time="{{$ticket['start_time']}}" data-end_time="{{$ticket['end_time']}}"
         class=" slotEvent cursor-pointer bg-primary_color_12  hover:bg-primary_color_8   hover:border-primary_color_6  hover:bg-opacity-25 rounded-2xl border border-primary_color_o25_8 py-1 lg:py-4  px-3  text-center inner-hover transition">
         <h3 class="font-bold text-h5 lg:text-h3">{{$ticket['name']}} </h3>
         <div class="f-bri h5 font-bold mt-3">{{ __(key: $currency) }} {{$ticket['price']}}</div>
      </div>
      @endforeach
   </div>

   <!-- ticket slot -->
   <div class="mb-10 lg:mb-16  hidden justify-between flex-wrap " id="slot-slider">
      <div>
         <h2 class="font-medium h3 lg:text-h2"> {{__(key: 'Select your desirable tickets')}}</h2>
         <p class="text-gray_9 text-h4">{{__( 'Choose your ticket and quantity.')}}</p>
      </div>
      <div class="flex gap-1 mt-3 md:mt-0">
         <button class=" bg-gray_f   h-12 p-1 px-4 rounded-5xl text-h6" id="tomorrow-slot">{{__('Tomorrow')}}</button>
         <div id="datepicker-cont" class="datepicker-container event-date relative  bg-gray_f   h-12 p-1 px-4 rounded-5xl   gap-1 flex items-center cursor-pointer w-40 ">
            <input type="text" name="" placeholder="{{__( 'Custom date')}}" id="datepicker" class="slotEventCustome text-h6 datepicker cursor-pointer placeholder-white w-full  f-bri bg-transparent outline-0  ">
            <svg id="slot-arrow" width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M6.37109 6.87891L1.12109 1.62891C0.765625 1.30078 0.765625 0.726562 1.12109 0.398438C1.44922 0.0429688 2.02344 0.0429688 2.35156 0.398438L7 5.01953L11.6211 0.398438C11.9492 0.0429688 12.5234 0.0429688 12.8516 0.398438C13.207 0.726562 13.207 1.30078 12.8516 1.62891L7.60156 6.87891C7.27344 7.23438 6.69922 7.23438 6.37109 6.87891Z" fill="#666666" />
            </svg>
            <svg class="hidden" id="clear-slot" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M8 16C3.5625 16 0 12.4375 0 8C0 3.59375 3.5625 0 8 0C12.4062 0 16 3.59375 16 8C16 12.4375 12.4062 16 8 16ZM5.46875 5.46875C5.15625 5.78125 5.15625 6.25 5.46875 6.53125L6.9375 8L5.46875 9.46875C5.15625 9.78125 5.15625 10.25 5.46875 10.5312C5.75 10.8438 6.21875 10.8438 6.5 10.5312L7.96875 9.0625L9.4375 10.5312C9.75 10.8438 10.2188 10.8438 10.5 10.5312C10.8125 10.25 10.8125 9.78125 10.5 9.46875L9.03125 8L10.5 6.53125C10.8125 6.25 10.8125 5.78125 10.5 5.46875C10.2188 5.1875 9.75 5.1875 9.4375 5.46875L7.96875 6.9375L6.5 5.46875C6.21875 5.1875 5.75 5.1875 5.46875 5.46875Z" fill="#999999" />
            </svg>
         </div>
      </div>
   </div>
   <div class="relative">
      <div class="swiper ticket_avail">
         <div class="swiper-wrapper slotEvent-container"></div>
      </div>
   </div>
</div>
<div class="container mt-4 lg:mt-16">
   <div class=" bg-light rounded-2xl p-1 md:px-p32 md:py-5 ">
      <form id="ticketSlot" class="" method="GET" action="{{ url('/checkout/' . $data->id) }}">
         <input value="" type="hidden" class="slot-event-id" name="time_slot_id[]" id="">
         <input value="" type="hidden" class="ids" name="ids[]" id="">
         <input value="" type="hidden" class="slot-event-date" name="slot-event-date" id="">
         <input type="hidden" class="slot-event-quantities" name="quantities[52]" value="0" id="quantity-52">
         <div id="tickets-info" class="hidden grid  grid-cols-12 gap-4  items-center ">
            <div class="col-span-12 md:col-span-8 lg:col-span-8 xl:col-span-6 ">
               <div class="grid grid-cols-2  gap-1 md:gap-4">
                  <div class=" col-span-1 md:col-span-1  border-line">
                     <div class="flex mt-4 items-center justify-center gap-4">
                        <button type="button" id="decrement-slot" class="decrement" data-ticket-price="10" data-ticket-id="88">
                           <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="0.5" width="31" height="31" rx="7.5" fill="#FBF9FD" stroke="#723995"></rect>
                              <path d="M9.5 16H23.5" stroke="#723995" stroke-width="2" stroke-linecap="round"></path>
                           </svg>
                        </button>
                        <div class="count text-primary_color_8 ">1</div>
                        <button type="button" id="increment-slot" class="increment " data-ticket-price="10" data-ticket-id="88">
                           <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="0.5" width="31" height="31" rx="7.5" fill="#FBF9FD" stroke="#723995"></rect>
                              <path d="M9.5 16H23.5" stroke="#723995" stroke-width="2" stroke-linecap="round"></path>
                              <path d="M16.5 9L16.5 23" stroke="#723995" stroke-width="2" stroke-linecap="round"></path>
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="col-span-1 ">
                     <h4 class="w-fit text-center lg:text-start mx-auto lg:mx-0">
                        <span class="block text-gray_6 font-light mb-1 text-h5 lg:text-h4">{{ __('Total') }} </span>
                        <span class="block text-dark font-medium  text-h5 lg:text-h4">{{ __($currency) }} <span class="tickets-price">0</span> </span>
                     </h4>
                  </div>
               </div>
            </div>
            <div class="col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-6 ">
               <button id="checkAuthButton"
                  class="rounded-full bg-primary_color_8 p-12-24 flex items-center gap-2     m-auto md:m-0  @if($lang == 'ar') md:mr-auto @else md:ml-auto lg:mr-0  @endif btn-hover-primary">
                  <span class="z-10"> {{ __('Buy Tickets') }}</span>
                  <svg class="@if($lang == 'ar') rotate-180 @endif" width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M9.90625 1.24609L16.0938 7.15234C16.2695 7.32812 16.375 7.53906 16.375 7.78516C16.375 7.99609 16.2695 8.20703 16.0938 8.38281L9.90625 14.2891C9.58984 14.6055 9.02734 14.6055 8.71094 14.2539C8.39453 13.9375 8.39453 13.375 8.74609 13.0586L13.4219 8.62891H1.46875C0.976562 8.62891 0.625 8.24219 0.625 7.78516C0.625 7.29297 0.976562 6.94141 1.46875 6.94141H13.4219L8.74609 2.47656C8.39453 2.16016 8.39453 1.59766 8.71094 1.28125C9.02734 0.929688 9.55469 0.929688 9.90625 1.24609Z"
                        fill="#A986BF"></path>
                  </svg>
               </button>
            </div>
         </div>
      </form>
      <h4 id="tickets-alert" class="  text-gray_6 flex items-center justify-center gap-2 text-h5 lg:text-h4 py-3">{{__( 'Choose your tickets to continue')}}
         <span>
            <svg class="@if($lang == 'ar') rotate-180 @endif" width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path
                  d="M9.40625 0.746094L15.5938 6.65234C15.7695 6.82812 15.875 7.03906 15.875 7.28516C15.875 7.49609 15.7695 7.70703 15.5938 7.88281L9.40625 13.7891C9.08984 14.1055 8.52734 14.1055 8.21094 13.7539C7.89453 13.4375 7.89453 12.875 8.24609 12.5586L12.9219 8.12891H0.96875C0.476562 8.12891 0.125 7.74219 0.125 7.28516C0.125 6.79297 0.476562 6.44141 0.96875 6.44141H12.9219L8.24609 1.97656C7.89453 1.66016 7.89453 1.09766 8.21094 0.78125C8.52734 0.429688 9.05469 0.429688 9.40625 0.746094Z"
                  fill="#A986BF" />
            </svg>
         </span>
      </h4>
   </div>
</div>
@else
<div class="container mt-20 md:mt-32" id="tickets_section">
   <div class="mb-10 md:mb-16">
      <h2 class="font-medium h3 lg:text-h2">{{__( 'Tickets options')}}</h2>
      <p class="h5 lg:h4  mt-1 lg:mt-1 text-gray_9">{{__( 'Choose your ticket and quantity.')}}</p>
   </div>
</div>

@if (count(value:$event['event']['paid_ticket']) != 0)
<form id="tickets" class="mb-32" method="GET" action="{{ url('/checkout/' . $data->id) }}">
   <div class="container ">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16">
         @foreach ($data->paid_ticket as $item)
         <div class="bg-primary_color_12  hover:border-primary_color_7 transition-all rounded-2xl border border-primary_color_o25_8  p-2  md:p-32-24 text-center">
            <input value="{{ $item->id }}" type="hidden" name="ids[]" id="id-{{ $item->id }}">
            <input type="hidden" name="quantities[{{ $item->id }}]" value="0" id="quantity-{{ $item->id }}">
            <input value="0" type="hidden" name="google_login" id="google_login" class="google_login"> 
            <h3 class="font-bold"> {{ $lang == 'ar' ? $item->name_arabic : $item->name }}
            </h3>
            <div class="text-gray_9 h6 my-4 flex flex-col">
               <span> {{ \Carbon\Carbon::parse($item->start_time)->diffInDays(\Carbon\Carbon::parse($item->end_time)) }} {{__('Days')}}
               </span>
               <span class="my-1">{{ __('Ticket Sale starts onwards') }}</span>
               <span>
                  {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} {{__('till')}}
                  {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
               </span>
            </div>
            <div class="f-bri">
               <span class="h4">{{ __($currency) }}</span>
               <span class="h5 md:text-h3 font-bold"> {{ $item->price }}</span>
            </div>
            <div class="flex mt-4 items-center justify-center gap-4">
               <button type="button" class="disable decrement opacity-25" data-ticket-price="{{ $item->price }}" data-ticket-id="{{ $item->id }}">
                  <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect x="1" y="0.5" width="31" height="31" rx="7.5" fill="#FBF9FD" stroke="#723995" />
                     <path d="M9.5 16H23.5" stroke="#723995" stroke-width="2" stroke-linecap="round" />
                  </svg>
               </button>
               <div class="count" class="f-bri h3 opacity-25">0</div>
               <button type="button" class="increment " data-ticket-price="{{ $item->price }}" data-ticket-id="{{ $item->id }}">
                  <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect x="1" y="0.5" width="31" height="31" rx="7.5" fill="#FBF9FD" stroke="#723995" />
                     <path d="M9.5 16H23.5" stroke="#723995" stroke-width="2" stroke-linecap="round" />
                     <path d="M16.5 9L16.5 23" stroke="#723995" stroke-width="2" stroke-linecap="round" />
                  </svg>
               </button>
            </div>
         </div>
         @endforeach
      </div>
   </div>

   <div class="container mt-4 lg:mt-16">
      <div class=" bg-light rounded-2xl p-1 md:px-p32 md:py-5   ">
         <div id="tickets-info" class="hidden grid  grid-cols-12 gap-4  items-center ">
            <div class="col-span-12 md:col-span-8 lg:col-span-8 xl:col-span-6 ">
               <div class="grid grid-cols-2  gap-1 md:gap-4">
                  <div class="hidden col-span-1 md:col-span-1  border-line">
                     <div class="flex mt-4 items-center justify-center gap-4">
                        <button type="button" class="decrement" data-ticket-price="10" data-ticket-id="88">
                           <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="0.5" width="31" height="31" rx="7.5" fill="#FBF9FD" stroke="#723995"></rect>
                              <path d="M9.5 16H23.5" stroke="#723995" stroke-width="2" stroke-linecap="round"></path>
                           </svg>
                        </button>
                        <div class="count text-primary_color_8 ">1</div>
                        <button type="button" class="increment " data-ticket-price="10" data-ticket-id="88">
                           <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="0.5" width="31" height="31" rx="7.5" fill="#FBF9FD" stroke="#723995"></rect>
                              <path d="M9.5 16H23.5" stroke="#723995" stroke-width="2" stroke-linecap="round"></path>
                              <path d="M16.5 9L16.5 23" stroke="#723995" stroke-width="2" stroke-linecap="round"></path>
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="col-span-1   border-line text-center md:text-start">
                     <h4 class="w-full md:w-fit ">
                        <span class="block text-gray_6 font-light mb-1 text-h5 lg:text-h4">{{__( 'Quantity')}}</span>
                        <span class="block text-dark font-medium text-h5 lg:text-h4 "><span class="tickets-quantity">0</span> </span>
                     </h4>
                  </div>
                  <div class="col-span-1 text-center md:text-start ">
                     <h4 class="w-full md:w-fit ">
                        <span class="block text-gray_6 font-light mb-1 text-h5 lg:text-h4">{{ __('Total') }} </span>
                        <span class="block text-dark font-medium  text-h5 lg:text-h4">{{ __($currency) }} <span class="tickets-price">0</span> </span>
                     </h4>
                  </div>
               </div>
            </div>
            <div class="col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-6 ">
               <button id="checkAuthButton"
                  class="rounded-full bg-primary_color_8 p-12-24 flex items-center gap-2 m-auto md:m-0  @if($lang == 'ar') md:mr-auto @else md:ml-auto lg:mr-0  @endif  btn-hover-primary">
                  <span class="z-10 "> {{ __('Buy Tickets') }}</span>
                  <svg class="@if($lang == 'ar') rotate-180 @endif" width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M9.90625 1.24609L16.0938 7.15234C16.2695 7.32812 16.375 7.53906 16.375 7.78516C16.375 7.99609 16.2695 8.20703 16.0938 8.38281L9.90625 14.2891C9.58984 14.6055 9.02734 14.6055 8.71094 14.2539C8.39453 13.9375 8.39453 13.375 8.74609 13.0586L13.4219 8.62891H1.46875C0.976562 8.62891 0.625 8.24219 0.625 7.78516C0.625 7.29297 0.976562 6.94141 1.46875 6.94141H13.4219L8.74609 2.47656C8.39453 2.16016 8.39453 1.59766 8.71094 1.28125C9.02734 0.929688 9.55469 0.929688 9.90625 1.24609Z"
                        fill="#A986BF"></path>
                  </svg>
               </button>
            </div>
         </div>
         <h4 id="tickets-alert" class="  text-gray_6 flex items-center justify-center gap-2 text-h5 lg:text-h4 py-3 ">{{__( 'Choose your tickets to continue')}}
            <span>
               <svg class="@if($lang == 'ar') rotate-180 @endif" width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                     d="M9.40625 0.746094L15.5938 6.65234C15.7695 6.82812 15.875 7.03906 15.875 7.28516C15.875 7.49609 15.7695 7.70703 15.5938 7.88281L9.40625 13.7891C9.08984 14.1055 8.52734 14.1055 8.21094 13.7539C7.89453 13.4375 7.89453 12.875 8.24609 12.5586L12.9219 8.12891H0.96875C0.476562 8.12891 0.125 7.74219 0.125 7.28516C0.125 6.79297 0.476562 6.44141 0.96875 6.44141H12.9219L8.24609 1.97656C7.89453 1.66016 7.89453 1.09766 8.21094 0.78125C8.52734 0.429688 9.05469 0.429688 9.40625 0.746094Z"
                     fill="#A986BF" />
               </svg>
            </span>
         </h4>
      </div>

   </div>
</form>
@else
<div class="container mb-32">
   <div class="bg-primary_color_12  rounded-2xl border   border-primary_color_o25_8  p-2  md:p-32-24 text-center ">
      <h3 class="font-bold text-h5 lg:text-h3"> {{ __('No tickets available.') }} </h3>
   </div>
</div>
@endif
@endif




<!-- user popup -->
<div id="register_popup" class="hidden pop-modal fixed inset-0 flex items-center justify-center bg-dark bg-opacity-75 p-2 z-50  ">
   <div class="bg-dark_4  rounded-2xl   p-2  md:p-32-32 relative w-w-500">
      <!-- register popup -->
      <div id="register-model" class="relative hidden form-container">
         <div class="mb-6 md:mb-7  ">
            <h2 class="text-h3 md:text-h2 text-primary_color_5 font-medium">{{__( 'Sign up to continue')}}</h2>
            <h4 class="text-gray_9 lg:text-h4 text-h6 mt-1 ">{{__( 'Welcome to Ticketby. Please enter your details.')}}</h4>
         </div>
         <div id="responceMessage " class="mb-2 responceMessage hidden text-center">
            <div class="mx-auto flex items-center justify-center bg-light bg-opacity-5 rounded-full w-14 h-14 border border-primary_color_o10_1   mb-5 fa-bounce">
               <i class="fa-solid  fa-2x text-white "></i>
            </div>
            <h4 class="text-white massage"></h4>
         </div>
         <div id="errorMessages" class=" errorMessages hidden text-center rounded-md mb-1 border border-red bg-red_light p-1 text-h8 ">
            <i class="fa-solid fa-triangle-exclamation text-white"></i>
            <span class="messages"></span>
         </div>
         <form id="registerForm" class=" max-w-lg">
            @csrf
            <input type="hidden" value="user" checked name="user_type">
            <input type="hidden" name="checkout" value="checkout">

            <div class=" mb-2">
               <input type="text" name="name" required placeholder="{{ __('full Name') }}"
                  class=" mt-1 w-full focus:border-primary_color_6 outline-0 bg-transparent  border border-gray_s p-3 md:p-16-16 rounded-lg text-white">
            </div>
            <div class="mb-2">
               <div class="flex gap-1 border-gray_s rounded-lg border items-center mt-1 px-2">
                  <select id="countries" name="Countrycode" required
                     class="select2 basis-2/6  w-full focus:border-primary_color_6 outline-0 bg-transparent     p-3 md:p-16-16  text-white">
                     <option value="" disabled selected>{{ __('Select Country') }}</option>
                     @foreach ($phone as $item)
                     <option class=" " value="{{ $item->phonecode }}" @if($item->phonecode == "966") selected @endif>
                        +{{$item->phonecode }}
                     </option>
                     @endforeach
                  </select>
                  <input type="number" name="phone" required placeholder=" {{ __('Mobile number') }}"
                     class="  w-full focus:border-primary_color_6 outline-0 bg-transparent    p-3 md:py-2  text-white">
               </div>
            </div>
            <div class="mb-2">
               <input type="email" name="email" required placeholder="{{ __('Email') }}"
                  class="mt-1 w-full focus:border-primary_color_6 outline-0 bg-transparent  border border-gray_s  p-3 md:p-16-16 rounded-lg text-white">
            </div>
            <div class="mb-2">
               <input type="password" name="password" id="password" required placeholder="******"
                  class="mt-1 w-full focus:border-primary_color_6 outline-0 bg-transparent  border border-gray_s  p-3 md:p-16-16 rounded-lg text-white">
            </div>
            <button id="submitRegisterForm" class="rounded-full bg-primary_color_8 p-12-24 w-full block mt-7 text-center">{{__( 'Sign up')}}
            </button>
            <p class="h7 lg:h5 mt-3 text-gray_9">{{ __('By signing up you agree to our') }} <a href="" class="text-primary_color_6"> terms and conditions</a></p>
         </form>
         <div>
            <p class="text-light text-center mb-7 mt-7 line-thr ">or login with</p>
            <div class="flex gap-7">
               <a href="javascript:void(0)" id="Google-login" class="bg-gray_35 rounded-2xl flex items-center gap-1 px-2 py-3 flex-1 justify-center">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M15.25 8.1875C15.25 12.625 12.2188 15.75 7.75 15.75C3.4375 15.75 0 12.3125 0 8C0 3.71875 3.4375 0.25 7.75 0.25C9.8125 0.25 11.5938 1.03125 12.9375 2.28125L10.8125 4.3125C8.0625 1.65625 2.9375 3.65625 2.9375 8C2.9375 10.7188 5.09375 12.9062 7.75 12.9062C10.8125 12.9062 11.9688 10.7188 12.125 9.5625H7.75V6.90625H15.125C15.1875 7.3125 15.25 7.6875 15.25 8.1875Z" fill="#FBF9FD" />
                  </svg>
                  Google</a>
            </div>
         </div><span class=" close-modal absolute    @if($lang == 'ar') left-0 @else right-0 @endif  top-0 cursor-pointer">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M10 20.5C4.45312 20.5 0 16.0469 0 10.5C0 4.99219 4.45312 0.5 10 0.5C15.5078 0.5 20 4.99219 20 10.5C20 16.0469 15.5078 20.5 10 20.5ZM6.83594 7.33594C6.44531 7.72656 6.44531 8.3125 6.83594 8.66406L8.67188 10.5L6.83594 12.3359C6.44531 12.7266 6.44531 13.3125 6.83594 13.6641C7.1875 14.0547 7.77344 14.0547 8.125 13.6641L9.96094 11.8281L11.7969 13.6641C12.1875 14.0547 12.7734 14.0547 13.125 13.6641C13.5156 13.3125 13.5156 12.7266 13.125 12.3359L11.2891 10.5L13.125 8.66406C13.5156 8.3125 13.5156 7.72656 13.125 7.33594C12.7734 6.98438 12.1875 6.98438 11.7969 7.33594L9.96094 9.17188L8.125 7.33594C7.77344 6.98438 7.1875 6.98438 6.83594 7.33594Z" fill="#6C6C6D" />
            </svg>
         </span>
         <div class="  f-bri mt-7 md:mt-7 text-center text-primary_color_6">
            <span class="text-h5 lg:text-h5 font-bold">{{__( 'Already have account')}}</span>
            <button data-form-user="login-model" class="from-switch text-h5 lg:text-h5 font-bold underline">{{__( 'sign in')}}</button>
         </div>
      </div>
      <!-- login popup -->
      <div id="login-model" class="relative hidden form-container  ">
         <div class="mb-6 md:mb-7  pb-2">
            <h2 class="text-h3 md:text-h2 text-primary_color_5 font-medium"> {{__( 'login to continue')}}</h2>
            <h4 class="text-gray_9 lg:text-h4 text-h6 mt-1  ">{{__( 'Welcome back')}}</h4>
         </div>
         <div id="responceMessage " class="mb-2 responceMessage hidden text-center">
            <div class="mx-auto flex items-center justify-center bg-light bg-opacity-5 rounded-full w-14 h-14 border border-primary_color_o10_1   mb-5 fa-bounce">
               <i class="fa-solid  fa-2x text-white "></i>
            </div>
            <h4 class="text-white massage"></h4>
         </div>
         <div id="errorMessages" class="errorMessages hidden text-center rounded-md mb-1 border border-red bg-red_light p-1 text-h8 ">
            <i class="fa-solid fa-triangle-exclamation text-white"></i>
            <span class="messages"></span>
         </div>
         <form id="login_form" action="{{ url('/web/login') }}" method="POST" class=" min-w ">
            @csrf
            <div class="mb-2">
               <div class="flex gap-1 border-gray_s rounded-lg border items-center mt-1 px-2">
                  <select id="countriescode" name="Countrycode" required
                     class="hidden-imp select2 basis-2/6  w-full focus:border-primary_color_6 outline-0 bg-transparent     p-3 md:p-16-16  text-white">
                     <option value="" disabled selected>{{ __('Select Country') }}</option>
                     @foreach ($phone as $item)
                     <option class=" " value="{{ $item->phonecode }}" @if($item->phonecode == "966") selected @endif>
                        +{{$item->phonecode }}
                     </option>
                     @endforeach
                  </select>
                  <input type="text" value="" name="user_name" required placeholder="{{ __('Mobile number or email') }}"
                     class="  w-full focus:border-primary_color_6 outline-0 bg-transparent    p-3 md:py-2  text-white">
               </div>
               <!-- <input type="text" value="" name="user_name" placeholder="{{ __('Mobile number or email') }}"
                  class="text-white bg-transparent  border border-gray_s mt-1 w-full focus:border-primary_color_6  outline-0    rounded-lg  p-16-16  "> -->
               @error('email')
               <div class="_2OcwfRx4" data-qa="email-status-message">{{ $message }}</div>
               @enderror
               @if (Session::has('error_msg'))
               <div class="mt-1 _2OcwfRx4 text-danger" data-qa="email-status-message">
                  <strong>{{ Session::get('error_msg') }}</strong>
               </div>
               @endif
            </div>

            <button class="rounded-full bg-primary_color_8 p-12-24 w-full block mt-8 text-center"> {{__( 'Get code')}}
            </button>
         </form>
         <span class=" close-modal absolute  @if($lang == 'ar') left-0 @else right-0 @endif  top-0 cursor-pointer">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M10 20.5C4.45312 20.5 0 16.0469 0 10.5C0 4.99219 4.45312 0.5 10 0.5C15.5078 0.5 20 4.99219 20 10.5C20 16.0469 15.5078 20.5 10 20.5ZM6.83594 7.33594C6.44531 7.72656 6.44531 8.3125 6.83594 8.66406L8.67188 10.5L6.83594 12.3359C6.44531 12.7266 6.44531 13.3125 6.83594 13.6641C7.1875 14.0547 7.77344 14.0547 8.125 13.6641L9.96094 11.8281L11.7969 13.6641C12.1875 14.0547 12.7734 14.0547 13.125 13.6641C13.5156 13.3125 13.5156 12.7266 13.125 12.3359L11.2891 10.5L13.125 8.66406C13.5156 8.3125 13.5156 7.72656 13.125 7.33594C12.7734 6.98438 12.1875 6.98438 11.7969 7.33594L9.96094 9.17188L8.125 7.33594C7.77344 6.98438 7.1875 6.98438 6.83594 7.33594Z" fill="#6C6C6D" />
            </svg>
         </span>
         <div class="f-bri mt-7 text-center text-primary_color_6">
            <span class="text-white"> {{__( 'Don’t have account?')}}</span>
            <button data-form-user="register-model" class="from-switch text-h5 lg:text-h5 font-bold underline">{{__( 'sign up')}}</button>
         </div>
      </div>
      <!-- otp -->
      <div id="otp-model" class="hidden px-2 lg:px-0 pop-modal fixed inset-0 flex items-center justify-center bg-dark bg-opacity-75  z-30  ">
         <div class="bg-dark_4  rounded-2xl   p-2  md:p-32-32 relative w-w-500">
            <div class="mb-6 md:mb-7  pb-2">
               <div class="flex items-center gap-1">
                  <button id="returnTosign" class="@if($lang == 'ar') rotate-180 @endif">
                     <svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.601562 8.64062L8.10156 1.14062C8.57031 0.632812 9.39062 0.632812 9.85938 1.14062C10.3672 1.60938 10.3672 2.42969 9.85938 2.89844L3.25781 9.5L9.85938 16.1406C10.3672 16.6094 10.3672 17.4297 9.85938 17.8984C9.39062 18.4062 8.57031 18.4062 8.10156 17.8984L0.601562 10.3984C0.09375 9.92969 0.09375 9.10938 0.601562 8.64062Z" fill="#C4ACD3" />
                     </svg>
                  </button>
                  <h2 class="text-h3 md:text-h2 text-primary_color_5 font-medium"> {{__( 'Verification')}}</h2>
               </div>
               <h4 class="text-gray_9 lg:text-h4 text-h6 mt-1 ">{{__( 'Enter the 4-digit we just sent to your email')}}</h4>
            </div>

            <form id="verificationForm" class="verification">
               @csrf
               <input type="hidden" name="otp" required id="otpField">
               <input type="hidden" name='id' id="user_id" value="">
               <div id="verification" class="flex @if($lang == 'ar') flex-row-reverse @endif">
                  <input type="number" autofocus maxlength="1" class=" text-center verification-pass h-16 w-16 col-span-1 mx-auto outline-0 focus:border-primary_color_6 text-white bg-transparent border border-gray_s p-16-16 rounded-lg" oninput="moveToNext(this, 1)" data-val="p-1">
                  <input type="number" maxlength="1" class="disabled text-center verification-pass h-16 w-16 col-span-1 mx-auto outline-0 focus:border-primary_color_6 text-white bg-transparent border border-gray_s p-16-16 rounded-lg" oninput="moveToNext(this, 2)" data-val="p-2">
                  <input type="number" maxlength="1" class="disabled text-center verification-pass h-16 w-16 col-span-1 mx-auto outline-0 focus:border-primary_color_6 text-white bg-transparent border border-gray_s p-16-16 rounded-lg" oninput="moveToNext(this, 3)" data-val="p-3">
                  <input type="number" maxlength="1" class="disabled text-center verification-pass h-16 w-16 col-span-1 mx-auto outline-0 focus:border-primary_color_6 text-white bg-transparent border border-gray_s p-16-16 rounded-lg" oninput="moveToNext(this, 4)" data-val="p-4">
               </div>
               <p class="error" id="login-error"></p>
               <button type="button" id="confirmButton" class="rounded-full bg-primary_color_8 p-12-24 w-full block mt-7 text-center">{{__('Confirm')}}</button>
            </form>
         </div>
      </div>
      <!--  password popup -->
      <div id="password-model" class="hidden form-container">
         <div class="mb-6 md:mb-7  pb-2">
            <h2 class="text-h3 md:text-h2 text-primary_color_5 font-medium">{{ __('Forgot password') }} </h2>
            <h4 class="text-gray_9 lg:text-h4 text-h6 mt-1 ">{{ __('Please enter your email to reset the password') }}</h4>
         </div>
         <div id="responceMessage " class="mb-2 responceMessage hidden text-center">
            <div class="mx-auto flex items-center justify-center bg-light bg-opacity-5 rounded-full w-14 h-14 border border-primary_color_o10_1   mb-5 fa-bounce">
               <i class="fa-solid  fa-2x text-white "></i>
            </div>
            <h4 class="text-white massage"></h4>
         </div>
         <form id="resetPasswordForm">
            @csrf
            <input type="hidden" value="user" name="type">
            <div class="mb-2">
               <input name="email" type="email" placeholder="{{__( 'Email')}}"
                  class="text-dark mt-1 w-full focus:border-primary_color_6 outline-0  bg-light p-16-16 rounded-lg "
                  id="">
               @error('email')
               <div class="text-danger font-medium">{{ $message }}</div>
               @enderror
            </div>
            <button id="submitResetForm" class="rounded-full bg-primary_color_8 p-12-24 w-full block mt-8 text-center">{{ __('Reset Password') }}
            </button>
         </form>
         <span class=" close-modal absolute -top-50 left-0 cursor-pointer">
            <i class="fa-regular fa-circle-xmark fa-2xl my-6"></i></span>
      </div>
   </div>
</div>



@if (!Auth::guard('appuser')->check())
<script>
   var isAuthenticated = false;
</script>
@endif



<div class="spinner" id="spinner"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script script>

   $('#Google-login').on('click', function(e) {
      $('.google_login').val(1);
       $('#tickets').submit();
            
   });
   // $('#Google-login').on('click', function(e) {
   //    $.ajax({
   //       url: 'https://ticketby.co/api/social-login',
   //       type: 'POST',
   //       data: {
   //          date: {
   //             email: 'kabir@gmail.com',
   //             name: 'kabir',
   //             google_id: 'asdsd'
   //          }
   //       },
   //       headers: {
   //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //       },
   //       success: function(response) {
   //          console.log(response);

   //       },
   //       error: function(xhr, status, error) {
   //          console.error('Error:', error);

   // $(document).ready(function() {
   //    $('[aria-labelledby="select2-countriescode-container"]').addClass("hidden-imp");
   //    $('input[name="user_name"]').on('input', function() {
   //       if ($(this).val().match(/^\d+$/)) {
   //          $('#countries').removeClass('hidden-imp');
   //          $('[aria-labelledby="select2-countriescode-container"]').removeClass("hidden-imp");
   //       } else {
   //          $('#countries').addClass('hidden-imp');
   //          $('[aria-labelledby="select2-countriescode-container"]').addClass("hidden-imp");

   //       }
   //    });
   // });


   $("#returnTosign").on("click", function() {
      $('#otp-model').addClass("hidden");
      $('#register-model').removeClass("hidden");
   })

   $(window).on('load', function() {
      $('input[data-val="p-1"]').addClass('focus').focus();
   });

   function moveToNext(currentInput, index) {
      if (currentInput.value.length >= 1) {
         const nextInput = document.querySelector(`input[data-val='p-${index + 1}']`);
         if (nextInput) {
            nextInput.focus();
            nextInput.classList.add('focus');
            nextInput.classList.remove('disabled');
         }
      }
   }

   function setOtpValue() {
      const otpField = document.getElementById('otpField');
      const inputs = document.querySelectorAll('.verification-pass');
      let otp = '';
      inputs.forEach(input => {
         otp += input.value;
      });
      otpField.value = otp;
      return true; // Allow form submission
   }
   $('#confirmButton').on('click', function() {
      setOtpValue();

      // Perform AJAX call
      $.ajax({
         url: "{{ url('user/login/verify/otp') }}",
         type: 'POST',
         data: $('#verificationForm').serialize(),
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         success: function(response) {

            // Handle success (e.g., show a message, redirect, etc.)
            console.log('OTP verified successfully:', response);
            if (response.success == false) {
               console.log("aa");
               $("#login-error").html(response.msg);
            } else {
               console.log("kk");
               setTimeout(function() {
                  $('#otp-model').addClass('hidden');
               }, 1000);
               $('#tickets').submit();
               $('#ticketSlot').submit();
            }
         },
         error: function(xhr) {
            // Handle error (e.g., show an error message)
            console.error('Error verifying OTP:', xhr.responseText);
         }
      });
   });


   $(document).ready(function() {
      const urlParams = new URLSearchParams(window.location.search);
      const scrollTo = urlParams.get('scroll');
      if (scrollTo) {
         $('html, body').animate({
            scrollTop: $('#' + scrollTo).offset().top
         }, 1000); // Adjust the duration as needed
      }
   });




   $(document).ready(function() {

      var today = new Date();
      var todayFormatted = today.toISOString().split('T')[0];

      var tomorrow = new Date();
      tomorrow.setDate(today.getDate() + 1);
      var tomorrowFormatted = tomorrow.toISOString().split('T')[0];

      var dates = [todayFormatted, tomorrowFormatted];

      let slot_id = '';
      $('.slotEvent').on('click', function() {
         slot_id = $(this).attr('id')

         $('#slot-slider').removeClass("hidden").addClass("flex");
         slot_events(slot_id, [todayFormatted, tomorrowFormatted])
         $(this).addClass('activeSlotEvent')
      });

      $('#tomorrow-slot').on('click', function() {
         $('.slotEvent-container').html('');
         slot_events(slot_id, [tomorrowFormatted, tomorrowFormatted])
      });

      $(function() {
         $("#datepicker").datepicker({
            beforeShow: function(input, inst) {
               setTimeout(function() {
                  inst.dpDiv.appendTo('.datepicker-container');
               }, 0);
            },
            onSelect: function(dateText) {
               let parts = dateText.split('/');
               let selectedDate = new Date(parts[2], parts[0] - 1, parts[1]);
               selectedDate.setMinutes(selectedDate.getMinutes() - selectedDate.getTimezoneOffset());
               let formattedDate = selectedDate.toISOString().split('T')[0];

               $('.slotEvent-container').html('');
               $("#slot-arrow").addClass('hidden')
               $("#clear-slot").removeClass('hidden');

               slot_events(slot_id, [formattedDate]);
            }
         });
      });
      $('#clear-slot').on('click', function() {
         $("#datepicker").datepicker("setDate", null);
         $("#slot-arrow").removeClass('hidden');
         $("#clear-slot").addClass('hidden');
         slot_events(slot_id, [todayFormatted, tomorrowFormatted])

      })
      $("#datpiceker-cont").on('click', function() {
         $(this).addClass('border-primary_color_6 border-1 transition-all duration-300 ease-in-out');
      })

      function slot_events(id, dates) {
         $.ajax({
            url: 'https://ticketby.co/api/time/slots',
            type: 'POST',
            data: {
               ticket_id: id,
               date: dates,
            },
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

               $('.slotEvent-container').html('');
               response.data.forEach(item => {
                  let slotEventHtml = `
                    <div data-ticket-date="${item.date}"  data-ticket-available="${item.available_quanity}" data-ticket-price="${item.price}" data-time-slot-id="${item.time_slot_id}" data-ticket-id="${item.ticket_id}" class="slot-slickt swiper-slide cursor-pointer bg-primary_color_12  hover:bg-primary_color_8 rounded-2xl border border-primary_color_o25_8 py-2 px-1  text-center inner-hover transition">
                  <h3 class="font-bold text-h5 lg:text-h3">${item.date} </h3>
                  <div class="f-bri h5 font-medium my-3"  >{{ __(key: $currency) }} ${item.price}</div>
                  <div class="f-bri text-gray_9 h5 font-medium">${item.start_time}</div>
                   </div>`;
                  initializeSwiperSlot()
                  $('.slotEvent-container').append(slotEventHtml);
               })

            },
            error: function(xhr, status, error) {
               console.error('Error:', error);
            }
         });
      }

   })
   $(document).on('click', '.slot-slickt', function() {
      $('.slot-slickt').removeClass('activeSlotEvent');
      $(this).addClass('activeSlotEvent')
      let ticketId = $(this).data('ticket-id');
      let ticketDate = $(this).data('ticket-date');
      let ticketAvailable = $(this).data('ticket-available');
      let time_slot_id = $(this).data('time-slot-id');
      let ticketPrice = $(this).data('ticket-price');
      let count = 1;

      $("#increment-slot").attr("data-ticket-price", ticketPrice).attr("data-ticket-id", ticketId)
      $("#decrement-slot").attr("data-ticket-price", ticketPrice).attr("data-ticket-id", ticketId)
      $(".slot-event-id").attr("id", `id-${time_slot_id}`).val(`${time_slot_id}`);
      $(".ids").attr("id", `id-${ticketId}`).val(`${ticketId}`);
      $(".slot-event-date").val(`${ticketDate}`);
      $(".increment").attr("ticketAvailable", `${ticketAvailable}`);
      $(".slot-event-quantities").attr("name", `quantities[${ticketId}]`).attr("id", `quantity-${ticketId}`).val(`${count}`);

      $(".slot-event-quantities").val(`${count}`);
      $('.tickets-price').text('')
      tickets = {};

      handeltickets(ticketId, count, ticketPrice);
   });




   $(document).ready(function() {
      $('#login_form').on('submit', function(e) {
         e.preventDefault();
         $.ajax({
            url: "{{ url('api/web/login') }}",
            type: 'POST',
            data: $(this).serialize(),
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
               if (response.success) {
                  let id = response.data.id
                  $('#user_id').val(id);
                  $('#otp-model').removeClass('hidden')
                  $('#login-model').addClass('hidden')
               } else {
                  $('.errorMessages messages').html('');
                  $('.errorMessages').removeClass('hidden')
                  $('.errorMessages .messages').text(response);
               }
            },
            error: function(xhr) {
               // Handle validation errors or other failures 
               let errors = xhr.responseJSON.errors;
               console.log(errors);
               // Clear any previous error messages
               $('.errorMessages messages').html('');
               $('.errorMessages').removeClass('hidden')
               // Loop through the errors and display them
               $.each(errors, function(field, messages) {
                  $('.errorMessages .messages').text(messages[0]);
               });
            }
         });
      });


   });



   $(document).ready(function() {
      $(function() {
         $(".datepicker").datepicker();
      });
   });

   $('.from-switch').on('click', function(e) {
      let model_id = $(this).attr('data-form-user');
      $('.form-container').addClass('hidden');
      $(`#${model_id}`).removeClass('hidden');

      if (model_id == 'register-model' || model_id == 'password-model') {
         $('.responceMessage').addClass("hidden")
      }
   });


   $(document).ready(function() {
      $('#submitResetForm').on('click', function(e) {
         e.preventDefault();
         var formData = $('#resetPasswordForm').serialize();
         $.ajax({
            url: "{{ url('user/resetPassword') }}",
            type: "POST",
            data: formData,
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
               responseMessage('fa-check', 'New password will send in your mail, please check it.');
               $('#login-model').removeClass('hidden');
               $('#password-model').addClass('hidden');
            },
            error: function(xhr) {
               let errors = xhr.responseJSON.errors;
               console.log(errors);
            }
         })
      })
   })


   $(document).ready(function() {

      $('#submitRegisterForm').on('click', function(e) {
         e.preventDefault();

         var formData = $('#registerForm').serialize();
         let userName = $('#registerForm [name="name"]').val()
         $.ajax({
            url: "{{ url('user/register') }}",
            type: "POST",
            data: formData,
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
               $('#spinner').show();
            },
            success: function(response) {
               if (response.success) {
                  name = "name"
                  let massage = `welcome ${userName}`;
                  console.log(response);
                  responseMessage('fa-check', massage);
                  setTimeout(function() {
                     $('#register_popup').addClass('hidden');
                  }, 1000);
                  $('#tickets').submit();
                  $('#ticketSlot').submit();

               } else {
                  responseMessage('fa-xmark', "error");
               }
            },
            error: function(xhr) {
               // Handle validation errors or other failures 
               let errors = xhr.responseJSON.errors;
               console.log(errors);
               // Clear any previous error messages
               $('#errorMessages messages').html('');
               $('#errorMessages').removeClass('hidden')
               // Loop through the errors and display them
               $.each(errors, function(field, messages) {
                  $('#errorMessages .messages').text(messages[0]);
               });
            },
            complete: function() {
               $('#spinner').hide();
            }

         });
      });
   });

   function responseMessage(icon, massage) {
      $('.fa-solid').addClass(icon)
      $('.responceMessage .massage').text(massage)
      $('.responceMessage').toggleClass('hidden');
   }






   document.getElementById('checkAuthButton').addEventListener('click', function(e) {
      var hasProductSelected = false;
      $('input[name^="quantities"]').each(function() {
         if ($(this).val() > 0) {
            hasProductSelected = true;
            return false;
         }
      });
      if (!hasProductSelected) {
         event.preventDefault();
      } else if (!isAuthenticated) {
         e.preventDefault();
         $(`#register-model`).addClass('hidden');
         $('#register-model').removeClass('hidden');
         $('#register_popup').removeClass('hidden');
         return
      }
   });



   $('.close-modal').click(function() {
      // $('#error-modal').addClass('hidden');
      $('.pop-modal').addClass('hidden');
      $('.form-container').addClass('hidden');

   });

   $(document).ready(function() {
      $('.increment').click(function() {
         var productId = $(this).data('ticket-id');
         var quantityInput = $('#quantity-' + productId);
         var currentQuantity = parseInt(quantityInput.val());
         quantityInput.val(currentQuantity + 1);
      });

      $('.decrement').click(function() {
         var productId = $(this).data('ticket-id');
         var quantityInput = $('#quantity-' + productId);
         var currentQuantity = parseInt(quantityInput.val());
         if (currentQuantity > 0) {
            quantityInput.val(currentQuantity - 1);
         }
      });
   });


   let tickets = {};
   let ticketsTotal = 0;
   let ticketsPrice = 0;
   $(document).ready(function() {

      if (ticketsTotal == 0) {
         $('#tickets-info').addClass('hidden');
      }

      $('.increment').click(function() {
         $(this).siblings('.decrement').removeClass("disable");
         $(this).siblings('.decrement').removeClass("opacity-25");
         $(this).siblings('.count').removeClass("opacity-25");
         let countElement = $(this).siblings('.count');
         let count = parseInt(countElement.text());
         if ($(this).attr('ticketAvailable')) {
            console.log($(this).attr('ticketAvailable'));
            if ($(this).attr('ticketAvailable') <= count + 1) {
               $(this).addClass('opacity-25');
               $(this).addClass('disable');
            }

         }
         countElement.text(count + 1);

         $(".slot-event-quantities").val(`${count + 1}`);

         let ticketId = $(this).data('ticket-id');
         let ticketPrice = $(this).data('ticket-price');
         handeltickets(ticketId, count + 1, ticketPrice)
      });

      $('.decrement').click(function() {
         let countElement = $(this).siblings('.count');
         $(this).siblings('.increment').removeClass("disable");
         $(this).siblings('.increment').removeClass("opacity-25");

         let count = parseInt(countElement.text());
         if (count > 0) {
            countElement.text(count - 1);
         }
         if (count == 1) {
            $(this).addClass("opacity-25");
            $(this).addClass("disable");
            $(this).siblings('.count').addClass('opacity-25')
         }
         $(".slot-event-quantities").val(`${count - 1}`);

         let ticketId = $(this).data('ticket-id');
         let ticketPrice = $(this).data('ticket-price');

         handeltickets(ticketId, count - 1, ticketPrice)
      });
   });

   function handeltickets(ticketId, count, ticketPrice) {
      tickets[ticketId] = {
         quantity: count,
         price: ticketPrice
      };
      console.log(tickets);
      ticketsTotal = 0;
      ticketsPrice = 0;
      for (let id in tickets) {
         ticketsTotal += tickets[id].quantity;
         ticketsPrice += tickets[id].quantity * tickets[id].price;
      }
      if (ticketsTotal > 0) {
         $('#tickets-info').removeClass('hidden');
         $('#tickets-alert').addClass('hidden');
      } else {
         $('#tickets-info').addClass('hidden');
         $('#tickets-alert').removeClass('hidden');
      }
      $('.tickets-price').text(ticketsPrice)
      $('.tickets-quantity').text(ticketsTotal)
   }


   function buttonActive(id) {
      $(".quant-button").addClass('deactive-button')
      $(".ticket-id-" + id).removeClass('deactive-button')
      const numberInputs = document.querySelectorAll('.quantity-input');
      numberInputs.forEach(input => {
         if (!input.classList.contains('number-input-' + id)) {
            input.value = 0;
         }
      });
   }



   $(document).ready(function() {
      $('.showMore').click(function() {
         $('p').toggleClass('paragraph-3');
         $('.showMore .more').toggleClass('hidden')
         $('.showMore .less').toggleClass('hidden')
      });
   });
   $('.accordion').on('click', function() {
      toggleAccordion($(this).data('accordion'));
   });

   function toggleAccordion(id) {
      var element = document.getElementById(id);
      if (element) {
         element.classList.toggle('hidden');
      }
   }




   // function openModal() {
   //    document.getElementById('locationModal').classList.remove('hidden');
   // }
   // function closeModal() {
   //    document.getElementById('locationModal').classList.add('hidden');
   // }


   // var modal = document.getElementById("mapModal");
   // var closeMap = document.querySelector(".closeMap");

   // closeMap.onclick = function() {
   //    modal.style.display = "none";
   // }

   // window.onclick = function(event) {
   //    if (event.target == modal) {
   //       modal.style.display = "none";
   //    }
   // }

   // const lat = parseFloat("{{ $data->lat }}");
   // const lng = parseFloat("{{ $data->lang }}");

   // function openMapModal() {
   //    modal.style.display = "flex";
   //    var map = new google.maps.Map(document.getElementById('map'), {
   //       center: {
   //          lat: lat,
   //          lng: lng
   //       },
   //       zoom: 15,
   //    });

   //    var marker = new google.maps.Marker({
   //       position: {
   //          lat: lat,
   //          lng: lng
   //       },
   //       map: map,

   //    });
   // }

   // document.getElementById("openMapBtn").onclick = openMapModal;
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $gmapkey }}"></script>



@endsection