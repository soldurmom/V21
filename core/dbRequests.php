<?php
namespace dbase {
    trait Requests{
        public static function Query($request){
            $link = mysqli_connect("localhost:3306", "root", "AY96v/k)c");
            return mysqli_query($link, $request);
        }
        public static function create($table, $data){
            $sql = "INSERT INTO `kursuch`.`".$table."` VALUES (null,'".implode("','", $data)."');";
            Requests::Query($sql);
        }
        public static function read($table, $orderBy='id',array $where = NULL){
            $sql = "SELECT * FROM `kursuch`.".$table;
            $sql .= $where ? " WHERE `".$where['key']."` = ".$where['value'] : "" ;
            $sql .= " ORDER BY ".$orderBy." ASC;";
            $res = Requests::Query($sql);
            if(isset($res->num_rows)){
                while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    $array[] = $row;
                }
                return $array;
            }
            return false;
        }
        public static function update($table, $id, $values){
            $getColumn = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$table."'";
            $res = Requests::Query($getColumn);
            $row = mysqli_fetch_row($res);
            for($i=0;$i<count($values);$i++){
                if(!empty($values)){
                    $sql = "UPDATE `kursuch`.`".$table."` SET `".$row[$i+1]."` = '".$values[$i]."' WHERE (`id_user` = '".$id."');";
                    Requests::Query($sql);
                }
            }

        }
        public static function delete($table, $id){
            Requests::Query("DELETE FROM '".$table."' WHERE (`id_user` = '".$id."');");
        }
    }
}