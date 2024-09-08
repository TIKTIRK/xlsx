<!DOCTYPE html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
    <table>
        <thead>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Почта</th>
            <th>Телефон</th>
            <th>Должность</th>
        </thead>
        <tbody>
            <?php
                require_once("db.php");
                $sql = "SELECT * FROM human";
                $result=$con -> query($sql);

                while($row=$result->fetch_assoc()){
                echo 
                "<tr>
                    <td>" .$row['surname'] . "</td>
                    <td>" .$row['name'] . "</td>
                    <td>" .$row['mid_name'] . "</td>
                    <td>" .$row['email'] . "</td>
                    <td>" .$row['phone'] . "</td>
                    <td>" .$row['position'] . "</td>
                </tr>";
                }
            ?>
        </tbody>
    </table>
</body>