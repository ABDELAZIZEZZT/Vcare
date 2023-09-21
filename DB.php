<?php


class DB
{
    public $con;
    public function __construct()
    {
        try {
            $this->con = new PDO('mysql:host=localhost;dbname=vcare', 'root', '');
            $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            echo"ZEZO";
            echo "zezo";
            die($e->getMessage());
        }
    }

    public function getAll($table)
    {
        $query = "SELECT * FROM $table ";
        $data = $this->con->query($query);
        return $data->fetchAll();
    }

     public function getById($table, $id)
    {
        $query = "SELECT *FROM $table WHERE id= $id";
        $data = $this->con->query($query);
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertData($table,$columns, $data)
     {
    //     $columns_name = implode(',', array_keys($data));
    //     $columns_name = array_map(function($columns){
    //         return"`$columns`";
    //     });
      
        $query = "INSERT INTO $table $columns VALUES $data";
        // var_dump($query);
        $sql = $this->con->prepare($query);
        return $sql->execute();
    }

    public function updateData($table, array $data, $id)
    {
        foreach ($data as $key => $val) {
            $d[] = "`$key` = '$val'";
        }
        $info = implode(', ', $d);
        $query = "UPDATE $table SET $info WHERE id=$id";
        echo $query;
        $sql = $this->con->prepare($query);
        return $sql->execute();
    }
    public function updateDataDoctor($table, string $data, $id)
    {
        // foreach ($data as $key => $val) {
        //     $d[] = "`$key` = '$val'";
        // }
        // $info = implode(', ', $d);
        $query = "UPDATE $table SET $data WHERE id=$id";
        // echo $query;
        $sql = $this->con->prepare($query);
        return $sql->execute();
    }
   

    public  function deleteData($table, $id)
    {
        $query = "DELETE FROM $table WHERE id=$id";
        $sql = $this->con->prepare($query);
        return $sql->execute();
    }
}

// $op=new DB;
// echo"<pre>";
// var_dump($op->getAll("users"));
// echo"<pre>.<br>";
// var_dump($op->getById("users",1));
// echo"<pre>.<br>";
// $data=['name'=>'zezo'];
// $op->updateData("users",$data,1);