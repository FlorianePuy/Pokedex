<?php

class Type {
    private $id;
    private $name;
    private $color;

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color) {
        $this->color = $color;
    }
    public function hydrate($data) {
        foreach ($data as $key => $value) {
            $method = "set".ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
    public function __construct($data) {
        $this->hydrate($data);
    }
}