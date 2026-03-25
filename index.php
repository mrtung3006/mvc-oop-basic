<?php 
// 1. Require các file chung
require_once './commons/env.php';
require_once './commons/function.php';

// 2. Require Controllers và Models (bao gồm cả của Category mới)
require_once './controllers/HomeController.php';
require_once './controllers/CategoryController.php'; 
require_once './models/Product.php';
require_once './models/Category.php';

$act = $_GET['act'] ?? '/';

switch ($act) {
    // --- TRANG CLIENT ---
    case '/':
        (new HomeController())->home();
        break;

    // --- TRANG ADMIN (Gộp chung tại đây) ---
    case 'admin-categories': // Danh sách danh mục
        (new CategoryController())->index();
        break;

    case 'admin-category-create': // Thêm danh mục
        (new CategoryController())->create();
        break;

    case 'admin-category-delete': // Xóa danh mục
        (new CategoryController())->destroy();
        break;
    case 'admin-category-edit':
        (new CategoryController())->edit();
        break;
    default:
        echo "404 - Trang không tồn tại";
        break;

}