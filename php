try {
    $pdo = new PDO('uri:mysqlPdo.ini', 'root', '');
} catch (PDOException $e) {
    die("数据库连接失败" . $e->getMessage());
}

//查询
$sql = "select * from user";
foreach ($pdo->query($sql) as $val) {
    echo $val['id'] . "----" . $val['name'] . "<br>";
}

//删除
$sql = "DELETE FROM user WHERE  id=4";
echo "delete " . $pdo->exec($sql);
echo "<br>";

//增加
$sql = "INSERT INTO user(id,name) VALUES ('4','ios')";
echo "insert into " . $pdo->exec($sql);
echo "<br>";

//更新UPDATE 表名称 SET 列名称 = 新值 WHERE 列名称 = 某值
$sql = "UPDATE user SET name='python' WHERE name='ios'";
echo "update " . $pdo->exec($sql);
echo "<br>";
