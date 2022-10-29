<?php

// the folder Model is responsible of dealing with
// dynamic data and organization rules

// entities - normally used to represent tables/data

namespace App\Model\Entity;

class Organization
{
    public $id; // organization id
    public $name = "organization name";
    public $site = "https://softlivre.com.br";
    public $description = "organization description";

}
