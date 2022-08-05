<?php
Session();

?>
@extends('layouts.layout')
@section('headers')
    <link rel="stylesheet" href="{{ asset('css/contact_us.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Home_style.css') }}">
@endsection
@section('content')
    <nav class="navbar navbar-expand-sm  navbar-dark bg-dark" style="box-shadow: 14px 14px 100px grey;">
        <a href=""><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span
                    style="color:orange;font-size: 30px;">Railways</span></span></a>
        <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon ml-auto"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav nav-pills ml-auto text-center">
                <li class="nav-item"><a class="nav-link" href="Home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact_us">Contact</a></li>
                @if (Session()->has('user_id'))
                    <li class="nav-item"><a class="nav-link" onclick="window.open('userdashboard');"
                            style="cursor: pointer;">My Account</a></li>
                @else
                    <li class="nav-item"><a class="nav-link"
                            onclick="document.getElementById('id01').style.display='block'" style="cursor: pointer;">My
                            Account</a></li>
                @endif
            </ul>
        </div>
        @if (Session()->has('user_id'))
            <a class="nav-link " id="navbarDropdown" role="button" data-toggle="dropdown" style="cursor: pointer;"><i
                    class="fas fa-user " style="font-size: 30px; margin:10px" style="width:auto; "></i></a>
            <span class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/logout">Logout</a>
            </span>
        @else
            <a style="cursor: pointer;"><i class="fas fa-user" style="font-size: 30px; margin:10px"
                    onclick="document.getElementById('id01').style.display='block'" style="width:auto; "></i></a>
        @endif
    </nav>

    <br><br>

    <!-- Contact Us -->
    <section class="white-section">

        <div class="container">

            <div class="contact-form">
                <h1 class="title">Contact Us</h1>
                <h2 class="subtitle">If you've any query, then don't hesitate to contact us.</h2>

                <form action="/feedback" method="POST">

                    @csrf
                    <input type="text" name="name" placeholder="Your Name" onkeyup="validate(this)">
                    <input type="email" name="email" placeholder="Your E-mail Adress" onkeyup="validate(this)">
                    <input type="tel" name="phone" placeholder="Your Phone Number" onkeyup="validate(this)">

                    <textarea name="text" id="message" rows="8" placeholder="Your Message"></textarea>
                    <p id="num_of_chars"> out of 150</p>
                    <button class="btn btn-primary btn-send" type="submit">Send Message</button>
                </form>

            </div>

        </div>

    </section>


    <div id="id01" class="modal align-items-center">
        <form class="form-horizontal modal-content animate " action="/login" method="post">
            @csrf
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="{{ asset('img/avatar.jpg') }}" alt="Avatar" class="avatar">
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-12">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-12">
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password"
                        required>
                    @if ($errors->any())
                        <script>
                            $("a .fa-user").click()
                        </script>
                        <p style="color: red">{{ $errors->first() }}</p>
                    @endif

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-5 offset-1">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="col-5">
                        <button onclick="goto_signup();" class="btn btn-info">Sign Up</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script src="{{ asset('js/form-validation/contactUs.js') }}"></script>
    <script src="{{ asset('js/Home.js') }}"></script>
@endsection
