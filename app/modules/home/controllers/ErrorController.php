<?php
namespace Vtnltd\Modules\Home\Controllers;

class ErrorController extends ControllerBase
{

    public function indexAction()
    {
        echo " Trang index - module -Home";
    }
    
    public function errorAction()
    {
        echo "Đang xây dựng trang error";
    }
}