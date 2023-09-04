<div class="flex flex-col items-center justify-center my-6">
    <form action="{{ route('profile.forgotpassword') }}" method="post" class="w-1/2 px-4 py-6 border border-gray-400 rounded-xl bg-gray-100">
        @csrf
        <h2 class="text-3xl font-semibold py-4 border-b border-gray-300 mb-4">Forgot Password</h2>
        <x-forms.input name="oldpassword" placeholder="old password" type="text" id="oldpassword" label="Enter the old password" value=""/>
        <x-forms.error name="oldpassword"/>
        <x-forms.input name="password" placeholder="New password" type="password" id="password" label="Enter the New password" value="" />
        <x-forms.error name="password"/>
        <x-forms.input name="confirm_password" placeholder="New confirm password" type="password" id="confirm_password" label="Enter the New confirm password" value="" />
        <x-forms.error name="confirm_password"/>
        <x-forms.button-danger type="submit" name="Change Password"/>
    </form>
</div>
