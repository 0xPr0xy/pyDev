<?php

namespace PyDev\WebsiteBundle\Entity\Pages;

use PyDev\WebsiteBundle\Entity\Pages\AbstractColoredPage;
use PyDev\WebsiteBundle\Form\Pages\ContentPageAdminType;
use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface;

/**
 * ContentPage
 *
 * @ORM\Entity()
 * @ORM\Table(name="pydev_websitebundle_content_pages")
 */
class ContentPage extends AbstractColoredPage implements HasPageTemplateInterface
{
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
        return array();
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
}
