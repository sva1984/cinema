<?php

namespace frontend\services;


use frontend\repositories\FrontControlRepository;



class FilmConrolService
{

    protected $articalsRepository;

    public function __construct(ArticalsRepository $articalsRepository)
    {
        $this->articalsRepository = $articalsRepository;
    }

    public function findModel($slug)
    {
        return $this->articalsRepository->getBy(['slug' => $slug]);
    }

    public function articleModelId($slug)
    {
        return $this->articalsRepository->findBy(['slug' => $slug])->id;
    }

}
