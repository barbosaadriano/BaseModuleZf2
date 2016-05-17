<?php

namespace Post\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="fk_post_category_idx", columns={"category"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Post\Entity\PostRepository")
 */
class Post extends AbstractEntity {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=45, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cadastro", type="datetime", nullable=true)
     */
    private $cadastro;

    /**
     * @var bool
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;

    /**
     * @var \Post\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="Categoria\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Post
     */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Post
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Set cadastro
     *
     * @param \DateTime $cadastro
     * 
     * @ORM\PrePersist
     * @return Post
     */
    public function setCadastro() {
        $this->cadastro = new \DateTime('now');
        return $this;
    }

    /**
     * Get cadastro
     *
     * @return \DateTime
     * 
     */
    public function getCadastro() {
        return $this->cadastro;
    }

    /**
     * Set ativo
     *
     * @param bool $ativo
     *
     * @return Post
     */
    public function setAtivo($ativo) {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return bool
     */
    public function getAtivo() {
        return $this->ativo;
    }

    /**
     * Set category
     *
     * @param \Categoria\Entity\Category $category
     *
     * @return Post
     */
    public function setCategory(\Categoria\Entity\Category $category = null) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Categoria\Entity\Category
     */
    public function getCategory() {
        return $this->category;
    }

}
