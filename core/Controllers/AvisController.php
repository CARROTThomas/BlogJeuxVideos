<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Entity\Avis;
use Entity\Jeux;

#[DefaultEntity(entityName: Avis::class)]
class AvisController extends AbstractController
{
    public function create(){

        $jeuxId = null;
        $content = null;

        if(!empty($_POST['jeuxId']) && ctype_digit($_POST['jeuxId'])){$jeuxId = $_POST['jeuxId'];}
        if(!empty($_POST['content'])){$content = htmlspecialchars($_POST['content']);}

        if($jeuxId && $content){

            $jeux = $this->getRepository(Jeux::class)->findById($jeuxId);
            if(!$jeux){return $this->redirect();}

            $avis = new Avis();
            $avis->setContent($content);
            $avis->setJeuxId($jeuxId);

            $this->repository->insert($avis);

            return $this->redirect([
                "type"=>"jeux",
                "action"=>"show",
                "id"=>$jeux->getId()
            ]);
        }
        return $this->redirect();
    }  // marche

    public function remove(){

        // verif existence
        $id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET["id"])){$id = $_GET['id'];}
        if(!$id){ return $this->redirect(); }
        $avis = $this->repository->findById($id);
        if(!$avis){ return $this->redirect(); }
        //

        $jeuxId = $avis->getJeuxId();

        $this->repository->delete($avis);

        return $this->redirect([
            "type"=>"jeux",
            "action"=>"show",
            "id"=>$jeuxId
        ]);
    }   // marche

    public function change(){

        // verif existence
        $id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
            $id = $_GET['id'];
        }
        if($id){
            $avis = $this->repository->findById($id);
            if(!$avis){return $this->redirect();}
        }
        //

        $id = null;
        $content = null;

        if(!empty($_POST['idUpdate']) && ctype_digit($_POST['idUpdate'])) {$id = $_POST['idUpdate'];}
        if(!empty($_POST['contentUpdate'])) {$content = htmlspecialchars($_POST['contentUpdate']);}



        if ($id && $content){

            $avis = $this->repository->findById($id);
            $avis->setContent($content);
            $this->repository->update($avis);

            return $this->redirect([
                "type"=>"jeux",
                "action"=>"show",
                "id"=>$avis->getJeuxId()
            ]);
        }

        return $this->render("avis/update", [
            "pageTitle"=>"update avis",
            "avis"=>$avis
        ]);
    } // marche
}