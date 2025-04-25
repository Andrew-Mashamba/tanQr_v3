
<div >

<style>
    .flex {
        display: flex;
    }

    .justify-center {
        justify-content: center;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .w-96 {
        width: 24rem; /* Assuming 1rem = 16px, so 96 is 24rem */
    }

    .flex-col {
        flex-direction: column;
    }

    .space-y-4 > * + * {
        margin-top: 1rem;
    }

    .py-4 {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .font-bold {
        font-weight: bold;
    }

    .text-2xl {
        font-size: 1.5rem; /* Assuming 1rem = 16px, so 2xl is 1.5rem */
    }

    .text-center {
        text-align: center;
    }

    .text-c {
        color: #1F3251;
    }

    .inline-block {
        display: inline-block;
    }

    .pr-2 {
        padding-right: 0.5rem;
    }

    .pl-2 {
        padding-left: 0.5rem;
    }

    .m-1 {
        margin: 0.25rem;
    }

    .border {
        border-width: 1px;
        border-style: solid;
    }

    .border-c {
        border-color: #1F3251;
    }

    .rounded {
        border-radius: 0.25rem;
    }

    .text-base {
        font-size: 1rem; /* Assuming 1rem = 16px */
    }

    .text-c {
        color: #7B879D;
    }

    .font-bold {
        font-weight: bold;
    }

    .text-2xl {
        font-size: 1.5rem; /* Assuming 1rem = 16px, so 2xl is 1.5rem */
    }

    .text-center {
        text-align: center;
    }

    .text-c {
        color: #1F3251;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .myClass {
        background-color: #2ca02c;
    }
    .container {
        width: 100%;
        margin-right: auto;
        margin-left: auto;
    }

    .mx-auto {
        margin-right: auto;
        margin-left: auto;
    }

    .p-8 {
        padding: 2rem;
    }

    .bg-white {
        background-color: #fff;
    }

    .shadow-lg {
        box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1), 0 6px 6px -5px rgba(0, 0, 0, 0.04);
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .relative {
        position: relative;
    }
    .rounded-lg {
        border-radius: 0.5rem;
    }

    .absolute {
        position: absolute;
    }

    .top-2 {
        top: 0.5rem;
    }

    .right-2 {
        right: 0.5rem;
    }

    .w-60 {
        width: 15rem;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .mr-4 {
        margin-right: 1rem;
    }
    .absolute {
        position: absolute;
    }

    .top {
        top: 50%;
    }

    .left {
        left: 50%;
    }

    .transform {
        transform: none; /* reset any existing transforms */
    }

    .-translate-x {
        transform: translateX(-50%);
    }

    .-translate-y {
        transform: translateY(-50%);
    }

    .bg-white {
        background-color: #fff;
    }

    .rounded-xl {
        border-radius: 0.75rem;
    }

    .p-4 {
        padding: 1rem;
    }

    .w-fit {
        width: fit-content;
    }

    .h-fit {
        height: fit-content;
    }

    .centered-div {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .body-text {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 300px; /* Set the desired height */
        max-width: 100%;
        margin: 0 auto; /* Optionally center the container itself */
        /* Additional styles specific to your use case */
        background-color: #fff;
        border-radius: 0.75rem; /* Rounded corners */
        padding: 1rem;
        box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1), 0 6px 6px -5px rgba(0, 0, 0, 0.04);
    }

    /* Additional styles for demonstration purposes */
    .centered-element {

        padding: 10px;
    }
    .margin-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .parent {
        background: white;
        height: 450px;
        width: 330px;
        position: relative;
    }

    .child {

        position: absolute;
        width: 220px;
        bottom: 0%;
        left: 50%;
        transform: translate(-50%,-50%);
        text-justify: inter-word;
        display: flex;
        justify-content: center;
        align-items: center;
        word-wrap: break-word;
        text-align: center;
        font-weight: bold;
        font-size: 20px;

    }
    .childx {

        position: absolute;
        top: 36%;
        left: 50%;
        transform: translate(-50%,-50%);

    }

    .childy {

        position: absolute;
        bottom: 25%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 395px;
    }

    .childz {

        position: absolute;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 390px;
    }


</style>

<div class="container mx-auto p-8 bg-white shadow-lg rounded-lg
                        relative body-text" style="width: 650px;
                        height: 890px; max-width: 100%;
                        background-image: url('{{ asset('images/finx.png') }}');
                        background-size: cover; background-position: center;">

    <img id="logo" class="rounded-lg absolute top-2 right-2 w-60 mt-4 mr-4" src="{{ asset('images/logoletx.png') }}" alt="Logo Image" />

    <div id="details" class="parent centered-div bg-white shadow-lg rounded-lg">


        <div class="childx">
            <img src="data:image/png;base64, {{ $qrCode }}" alt="QR code" style="width: 270px;
        height: 270px;">
        </div>

        <div class="childy">
                                    <span class="childz body-text font-bold text-2xl text-center text-c">
                                        @foreach(str_split($merchant_id) as $digit)
                                            <span class="body-text inline-block pr-2 pl-2 border border-c rounded">
                                                {{ $digit }}
                                            </span>
                                        @endforeach
                                    </span>

        </div>

        <p class="child">{{$merchant_name}}</p>



    </div>
</div>



</div>
