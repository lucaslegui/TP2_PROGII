<?php

class Productos {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerProductos($categoria = '') {
        $query = "SELECT id_product, category_product, name_product, description_product, made_of_product, price_product, image_product, exist_product FROM products";
        if (!empty($categoria) && $categoria != 'all') {
            $query .= " WHERE category_product = :category";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['category' => $categoria]);
        } else {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
