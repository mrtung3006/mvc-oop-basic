<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">
    <?php include './views/components/admin_navbar.php'; ?>

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-primary fw-bold"><i class="fas fa-list me-2"></i>Danh mục đồ gia dụng</h5>
                <a href="?act=admin-category-create" class="btn btn-success">
                    <i class="fas fa-plus-circle me-1"></i> Thêm mới
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Tên danh mục</th>
                            <th width="20%">Slug</th>
                            <th>Mô tả</th>
                            <th width="15%" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $cat) : ?>
                            <tr>
                                <td><?= $cat['id'] ?></td>
                                <td class="fw-bold"><?= htmlspecialchars($cat['name']) ?></td>
                                <td><span class="badge bg-light text-dark border"><?= $cat['slug'] ?></span></td>
                                <td class="text-muted small"><?= htmlspecialchars($cat['description']) ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="?act=admin-category-edit&id=<?= $cat['id'] ?>" class="btn btn-sm btn-outline-warning" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?act=admin-category-delete&id=<?= $cat['id'] ?>" 
                                           class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')" title="Xóa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Chưa có dữ liệu danh mục.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>