<?php

namespace NhienLam\hw4\models;

define("ITEXT", "src/resources/i.txt");
define("JTEXT", "src/resources/j.txt");
define("MTEXT", "src/resources/m.txt");
define("NTEXT", "src/resources/n.txt");
define("ISIJTEXT", "src/resources/isij.txt");



class Model
{
    function setisIJ($bool)
    {
        // write to src/resources/i.txt;
        $arr = [$bool];
        file_put_contents(ISIJTEXT, serialize($arr));
    }

    function getisIJ()
    {
        if(file_exists(ISIJTEXT)) {
            $ret = unserialize(file_get_contents(ISIJTEXT));
            if($ret) {
                return $ret[0];
            }
        }
        ?> <h1>   <?php echo $ret; ?></h1> <?php
        return 1;
    }

    function setI($i)
    {
        // write to src/resources/i.txt;
        $arr = [$i];
        file_put_contents(ITEXT, serialize($arr));
    }

    function setJ($j)
    {
        // write to src/resources/j.txt;
        $arr = [$j];
        file_put_contents(JTEXT, serialize($arr));
    }

    function setM($m)
    {
        // write to src/resources/m.txt;
        $arr = [$m];
        file_put_contents(MTEXT, serialize($arr));
    }

    function setN($n)
    {
        // write to src/resources/n.txt;
        $arr = [$n];
        file_put_contents(NTEXT, serialize($arr));
    }

    function getI()
    {
        if(file_exists(ITEXT)) {
            $ret = unserialize(file_get_contents(ITEXT));
            if($ret) {
                return $ret[0];
            }
        }
        ?> <h1>   <?php echo $ret; ?></h1> <?php
        return 1;
    }

    function getJ()
    {
        if(file_exists(JTEXT)) {
            $ret = unserialize(file_get_contents(JTEXT));
            if($ret) {
                return $ret[0];
            }
        }
        return 1;
    }

    function getM()
    {
        if(file_exists(MTEXT)) {
            $ret = unserialize(file_get_contents(MTEXT));
            if($ret) {
                return $ret[0];
            }
        }
        ?> <h1>   <?php echo $ret; ?></h1> <?php
        return 1;
    }

    function getN()
    {
        if(file_exists(NTEXT)) {
            $ret = unserialize(file_get_contents(NTEXT));
            if($ret) {
                return $ret[0];
            }
        }
        return 1;
    }
}
