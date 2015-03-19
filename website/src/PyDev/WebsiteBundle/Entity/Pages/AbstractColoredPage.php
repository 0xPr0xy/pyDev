<?php

namespace PyDev\WebsiteBundle\Entity\Pages;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\NodeBundle\Entity\AbstractPage;
use PyDev\WebsiteBundle\Form\Pages\AbstractColoredPageAdminType;


abstract class AbstractColoredPage extends AbstractPage
{
    /**
     * @var string
     * @ORM\Column(name="background_color", type="string", length=255, nullable=true)
     */
    protected $backgroundColor;

    /**
     * Set backgroundColor
     *
     * @param string $backgroundColor
     * @return AbstractColoredPage
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Get backgroundColor
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * Returns the default backend form type for this page
     *
     * @return AbstractColoredPageAdminType
     */
    public function getDefaultAdminType()
    {
        return new AbstractColoredPageAdminType();
    }
}
