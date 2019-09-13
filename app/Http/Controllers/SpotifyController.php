<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyController extends Controller
{
    /** @var Session $session */
    protected $session;
    /** @var SpotifyWebAPI $api */
    protected $api;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->session = new Session(
            ENV('SPOTIFY_CLIENT_ID'),
            ENV('SPOTIFY_CLIENT_SECRET')
        );

        $this->api = new SpotifyWebAPI();
    }

    public function getCategories(Request $request) {
        $this->session->requestCredentialsToken();
        $accessToken = $this->session->getAccessToken();
        $this->api->setAccessToken($accessToken);

        return json_encode($this->api->getCategoriesList(['limit' => 50]));
    }

    public function getNewReleases(Request $request) {
        $this->session->requestCredentialsToken();
        $accessToken = $this->session->getAccessToken();
        $this->api->setAccessToken($accessToken);

        return json_encode($this->api->getNewReleases(['limit' => 50]));
    }
}
