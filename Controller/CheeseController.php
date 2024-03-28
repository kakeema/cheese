<?php 
require_once "CheeseModel.php";
require_once "dataAccess.php";

class CheeseController {
    private $model;

    public function __construct($pdo) {
        $this->model = new CheeseModel($pdo);
    }

    public function search() {
        $name = $_GET['name'] ?? null;
        $type = $_GET['type'] ?? null;
        $country = $_GET['country'] ?? null;
        $strength = $_GET['strength'] ?? null;
        $price = $_GET['price'] ?? null;

        $cheeses = $this->model->searchCheese($name, $type, $country, $strength, $price);
        include 'CheeseSearchView.php'; // The View will display the search results
    }
}

// Instantiate and run the controller
$controller = new CheeseController($pdo);
$controller->search();

?>