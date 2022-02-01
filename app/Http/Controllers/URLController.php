<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\URLShort;

class URLController extends Controller
{
    public function index()
    {
        $tops = URLShort::paginate(100);
        return view('url.short', compact('tops'));
    }

    public function short(Request $request)
    {
        $url = URLShort::whereUrl($request->url)->first();
        if ($url == null) {
            $short = $this->generateShortUrl();
            UrlShort::create([
                'url' => $request->url,
                'short' => $short
            ]);
            $url = URLShort::whereUrl($request->url)->first();
        }
        return view('url.short_url', compact('url'));
    }

    public function generateShortUrl()
    {
        $result = base_convert(rand(1000, 99999), 10, 36);
        $data = URLShort::whereShort($result)->first();

        if ($data != null) {
            $this->generateShortUrl();
        }
        return $result;
    }

    public function shortLink($link)
    {
        $url = URLShort::whereShort($link)->first();
        return redirect($url->url);
    }
}
