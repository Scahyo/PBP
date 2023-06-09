<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>
        <?= $title; ?>
    </title>
</head>

<body>
    <div class="container">
        <div class="mt-4  rounded">
            <h1>Pendaftaran Asisten Praktikum</h1>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kelas Praktikum</th>
                    <th>IPK</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $l): ?>
                    <tr>
                        <td>
                            <?= esc($l['NIM']); ?>
                        </td>
                        <td>
                            <?= esc($l['NAMA']); ?>
                        </td>
                        <td>
                            <?= esc($l['PRAKTIKUM']); ?>
                        </td>
                        <td>
                            <?= esc($l['IPK']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/login/logout">Logout</a>
    </div>
</body>

</html>