<?php namespace App\Http\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

use function config;

trait SpotifyLogic
{

    public function getSpotifyStuff($artistName, $trackName)
    {
        {
            // step 1 - get auth token
            $clientId = config('spotifyapi.SPOTIFY_CLIENT_ID');
            $clientSecret = config('spotifyapi.SPOTIFY_CLIENT_SECRET');
            $basicUrl = 'https://accounts.spotify.com/api/token';
            if(!Cache::has('authToken')){
                $authTest = Http::withBasicAuth($clientId, $clientSecret)
                    ->asForm()
                    ->post($basicUrl, [
                        'grant_type' => 'client_credentials'
                    ]);

                $token = $authTest->json('access_token');

                Cache::put('authToken', $token, 60);
            }


            // step 2 - get artist ID
            $q = $artistName;
            $type = 'artist';
            $getArtistId = Http::withToken(Cache::get('authToken'))
                ->get('https://api.spotify.com/v1/search?q=' . $q . '&type=' . $type . '');

            $decodedArtist = json_decode($getArtistId, true);
            $artistId = $decodedArtist['artists']['items'][0]['id'];

            // step 3 - get ID of a track using track name


            $q = $trackName;
            $type = 'track';
            $getTrackId = Http::withToken(Cache::get('authToken'))
                ->get('https://api.spotify.com/v1/search?q=' . $q . '&type=' . $type . '');

            $decodedTrack = json_decode($getTrackId, true);
            $structure = $decodedTrack['tracks']['items'];
            // find the track by artist
            foreach ($structure as $id) {
                $iterate = [$id][0]['artists'];
                foreach ($iterate as $artist) {
                    if ($artist['id'] == $artistId) {
                        $trackId = $id['id'];

                    }
                }
            }
            // stage 3 - get recommended
            $recommended = Array();
            $getRecommended = Http::withToken(Cache::get('authToken'))
                ->get('https://api.spotify.com/v1/recommendations?seed_artists=' . $artistId . '&seed_track=' . $trackId);

            $decodedRecommended = json_decode($getRecommended, true);
            $tracks = $decodedRecommended['tracks'];
            foreach ($tracks as $id) {
                $trackName = [$id][0]['name'];
                $trackArtist = [$id][0]['artists'][0]['name'];
                array_push($recommended,"{$trackArtist} - {$trackName}");
            }
        }
        return $recommended;
    }
}

