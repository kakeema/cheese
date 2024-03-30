<?php

class Cheese {
    private $id;
    private $name;
    private $type;
    private $country_of_origin;
    private $strength;
    private $price_per_gram;

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }
    public function getCountryOfOrigin() {
        return $this->country_of_origin;
    }
    public function getStrength() { 
        return $this->strength;
    }
    public function getPricePerGram() { 
        return $this->price_per_gram;
    }

    // Setters 
    public function setID($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setCountryOfOrigin($country_of_origin) {
        $this->country_of_origin = $country_of_origin;
    }

    public function setStrength($strength) {
        $this->strength = $strength;
    }

    public function setPricePerGram($price_per_gram) {
        $this->price_per_gram = $price_per_gram;
    }
}

?>