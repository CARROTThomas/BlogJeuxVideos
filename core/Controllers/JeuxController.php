<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Entity\Avis;
use Entity\Jeux;
use App\File;

#[DefaultEntity(entityName: Jeux::class)]
class JeuxController extends AbstractController
{
    public function index(){

        $jeux = $this->repository->findAll();

        return $this->render("jeux/index", [
            "pageTitle"=>"les jeux",
            "jeux"=>$jeux
        ]);
    } // marche

    public function show(){

        $id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET["id"])){
            $id = $_GET['id'];
        }

        if(!$id){ return $this->redirect(); }

        $jeux = $this->repository->findById($id);
        // verif existence
        if(!$jeux){return $this->redirect(); }

        $avis = $this->getRepository(Avis::class)->findAllByJeux($jeux);

        return $this->render("jeux/jeux", [
            "pageTitle"=> $jeux->getTitle(),
            "jeux"=>$jeux,
            "avis"=>$avis
        ]);
    } // marche

    public function remove(){

        // verif existence
        $id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET["id"])){
            $id = $_GET['id'];
        }
        if(!$id){ return $this->redirect(); }
        $jeux = $this->repository->findById($id);
        if(!$jeux){return $this->redirect(); }
        //

        $this->repository->delete($jeux);

        return $this->redirect();
    } // marche

    public function create(){

        $title = null;
        $content = null;

        if(!empty($_POST['title'])){
            $title = htmlspecialchars($_POST['title']);
        }
        if(!empty($_POST['content'])){
            $content = htmlspecialchars($_POST['content']);
        }

        if($title && $content){

            $images = new File("imageJeux");
            if($images->isImage()){
                $images->upload();
            }

            $jeux = new Jeux();
            $jeux->setTitle($title);
            $jeux->setContent($content);
            $jeux->setImage($images->getName());

            $idJeux = $this->repository->insert($jeux);

            return $this->redirect([
                "type"=>"jeux",
                "action"=>"show",
                "id"=>$idJeux
            ]);
        }

        return $this->render("jeux/create", [
            "pageTitle"=>"nouveau jeux"
        ]);
    } // marche

    public function change(){

        // verif existence
        $id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
            $id = $_GET['id'];
        }
        if($id){
            $jeux = $this->repository->findById($id);
            if(!$jeux){return $this->redirect();}
        }
        //

        $id = null;
        $title = null;
        $images = null;
        $content = null;

        if(!empty($_POST['idUpdate']) && ctype_digit($_POST['idUpdate'])) {$id = $_POST['idUpdate'];}
        if(!empty($_POST['titleUpdate'])) {$title = htmlspecialchars($_POST['titleUpdate']);}
        if(!empty($_POST['contentUpdate'])) {$content = htmlspecialchars($_POST['contentUpdate']);}

        if ($title && $content && $id) {

            $jeux = $this->repository->findById($id);

            $jeux->setTitle($title);
            $jeux->setContent($content);

            $this->repository->update($jeux);

            return $this->redirect([
                "type"=>"jeux",
                "action"=>"show",
                "id"=>$jeux->getId()
            ]);
        }

        return $this->render("jeux/update", [
            "pageTitle"=>"update jeux",
            "jeux"=>$jeux
        ]);
    } // marche
}