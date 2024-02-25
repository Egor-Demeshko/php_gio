<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoices</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Стили для мобильных устройств */
        @media only screen and (max-width: 767px) {
            body {
                background-color: #fff;
            }

            .container {
                padding: 10px;
            }

            .header {
                padding: 15px;
                border: 1px solid #ddd;
                border-bottom: 0;
                background-color: #4CAF50;
                color: #fff;
                font-size: 20px;
            }

            .header a {
                color: #fff;
            }

            .header a.right {
                float: right;
            }

            .table-container {
                margin-top: 20px;
                border: 1px solid #ddd;
                border-top: 0;
                background-color: #fff;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
            }

            .table td,
            .table th {
                padding: 10px;
                border: 1px solid #ddd;
            }

            .table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .table tr:hover {
                background-color: #ddd;
            }

            .table th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            Invoices <a href="/invoices/create" class="right">Create</a>
        </div>
        <?php
        var_dump($invoice)
        ?>
    </div>
</body>