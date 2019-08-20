<?php

namespace App\Console\Commands;

use App\Film;
use App\Character;
use App\Specie;
use App\Vehicle;
use App\Starship;
use App\Planet;
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

            $resources = ["characters", "planets", "starships", "vehicles", "species"];

            // loop through each of the resource urls for the fetched film
            // fetch the resource from the swapi
            // save it into the database
            // attach the resource to the film to enable it to be eager loaded on the index page
            foreach($resources as $resource) {
                foreach($film[$resource] as $index => $resourceUrl) {
                    $fetchedResource = $this->fetch_data($resourceUrl);
                    $savedResource = $this->update_database($fetchedResource, $resource, $index, $savedFilm);
                }
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
    public function update_database($resource, $type, $index, $film = "") {
        $savedResource = null;
        if ($type === "film") {
            $filmModel = new Film();
            $savedResource = Film::updateOrCreate($filmModel->filterFillableValues($resource));
        } elseif($type === "characters") {
            $characterModel = new Character();
            $savedResource = Character::updateOrCreate($characterModel->filterFillableValues($resource));
            $film->characters()->attach($savedResource->id);
        } else if($type === "planets") {
            $planetModel = new Planet();
            $savedResource = Planet::updateOrCreate($planetModel->filterFillableValues($resource));
            $film->planets()->attach($savedResource->id);
        } else if($type === "species") {
            $specieModel = new Specie();
            $savedResource = Specie::updateOrCreate($specieModel->filterFillableValues($resource));
            $film->species()->attach($savedResource->id);
        } else if ($type === "starships") {
            $starshipModel = new Starship();
            $savedResource = Starship::updateOrCreate($starshipModel->filterFillableValues($resource));
            $film->starships()->attach($savedResource->id);
        } else if ($type === "vehicles") {
            $vehicleModel = new Vehicle();
            $savedResource = Vehicle::updateOrCreate($vehicleModel->filterFillableValues($resource));
            $film->vehicles()->attach($savedResource->id);
        }
        echo "Created / updated ", $type, " ", $index + 1 , "\n";
        return $savedResource;
    }
}
