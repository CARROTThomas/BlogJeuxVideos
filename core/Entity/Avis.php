<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\AvisRepository;

#[Table(name: "avis")]
#[TargetRepository(repositoryName: AvisRepository::class)]
class Avis extends AbstractEntity
{
    private int $id;
    private string $content;
    private int $jeux_id;

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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getJeuxId(): int
    {
        return $this->jeux_id;
    }

    /**
     * @param int $jeux_id
     */
    public function setJeuxId(int $jeux_id): void
    {
        $this->jeux_id = $jeux_id;
    }
}