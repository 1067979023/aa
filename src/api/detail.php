<?php
    include 'conn.php';//引入外部文件

    // var_dump($conn);
    //2.书写查询语句->执行语句->得到结果->返回给前端
    //接收前端数据
    $mid = isset($_REQUEST['mid']) ? $_REQUEST['mid'] : '';//第几页
    
    

    //书写查询语句
    $sql = "SELECT * FROM details WHERE mid=$mid";
    //记得现在navicat检测没有问题再拿过来用

    //执行语句
    $res = $conn->query($sql);//得到的是结果集，如果想要查询到的数据部分还有继续提取

    // var_dump($res);
    $arr = $res->fetch_all(MYSQLI_ASSOC);//得到数组  [{},{},{}]

    // var_dump($arr);
    //查询前设置编码，防止输出乱码
    $conn->set_charset('utf8');

    // //查询总条数
    // $sql2 = 'SELECT * FROM list';
    // $res2 = $conn->query($sql2);

    // //关联数组，可以一次性返回多个数据
    // $list = array(
    //     'data' => $arr,
    //     'total' => $res2->num_rows,
    //     'page' => $page,
    //     'num' => $num
    // );
    // echo $res2->num_rows;

    //返回给前端
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);//把数组转成字符串，传给前端

    //3.关闭连接
    $res->close();//关闭结果集
    $conn->close();//关闭数据库
?>