<!DOCTYPE html>
<html data-theme="halloween" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/daisyui/2.13.6/full.min.css" integrity="sha512-UNFlkjSnRPNataSve0C2T73t80tnyvZ3FJZFT/W1UVaimmSpq92jcfYKkxfHCJJajEUlFg3Q38+RMl2Y2LkYww==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="flex flex-col min-h-screen">
        {{-- Start Header Section --}}
        <header>
        <div class="navbar bg-base-100">
            <div class="flex-1">
              <a class="btn btn-ghost normal-case text-xl">Elzohery Blog</a>
            </div>
            <div class="flex-none ml-auto">
              <ul class="menu menu-horizontal p-0">
                <li><a href={{route('posts.index')}}>Posts</a></li>
                <li><a href={{route('posts.create')}}>Create Post</a></li>
              </ul>
            </div>
          </div>
        </header>
        {{-- End Header Section --}}

        {{-- Start Main Section --}}
          <main class="container mx-auto my-12">
            @yield('content')
          </main>
        {{-- End Main Section --}}

        {{-- Start Footer Section --}}
          <footer class="footer p-10 bg-base-200 text-base-content mt-auto">
            <div>
              <span class="footer-title">Services</span> 
              <a class="link link-hover">Branding</a> 
              <a class="link link-hover">Design</a> 
              <a class="link link-hover">Marketing</a> 
              <a class="link link-hover">Advertisement</a>
            </div> 
            <div>
              <span class="footer-title">Company</span> 
              <a class="link link-hover">About us</a> 
              <a class="link link-hover">Contact</a> 
              <a class="link link-hover">Jobs</a> 
              <a class="link link-hover">Press kit</a>
            </div> 
            <div>
              <span class="footer-title">Legal</span> 
              <a class="link link-hover">Terms of use</a> 
              <a class="link link-hover">Privacy policy</a> 
              <a class="link link-hover">Cookie policy</a>
            </div> 
            <div>
              <span class="footer-title">Newsletter</span> 
              <div class="form-control w-80">
                <label class="label">
                  <span class="label-text">Enter your email address</span>
                </label> 
                <div class="relative">
                  <input type="text" placeholder="username@site.com" class="input input-bordered w-full pr-16"> 
                  <button class="btn btn-primary absolute top-0 right-0 rounded-l-none">Subscribe</button>
                </div>
              </div>
            </div>
          </footer>
        {{-- End Footer Section --}}
    </body>
</html>
