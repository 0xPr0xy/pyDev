<?php

namespace PyDev\WebsiteBundle\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;

/**
 * TileLinkPagePart
 *
 * @ORM\Table(name="pydev_websitebundle_tile_link_page_parts")
 * @ORM\Entity
 */
class TileLinkPagePart extends \Kunstmaan\PagePartBundle\Entity\AbstractPagePart
{
    /**
     * @var string
     *
     * @ORM\Column(name="link_url", type="string", nullable=true)
     */
    private $linkUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="link_text", type="string", nullable=true)
     */
    private $linkText;

    /**
     * @var boolean
     *
     * @ORM\Column(name="link_new_window", type="boolean", nullable=true)
     */
    private $linkNewWindow;

    /**
     * @var string
     *
     * @ORM\Column(name="background_color", type="string", length=255, nullable=true)
     */
    private $backgroundColor;


    /**
     * Set linkUrl
     *
     * @param string $linkUrl
     * @return TileLinkPagePart
     */
    public function setLinkUrl($linkUrl)
    {
        $this->linkUrl = $linkUrl;

        return $this;
    }

    /**
     * Get linkUrl
     *
     * @return string
     */
    public function getLinkUrl()
    {
        return $this->linkUrl;
    }

    /**
     * Set linkText
     *
     * @param string $linkText
     * @return TileLinkPagePart
     */
    public function setLinkText($linkText)
    {
        $this->linkText = $linkText;

        return $this;
    }

    /**
     * Get linkText
     *
     * @return string
     */
    public function getLinkText()
    {
        return $this->linkText;
    }

    /**
     * Set linkNewWindow
     *
     * @param boolean $linkNewWindow
     * @return TileLinkPagePart
     */
    public function setLinkNewWindow($linkNewWindow)
    {
        $this->linkNewWindow = $linkNewWindow;

        return $this;
    }

    /**
     * Get linkNewWindow
     *
     * @return boolean
     */
    public function getLinkNewWindow()
    {
        return $this->linkNewWindow;
    }

    /**
     * Set backgroundColor
     *
     * @param string $backgroundColor
     * @return TileLinkPagePart
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
     * Get the twig view.
     *
     * @return string
     */
    public function getDefaultView()
    {
        return 'PyDevWebsiteBundle:PageParts:TileLinkPagePart/view.html.twig';
    }

    /**
     * Get the admin form type.
     *
     * @return \PyDev\WebsiteBundle\Form\PageParts\TileLinkPagePartAdminType
     */
    public function getDefaultAdminType()
    {
        return new \PyDev\WebsiteBundle\Form\PageParts\TileLinkPagePartAdminType();
    }
}
