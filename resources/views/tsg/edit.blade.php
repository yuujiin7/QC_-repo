@include('partials.__header', [$title])
<?php
$array = array('title' => "Questech");
;?>
<x-nav :data="$array"/>
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center pt-5 uppercase">EDIT TSG USER {{$user->first_name}} {{$user->last_name}}</h1>
    </a>

</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">
    <section class="mt-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 text-xs mt-2 italic p-1">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/user/{{$user->id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- <div class="mb-4 text-center">
                <label for="profile_image" class="block text-sm font-semibold text-gray-800 mb-2">Profile Picture</label>
                <div class="flex justify-center items-center mb-2">
                    <img id="profileImagePreview" src="{{ $user->profile_image ? asset('storage/profile_images/thumbnail/small_' . $user->profile_image) : 'https://api.dicebear.com/8.x/bottts/svg?seed=Felix' }}" alt="Profile Image" class="w-20 h-20 rounded-full object-cover">
                </div>
                <input type="file" id="profile_image" name="profile_image" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" onchange="previewImage(event)">
                @error('profile_image')
                    <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                @enderror
            </div> -->
            <div class="mb-4">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <label for="first_name" class="block text-sm font-semibold text-gray-800 mb-2">First Name*</label>
                        <input type="text" id="first_name" name="first_name" placeholder="First name" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value={{$user->first_name}}>
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-1/2 ml-3">
                        <label for="last_name" class="block text-sm font-semibold text-gray-800 mb-2">Last Name*</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Last name" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value={{$user->last_name}}>
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    
                </div>
            </div>
            <div class="mb-4">
                
                <div class="flex justify-start">
                    <div class="w-1/2">
                        <label for="emp_id" class="block text-sm font-semibold text-gray-800 mb-2">Employee ID No.*</label>
                        <input type="text" id="emp_id" name="emp_id" placeholder="Employee ID" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value="{{$user->emp_id}}">
                        @error('emp_id')
                            <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-1/4 ml-3">
                        <label for="user_type" class="block text-sm font-semibold text-gray-800 mb-2">User Type</label>
                        <input type="text" id="user_type" name="user_type" placeholder="User Type" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value="{{$user->user_type}}" disabled>
                        @error('user_type')
                            <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/3 ml-3">
                        <label for="role" class="block text-sm font-semibold text-gray-800 mb-2">Role</label>
                        <input type="text" id="role" name="role" placeholder="Role" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value="{{$user->role}}" disabled>
                        @error('role')
                            <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- <div class="w-1/4 ml-3">
                        <label for="age" class="block text-sm font-semibold text-gray-800 mb-2">Age</label>
                        <input type="text" id="age" name="age" placeholder="Age" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value="{{$user->age}}">
                        @error('age')
                            <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                        @enderror
                    </div> -->

                    <!-- <div class="w-1/4 ml-3">
                        <label for="gender" class="block text-sm font-semibold text-gray-800 mb-2">Gender</label>
                        <select id="gender" name="gender" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300">
                            <option value="">Gender</option>
                            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                        @enderror
                    </div> -->



                    
                </div>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-800 mb-2">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Email Address" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value="{{$user->email}}">
                @error('email')
                    <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-semibold text-gray-800 mb-2">Phone Number</label>
                <input type="tel" id="phone_number" name="phone_number" placeholder="e.g 09123456789" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value={{$user->phone_number}}>
                @error('phone_number')
                    <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- <div class="mb-4">
                <label for="profile_image" class="block text-sm font-semibold text-gray-800 mb-2">TSG Image</label>
                <input type="file" id="profile_image" name="profile_image" placeholder="e.g 09123456789" class="bg-gray-200 rounded w-full text-gray-800 px-3 py-2 focus:outline-none focus:bg-white border-2 border-gray-300" value={{$user->profile_image}}>
                @error('profile_image')
                    <p class="text-red-500 text-xs mt-2 italic p-1">{{ $message }}</p>
                @enderror
            </div> -->

            
           
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 text-center" type="submit">Save</button>
            <a href="/tsg" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 text-center mt-2">Back</a>
            

        </form>
       
        
    </section>
    
</main>


@include('partials.__footer')

