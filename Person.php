<?php

namespace Acme;

class Person {

    private $privateName;

    public function __construct($name)
    {
        $this->privateName = $name;
    }

    public function __toString()
    {
        return $this->privateName;
    }

    public function getName()
    {
        return $this->privateName;
    }
}