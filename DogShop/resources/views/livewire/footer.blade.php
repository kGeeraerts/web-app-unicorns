<div>
    <div class="flex items-start space-x-10 justify-center w-screen mb-2 dark:text-white">
        <a href="{{route('contact.create')}}">Contact us</a><br>
        <a href="{{route('about.index')}}">About us</a>
        <a href="{{route('cookie')}}">Cookie policy</a>
        <a href="{{route('policy.show')}}">Privacy Policy</a>
        <a href="{{route('terms.show')}}">Terms and Conditions</a>
        @can('under-construction')
            <p>Sitemap</p>
        @endcan
    </div>
    <div class="justify-center flex w-screen dark:text-white">&copy; 2021 - Unicorns 🦄</div>
    <!-- https://www.freecodecamp.org/news/how-to-keep-your-footer-where-it-belongs-59c6aa05c59c/ -->
</div>
