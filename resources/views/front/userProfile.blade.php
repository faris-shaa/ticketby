@extends('front.master', ['activePage' => 'Profile'])
@section('title', __('My Profile'))
@section('content')



<div class="container mt-12 md:mt-32">

    <div class="gap-1 flex p-1 mx-auto w-fit bg-light bg-opacity-5  border border-primary_color_o10_1  rounded-2xl md:rounded-6xl">
        <button class="tab-button text-gray-600 px-2 py-3 rounded-6xl focus:outline-none text-gray_6 text-h6" data-tab="tab1">Profile settings</button>
        <button class="tab-button text-gray-600 px-2 py-3 rounded-6xl focus:outline-none text-gray_6 text-h6" data-tab="tab2">Password</button>
        <button class="tab-button text-gray-600 px-2 py-3 rounded-6xl focus:outline-none text-gray_6 text-h6" data-tab="tab3">My tickets</button>
        <button class="tab-button text-gray-600 px-2 py-3 rounded-6xl focus:outline-none text-gray_6 text-h6" data-tab="tab4">Past events</button>
        <button class="tab-button text-gray-600 px-2 py-3 rounded-6xl focus:outline-none text-gray_6 text-h6" data-tab="tab5">Wishlist</button>
    </div>
    <div class="tab-content mt-7">
        <div id="tab1" class="tab-pane hidden  bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 p-2 md:p-4">
            <p class="h2 text-primary_color_5">Profile settings</p>
            <div class="mt-4">
                <div class="flex justify-left mb-4">
                    <img src="{{ asset('images/upload/' . $user->image) }}" alt=""
                        class="bg-cover object-cover rounded-full h-40 w-40 ">
                    <div class="absolute xsm:top-44 left-32 xxsm:top-56 rtl-image-upload-update-profile">
                        <form method="post" action="#" id="imageUploadForm" enctype="multipart/form-data"
                            style="display: none">
                            @csrf
                            <input type="file" name="image" id="imgUpload" class="hide">
                        </form>
                        <span id="OpenImgUpload">
                            <img src="{{ asset('images/camera.png') }}" alt=""
                                class="bg-cover object-cover bg-primary p-2 rounded-full">
                        </span>
                    </div>
                </div>
                <form action="{{ url('update_user_profile') }}" method="post">
                    @csrf
                    <div class="flex gap-2 mb-4">
                        <div class="flex-1">
                            <label for="fname"
                                class="mb-1 block">{{ __('First Name') }}</label>
                            <input required type="text" name="name" id="" value="{{ $user->name }}"
                                class="bg-dark_1 p-1 md:p-16-16 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1"
                                placeholder="Deo">
                        </div>
                        <div class="flex-1">
                            <label for="lname"
                                class="mb-1 block">{{ __('Last Name') }}</label>
                            <input type="text" name="last_name" id="" value="{{ $user->last_name }}"
                                class="bg-dark_1 p-1 md:p-16-16 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1"
                                placeholder="Deo">
                        </div>
                    </div>
                    <div class="flex gap-2 mb-4">
                        <div class="flex-1">
                            <label for="number"
                                class="mb-1 block">{{ __('Contact Number') }}</label>
                            <input type="text" name="phone" id="" value="{{ $user->phone }}"
                                class="bg-dark_1 p-1 md:p-16-16 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1"
                                placeholder="john@gmail.com">
                        </div>
                        <div class="flex-1">
                            <label for="email"
                                class="mb-1 block">{{ __('Email address') }}</label>
                            <input type="email" name="email" id="" value="{{ $user->email }}" disabled
                                class="bg-dark_1 p-1 md:p-16-16 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1"
                                placeholder="john@gmail.com">
                        </div>
                    </div>
                    <div class="flex gap-2 mb-4">
                        <div class=" flex-1">
                            <label for="bio"
                                class="mb-1 block">{{ __('Address') }}</label>
                            <textarea id="message" rows="4" name="address"
                                class="bg-dark_1 p-1 md:p-16-16 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1 "
                                placeholder="{{ __('Type your address') }}">{{ $user->address }}</textarea>
                        </div>
                        <div class=" flex-1">
                            <label for="bio"
                                class="mb-1 block">{{ __('Bio') }}</label>
                            <textarea id="message" rows="4" name="bio"
                                class="bg-dark_1 p-1 md:p-16-16 w-full focus:border-primary_color_6 outline-0 rounded-lg border border-primary_color_o10_1"
                                placeholder="{{ __('Type your bio') }}">{{ $user->bio }}</textarea>
                        </div>
                    </div>
                    <div class="">
                        <button
                            class="bg-primary_color_8 text-white  px-5 py-2 rounded-6xl w-full">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>


        <div id="tab2" class="tab-pane hidden bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 p-2 md:p-4">
            <p class="h2 text-primary_color_5">Password</p>
        </div>
        <div id="tab3" class="tab-pane hidden bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 p-2 md:p-4">
            <p class="h2 text-primary_color_5">My tickets</p>
        </div>
        <div id="tab4" class="tab-pane hidden bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 p-2 md:p-4">
            <p class="h2 text-primary_color_5">Past events</p>
        </div>
        <div id="tab5" class="tab-pane hidden bg-light bg-opacity-5 rounded-2xl border border-primary_color_o10_1 p-2 md:p-4">
            <p class="h2 text-primary_color_5">Wishlist</p>
        </div>
    </div>


</div>

<script script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabPanes = document.querySelectorAll('.tab-pane');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.getAttribute('data-tab');

                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanes.forEach(pane => pane.classList.remove('active'));

                button.classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Activate the first tab by default
        tabButtons[0].classList.add('active');
        tabPanes[0].classList.add('active');
    });
</script>


@endsection