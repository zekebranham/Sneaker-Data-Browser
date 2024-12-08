<?php
class Sneaker {
    public $make;
    public $model;
    public $colorway;
    public $price;
    public $newRelease;
    public $picture;

    // Constructor to initialize a sneaker
    public function __construct($make, $model, $colorway, $price, $newRelease, $picture) {
        $this->make = $make;
        $this->model = $model;
        $this->colorway = $colorway;
        $this->price = $price;
        $this->newRelease = $newRelease;
        $this->picture = $picture;
    }

    // Insert a new sneaker into the JSON file
    // Adds a new sneaker to the JSON file by decoding it 
    //into an array, appending the new sneaker, and saving it back.
    public static function insert($sneaker) {
        $filePath = 'mycollection.json';
        $data = json_decode(file_get_contents($filePath), true);
        $data[] = $sneaker; // Add the new sneaker to the array
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    }

    // Delete a sneaker by model (or any unique identifier)
    //Removes a sneaker by a unique identifier (model in this case) 
    //and writes the updated array back to the JSON file.
    public static function delete($model) {
        $filePath = 'mycollection.json';
        $data = json_decode(file_get_contents($filePath), true);
        $data = array_filter($data, function($s) use ($model) {
            return $s['model'] !== $model;
        });
        file_put_contents($filePath, json_encode(array_values($data), JSON_PRETTY_PRINT));
    }

    // Edit an existing sneaker by model
    //Finds a sneaker by its model and updates its attributes.
    public static function edit($model, $updatedSneaker) {
        $filePath = 'mycollection.json';
        $data = json_decode(file_get_contents($filePath), true);
        foreach ($data as &$s) {
            if ($s['model'] === $model) {
                $s = array_merge($s, $updatedSneaker); // Merge updated values
                break;
            }
        }
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}

?>
