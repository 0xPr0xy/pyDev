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
                'name'  => 'Page',
                'class' => ContentPage::class
            ),
        );
    }

    /**
     * @return string[]
     */
    public function getPagePartAdminConfigurations()
    {
        return array('PyDevWebsiteBundle:menu');
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
