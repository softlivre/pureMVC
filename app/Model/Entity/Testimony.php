<?php

namespace App\Model\Entity;

use \Softlivre\DatabaseManager\Database;

class Testimony{

    public $id;
    public $nome;
    public $mensagem;
    public $data;

    public function cadastrar(){

        // define date
        $this->data = date('Y-m-d H:i:s');

        // insert testimonial in DB
        $this->id = (new Database('depoimentos'))->insert([
            'nome' => $this->nome,
            'mensagem' => $this->mensagem,
            'data' => $this->data
        ]);

        return true;
    }

    /**
     * method responsible of returning testimonials
     */
    public static function getTestimonies($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('depoimentos'))->select($where, $order, $limit, $fields);
    }
}