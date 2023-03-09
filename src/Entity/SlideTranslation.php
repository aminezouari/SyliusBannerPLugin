<?php
declare(strict_types=1);

namespace Black\SyliusBannerPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\AbstractTranslation;

/**
 * @ORM\Entity
 */
class SlideTranslation extends AbstractTranslation implements SlideTranslationInterface
{
    /** @psalm-suppress PropertyNotSetInConstructor */
    private ?int $id;

    private ?string $content = null;
    
    
    /**
     * @ORM\Column(type="string")
     */
    private ?string $link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): void
    {
        $this->link = $link;
    }
}
