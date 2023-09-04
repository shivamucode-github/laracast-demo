<div x-data="{ open: false}" class="flex flex-col items-center justify-center my-6">
    <div method="" class="w-1/2 px-4 py-6 border border-gray-400 rounded-xl bg-gray-100">
        <h2 class="text-3xl font-semibold py-4 border-b border-gray-300 mb-4">Delete Profile</h2>
        <p>Do you want to delete your profile. this is permantly delete your account </p>
        <button @click='open = ! open' class="py-3 px-6 rounded-lg mt-4  outline-none bg-red-500 hover:bg-red-600 text-white">Delete Account</button>
    </div>
    <div x-show="open" class="fixed bottom-0 inset-0 bg-black/40 flex items-center justify-center">
        <div class="bg-white w-1/2 h-1/2 rounded-2xl flex flex-col gap-10 justify-center items-center">
            <p class="text-2xl font-base">Do you Really want to delete your account</p>
            <div class="flex gap-8">
                <a href="{{ route('profile.delete' )}}" class="px-10 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Yes</a>
                <button @click='open = ! open' class="px-10 py-3 bg-red-500 hover:bg-red-600 text-white rounded-lg">No</button>
            </div>
        </div>
    </div>
</div>
