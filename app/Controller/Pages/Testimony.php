<?php

// controller
// this controls the requisitions made to our site home
// receives an action (for example a query)
// executes the model to obtain required data
// and then provide this data to the view, to be rendered

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Testimony as EntityTestimony;
use \Softlivre\DatabaseManager\Pagination;


class Testimony extends Page
{
    /**
     * Get testimonials from DB
     */
    private static function getTestimonyItems($request,&$obPagination){
        // get testimonials
        $itens = '';

        // results amount
        $quantidadeTotal = EntityTestimony::getTestimonies(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

        // current page
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;

        // pagination instance
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual,3);

        // page results
        $results = EntityTestimony::getTestimonies(null, 'id desc', $obPagination->getLimit());

        // render item
        while($obTestimony = $results->fetchObject(EntityTestimony::class)){
           // view
            $itens .= View::render('pages/testimony/item', [
                'nome' => $obTestimony->nome,
                'mensagem' => $obTestimony->mensagem,
                'data' => date('d/m/Y H:i:s', strtotime($obTestimony->data))
            ]);
            
        }
        return $itens;
    }

    /**
     * this method returns contents (view) of our testimonials 
     */

    public static function getTestimonies($request)
    {
        // view
        $content = View::render('pages/testimonies', [
            'itens' => self::getTestimonyItems($request, $obPagination),
            'pagination' => parent::getPagination($request, $obPagination)
        ]);

        return parent::getPage('Depoimentos > Myapp', $content);
    }

    public static function insertTestimony($request){
        // post data
        $postVars = $request->getPostVars();

        $obTestimony = new EntityTestimony;
        $obTestimony->nome = $postVars['nome'];
        $obTestimony->mensagem = $postVars['mensagem'];
        $obTestimony->cadastrar();

        return self::getTestimonies($request);        
    }


}
