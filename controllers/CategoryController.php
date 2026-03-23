<?php
class CategoryController {
    public $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    // Hiển thị danh sách
    public function index() {
        $categories = $this->categoryModel->getAll();
        require_once './views/categories/index.php';
    }

    // Xử lý thêm mới
    public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $slug = $_POST['slug'] ?? '';
        $parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'] : null;
        $description = $_POST['description'] ?? '';

        try {
            $check = $this->categoryModel->insert($name, $slug, $parent_id, $description);
            if ($check) {
                header('Location: ?act=admin-categories');
                exit(); 
            }
        } catch (PDOException $e) {
            // Kiểm tra nếu mã lỗi là 23000 (Trùng lặp dữ liệu)
            if ($e->getCode() == 23000) {
                $error = "Lỗi: Slug '$slug' đã tồn tại trong hệ thống. Vui lòng chọn tên khác!";
            } else {
                $error = "Lỗi cơ sở dữ liệu: " . $e->getMessage();
            }
        }
    }
    // Truyền biến $error vào file view
    require_once './views/categories/create.php';
}
    public function destroy() {
    $id = $_GET['id'];
    if ($this->categoryModel->delete($id)) {
        header('Location: ?act=admin-categories');
    }
}
public function edit() {
    $id = $_GET['id'];
    $category = $this->categoryModel->find($id);

    if (!$category) {
        echo "Danh mục không tồn tại";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $slug = $_POST['slug'] ?? '';
        $parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'] : null;
        $description = $_POST['description'] ?? '';

        try {
            if ($this->categoryModel->update($id, $name, $slug, $parent_id, $description)) {
                header('Location: ?act=admin-categories');
                exit();
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "Lỗi: Slug '$slug' đã tồn tại.";
            } else {
                $error = "Lỗi: " . $e->getMessage();
            }
        }
    }
    require_once './views/categories/edit.php';
}
}