<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProducts()
    {
        $this->db->query('SELECT *,
                        products.id as productId,
                        products.name as name,
                        products.price as price,
                        products.image as image,
                        products.created_at as created_at
                        FROM products
                        ORDER BY products.id DESC
                        ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addProduct($data)
    {
        $this->db->query('INSERT INTO products (name, price, image) VALUES(:name, :price, :image)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['image']);


        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProduct($data)
    {
        $this->db->query('UPDATE products SET name = :name, price = :price WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductById($id)
    {
        $this->db->query('SELECT * FROM products WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteproduct($id)
    {
        $this->db->query('DELETE FROM products WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}