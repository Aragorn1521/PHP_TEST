<?php

/*
 * класс занимается запросом данных из таблицы
 */
class getPosts{
/*
 * метод нужен для запроса информации из базы с определенным лимитом и отступом
 */  
public function Posts($lim,$page){
   $db = Db::getConnection();
 
$query = "SELECT * FROM test LIMIT $lim OFFSET $page;";
$result = $db->query($query);
$result->setFetchMode(PDO::FETCH_ASSOC);
$postsList = $result->fetchAll();
$postssList = [];

foreach ($postsList as $post){
    $post = array_values($post);
    
     
    $postssList[] = $post;
}

return $postssList;

}

/*
 *  метод нужен для запроса информации из базы ,а именно запрашивает значение
 * колонок в таблице 
 */
public function giveSpeakers(){
   $db = Db::getConnection();
 
$query = "SELECT * FROM test";
$result = $db->query($query);
$result->setFetchMode(PDO::FETCH_ASSOC);
$Speakers = $result->fetch();
$Speakers = array_keys($Speakers);

return $Speakers;

}
    /*
     * метод нужен для запроса информации из базы,а именно запрашивает количество
     * записей в таблице
     */
public static function getCount(){
    $db = Db::getConnection();
    $query = "SELECT COUNT(*) FROM test";
    $result = $db->query($query);
    $result = $result->fetch();
    return $result[0];
            
}
    /*
     * метод нужен для проверки на соответствие массива с назавниями столбцов таблицы,
     * которые находятся в файле category.php и параметров в URL адресе
     * 
     */
public function complianceCheck($option,$category){
    return array_intersect($category,$option );
    
}
/*
 *  метод нужен для запроса информации из базы данных
 */
public function PostsList($lim,$page){
   $db = Db::getConnection();
 
$query = "SELECT * FROM test LIMIT $lim OFFSET $page;";
$result = $db->query($query);
$postsList = $result->fetchAll();
return $postsList;

}
 /*
  * метод нужен для вывода отфильтрованых данных(выводит только те параметры,
  * которые были введены в URL адрес 
  */
public function myFilter($result,$cat) {


    foreach($result as $row) {
       $cat = array_flip($cat);
       $value = array_intersect_key($row,$cat);
        
       $value = array_values($value);
       $post[] = $value;
    }
    $cat = array_values($cat);
    $result1 = [$cat,$post];
    return $result1;

}



}
