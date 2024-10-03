@extends('front.master', ['activePage' => 'home'])
@section('title', __('Home'))
@section('content')

@php
$_city = Http::get(url('api/city'));
$citys=$_city->json();

$_categorys = Http::get(url('api/user/category'));
$categorys=$_categorys->json();

@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="bg-primary_color_15 hero rounded-b-3xl">
   <div class="container mt-16 pb-44 overflow-hidden">
      <div class="grid grid-cols-1 lg:grid-cols-2 items-center">
         <div class=" tiket-info order-2 lg:order-1 mt-7">
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="1">
               <div class="overflow-hidden">
                  <h1 class="text-h2  xl:text-h9 font-medium anim-tiket-h ">SOUNDSTORM 24 Show Ticket Package
                     1</h1>
               </div>
               <div class="overflow-hidden">
                  <p class="mt-4 text-primary_color_4 anim-tiket-p">We're leveling up Soundstorm. With an
                     all-star lineup,
                     new
                     side quests and the
                     freshest
                     sounds in every genre.</p>
               </div>
               <div class="flex gap-4 mt-7 overflow-hidden">
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl bg-primary_color_8   text-center  py-2 px-4 lg:px-12  w-full lg:w-48  f-bri l leading-5  block ">Get
                     Ticket</a>
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">Learn
                     More</a>
               </div>
            </div>
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="2">
               <div class="overflow-hidden">
                  <h1 class="text-h2  xl:text-h9 font-medium anim-tiket-h ">SOUNDSTORM 24 Show Ticket Package
                     2</h1>
               </div>
               <div class="overflow-hidden">
                  <p class="mt-4 text-primary_color_4 anim-tiket-p">We're leveling up Soundstorm. With an
                     all-star lineup,
                     new
                     side quests and the
                     freshest
                     sounds in every genre.</p>
               </div>
               <div class="flex gap-4 mt-7 overflow-hidden">
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl bg-primary_color_8   text-center  py-2 px-4 lg:px-12  w-full lg:w-48  f-bri l leading-5  block ">Get
                     Ticket</a>
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">Learn
                     More</a>
               </div>
            </div>
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="3">
               <div class="overflow-hidden">
                  <h1 class="text-h2  xl:text-h9 font-medium anim-tiket-h ">SOUNDSTORM 24 Show Ticket Package
                     3</h1>
               </div>
               <div class="overflow-hidden">
                  <p class="mt-4 text-primary_color_4 anim-tiket-p">We're leveling up Soundstorm. With an
                     all-star lineup,
                     new
                     side quests and the
                     freshest
                     sounds in every genre.</p>
               </div>
               <div class="flex gap-4 mt-7 overflow-hidden">
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl bg-primary_color_8   text-center  py-2 px-4 lg:px-12  w-full lg:w-48  f-bri l leading-5  block ">Get
                     Ticket</a>
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">Learn
                     More</a>
               </div>
            </div>
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="4">
               <div class="overflow-hidden">
                  <h1 class="text-h2  xl:text-h9 font-medium anim-tiket-h ">SOUNDSTORM 24 Show Ticket Package
                     4</h1>
               </div>
               <div class="overflow-hidden">
                  <p class="mt-4 text-primary_color_4 anim-tiket-p">We're leveling up Soundstorm. With an
                     all-star lineup,
                     new
                     side quests and the
                     freshest
                     sounds in every genre.</p>
               </div>
               <div class="flex gap-4 mt-7 overflow-hidden">
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl bg-primary_color_8   text-center  py-2 px-4 lg:px-12  w-full lg:w-48  f-bri l leading-5  block ">Get
                     Ticket</a>
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">Learn
                     More</a>
               </div>
            </div>
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="5">
               <div class="overflow-hidden">
                  <h1 class="text-h2  xl:text-h9 font-medium anim-tiket-h ">SOUNDSTORM 24 Show Ticket Package
                     5</h1>
               </div>
               <div class="overflow-hidden">
                  <p class="mt-4 text-primary_color_4 anim-tiket-p">We're leveling up Soundstorm. With an
                     all-star lineup,
                     new
                     side quests and the
                     freshest
                     sounds in every genre.</p>
               </div>
               <div class="flex gap-4 mt-7 overflow-hidden">
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl bg-primary_color_8   text-center  py-2 px-4 lg:px-12  w-full lg:w-48  f-bri l leading-5  block ">Get
                     Ticket</a>
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">Learn
                     More</a>
               </div>
            </div>
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="6">
               <div class="overflow-hidden">
                  <h1 class="text-h2  xl:text-h9 font-medium anim-tiket-h ">SOUNDSTORM 24 Show Ticket Package
                     6</h1>
               </div>
               <div class="overflow-hidden">
                  <p class="mt-4 text-primary_color_4 anim-tiket-p">We're leveling up Soundstorm. With an
                     all-star lineup,
                     new
                     side quests and the
                     freshest
                     sounds in every genre.</p>
               </div>
               <div class="flex gap-4 mt-7 overflow-hidden">
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl bg-primary_color_8   text-center  py-2 px-4 lg:px-12  w-full lg:w-48  f-bri l leading-5  block ">Get
                     Ticket</a>
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">Learn
                     More</a>
               </div>
            </div>
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="7">
               <div class="overflow-hidden">
                  <h1 class="text-h2  xl:text-h9 font-medium anim-tiket-h ">SOUNDSTORM 24 Show Ticket Package
                     7</h1>
               </div>
               <div class="overflow-hidden">
                  <p class="mt-4 text-primary_color_4 anim-tiket-p">We're leveling up Soundstorm. With an
                     all-star lineup,
                     new
                     side quests and the
                     freshest
                     sounds in every genre.</p>
               </div>
               <div class="flex gap-4 mt-7 overflow-hidden">
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl bg-primary_color_8   text-center  py-2 px-4 lg:px-12  w-full lg:w-48  f-bri l leading-5  block ">Get
                     Ticket</a>
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">Learn
                     More</a>
               </div>
            </div>
            <div class="lg:w-w-400 xl:w-w-500 hidden " data-tiket-id="8">
               <div class="overflow-hidden">
                  <h1 class="text-h2  xl:text-h9 font-medium anim-tiket-h ">SOUNDSTORM 24 Show Ticket Package
                     8</h1>
               </div>
               <div class="overflow-hidden">
                  <p class="mt-4 text-primary_color_4 anim-tiket-p">We're leveling up Soundstorm. With an
                     all-star lineup,
                     new
                     side quests and the
                     freshest
                     sounds in every genre.</p>
               </div>
               <div class="flex gap-4 mt-7 overflow-hidden">
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl bg-primary_color_8   text-center  py-2 px-4 lg:px-12  w-full lg:w-48  f-bri l leading-5  block ">Get
                     Ticket</a>
                  <a href="#"
                     class="anim-tiket-btn rounded-5xl border border-primary_color_8   text-center    py-2 px-4 lg:px-12  w-full lg:w-48 f-bri l leading-5  block">Learn
                     More</a>
               </div>
            </div>
         </div>
         <div class="swiper-hero order-1 lg:order-2 m-auto">
            <div class="swiper-wrapper">
               <div class="swiper-slide" id="1"
                  style="background-image:url(https://images.unsplash.com/photo-1491166617655-0723a0999cfc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a6f2b3e1a41e636e0cebfead997d5a6b&auto=format&fit=crop&w=1050&q=80)">
               </div>
               <div class="swiper-slide" id="2"
                  style="background-image:url(https://images.unsplash.com/photo-1452826942781-56e3f80f6a35?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=de2f80f0542c3a93696e183dbe199a18&auto=format&fit=crop&w=1051&q=80)">
               </div>
               <div class="swiper-slide" id="3"
                  style="background-image:url(https://images.unsplash.com/photo-1462556791646-c201b8241a94?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e712ca93edd202526b934b70869d0c92&auto=format&fit=crop&w=1045&q=80)">
               </div>
               <div class="swiper-slide" id="4"
                  style="background-image:url(https://images.unsplash.com/photo-1497030855747-0fc424f89a4b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bdda607a8b1c23f94436b0743cea878a&auto=format&fit=crop&w=1050&q=80)">
               </div>
               <div class="swiper-slide" id="5"
                  style="background-image:url(https://images.unsplash.com/photo-1524287515726-d6bd6805ad27?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=00cb23a024b5c3b6be8d6ef8f858a95f&auto=format&fit=crop&w=964&q=80)">
               </div>
               <div class="swiper-slide" id="6"
                  style="background-image:url(https://images.unsplash.com/photo-1491166617655-0723a0999cfc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a6f2b3e1a41e636e0cebfead997d5a6b&auto=format&fit=crop&w=1050&q=80)">
               </div>
               <div class="swiper-slide" id="7"
                  style="background-image:url(https://images.unsplash.com/photo-1452826942781-56e3f80f6a35?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=de2f80f0542c3a93696e183dbe199a18&auto=format&fit=crop&w=1051&q=80)">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="container ">
   <div class="bg-primary_color_10 py-7 px-2 md:px-8 xl:px-24 rounded-2xl -mt-20 flex items-center gap-6 justify-between flex-wrap xl:flex-nowrap">
      <div class="w-full sm:w-auto">
         <span class="flex items-center gap-1 mb-1">
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path
                  d="M15.8438 15.1562C16.0312 15.3438 16.0312 15.6875 15.8438 15.875C15.75 15.9688 15.625 16 15.5 16C15.3438 16 15.2188 15.9688 15.0938 15.875L10.6875 11.4375C9.53125 12.4375 8.0625 13 6.46875 13C2.90625 13 0 10.0938 0 6.5C0 2.9375 2.875 0 6.46875 0C10.0312 0 12.9688 2.9375 12.9688 6.5C12.9688 8.125 12.4062 9.59375 11.4062 10.75L15.8438 15.1562ZM6.5 12C9.53125 12 12 9.5625 12 6.5C12 3.46875 9.53125 1 6.5 1C3.4375 1 1 3.46875 1 6.5C1 9.53125 3.4375 12 6.5 12Z"
                  fill="#EEE8F4" />
            </svg>
            <label for="">Event name</label>
         </span>
         <input type="text" name="" id="SearchByEventName" placeholder="Search by event name"
            class="placeholder-primary_color_6 w-full min-w-60 f-bri bg-transparent text-primary_color_6 border-0 border-b border-primary_color_6 py-3 border   outline-0">
      </div>
      <div class="w-full sm:w-auto">
         <span class="flex items-center gap-1 mb-1">
            <svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M8.83325 6C8.83325 7.40625 7.70825 8.5 6.33325 8.5C4.927 8.5 3.83325 7.40625 3.83325 6C3.83325 4.625 4.927 3.5 6.33325 3.5C7.70825 3.5 8.83325 4.625 8.83325 6ZM6.33325 7.5C7.14575 7.5 7.83325 6.84375 7.83325 6C7.83325 5.1875 7.14575 4.5 6.33325 4.5C5.4895 4.5 4.83325 5.1875 4.83325 6C4.83325 6.84375 5.4895 7.5 6.33325 7.5ZM12.3333 6C12.3333 8.75 8.677 13.5938 7.052 15.625C6.677 16.0938 5.95825 16.0938 5.58325 15.625C3.95825 13.5938 0.333252 8.75 0.333252 6C0.333252 2.6875 2.9895 0 6.33325 0C9.64575 0 12.3333 2.6875 12.3333 6ZM6.33325 1C3.552 1 1.33325 3.25 1.33325 6C1.33325 6.5 1.4895 7.15625 1.83325 8C2.177 8.8125 2.64575 9.6875 3.20825 10.5625C4.27075 12.2812 5.52075 13.9375 6.33325 14.9375C7.1145 13.9375 8.3645 12.2812 9.427 10.5625C9.9895 9.6875 10.4583 8.8125 10.802 8C11.1458 7.15625 11.3333 6.5 11.3333 6C11.3333 3.25 9.08325 1 6.33325 1Z" fill="#EEE8F4" />
            </svg>
            <label for="">Place</label>
         </span>
         <div class="min-w-60 f-bri bg-transparent text-primary_color_6 border-0 border-b border-primary_color_6 py-3 border">
            <select name="" id="" placeholder="Search by event place" class="select2 placeholder-primary_color_6 w-full min-w-60 f-bri  text-primary_color_6    outline-0" style="width: 100%;" data-minimum-results-for-search="Infinity">
               <option value="all">Any place</option>
               @foreach ($citys['city'] as $city)
               <option value="{{$city['id']}}">{{$city['name']}}</option>
               @endforeach

            </select>
         </div>
      </div>
      <div class="w-full sm:w-auto">
         <span class="flex items-center gap-1 mb-1">
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M8.16675 3.5C8.16675 3.25 8.3855 3 8.66675 3C8.91675 3 9.16675 3.25 9.16675 3.5V7.75L11.9167 9.59375C12.1667 9.75 12.2292 10.0625 12.073 10.2812C11.9167 10.5312 11.6042 10.5938 11.3855 10.4375L8.3855 8.4375C8.22925 8.34375 8.1355 8.1875 8.1355 8L8.16675 3.5ZM8.66675 0C13.073 0 16.6667 3.59375 16.6667 8C16.6667 12.4375 13.073 16 8.66675 16C4.22925 16 0.666748 12.4375 0.666748 8C0.666748 3.59375 4.22925 0 8.66675 0ZM1.66675 8C1.66675 11.875 4.79175 15 8.66675 15C12.5105 15 15.6667 11.875 15.6667 8C15.6667 4.15625 12.5105 1 8.66675 1C4.79175 1 1.66675 4.15625 1.66675 8Z" fill="#EEE8F4" />
            </svg>
            <label for="">date</label>
            <span class="ms-auto  cursor-pointer clear-datepicker hidden">
               <i class="fa-regular fa-circle-xmark fa-lg "></i>
            </span>
         </span>
         <div id="event_date" class="min-w-60 f-bri bg-transparent text-primary_color_6 border-0 border-b border-primary_color_6 py-3 border">
            <select name="" placeholder="Search by event date" class="select2 placeholder-primary_color_6 w-full    outline-0" style="width: 100%;" data-minimum-results-for-search="Infinity">
               <option value="all">all</option>
               <option value="today">today</option>
               <option value="tomorrow">tomorrow</option>
               <option value="this_week">this week</option>
               <option value="choose_date">choose date</option>
            </select>
         </div>
         <input type="text" name="" placeholder="choose event date" id="datepicker" class="datepicker hidden placeholder-primary_color_6 w-full min-w-60 f-bri bg-transparent text-primary_color_6 border-0 border-b border-primary_color_6 py-3 border   outline-0">
      </div>
   </div>
</div>


<div class="container mt-28 md:mt-40 xl:mt-48">
   <div class="flex justify-between flex-wrap gap-y-4">
      <h2 class="font-medium">Upcoming Events</h2>
      <div class="flex gap-2 flex-wrap gap-y-4">
         <div id=""
            class="text-h6 rounded-full  bg-gray_f bg-opacity-5 gap-x-1  py-3 px-6 flex items-center  justify-between   h-8">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M3.5 1.625C3.5 1.16016 3.88281 0.75 4.375 0.75C4.83984 0.75 5.25 1.16016 5.25 1.625V2.5H8.75V1.625C8.75 1.16016 9.13281 0.75 9.625 0.75C10.0898 0.75 10.5 1.16016 10.5 1.625V2.5H11.8125C12.5234 2.5 13.125 3.10156 13.125 3.8125V5.125H0.875V3.8125C0.875 3.10156 1.44922 2.5 2.1875 2.5H3.5V1.625ZM13.125 6V13.4375C13.125 14.1758 12.5234 14.75 11.8125 14.75H2.1875C1.44922 14.75 0.875 14.1758 0.875 13.4375V6H13.125Z" fill="#666666" />
            </svg>
            <select name="" class=" select2 placeholder-primary_color_6 outline-0" data-minimum-results-for-search="Infinity">
               <option value="all">all</option>
               <option value="Today">Today</option>
               <option value="Tommorow">Tommorow</option>
               <option value="this_week">This Week</option>
               <option value="choose_date">choose date</option>
            </select>
         </div>
         <div id=" "
            class="test-w text-h6 rounded-full  bg-gray_f bg-opacity-5 gap-x-1  py-3 px-6 flex items-center  justify-between   h-8">
            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path
                  d="M8.76562 1.24219L10.543 4.87891L14.4531 5.45312C14.7812 5.50781 15.0547 5.72656 15.1641 6.05469C15.2734 6.35547 15.1914 6.71094 14.9453 6.92969L12.1016 9.74609L12.7852 13.7383C12.8398 14.0664 12.7031 14.3945 12.4297 14.5859C12.1562 14.8047 11.8008 14.8047 11.5 14.668L8 12.7812L4.47266 14.668C4.19922 14.8047 3.84375 14.8047 3.57031 14.5859C3.29688 14.3945 3.16016 14.0664 3.21484 13.7383L3.87109 9.74609L1.02734 6.92969C0.808594 6.71094 0.726562 6.35547 0.808594 6.05469C0.917969 5.72656 1.19141 5.50781 1.51953 5.45312L5.45703 4.87891L7.20703 1.24219C7.34375 0.941406 7.64453 0.75 8 0.75C8.32812 0.75 8.62891 0.941406 8.76562 1.24219Z"
                  fill="#666666" />
            </svg>
            <select style="width: 100%;" name="" class="  select2 placeholder-primary_color_6 outline-0" data-minimum-results-for-search="Infinity">
               <option value="Type">Type</option>
               <option value="Type">Type</option>
            </select>
         </div>
         <div id=""
            class="text-h6 rounded-full  bg-gray_f bg-opacity-5 gap-x-1  py-3 px-6 flex items-center  justify-between   h-8">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path
                  d="M8.61328 1.1875L11.2383 5.5625C11.4023 5.83594 11.4023 6.16406 11.2383 6.4375C11.1016 6.71094 10.8008 6.875 10.5 6.875H5.25C4.92188 6.875 4.62109 6.71094 4.48438 6.4375C4.32031 6.16406 4.32031 5.83594 4.48438 5.5625L7.10938 1.1875C7.27344 0.914062 7.54688 0.75 7.875 0.75C8.17578 0.75 8.44922 0.914062 8.61328 1.1875ZM7.875 9.28125C7.875 8.67969 8.33984 8.1875 8.96875 8.1875H12.9062C13.5078 8.1875 14 8.67969 14 9.28125V13.2188C14 13.8477 13.5078 14.3125 12.9062 14.3125H8.96875C8.33984 14.3125 7.875 13.8477 7.875 13.2188V9.28125ZM3.5 14.75C1.55859 14.75 0 13.1914 0 11.25C0 9.33594 1.55859 7.75 3.5 7.75C5.41406 7.75 7 9.33594 7 11.25C7 13.1914 5.41406 14.75 3.5 14.75Z"
                  fill="#666666" />
            </svg>
            <select name="" style="width: 100%;" class="select2 placeholder-primary_color_6 outline-0" data-minimum-results-for-search="Infinity">
               <option value="cat1">Category</option>
               <option value="cat1">Category</option>
               <option value="cat1">Category</option>
            </select>
         </div>
      </div>
   </div>
   <div class="mt-16 grid grid-cols-2 lg:grid-cols-3 gap-2 lg:gap-x-20 lg:gap-y-8" id="upcomingEventsCon">
   </div>
   <div class="flex justify-center"><a href="#"
         class=" mt-16  rounded-5xl border border-light   text-center    py-2 px-4 lg:px-9   lg:w-48 f-bri l leading-5  inline-block">
         Load More</a></div>
</div>

<div class="container mt-28 md:mt-40 xl:mt-48">
   <div class="text-center mb-8">
      <h2 class="font-medium">Discover the lovely categories</h2>
      <p class="text-gray_6 mt-1"></p>
   </div>
   <div>
      <div class="swiper swiper-cat order-1 lg:order-2 m-auto">
         <div class="swiper-wrapper">
            @foreach ($categorys['data'] as $cat)
            <div class="swiper-slide text-center flex items-center flex-col ">
               <div
                  class=" mx-auto flex items-center justify-center w-24 h-24 rounded-full bg-light bg-opacity-5  border border-primary_color_o10_1   ">
                  <!-- <svg width="20" height="33" viewBox="0 0 20 33" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M19 12.22C19.5 12.22 20 12.72 20 13.22V16.22C20 21.4075 16 25.6575 11 26.1575V30.22H15C15.5 30.22 16 30.72 16 31.22C16 31.7825 15.5 32.22 15 32.22H5C4.4375 32.22 4 31.7825 4 31.22C4 30.72 4.4375 30.22 5 30.22H9V26.1575C3.8125 25.6575 0 21.095 0 15.9075V13.22C0 12.72 0.4375 12.22 1 12.22C1.5 12.22 2 12.72 2 13.22V15.97C2 20.22 5.1875 23.97 9.4375 24.22C14.0625 24.5325 18 20.845 18 16.22V13.22C18 12.72 18.4375 12.22 19 12.22ZM10 22.22C6.6875 22.22 4 19.5325 4 16.22V6.21997C4 2.90747 6.6875 0.219971 10 0.219971C13.3125 0.219971 16 2.96997 16 6.21997V16.22C16 19.5325 13.3125 22.22 10 22.22ZM6 6.21997V16.22C6 18.47 7.75 20.22 10 20.22C12.1875 20.22 14 18.47 14 16.22V6.21997C14 4.03247 12.1875 2.21997 10 2.21997C7.75 2.21997 6 4.03247 6 6.21997Z"
                        fill="#A986BF" />
                  </svg> -->
                  <img src="{{ $cat['imagePath'] . $cat['app_icon'] }}" alt="">
               </div>
               <h5 class="mt-3">{{ $cat['name']}}</h5>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>

<div class="container mt-28 md:mt-40 xl:mt-48">
   <div class="text-center mb-8">
      <h2 class="font-medium">Discover the lovely cities</h2>
      <p class="text-gray_6 mt-1">Discover the lovely cities</p>
   </div>
   <div class="relative">
      <div class="swiper swiper-city order-1 lg:order-2 m-auto">
         <div class="swiper-wrapper" id="city_ajx">
            @foreach ($citys['city'] as $city)
            <div class="swiper-slide text-center flex items-center flex-col">
               <div class="w-24 h-28  md:h-52 md:w-48  xl:h-h-270  xl:w-w-256 rounded-2xl overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="{{url('images/upload/' . $city['image'])}}"
                     alt={{$city['name']}}>
               </div>
               <h3 class="mt-3"> @if (session('direction') == 'rtl') {{ $city['arabic_name'] }} @else {{ $city['name'] }} @endif</h3>
            </div>
            @endforeach
         </div>
      </div>
      <div class="swiper-pagination "></div>
   </div>
</div>

<div class="container mt-28 md:mt-40 xl:mt-48">
   <div class="">
      <h2 class="font-medium">Previous Events</h2>
   </div>
   <div class="mt-16 grid grid-cols-2 lg:grid-cols-3 gap-2 ">
      @foreach ($pervious_events as $item)
      <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}">
         <div class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 overflow-hidden ">
            <div class="h-28 md:h-48">
               <img class="w-full h-full object-cover"
                  src="{{ url('images/upload/' . $item->image) }}"
                  alt="">
            </div>
            <div class="flex gap-2 md:gap-4 p-1 md:p-4 flex-wrap md:flex-nowrap">
               <div class="text-center flex flex-row-reverse items-baseline gap-1 md:gap-0 md:flex-col ">
                  <span class="text-primary_color_7 text-h7 font-bold">
                     {{ Carbon\Carbon::parse($item->start_time)->format('M') }}
                  </span>
                  <span class="font-bold text-h3">
                     {{ Carbon\Carbon::parse($item->start_time)->format('d') }}
                  </span>
               </div>
               <div>
                  <h5 class="text-h6 md:text-h5 font-medium mb-1 md:mb-2">@if (session('direction') == 'rtl') {{ $item->name_arabic }} @else {{ $item->name }} @endif</h5>
                  <p class="pline2 f-bri text-gray_6 text-h6">We're leveling up Soundstorm. With an all-star
                     lineup, new
                     side quests and the freshest sounds in every genre.</p>
               </div>
            </div>
         </div>
      </a>
      @endforeach
   </div>
   <div class="flex justify-center">
      <a href="#"
         class=" m-auto mt-16  rounded-5xl border border-light   text-center    py-2 px-4 lg:px-9    f-bri l leading-5  inline-block  ">
         Discover all previous events</a>
   </div>
</div>


@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script script>
   $(document).ready(function() {

      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      fetchEvents();

      $('#SearchByEventName').on('keyup', function() {
         let query = $(this).val();
         fetchEvents(query);
      });

      function fetchEvents(query = '', date = '', city_id = '') {
         let url = `api/user/search-event/web`;

         $.ajax({

            url: url,
            method: 'POST',
            data: {
               // search: "query",
               // date: "date",
               // city_id: "city_id",
               // limit: 3
            },
            success: function(data) {
               console.log(data);
               $('#upcomingEventsCon').html('');
               // let events = [];
               // if (Array.isArray(data)) {
               //    events = data;
               // } else if (data.data && Array.isArray(data.data)) {
               //    events = data.data;
               // }
               // console.log(data);


               data.data.forEach(item => {
                  let day = dateFormat(item.time).day;
                  let month = dateFormat(item.time).shortMonth;
                  let eventHtml = `
                        <a href="}">
                            <div class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 overflow-hidden">
                                <div class="h-28 md:h-48">
                                    <img class="w-full h-full object-cover" src="${item.imagePath}${item.image}" alt="${item.name}">
                                </div>
                                <div class="flex gap-2 md:gap-4 p-1 md:p-4 flex-wrap md:flex-nowrap">
                                    <div class="text-center flex flex-row-reverse items-baseline gap-1 md:gap-0 md:flex-col">
                                        <span class="text-primary_color_7 text-h7 font-bold">${month}
                                        </span>
                                        <span class="font-bold text-h3">${day}
                                        </span>
                                    </div>
                                    <div>
                                        <h5 class="text-h6 md:text-h5 font-medium mb-1 md:mb-2">
                                            ${item.name}
                                        </h5>
                                        <p class="pline2 f-bri text-gray_6 text-h6">
                                   ${item.description}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
                  $('#upcomingEventsCon').append(eventHtml);
               });
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