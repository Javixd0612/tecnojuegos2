<x-app-layout>


    <div class="py-12" style="background-color: #0f0f0f;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-[#1a1a1a] border-2 border-[#00ffea] rounded-lg shadow-lg gamer-box">
        <div class="max-w-xl mx-auto">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>
    <div class="p-8 bg-[#1a1a1a] border-2 border-[#00ffea] rounded-lg shadow-lg gamer-box">
    <div class="max-w-xl mx-auto">
        @include('profile.partials.update-password-form')
    </div>
</div>


<div class="p-8 bg-[#1a1a1a] border-2 border-[#00ffea] rounded-lg shadow-lg gamer-box">
    <div class="max-w-xl mx-auto">
        @include('profile.partials.delete-user-form')
    </div>
</div>

    </div>
</x-app-layout>

