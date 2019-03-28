<?php

include 'function.php';

class Test implements Iterator {
    private $position = 0;
    private $array = array(
        0 => "firstelement",
        1 => "secondelement",
        2 => "lastelement",
    );

    public function __construct() {
        $this->position = 0;
    }

    public function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    public function key() {
        var_dump(__METHOD__);
        return $this->position;
    }
    public function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }
    public function valid() {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }


    public function getArray()
    {
        $a = new self();
        foreach ($a as $key => $v){
            echo $key;
            var_dump($v);
        }
    }
}



class Dqueue
{
    private $arr = [];
    private $q;

    public function __construct()
    {
        $this->q = new \SplQueue();
    }

    public function addFirst($item)
    {
        $this->q->unshift($item);
//        return array_unshift($this->arr,$item);
    }
    public function addLast($item)
    {
        $this->q->push($item);
//        return array_push($this->arr,$item);
    }
    public function removeFirst()
    {
        return $this->q->shift();
//        return array_shift($this->arr);
    }
    public function removeLast()
    {
        return $this->q->pop();
//        return array_pop($this->arr);
    }
}



$a = new Dqueue();
$a->addFirst(123);
$a->addFirst(456);
dd($a->removeFirst());