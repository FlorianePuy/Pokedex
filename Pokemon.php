<?php

class Pokemon {
    private int $id;
    private int $number;
    private string $name;
    private string $description;
    private $type1;
    private $type2;
    private string $url_image;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        if (is_int($id)){
            $this->id=$id;
        }
    }
    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        if (is_int($number)){
            $this->number = $number;
        }
    }

    /**
     * @return mixed
     * get the value of name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     * set the value of name
     */
    public function setName($name) {
        if (is_string($name)){
            $this->name = $name;
        }
    }

    /**
     * @return mixed
     * get the value of description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     * set the value of description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getType1() {
        return $this->type1;
    }

    /**
     * @param mixed $type1
     */
    public function setType1($type1) {
        $this->type1 = $type1;
    }

    /**
     * @return mixed
     */
    public function getType2() {
        return $this->type2;
    }

    /**
     * @param mixed $type2
     */
    public function setType2($type2) {
        $this->type2 = $type2;
    }

    /**
     * @return mixed
     */
    public function getUrl_image() {
        return $this->url_image;
    }

    /**
     * @param mixed $url_image
     */
    public function setUrl_image($url_image) {
        $this->url_image = $url_image;
    }
    public function hydrate($data) {
        foreach ($data as $key => $value){
            $method = "set".ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
    public function __construct($data) {
        $this->hydrate($data);
    }
}
