<?php

namespace PyDev\WebsiteBundle\Entity\Pages;

use PyDev\WebsiteBundle\Form\Pages\ContentPageAdminType;
use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * ContentPage
 *
 * @ORM\Entity()
 * @ORM\Table(name="pydev_websitebundle_content_pages")
 */
class ContentPage extends AbstractColoredPage implements HasPageTemplateInterface
{
    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, name="page_intro")
     */
    protected $pageIntro;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, name="page_glyph_icon")
     */
    protected $glyphIcon;

    /**
     * Returns the default backend form type for this page
     *
     * @return ContentPageAdminType
     */
    public function getDefaultAdminType()
    {
        return new ContentPageAdminType();
    }

    /**
     * @return array
     */
    public function getPossibleChildTypes()
    {
        return array(
            array(
                'name' => 'Page',
                'class' => ContentPage::class
            )
        );
    }

    /**
     * @return string[]
     */
    public function getPagePartAdminConfigurations()
    {
        return array('PyDevWebsiteBundle:main');
    }

    /**
     * {@inheritdoc}
     */
    public function getPageTemplates()
    {
        return array('PyDevWebsiteBundle:contentpage');
    }

    /**
     * @return string
     */
    public function getDefaultView()
    {
        return 'PyDevWebsiteBundle:Pages\ContentPage:view.html.twig';
    }

    /**
     * @return string
     */
    public function getPageIntro()
    {
        return $this->pageIntro;
    }

    /**
     * @param string $pageIntro
     */
    public function setPageIntro($pageIntro)
    {
        $this->pageIntro = $pageIntro;
    }

    /**
     * @return string
     */
    public function getGlyphIcon()
    {
        return $this->glyphIcon;
    }

    /**
     * @param string $glyphIcon
     */
    public function setGlyphIcon($glyphIcon)
    {
        $this->glyphIcon = $glyphIcon;
    }
}
