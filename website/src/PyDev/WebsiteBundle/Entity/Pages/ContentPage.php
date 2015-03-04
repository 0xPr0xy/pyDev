<?php

namespace PyDev\WebsiteBundle\Entity\Pages;

use PyDev\WebsiteBundle\Form\Pages\ContentPageAdminType;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\NodeBundle\Entity\AbstractPage;
use Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface;
use Symfony\Component\Form\AbstractType;

/**
 * ContentPage
 *
 * @ORM\Entity()
 * @ORM\Table(name="pydev_websitebundle_content_pages")
 */
class ContentPage extends AbstractPage  implements HasPageTemplateInterface
{

    /**
     * Returns the default backend form type for this page
     *
     * @return AbstractType
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
        return array (
            array(
                'name'  => 'ContentPage',
                'class' => 'PyDev\WebsiteBundle\Entity\Pages\ContentPage'
            ),
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
}
