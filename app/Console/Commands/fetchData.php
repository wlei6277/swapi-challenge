<?php

namespace App\Console\Commands;

use App\Film;
use App\Character;
use Illuminate\Console\Command;

class fetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'fetch:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all of the SWAPI data and update the database accordingly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // fetch the films
        $films = $this->fetch_data("https://swapi.co/api/films")["results"];
        // loop through the films
        foreach($films as $index=>$film) {
            // save each film in the database
            $savedFilm = $this->update_database($film, "film", $index);
            // loop through the character urls for the fetched film
            foreach($film["characters"] as $index=>$characterUrl) {
                // fetch the character from the swapi
                $character = $this->fetch_data($characterUrl);
                // save it into the database
                $savedCharacter = $this->update_database($character, "character", $index);
                // attach the character to the film to enable it to be eager loaded on the index page
                $savedFilm->characters()->attach($savedCharacter->id);
            }
        }
    }

    // fetch_data leverages the Guzzle HTTP client to fetch data from the provided SWAPI end point  
    public function fetch_data($url){
        $client = new \GuzzleHttp\Client(['base_uri' => $url]);
        $res = $client->request('GET');
        $data = $res->getBody()->getContents();
        $decodedData = json_decode($data, true);
        return $decodedData;   
    }

    // update_database inserts the provided swapi resource into the database
    public function update_database($resource, $type, $index) {
        if ($type === "film") {
            $filmModel = new Film();
            $savedResource = Film::updateOrCreate($filmModel->filterFillableValues($resource));
        } elseif ($type === "character") {
            $characterModel = new Character();
            $savedResource = Character::updateOrCreate($characterModel->filterFillableValues($resource));
        }
        echo 'Sucessfully updated / created ', $type,' ', $index+1, "\n";
        return $savedResource;
    }
}
