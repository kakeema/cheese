<?php 
<<<<<<< HEAD
require_once "../model/cheeseModel.php";
require_once "../model/dataAccess.php";

//  The class gets parsed BUT DOES NOT GET EXECUTED UNTIL CALLED, WHICH I DO LATER.
class CheeseController {
    private $cheeseModel;
    public $cheeses; // Public property to store the search results

    public function __construct() { // magic
        global $pdo;
        $this->cheeseModel = new CheeseModel($pdo);
        $this->fetchInitialCheeses();
    }

    private function fetchInitialCheeses() {
        // This will fetch All the available cheeses from the database when the webpage loads, and when the form is empty
        $this->cheeses = $this->cheeseModel->searchCheese(); // The function is in the cheeseModel.php file
    }

    public function search() {
        $name = $_GET['name'] ?? null; // The ?? is the  null coalescence, kinda similar to the pipeline || in the sense that, where it will check the left side first, if the input for name has data then that will get stored in the variable $name, if it doesn't then it will put null as the value for $name.
=======
require_once "CheeseModel.php";
require_once "dataAccess.php";

class CheeseController {
    private $model;

    public function __construct($pdo) {
        $this->model = new CheeseModel($pdo);
    }

    public function search() {
        $name = $_GET['name'] ?? null;
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
        $type = $_GET['type'] ?? null;
        $country = $_GET['country'] ?? null;
        $strength = $_GET['strength'] ?? null;
        $price = $_GET['price'] ?? null;

<<<<<<< HEAD
        
        $this->cheeses = $this->cheeseModel->searchCheese($name, $type, $country, $strength, $price); // The function is in the cheeseModel.php file
    }
}

// The below line will instantiate and run the class CheeseController, once returned, it will continue where left off.
$controller = new CheeseController($pdo);

if (!empty($_GET)) {
    $controller->search(); // Only perform search if there are data existing from the form inputs.
}
// responsible for displaying the results
require_once "../view/cheeseSearchView.php";
?>
=======
        $cheeses = $this->model->searchCheese($name, $type, $country, $strength, $price);
        include 'CheeseSearchView.php'; // The View will display the search results
    }
}

// Instantiate and run the controller
$controller = new CheeseController($pdo);
$controller->search();

?>
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
