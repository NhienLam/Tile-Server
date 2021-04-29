<?php

namespace NhienLam\hw4\controllers;

use NhienLam\hw4\models\Model as Model;
use NhienLam\hw4\executables\TileMaker as TileMaker;
use NhienLam\hw4\views\layouts\Layout as Layout;
use NhienLam\hw4\views\View as View;
use NhienLam\hw4\models\monolog\Monolog as Monolog;

class Controller
{
    function mapServerController()
    {
        require_once("./src/views/View.php");
        require_once("./src/views/layouts/Layout.php");
        require_once("./src/models/Model.php");
        
        $model = new Model();
        $layout = new Layout();
        $layout->mapServerLayout();
        $view = new View();

        if(!isset($POST["go"])) {
            $view->displayIJgrid(1,1);
        }
        ?> <br><?php
        if (isset($_POST["go"])) {
            // $model = new Model();
            $model->setI($_POST["iCoord"]);
            $model->setJ($_POST["jCoord"]);
            $i = $model->getI();
            $j = $model->getJ();
            $view->displayIJgrid($i, $j);
            $view->afterIJ();
            // set isij to TRUE
            $model->setisIJ(1);
        }
        if (isset($_POST["zoomIn"])) {
            $i = $model->getI();
            $j = $model->getJ();
            $model->setN(1);
            $model->setM(1);
            $n = $model->getN();
            $m = $model->getM();
            $view->displayIJNMgrid($i, $j, $n, $m);
            # disable zoom in button after display
            $view->afterIJNM(); 
            // set isij to FALSE
            $model->setisIJ(0);     
        }
        if (isset($_POST["zoomOut"])) {
            $i = $model->getI();
            $j = $model->getJ();
            $model->setN(0);
            $model->setM(0);
            $view->displayIJgrid($i, $j);
            # disable zoom out button after display
            $view->afterIJ();
            // set isij to TRUE
            $model->setisIJ(1);
        }
        if (isset($_POST["up"])) {
            $isij = $model->getisIJ();
            if($isij == 1) {
                $i = $model->getI();
                $j = $model->getJ();
                $model->setJ($j-1);
                $j = $model->getJ();
                $view->displayIJgrid($i, $j);
                $view->afterIJ();
            }
            else {
                $i = $model->getI();
                $j = $model->getJ();
                $n = $model->getN();
                $m = $model->getM();
                $model->setM($m-1);
                $m = $model->getM();
                $view->displayIJNMgrid($i, $j, $n, $m);
                $view->afterIJNM();
            }
        }
        if (isset($_POST["down"])) {
            $isij = $model->getisIJ();
            if($isij == 1) {
                $i = $model->getI();
                $j = $model->getJ();
                $model->setJ($j+1);
                $j = $model->getJ();
                $view->displayIJgrid($i, $j);
                $view->afterIJ();
            }
            else {
                $i = $model->getI();
                $j = $model->getJ();
                $n = $model->getN();
                $m = $model->getM();
                $model->setM($m+1);
                $m = $model->getM();
                $view->displayIJNMgrid($i, $j, $n, $m);
                $view->afterIJNM();
            }
        }
        if (isset($_POST["left"])) {
            $isij = $model->getisIJ();
            if($isij == 1) {
                $i = $model->getI();
                $j = $model->getJ();
                $model->setI($i-1);
                $i = $model->getI();
                $view->displayIJgrid($i, $j);
                $view->afterIJ();
            }
            else {
                $i = $model->getI();
                $j = $model->getJ();
                $n = $model->getN();
                $m = $model->getM();
                $model->setN($n-1);
                $n = $model->getN();
                $view->displayIJNMgrid($i, $j, $n, $m);
                $view->afterIJNM();
            }
        }
        if (isset($_POST["right"])) {
            $isij = $model->getisIJ();
            if($isij == 1) {
                $i = $model->getI();
                $j = $model->getJ();
                $model->setI($i+1);
                $i = $model->getI();
                $view->displayIJgrid($i, $j);
                $view->afterIJ();
            }
            else {
                $i = $model->getI();
                $j = $model->getJ();
                $n = $model->getN();
                $m = $model->getM();
                $model->setN($n+1);
                $n = $model->getN();
                $view->displayIJNMgrid($i, $j, $n, $m);
                $view->afterIJNM();
            }
        }
    }
}
