<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get('https://api.github.com/users/manusiacoding/repos');
        $datarepos = json_decode($response->getBody());

        $skill = Skill::all()->count();
        $experience = Experience::all()->count();
        $portfolio = Portfolio::all()->count();
        $award = Award::all()->count();

        $message = Message::where('status', 0)->count();

        return view('pages.home.content', compact(['datarepos', 'skill', 'experience', 'portfolio', 'award', 'message']));
    }
}
