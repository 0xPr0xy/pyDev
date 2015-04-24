<?php

namespace PyDev\WebsiteBundle\Entity\News;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\ArticleBundle\Entity\AbstractArticlePage;
use PyDev\WebsiteBundle\Entity\News\NewsAuthor;
use PyDev\WebsiteBundle\Form\News\NewsPageAdminType;
use PyDev\WebsiteBundle\PagePartAdmin\News\NewsPagePagePartAdminConfigurator;
use Symfony\Component\Form\AbstractType;

/**
 * @ORM\Entity(repositoryClass="PyDev\WebsiteBundle\Repository\News\NewsPageRepository")
 * @ORM\Table(name="pydev_websitebundle_news_pages")
 * @ORM\HasLifecycleCallbacks
 */
class NewsPage extends AbstractArticlePage
{
    /**
     * @var NewsAuthor
     *
     * @ORM\ManyToOne(targetEntity="NewsAuthor")
     * @ORM\JoinColumn(name="news_author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * Returns the default backend form type for this page
     *
     * @return AbstractType
     */
    public function getDefaultAdminType()
    {
        return new NewsPageAdminType();
    }

    /**
     * @return array
     */
    public function getPagePartAdminConfigurations()
    {
        return array(new NewsPagePagePartAdminConfigurator());
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getDefaultView()
    {
        return 'PyDevWebsiteBundle:News/NewsPage:view.html.twig';
    }

    /**
     * Before persisting this entity, check the date.
     * When no date is present, fill in current date and time.
     *
     * @ORM\PrePersist
     */
    public function _prePersist()
    {
        // Set date to now when none is set
        if ($this->date == null) {
            $this->setDate(new \DateTime());
        }
    }
}
