<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Jeux;

#[TargetEntity(entityName: Jeux::class)]
class JeuxRepository extends AbstractRepository
{
    public function insert(Jeux $jeux){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET title = :title, content = :content, images=:images ");

        $query->execute([
            "title"=>$jeux->getTitle(),
            "content"=>$jeux->getContent(),
            "images"=>$jeux->getImage()
        ]);
        return $this->pdo->lastInsertId();
    } // marche

    public function update(\Entity\Jeux $jeux){
        $request = $this->pdo->prepare("UPDATE {$this->tableName} SET title= :title, content = :content WHERE id = :id");
        $request->execute([
            'title'=>$jeux->getTitle(),
            'content'=>$jeux->getContent(),
            'id'=>$jeux->getId()
        ]);
    } // marche
}