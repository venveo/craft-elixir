# Use Laravel Elixir with Craft CMS

You can already use Laravel Elixir with Craft. It's rather straight forward. In fact, Matt Stauffer has an [excellent write up on using Elixir on his company blog](http://blog.tighten.co/setting-up-your-first-vuejs-site-using-laravel-elixir-and-vueify?utm_source=github.com/venveo/craft-elixir).

However, when using a CDN such as [CloudFlare](https://www.cloudflare.com/) or [Fastly](https://www.fastly.com/). You might want to take advantage of file versioning to bust the cache. This plugin lets you use Elixir's built in versioning in your Craft templates!

## Requirements

[npm](https://www.npmjs.com/)

## Installation and Setup

If you haven't read the [Elixir documentation on the Laravel website](https://laravel.com/docs/master/elixir) or the blog post above, Here is a quick overview  on setting up Elixir.

create a `package.json` with the following content:

```
{
  "private": true,
  "devDependencies": {
    "gulp": "^3.9.1"
  },
  "dependencies": {
    "laravel-elixir": "^5.0.0",
    "bootstrap-sass": "^3.0.0"
  }
}
```

run the npm install command:

`npm install`

add your SCSS, JavaScript and etc just like a Laravel project under `resources/assets/sass` and `resources/assets/js`.

create a `gulpfile.js` with your contents or copy this one:

```
elixir(function(mix) {
    mix.sass('app.scss')
        .version('css/app.css');
});
```

Run gulp!

When using the Elixir version function your CSS/JavaScript will output to `public/css/all-16d570a7.css`.  This is where this plugin comes in!

With Laravel there is an Elixir PHP helper function that retrieves the correct version. Now you can do this in Craft templates!

`<link rel="stylesheet" href="{{ craft.elixir.version("css/all.css") }}">`

and

`<script src="{{ craft.elixir.version("js/app.js") }}"></script>`

## Credits

* [Jason McCallister](https://github.com/themccallister)
* [Carlo Latiano](https://github.com/carlolaitano)

## About Venveo

Venveo is a Digital Marketing Agency for Building Materials Companies in Blacksburg, VA. Learn more about us on our website.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
