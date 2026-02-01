<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ssr-member-total</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2 class="mb-3">member 테이블 (SSR)</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>id_member</th>
                <th>id</th>
                <th>pass</th>
                <th>name</th>
                <th>email</th>
                <th>regist_day</th>
                <th>role</th>
                <th>status</th>
                <th>email_verified</th>
                <th>fail_count</th>
                <th>last_login</th>
                <th>updated_at</th>
                <th>deleted_at</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($memberList)): ?>
                <tr>
                    <td colspan="13" class="text-center text-muted">데이터가 없습니다.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($memberList as $member): ?>
                    <tr>
                        <td><?= htmlspecialchars($member['id_member']) ?></td>
                        <td><?= htmlspecialchars($member['id']) ?></td>
                        <td><?= htmlspecialchars($member['pass']) ?></td>
                        <td><?= htmlspecialchars($member['name']) ?></td>
                        <td><?= htmlspecialchars($member['email']) ?></td>
                        <td><?= htmlspecialchars($member['regist_day']) ?></td>
                        <td><?= htmlspecialchars($member['role']) ?></td>
                        <td><?= htmlspecialchars($member['status']) ?></td>
                        <td><?= htmlspecialchars($member['email_verified']) ?></td>
                        <td><?= htmlspecialchars($member['fail_count']) ?></td>
                        <td><?= htmlspecialchars($member['last_login']) ?></td>
                        <td><?= htmlspecialchars($member['updated_at']) ?></td>
                        <td><?= htmlspecialchars($member['deleted_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
