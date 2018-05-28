<?php

class Query {
    private $select ;
    private $from;
    private $where;
    private $groupe;
    private $order;
    private  $limit;
    
    public function from(string $table, string $alias){
        if($this->from[$alias] = $table){
            
        } else {
            $this->from[] = $table;
        }
        return $this;
    }
    
    public function where(string ...$condition):self{
        $this->where = $condition;
        return $this;
    }


    public  function select(string ...$champs):self{
        $this->select = $champs;
        return $this;
    }
    
    public function __toString():self {
       $parts = ['SELECT'] ;
       if ($this->select){
           $parts = join(', ',$this->select);
       }else {
           $parts = ['*'];
       }
       $parts[] = 'FROM';
       $parts[] = $this->buildFrom();
       if($this->where){
           $parts[] = 'WHERE';
           $parts[] = "(".join( ') AND (', $this->where).')';
       }
       return join( '',$parts);
    }
    
    public function buildFrom():string{
        $from = [];
        foreach ($this->from as $key =>$value){
            if(is_string($key)){
                $from[] = "$value as $key";
            }else {
                $from[] = $value;
            }
        }
        return join(', ',$from);
    }
}    