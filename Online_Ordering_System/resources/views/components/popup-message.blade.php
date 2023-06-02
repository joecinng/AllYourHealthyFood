@if (session()->has('message')) 
    <div>
        <p class="popup-message">
            {{session('message')}}
        </p>
    </div>
@endif