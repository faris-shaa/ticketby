@extends('front.master', ['activePage' => 'event'])
@section('title', __('All Events'))
@section('content')


@php
use Illuminate\Support\Facades\Http;


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

if (session('direction') == 'rtl') {
$lang = 'ar';
}else{
$lang = 'en';
}

@endphp




<div class="container mt-32">
    <div class="col-span-12 md:col-span-8 xl:col-span-9">
        <div class="flex justify-end gap-2 flex-wrap mb-8">
            <div class="flex justify-end gap-2  w-full md:w-auto">
                <div class="flex items-center bg-gray_f   h-12 p-1 px-1 md:px-4 rounded-5xl flex-1">
                    <select name="" id="" style="width: 100%;" data-minimum-results-for-search="Infinity"
                        class=" select2 h-12 w-full focus:border-primary_color_6 outline-0 bg-transparent   ">
                        <option value="Price">{{__('Price')}}</option>
                    </select>
                </div>
                <div class="flex items-center bg-gray_f   h-12 p-1 px-1 md:px-4 rounded-5xl flex-1  ">
                    <select name="" id="SearchEventDate" style="width: 100%;" data-minimum-results-for-search="Infinity"
                        class=" select2 h-12 w-full focus:border-primary_color_6 outline-0 bg-transparent   ">
                        <option value="All"> {{__('all')}}</option>
                        <option value="Today"> {{__('Today')}}</option>
                        <option value="Tommorow"> {{__('Tommorow')}}</option>
                        <option value="This Week"> {{__('This Week')}}</option>
                        <option value="choose_date"> {{__('choose date')}}</option>
                    </select>
                </div>
                <div class="flex items-center bg-gray_f   h-12 p-1 px-1 md:px-4 rounded-5xl flex-1  ">
                    <select name="" id="SearchEventCity" style="width: 100%;" data-minimum-results-for-search="Infinity"
                        class=" select2 h-12 w-full focus:border-primary_color_6 outline-0 bg-transparent   ">
                        <option value="all"> {{__('Any place')}}</option>
                        @foreach ($citys['city'] as $city)
                        <option value="{{$city['id']}}">{{ $lang == 'ar' ? $city['arabic_name'] : $city['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center bg-gray_f   h-12 p-1 px-1 md:px-4 rounded-5xl   flex items-end gap-1 items-center flex-1 md:flex-initial">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.375 6.4375C11.375 7.69531 10.9648 8.87109 10.2812 9.80078L13.7266 13.2734C14.082 13.6016 14.082 14.1758 13.7266 14.5039C13.3984 14.8594 12.8242 14.8594 12.4961 14.5039L9.02344 11.0312C8.09375 11.7422 6.91797 12.125 5.6875 12.125C2.54297 12.125 0 9.58203 0 6.4375C0 3.32031 2.54297 0.75 5.6875 0.75C8.80469 0.75 11.375 3.32031 11.375 6.4375ZM5.6875 10.375C7.84766 10.375 9.625 8.625 9.625 6.4375C9.625 4.27734 7.84766 2.5 5.6875 2.5C3.5 2.5 1.75 4.27734 1.75 6.4375C1.75 8.625 3.5 10.375 5.6875 10.375Z" fill="#666666" />
                </svg>
                <input type="text" name="" id="SearchEventName" placeholder="{{__('Search')}}" class=" w-full focus:border-primary_color_6 outline-0 bg-transparent">
                <div class="ms-auto hidden" id="Searchbtn"> <i class="fa-solid fa-right-to-bracket"></i>
                </div>
            </div>
        </div>
        <div class=" grid grid-cols-12 gap-2 xl:gap-20" id="event">

        </div>
    </div>
</div>



@if (session('direction') == 'rtl'))
<script>
    var lang = 'ar';
</script>
@else
<script>
    var lang = 'en';
</script>
@endif

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script script>
    $(document).ready(function() {

        let limit = -1;
        $("#load_more").click(function() {
            limit += 3
            fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);
        });



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

        })
        var SearchEventCity = ''
        $('#SearchEventCity').on('change', function() {
            SearchEventCity = $(this).val();
            console.log(SearchEventCity);
            fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);

        });
        var SearchEventDate = ''
        $('#SearchEventDate').on('change', function() {
            SearchEventDate = $(this).val();
            fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);

        });
        var SearchEventCat = ''
        $('#SearchEventCat').on('change', function() {
            SearchEventCat = $(this).val();
            fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);
        });

        fetchEvents(SearchEventName, SearchEventDate, SearchEventCity, SearchEventCat, limit);

        function fetchEvents(query = '', date = '', city_id = '', category_id = '') {
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
                    $('#event').html('');
                    let events = [];
                    if (Array.isArray(data)) {
                        events = data;
                    } else if (data.data && Array.isArray(data.data)) {
                        events = data.data;
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
                          <div class="bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 overflow-hidden  col-span-6 md:col-span-6  xl:col-span-4 ">
                <a href="/event/${item.id}/${item.slug}" class="swiper-slide">
                            <div class="ticket-wahlist h-full bg-light hover:bg-primary_color_o25_9 bg-opacity-5 rounded-2xl border border-primary_color_o10_1 hover:border-gray_9 overflow-hidden">
                            <div class="h-32 md:h-48">
                                 ${item.gallery && item.gallery.length > 0 ? 
                                    `<div class="swiper-devent2">
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
            </div>
              `;
                        $('#event').append(eventHtml);
                    });
                    setTimeout(initializeSwiper2, 1000);


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
</script>