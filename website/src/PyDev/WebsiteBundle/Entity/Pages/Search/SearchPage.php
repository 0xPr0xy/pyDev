<?php

namespace PyDev\WebsiteBundle\Entity\Pages\Search;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\NodeSearchBundle\Entity\AbstractSearchPage;

/**
 * @ORM\Entity()
 * @ORM\Table(name="pydev_websitebundle_search_page")
 */
class SearchPage extends AbstractSearchPage
{
    /*
     * return string
     */
    public function getDefaultView()
    {
        return "PyDevWebsiteBundle:Pages\Search\SearchPage:view.html.twig";
    }

}
