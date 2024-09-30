@extends('front.master', ['activePage' => 'event'])
@section('title', __('All Events'))
@section('content')







<div class="container mt-32">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
        <div class="col-span-12 hidden md:block md:col-span-4 xl:col-span-3 ">
            <div class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1  p-2">
                <div class="flex gap-2 items-center">
                    <h3 class="font-bold pb-1 border-gray_f border-b-1 w-full">Filter</h3>
                </div>
                <div class="mt-4">
                    <div class="border-gray_f border-b-1 pb-2 mb-2">
                        <label for="" class="mb-1 block">Event</label>
                        <input type="text" placeholder="search..."
                            class="h-14 bg-dark_1 p-3 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1 "
                            name="" id="">
                    </div>
                    <div class="border-gray_f border-b-1 pb-2 mb-2">
                        <label for="" class="mb-1 block">Price range</label>
                        <div class="flex gap-4">
                            <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');"
                                id="min_price"
                                class="min_price price-range-field bg-dark_1 p-3 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1 h-8" />
                            <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');"
                                id="max_price"
                                class="max_price price-range-field bg-dark_1 p-3 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1 h-8" />
                        </div>
                        <div id="slider-range" class=" slider-range price-filter-range mt-4" name="rangeInput"></div>
                        <div class="flex justify-between mt-3"> <span class="text-gray_9 text-h8">Min</span> <span
                                class="text-gray_9 text-h8">Max</span></div>
                    </div>
                    <div class="border-gray_f border-b-1 pb-2 mb-2">
                        <div class="mb-2">
                            <label for="" class="mb-1 block">Location</label>
                            <div
                                class="bg-dark_1 p-3 w-full   rounded-lg border border-primary_color_o10_1 flex items-center gap-1 h-14">
                                <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.5 6C8.5 7.40625 7.375 8.5 6 8.5C4.59375 8.5 3.5 7.40625 3.5 6C3.5 4.625 4.59375 3.5 6 3.5C7.375 3.5 8.5 4.625 8.5 6ZM6 7.5C6.8125 7.5 7.5 6.84375 7.5 6C7.5 5.1875 6.8125 4.5 6 4.5C5.15625 4.5 4.5 5.1875 4.5 6C4.5 6.84375 5.15625 7.5 6 7.5ZM12 6C12 8.75 8.34375 13.5938 6.71875 15.625C6.34375 16.0938 5.625 16.0938 5.25 15.625C3.625 13.5938 0 8.75 0 6C0 2.6875 2.65625 0 6 0C9.3125 0 12 2.6875 12 6ZM6 1C3.21875 1 1 3.25 1 6C1 6.5 1.15625 7.15625 1.5 8C1.84375 8.8125 2.3125 9.6875 2.875 10.5625C3.9375 12.2812 5.1875 13.9375 6 14.9375C6.78125 13.9375 8.03125 12.2812 9.09375 10.5625C9.65625 9.6875 10.125 8.8125 10.4688 8C10.8125 7.15625 11 6.5 11 6C11 3.25 8.75 1 6 1Z"
                                        fill="#A986BF" />
                                </svg>
                                <select name="" id="" style="width: 100%;" data-minimum-results-for-search="Infinity"
                                    class=" select2 w-full focus:border-primary_color_6 outline-0 bg-transparent   ">
                                    <option value="opt1">opt 1</option>
                                    <option value="opt1">opt 1</option>
                                    <option value="opt1">opt 1</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="" class="mb-1 block">Date</label>
                            <div
                                class=" bg-dark_1 p-3 w-full   rounded-lg border border-primary_color_o10_1 flex items-center gap-1 h-14">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.5 3.5C7.5 3.25 7.71875 3 8 3C8.25 3 8.5 3.25 8.5 3.5V7.75L11.25 9.59375C11.5 9.75 11.5625 10.0625 11.4062 10.2812C11.25 10.5312 10.9375 10.5938 10.7188 10.4375L7.71875 8.4375C7.5625 8.34375 7.46875 8.1875 7.46875 8L7.5 3.5ZM8 0C12.4062 0 16 3.59375 16 8C16 12.4375 12.4062 16 8 16C3.5625 16 0 12.4375 0 8C0 3.59375 3.5625 0 8 0ZM1 8C1 11.875 4.125 15 8 15C11.8438 15 15 11.875 15 8C15 4.15625 11.8438 1 8 1C4.125 1 1 4.15625 1 8Z"
                                        fill="#A986BF" />
                                </svg>
                                <select name="" id=""style="width: 100%;" data-minimum-results-for-search="Infinity"
                                    class=" select2  w-full focus:border-primary_color_6 outline-0 bg-transparent   ">
                                    <option value="opt1">opt 1</option>
                                    <option value="opt1">opt 1</option>
                                    <option value="opt1">opt 1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-gray_f ">
                        <label for="" class="mb-1 block">Categories</label>
                        <div class="flex flex-col gap-1">
                            <div class="flex justify-between">
                                <div class="flex gap-1 items-center">
                                    <input type="checkbox" name="" id="cat3" class="custome w-4 h-4">
                                    <label for="cat3" class="block text-gray_6 font-medium">Categories</label>
                                </div>
                                <span class="text-h7 font-medium text-gray_6">( 17 )</span>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex gap-1 items-center">
                                    <input type="checkbox" name="" id="cat4" class="custome w-4 h-4">
                                    <label for="cat4" class="block text-gray_6 font-medium">Categories</label>
                                </div>
                                <span class="text-h7 font-medium text-gray_6">( 17 )</span>
                            </div>
                        </div>
                        <a href="" class="text-primary_color_8 mt-1 block">
                            + Show More
                        </a>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-8 xl:col-span-9">
            <div class=" bg-gray_f w-72 mb-4 h-12 p-1 px-4 rounded-5xl hidden md:block ">
                <select name="" id="" style="width: 100%;" data-minimum-results-for-search="Infinity"
                    class=" select2 h-12 w-full focus:border-primary_color_6 outline-0 bg-transparent   ">
                    <option value="relevance">Sort by: relevance</option>
                    <option value="relevance">Sort by: relevance</option>
                </select>
            </div>
            <div class=" grid grid-cols-12 gap-4">
                <div
                    class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 overflow-hidden  col-span-6 md:col-span-6  xl:col-span-4 ">
                    <div class="h-28 md:h-48">
                        <img class="w-full h-full object-cover"
                            src="https://images.unsplash.com/photo-1497030855747-0fc424f89a4b?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=bdda607a8b1c23f94436b0743cea878a&amp;auto=format&amp;fit=crop&amp;w=1050&amp;q=80"
                            alt="">
                    </div>
                    <div class="flex gap-2 md:gap-4 p-1 md:p-2 flex-wrap md:flex-nowrap">
                        <div class="text-center flex flex-row-reverse items-baseline gap-1 md:gap-0 md:flex-col ">
                            <span class="text-primary_color_7 text-h7 font-bold">APR</span>
                            <span class="font-bold text-h3">14</span>
                        </div>
                        <div>
                            <h5 class="text-h6 md:text-h5 font-medium mb-1 md:mb-2">SOUNDSTORM 24 Show Ticket
                                Package -
                                Jeddah</h5>
                            <p class="pline2 f-bri text-gray_6 text-h6">We're leveling up Soundstorm. With an
                                all-star
                                lineup, new
                                side quests and the freshest sounds in every genre.</p>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 overflow-hidden col-span-6 md:col-span-6  xl:col-span-4 ">
                    <div class="h-28 md:h-48">
                        <img class="w-full h-full object-cover"
                            src="https://images.unsplash.com/photo-1497030855747-0fc424f89a4b?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=bdda607a8b1c23f94436b0743cea878a&amp;auto=format&amp;fit=crop&amp;w=1050&amp;q=80"
                            alt="">
                    </div>
                    <div class="flex gap-2 md:gap-4 p-1 md:p-2 flex-wrap md:flex-nowrap">
                        <div class="text-center flex flex-row-reverse items-baseline gap-1 md:gap-0 md:flex-col ">
                            <span class="text-primary_color_7 text-h7 font-bold">APR</span>
                            <span class="font-bold text-h3">14</span>
                        </div>
                        <div>
                            <h5 class="text-h6 md:text-h5 font-medium mb-1 md:mb-2">SOUNDSTORM 24 Show Ticket
                                Package -
                                Jeddah</h5>
                            <p class="pline2 f-bri text-gray_6 text-h6">We're leveling up Soundstorm. With an
                                all-star
                                lineup, new
                                side quests and the freshest sounds in every genre.</p>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 overflow-hidden col-span-6 md:col-span-6  xl:col-span-4 ">
                    <div class="h-28 md:h-48">
                        <img class="w-full h-full object-cover"
                            src="https://images.unsplash.com/photo-1497030855747-0fc424f89a4b?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=bdda607a8b1c23f94436b0743cea878a&amp;auto=format&amp;fit=crop&amp;w=1050&amp;q=80"
                            alt="">
                    </div>
                    <div class="flex gap-2 md:gap-4 p-1 md:p-2 flex-wrap md:flex-nowrap">
                        <div class="text-center flex flex-row-reverse items-baseline gap-1 md:gap-0 md:flex-col ">
                            <span class="text-primary_color_7 text-h7 font-bold">APR</span>
                            <span class="font-bold text-h3">14</span>
                        </div>
                        <div>
                            <h5 class="text-h6 md:text-h5 font-medium mb-1 md:mb-2">SOUNDSTORM 24 Show Ticket
                                Package -
                                Jeddah</h5>
                            <p class="pline2 f-bri text-gray_6 text-h6">We're leveling up Soundstorm. With an
                                all-star
                                lineup, new
                                side quests and the freshest sounds in every genre.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div
    class="bg-light-gradient-2  w-full filter-container fixed left-2/4 md:hidden transform -translate-x-1/2 shadow-dark p-6 bottom-0">
    <div class="flex bg-primary_color_8 rounded-5xl border border-primary_color_6 justify-center items-center">
        <button id="filter_sldie" data-id="filter-one"
            class="flex items-center gap-1 font-medium bg-transparent rounded-5xl    p-2 ">
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_512_246)">
                    <path
                        d="M19.2226 1.75H1.77739C0.703643 1.75 0.110752 2.97168 0.788096 3.78852L8.00001 12.4852V16.125C8.00001 16.4308 8.14896 16.7177 8.4004 16.8928L11.5254 19.0797C11.6928 19.1968 11.8779 19.25 12.0588 19.25C12.5445 19.25 13 18.8672 13 18.3119V12.4852L20.2119 3.78852C20.8893 2.97168 20.2964 1.75 19.2226 1.75ZM12.0378 11.6873L11.75 12.0343V17.7112L9.25001 15.9617V12.0343L8.96224 11.6873L1.77739 3H19.2226L19.2497 2.99055L12.0378 11.6873Z"
                        fill="#FBF9FD" />
                </g>
                <defs>
                    <clipPath id="clip0_512_246">
                        <rect width="20" height="20" fill="white" transform="translate(0.5 0.5)" />
                    </clipPath>
                </defs>
            </svg>
            <span>filters</span>
        </button>
        <svg width="1" height="27" viewBox="0 0 1 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="0.5" y1="2.18558e-08" x2="0.499999" y2="27" stroke="#FBF9FD" stroke-dasharray="2 2" />
        </svg>
        <button id="" data-id="" class="flex items-center gap-1 font-medium bg-transparent rounded-5xl    p-2 ">
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_512_246)">
                    <path
                        d="M19.2226 1.75H1.77739C0.703643 1.75 0.110752 2.97168 0.788096 3.78852L8.00001 12.4852V16.125C8.00001 16.4308 8.14896 16.7177 8.4004 16.8928L11.5254 19.0797C11.6928 19.1968 11.8779 19.25 12.0588 19.25C12.5445 19.25 13 18.8672 13 18.3119V12.4852L20.2119 3.78852C20.8893 2.97168 20.2964 1.75 19.2226 1.75ZM12.0378 11.6873L11.75 12.0343V17.7112L9.25001 15.9617V12.0343L8.96224 11.6873L1.77739 3H19.2226L19.2497 2.99055L12.0378 11.6873Z"
                        fill="#FBF9FD" />
                </g>
                <defs>
                    <clipPath id="clip0_512_246">
                        <rect width="20" height="20" fill="white" transform="translate(0.5 0.5)" />
                    </clipPath>
                </defs>
            </svg>
            <span>Sort By</span>
        </button>
    </div>
</div>

<div id="filter-one"
    class="z-30 bg-dark-gradient fixed w-full bottom-0 hidden bg-opacity-5 rounded-t-3xl border border-primary_color_o10_1  p-2">
    <div class="flex gap-2 items-center">
        <div class="border-b-1 border-gray_f flex justify-between w-full pb-1">
            <h3 class="font-bold   ">Filter</h3>
            <div class="close-slide" data-id="filter-one"><i class="fa-regular fa-circle-xmark fa-2xl my-6"></i>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="border-gray_f border-b-1 pb-2 mb-2">
            <label for="" class="mb-1 block">Event</label>
            <input type="text" placeholder="search..."
                class="h-14 bg-dark_1 p-3 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1 "
                name="" id="">
        </div>
        <div class="border-gray_f border-b-1 pb-2 mb-2">
            <label for="" class="mb-1 block">Price range</label>
            <div class="flex gap-4">
                <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price"
                    class="min_price price-range-field bg-dark_1 p-3 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1 h-8" />
                <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price"
                    class="max_price price-range-field bg-dark_1 p-3 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1 h-8" />
            </div>
            <div id="slider-range" class="slider-range price-filter-range mt-4" name="rangeInput"></div>
            <div class="flex justify-between mt-3"> <span class="text-gray_9 text-h8">Min</span> <span
                    class="text-gray_9 text-h8">Max</span></div>
        </div>
        <div class="border-gray_f border-b-1 pb-2 mb-2">
            <div class="mb-2">
                <label for="" class="mb-1 block">Location</label>
                <div
                    class="bg-dark_1 p-3 w-full   rounded-lg border border-primary_color_o10_1 flex items-center gap-1 h-14">
                    <svg width="12" height="17" viewBox="0 0 12 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.5 6C8.5 7.40625 7.375 8.5 6 8.5C4.59375 8.5 3.5 7.40625 3.5 6C3.5 4.625 4.59375 3.5 6 3.5C7.375 3.5 8.5 4.625 8.5 6ZM6 7.5C6.8125 7.5 7.5 6.84375 7.5 6C7.5 5.1875 6.8125 4.5 6 4.5C5.15625 4.5 4.5 5.1875 4.5 6C4.5 6.84375 5.15625 7.5 6 7.5ZM12 6C12 8.75 8.34375 13.5938 6.71875 15.625C6.34375 16.0938 5.625 16.0938 5.25 15.625C3.625 13.5938 0 8.75 0 6C0 2.6875 2.65625 0 6 0C9.3125 0 12 2.6875 12 6ZM6 1C3.21875 1 1 3.25 1 6C1 6.5 1.15625 7.15625 1.5 8C1.84375 8.8125 2.3125 9.6875 2.875 10.5625C3.9375 12.2812 5.1875 13.9375 6 14.9375C6.78125 13.9375 8.03125 12.2812 9.09375 10.5625C9.65625 9.6875 10.125 8.8125 10.4688 8C10.8125 7.15625 11 6.5 11 6C11 3.25 8.75 1 6 1Z"
                            fill="#A986BF" />
                    </svg>
                    <select name="" id="" data-minimum-results-for-search="Infinity"
                        class=" select2 w-full focus:border-primary_color_6 outline-0 bg-transparent   ">
                        <option value="opt1">test</option>
                        <option value="opt1">opt 1</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="" class="mb-1 block">Date</label>
                <div
                    class="bg-dark_1 p-3 w-full   rounded-lg border border-primary_color_o10_1 flex items-center gap-1 h-14">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.5 3.5C7.5 3.25 7.71875 3 8 3C8.25 3 8.5 3.25 8.5 3.5V7.75L11.25 9.59375C11.5 9.75 11.5625 10.0625 11.4062 10.2812C11.25 10.5312 10.9375 10.5938 10.7188 10.4375L7.71875 8.4375C7.5625 8.34375 7.46875 8.1875 7.46875 8L7.5 3.5ZM8 0C12.4062 0 16 3.59375 16 8C16 12.4375 12.4062 16 8 16C3.5625 16 0 12.4375 0 8C0 3.59375 3.5625 0 8 0ZM1 8C1 11.875 4.125 15 8 15C11.8438 15 15 11.875 15 8C15 4.15625 11.8438 1 8 1C4.125 1 1 4.15625 1 8Z"
                            fill="#A986BF" />
                    </svg>
                    <select name="" id="" style="width: 100%;" data-minimum-results-for-search="Infinity"
                        class=" select2  w-full focus:border-primary_color_6 outline-0 bg-transparent   ">
                        <option value="opt1">opt 1</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="border-gray_f ">
            <label for="" class="mb-1 block">Categories</label>
            <div class="flex flex-col gap-1">
                <div class="flex justify-between">
                    <div class="flex gap-1 items-center">
                        <input type="checkbox" name="" id="cat1" class="custome w-4 h-4">
                        <label for="cat1" class="block text-gray_6 font-medium">Categories</label>
                    </div>
                    <span class="text-h7 font-medium text-gray_6">( 17 )</span>
                </div>
                <div class="flex justify-between">
                    <div class="flex gap-1 items-center">
                        <input type="checkbox" name="" id="cat2" class="custome w-4 h-4">
                        <label for="cat2" class="block text-gray_6 font-medium">Categories</label>
                    </div>
                    <span class="text-h7 font-medium text-gray_6">( 17 )</span>
                </div>
            </div>
            <a href="" class="text-primary_color_8 mt-1 block">
                + Show More
            </a>
        </div>
    </div>
    <div>
    </div>
</div>
<div id="overlay" class="hidden fixed w-full h-full bg-dark bg-opacity-80 top-0 left-0 hidden"></div>
































<div id="myTabContent">
    <div class="hidden" id="events" role="tabpanel" aria-labelledby="all_events">

        <div
            class="grid gap-x-7 1xl:grid-cols-3 xl:grid-cols-3 xlg:grid-cols-3 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative slider-div-height">
            @foreach ($events as $item)

            <div class="slide">
                <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}" class="card_event">
                    <img src="{{ url('images/upload/' . $item->image) }}" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <div class="card__header-text">
                                <h3 class="card__title">{{ $item->name }}</h3>
                                <span class="card__status">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    @if (session('direction') == 'rtl')
                                    {{ Carbon\Carbon::parse($item->start_time)->locale('ar')->translatedFormat('d F Y') }} -
                                    {{ Carbon\Carbon::parse($item->end_time)->locale('ar')->translatedFormat('d F Y') }}
                                    @else
                                    {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} -
                                    {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                                    @endif
                                </span>
                            </div>
                            <button type="submit" class="event-button-ticket  text-success border border-success">
                                {{ __('Ticket') }}
                            </button>
                            @if (Auth::guard('appuser')->user())
                            @if (Str::contains($user->favorite, $item->id))
                            <button class="event-button-ticket " style="margin-top: -400px;margin-left: -35px; background: rgba(225, 225, 225, 0.2);
                           border-radius: 50%;">
                                <img src="{{ url('images/heart-fill.svg') }}" alt="" class="">
                            </button>
                            @else
                            <button class="event-button-ticket " style="margin-top: -400px;margin-left: -35px;background: rgba(225, 225, 225, 0.2);
                           border-radius: 50%;">
                                <img src="{{ url('images/heart.svg') }}" alt="" class="">
                            </button>
                            @endif
                            @endif
                        </div>
                        <p class="card__description">
                            {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} -
                            {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                        </p>
                    </div>
                </a>
            </div>

            @endforeach
        </div>
    </div>

</div>



@endsection