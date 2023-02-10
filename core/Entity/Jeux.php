<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\JeuxRepository;

#[Table(name: "jeux")]
#[TargetRepository(repositoryName: JeuxRepository::class)]
class Jeux extends AbstractEntity
{
    private int $id;
    private string $title;
    private string $content;
    private string $images;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->images;
    }

    /**
     * @param string $images
     */
    public function setImage(string $images): void
    {
        $this->images = $images;
    }
}