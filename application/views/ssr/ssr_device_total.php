<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ssr-device-total</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2 class="mb-3">device 테이블 (SSR)</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>id_device</th>
                <th>name_device</th>
                <th>id_cpu</th>
                <th>lineup_device</th>
                <th>release_device</th>
                <th>weight_device</th>
                <th>type_code_device</th>
                <th>manf_code_device</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($deviceList)): ?>
                <tr>
                    <td colspan="8" class="text-center text-muted">데이터가 없습니다.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($deviceList as $device): ?>
                    <tr>
                        <td><?= htmlspecialchars($device['id_device']) ?></td>
                        <td><?= htmlspecialchars($device['name_device']) ?></td>
                        <td><?= htmlspecialchars($device['id_cpu']) ?></td>
                        <td><?= htmlspecialchars($device['lineup_device']) ?></td>
                        <td><?= htmlspecialchars($device['release_device']) ?></td>
                        <td><?= htmlspecialchars($device['weight_device']) ?></td>
                        <td><?= htmlspecialchars($device['type_code_device']) ?></td>
                        <td><?= htmlspecialchars($device['manf_code_device']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
