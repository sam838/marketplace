@component('mail::message')

<img src="https://i.imgur.com/ewCxgqx.png" alt="" style="width: 280px; height: 150px; display: block; margin-left: auto; margin-right: auto;">

<hr>

Dear {{ $user['nama'] }}, <br>
<br>
Welcome to SNEAKY. <br>
Your Account is : {{ $user['email'] }} <br>
Please click the following link to reset password: <br>

<?php
    $url = "http://127.0.0.1:8000/reset/".$user['email'];
?>

@component('mail::button', ['url' => $url])
    Reset Password
@endcomponent

What is SNEAKY? <br>
<br>
SNEAKY is an originals sneakers <br>
shoes online store <br>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
    More details on SNEAKY
@endcomponent

<hr>

<div style="text-align:center;">
    © 2019 SNEAKY. All Rights Reserved. <br>
    Add <a href="https://www.google.com/maps/place/Jl.+Ngagel+Jaya+Tengah+No.73-77,+Baratajaya,+Kec.+Gubeng,+Kota+SBY,+Jawa+Timur+60284/data=!4m2!3m1!1s0x2dd7fbb389e69e91:0x13a2a525ff8b9ff0?sa=X&ved=2ahUKEwi1tNaPjMvmAhXHbn0KHfDgBGoQ8gEwAHoECAsQAQ">iSTTS</a>, Surabaya <br>
</div>
<br>
<img src="https://i.imgur.com/ewCxgqx.png" alt="" style="width: 100px; height: 50px; display: block; margin-left: auto; margin-right: auto;">
@endcomponent
