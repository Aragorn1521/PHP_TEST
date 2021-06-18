<?php
/*
 * Класс нужен для того,чтобы разбить URL на параметры и дальше отдельно работать
 * с каждым из параметров
 */
Class UrlHandling
{
    /*
     * проверяем REQUEST_METHOD.
     */
public function getUrl(){
$method = $_SERVER['REQUEST_METHOD'];
$q = $_GET['q'];


  /*
   * делим $params на 4 массива с разделителем в "/"
   */
 
$params = explode('/', $q,4);
return $params;
}
/*
 * присваиваем значение первого эллемента массива $params($type)
 */
public function ParamsType(){
    $params = $this->getUrl();
    $type = $params[0];
    return $type;
}

public function Optoin() {
   $params = $this->getUrl();
   $option = $params[3];
   return $option;
}

public function OneOption(){
    $option = $this->Optoin();
    $oneOption = explode(',', $option);
    return $oneOption;
}
/*
 * присваиваем значение третьего эллемента массива $params($id)
 */
public function ParamsId(){
   $params = $this->getUrl();
   $id = $params[2];
   return $id;
}

public function OneParamsid(){
    $id = $this->ParamsId();
    $oneParamsId = explode('=', $id);
    $oneParamsId = $oneParamsId[0];
    return $oneParamsId;
}

public function TwoParamsid(){
    $id = $this->ParamsId();
    $twoParamsId = explode('=', $id);
    $twoParamsId = $twoParamsId[1];
    return $twoParamsId;
}

public function ParamsPage(){
    $params = $this->getUrl();
    $lim = $this->ParamsId();
    $page = $params[1];
    $page = $lim * ($page - 1);
    return $page;
}

public function Page(){
    $params = $this->getUrl();
    $page = $params[1];
    return $page;
}


public function OneParamsPage(){
    $page = $this->Page();
    $oneParamsPage = explode('=', $page);
    $oneParamsPage = $oneParamsPage[0];
    return $oneParamsPage;
}

public function TwoPage(){
    $page = $this->Page();
    $TwoParamsPage = explode('=', $page);
    $TwoParamsPage = $TwoParamsPage[1];
    return $TwoParamsPage;
}

public function TwoParamsPage(){
    $page = $this->Page();
    $lim = $this->TwoParamsid();
    $TwoParamsPage = explode('=', $page);
    $TwoParamsPage = $TwoParamsPage[1];
    $TwoParamsPage = $lim *($TwoParamsPage - 1);
    return $TwoParamsPage;
}
}
