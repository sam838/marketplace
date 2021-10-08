@component('mail::message')

<img src="https://i.ibb.co/nc5jNd0/Logo-Sneaky-V3.png" alt="" style="width: 280px; height: 150px; display: block; margin-left: auto; margin-right: auto;">

<hr>

Dear {{ $user['nama'] }}, <br>
<br>
Welcome to Our Daily Sneak. <br>
Your Account is : {{ $user['email'] }} <br>
Please click the following link to complete registration: <br>

<?php
    $url = "http://127.0.0.1:8000/verifyMail/".$user['email'];
?>

@component('mail::button', ['url' => $url])
    Verify Email
@endcomponent

What is Our Daily Sneak? <br>
<br>
Our Daily Sneak is an originals sneakers <br>
shoes online store <br>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
    More details on Our Daily Sneak
@endcomponent

<hr>

<div style="text-align:center;">
    © 2020 Our Daily Sneak. All Rights Reserved. <br>
    <a href="https://www.google.com/maps/place/Jl.+Ngagel+Jaya+Tengah+No.73-77,+Baratajaya,+Kec.+Gubeng,+Kota+SBY,+Jawa+Timur+60284/data=!4m2!3m1!1s0x2dd7fbb389e69e91:0x13a2a525ff8b9ff0?sa=X&ved=2ahUKEwi1tNaPjMvmAhXHbn0KHfDgBGoQ8gEwAHoECAsQAQ">iSTTS</a>, Surabaya <br>
</div>
<br>
<img src="https://i.ibb.co/nc5jNd0/Logo-Sneaky-V3.png" alt="" style="width: 100px; height: 50px; display: block; margin-left: auto; margin-right: auto;">
@endcomponent
