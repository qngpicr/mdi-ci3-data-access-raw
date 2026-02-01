<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ssr-cpu-total.php</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2 class="mb-3">cpu 테이블</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>id_cpu</th>
                <th>name_cpu</th>
                <th>release_cpu</th>
                <th>core_cpu</th>
                <th>thread_cpu</th>
                <th>maxghz_cpu</th>
                <th>minghz_cpu</th>
                <th>type_code_cpu</th>
                <th>manf_code_cpu</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($cpuList)): ?>
                <tr>
                    <td colspan="9" class="text-center text-muted">데이터가 없습니다.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($cpuList as $cpu): ?>
                    <tr>
                        <td><?= htmlspecialchars($cpu['id_cpu']) ?></td>
                        <td><?= htmlspecialchars($cpu['name_cpu']) ?></td>
                        <td><?= htmlspecialchars($cpu['release_cpu']) ?></td>
                        <td><?= htmlspecialchars($cpu['core_cpu']) ?></td>
                        <td><?= htmlspecialchars($cpu['thread_cpu']) ?></td>
                        <td><?= htmlspecialchars($cpu['maxghz_cpu']) ?></td>
                        <td><?= htmlspecialchars($cpu['minghz_cpu']) ?></td>
                        <td><?= htmlspecialchars($cpu['type_code_cpu']) ?></td>
                        <td><?= htmlspecialchars($cpu['manf_code_cpu']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
