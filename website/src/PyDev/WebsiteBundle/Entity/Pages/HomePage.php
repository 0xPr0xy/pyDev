<?php

namespace PyDev\WebsiteBundle\Entity\Pages;

use PyDev\WebsiteBundle\Form\Pages\HomePageAdminType;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\NodeBundle\Entity\AbstractPage;
use Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface;
use Symfony\Component\Form\AbstractType;

/**
 * HomePage
 *
 * @ORM\Entity()
 * @ORM\Table(name="pydev_websitebundle_home_pages")
 */
class HomePage extends AbstractPage  implements HasPageTemplateInterface
{

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
                'name'  => 'ContentPage',
                'class' => 'PyDev\WebsiteBundle\Entity\Pages\ContentPage'
            ),
            array(
                'name'  => 'BehatTestPage',
                'class' => 'PyDev\WebsiteBundle\Entity\Pages\BehatTestPage'
            )
        );
    }

    /**
     * @return string[]
     */
    public function getPagePartAdminConfigurations()
    {
        return array('PyDevWebsiteBundle:middle-column', 'PyDevWebsiteBundle:left-column', 'PyDevWebsiteBundle:right-column');
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
