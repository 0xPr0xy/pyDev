<?php

namespace PyDev\WebsiteBundle\Entity\News;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\ArticleBundle\Entity\AbstractAuthor;
use PyDev\WebsiteBundle\Form\News\NewsAuthorAdminType;
use Symfony\Component\Form\AbstractType;

/**
 * The author for a News
 *
 * @ORM\Entity(repositoryClass="PyDev\WebsiteBundle\Repository\News\NewsAuthorRepository")
 * @ORM\Table(name="pydev_websitebundle_news_authors")
 */
class NewsAuthor extends AbstractAuthor
{
    /**
     * Returns the default backend form type for this page
     *
     * @return AbstractType
     */
    public function getAdminType()
    {
        return new NewsAuthorAdminType();
    }
}