<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lịch sử các giao dịch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
    <div class="col-md-12">
        <!--        header-->
        <h1>BANK OF CODEGYM</h1>
    </div>
    <hr>

    <div class="col-md-12">
        <!--        menu-->
        <!--        <nav class="navbar navbar-inverse navbar-fixed-top">-->
        <a href="#">Home</a> |
        <a href="index.php?page=transfer">Transfer</a> |
        <a href="#">Thông tin khách hàng</a> |
        <!--        </nav>-->
    </div>
    <hr>
    <div class="col-md-12">
        <!--        list-->
        <h2 style="color: chocolate">Lịch sử các giao dịch</h2>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Mã giao dịch</th>
        <th>Tài khoản gửi</th>
        <th>Tài khoản nhận</th>
        <th>Số tiền chuyển</th>
        <th>Thời gian</th>
        <th>Nội dung</th>
        <th>Trạng thái</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($trans as $row) : ?>

        <tr>
            <td><?php echo $row['id_transaction']?></td>
            <td><?php echo $row['source_id']?></td>
            <td><?php echo $row['target_id']?></td>
            <td><?php echo $row['amount']?></td>
            <td><?php echo $row['dateTime']?></td>
            <td><?php echo $row['content']?></td>
            <td><?php
                if ($row['success']==1)
                    echo 'Thành công';
                else echo 'Thất bại'?></td>
        </tr>

    <?php endforeach;?>
    </tbody>
</table>
<form method="post">
    <a href="index.php?page=transfer">Tranfer</a>
</form>




