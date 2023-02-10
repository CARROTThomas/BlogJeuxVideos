<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Avis;
use Entity\Jeux;

#[TargetEntity(entityName: Avis::class)]
class AvisRepository extends AbstractRepository
{
    public function findAllByJeux(Jeux $jeux){

        $query = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE jeux_id = :jeux_id");
        $query->execute([
            "jeux_id"=>$jeux->getId()
        ]);

        $avis = $query->fetchAll(\PDO::FETCH_CLASS,get_class($this->targetEntity));

        return $avis;
    } // marche

    public function insert(Avis $avis){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET content = :content, jeux_id = :jeux_id");
        $query->execute([
            "content"=>$avis->getContent(),
            "jeux_id"=>$avis->getJeuxId()
        ]);

        return $this->pdo->lastInsertId();
    } // marche

    public function update(\Entity\Avis $avis){
        $request = $this->pdo->prepare("UPDATE {$this->tableName} SET content = :content WHERE id = :id");
        $request->execute([
            'content'=>$avis->getContent(),
            'id'=>$avis->getId()
        ]);
    }
}