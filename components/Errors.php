<?php


class Errors {
      /*
     * Функция принимает 5 параметров.1 и 2 - проверка Lim и page на соответсвие 
     * строкам "Lim и page" в URL запросе.3 и 4 - это сами значения Lim и page
     * 5 параметр - это количество записей в таблице
     */
   public function Err($limParam,$pageParam,$pages,$lim, $getCount){
//если значение функции вернет true,то значит установленные значения lim и page 
// не превышают максимальное количество записей таблицы,то ошибок не будет 
       if(($pages * $lim) < ($getCount + $lim )){
               $errors = "";
//Если Lim и page совападают с строками "limit,page",то ошибок не будет            
           if($limParam == 'limit'&& $pageParam === 'page'){
                   $errors = "";
           }else {$errors = 'Парамеры не соответсвуют LIM или PAGE';}
       

}
 else {
       $errors = "Вы ввели значение lim и page,которые превышают количетво записей в таблице";
           
       }
       return $errors;
}
}

