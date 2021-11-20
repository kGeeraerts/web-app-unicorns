<div>
    <div class="flex items-start space-x-10 justify-center w-screen dark:text-white">
        <a href="{{route('contact.create')}}">Contact us</a><br>
        <a href="{{route('about')}}">About us</a>
        @can('under-construction')
            <p>Social Media</p>
            <p>Sitemap</p>
        @endcan
    </div>
    <div class="justify-center flex w-screen dark:text-white">&copy; 2021 Unicorns 🦄</div>
    <!-- https://www.freecodecamp.org/news/how-to-keep-your-footer-where-it-belongs-59c6aa05c59c/ -->
</div>
