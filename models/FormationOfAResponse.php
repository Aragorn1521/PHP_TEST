<?php

/*
 * класс формирует конечный вывод информации
 */
class FormationOfAResponse {
       /*
     * функция принимает значение колонок таблицы,значение содержания таблицы,
     * и параметр ошибок
     */
    
    public function Responce($post,$speakers,$err,$myFiltr){
       $UrlHandling = new UrlHandling();
       $type = $UrlHandling->ParamsType();
       
       if($type === 'posts'){
           $data = ['head' => $speakers,'body'=>$post];
       }
       
       if($type === 'filter'){
           $data = ['head' =>$myFiltr[0],'body'=>$myFiltr[1]];
       }
    
    
    $errors = $err;
        if($errors != ""){
            $status = 0;
    $responce = ['status'=>$status,'errors'=>$errors];
    $responce = json_encode($responce);
            
        }
        
 else {$status = 1;
    $responce = ['status'=>$status,'errors'=>$errors,'data'=>$data];
    $responce = json_encode($responce);
 }
    
    echo  $responce; 
    
 
    }
}
