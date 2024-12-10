<?php
#nome do arquivo CRUD.class.php

abstract class CRUD{
    protected $table;
    abstract public function add();
    abstract public function update($campo, $id);

}