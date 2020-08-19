<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity
 */
class Book
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var int|null
     *
     * @ORM\Column(name="year", type="integer", nullable=true)
     */
    private $year;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publisher", type="string", length=255, nullable=true)
     */
    private $publisher;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picture", type="string", length=1024, nullable=true)
     */
    private $picture;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @return string|null
   */
  public function getTitle(): ?string {
    return $this->title;
  }

  /**
   * @return string|null
   */
  public function getAuthor(): ?string {
    return $this->author;
  }

  /**
   * @return int|null
   */
  public function getYear(): ?int {
    return $this->year;
  }

  /**
   * @return string|null
   */
  public function getPublisher(): ?string {
    return $this->publisher;
  }

  /**
   * @return string|null
   */
  public function getPicture(): ?string {
    return $this->picture;
  }

  /**
   * @return int|null
   */
  public function getRating(): ?int {
    return $this->rating;
  }

  /**
   * @return string|null
   */
  public function getDescription(): ?string {
    return $this->description;
  }

  /**
   * @param string|null $title
   */
  public function setTitle(?string $title): void {
    $this->title = $title;
  }

  /**
   * @param string|null $author
   */
  public function setAuthor(?string $author): void {
    $this->author = $author;
  }

  /**
   * @param int|null $year
   */
  public function setYear(?int $year): void {
    $this->year = $year;
  }

  /**
   * @param string|null $publisher
   */
  public function setPublisher(?string $publisher): void {
    $this->publisher = $publisher;
  }

  /**
   * @param string|null $picture
   */
  public function setPicture(?string $picture): void {
    $this->picture = $picture;
  }

  /**
   * @param int|null $rating
   */
  public function setRating(?int $rating): void {
    $this->rating = $rating;
  }

  /**
   * @param string|null $description
   */
  public function setDescription(?string $description): void {
    $this->description = $description;
  }

  /**
   * @param int $id
   */
  public function setId(int $id): void {
    $this->id = $id;
  }

}
