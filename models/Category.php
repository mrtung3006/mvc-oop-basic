<?php
class Category {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy danh sách tất cả danh mục
    public function getAll() {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Thêm danh mục mới (khớp với các cột id, name, slug, parent_id, description)
    public function insert($name, $slug, $parent_id, $description) {
    try {
        $sql = "INSERT INTO categories (name, slug, parent_id, description) 
                VALUES (:name, :slug, :parent_id, :description)";
        $stmt = $this->conn->prepare($sql);
        // Quan trọng: Trả về kết quả execute (true/false)
        return $stmt->execute([
            ':name' => $name,
            ':slug' => $slug,
            ':parent_id' => $parent_id,
            ':description' => $description
        ]);
    } catch (PDOException $e) {
        // Ghi log lỗi nếu cần
        throw $e; 
    }
}
    
    // Xóa danh mục
    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
    public function find($id) {
    $sql = "SELECT * FROM categories WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

// Cập nhật danh mục
public function update($id, $name, $slug, $parent_id, $description) {
    $sql = "UPDATE categories 
            SET name = :name, slug = :slug, parent_id = :parent_id, description = :description 
            WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([
        ':id' => $id,
        ':name' => $name,
        ':slug' => $slug,
        ':parent_id' => $parent_id,
        ':description' => $description
    ]);
}
}