<?php

namespace PyDev\WebsiteBundle\Entity\Pages;

use PyDev\WebsiteBundle\Entity\News\NewsOverviewPage;
use PyDev\WebsiteBundle\Entity\Pages\Search\SearchPage;
use PyDev\WebsiteBundle\Form\Pages\HomePageAdminType;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface;
use Symfony\Component\Form\AbstractType;

/**
 * HomePage
 *
 * @ORM\Entity()
 * @ORM\Table(name="pydev_websitebundle_home_pages")
 */
class HomePage extends AbstractColoredPage  implements HasPageTemplateInterface
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

    /**
     * Returns the default backend form type for this page
     *
     * @return AbstractType
     */
    public function getDefaultAdminType()
    {
        return new HomePageAdminType();
    }

    /**
     * @return array
     */
    public function getPossibleChildTypes()
    {
        return array(
            array(
                'name'  => 'Page',
                'class' => ContentPage::class
            ),
            array(
                'name' => 'SearchPage',
                'class' => SearchPage::class
            ),
            array(
                'name' => 'NewsPage',
                'class' => NewsOverviewPage::class
            )
        );
    }

    /**
     * @return string[]
     */
    public function getPagePartAdminConfigurations()
    {
        return array(
            'PyDevWebsiteBundle:menu',
            'PyDevWebsiteBundle:main'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getPageTemplates()
    {
        return array('PyDevWebsiteBundle:homepage');
    }

    /**
     * @return string
     */
    public function getDefaultView()
    {
        return 'PyDevWebsiteBundle:Pages\HomePage:view.html.twig';
    }
}
