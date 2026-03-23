<?php 

class HomeController {
    public function home() {
        // Giả lập dữ liệu để file home.php không bị lỗi undefined variable
        $top5ProductLatest = [
            ['name' => 'Sản phẩm 1'],
            ['name' => 'Sản phẩm 2']
        ];
        require_once './views/home.php';
    }
}
?>