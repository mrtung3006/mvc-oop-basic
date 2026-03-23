<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm danh mục mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">
    <?php include './views/components/admin_navbar.php'; ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white py-3">
                        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Thêm danh mục đồ gia dụng</h5>
                    </div>
                    <div class="card-body p-4">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="fas fa-exclamation-circle me-2"></i> <?= $error ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form action="?act=admin-category-create" method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Nhập tên danh mục...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Slug (Đường dẫn tĩnh)</label>
                                <input type="text" class="form-control bg-light" id="slug" name="slug" required placeholder="tu-dong-tao-slug">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Danh mục cha (ID)</label>
                                <input type="number" class="form-control" name="parent_id" placeholder="Để trống nếu là cấp cao nhất">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Mô tả</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Mô tả ngắn gọn về danh mục..."></textarea>
                            </div>

                            <div class="d-flex justify-content-between pt-3 border-top">
                                <a href="?act=admin-categories" class="btn btn-outline-secondary px-4">Hủy bỏ</a>
                                <button type="submit" class="btn btn-success px-4">Lưu danh mục</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .normalize("NFD").replace(/[\u0300-\u036f]/g, "")
                .replace(/[đĐ]/g, 'd')
                .replace(/([^0-9a-z-\s])/g, '')
                .replace(/(\s+)/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
</body>
</html>