<?php

namespace PyDev\WebsiteBundle\Entity\News;

use Doctrine\ORM\Mapping as ORM;
use PyDev\WebsiteBundle\Form\News\NewsOverviewPageAdminType;
use PyDev\WebsiteBundle\PagePartAdmin\News\NewsOverviewPagePagePartAdminConfigurator;
use Kunstmaan\ArticleBundle\Entity\AbstractArticleOverviewPage;
use Kunstmaan\NodeBundle\Helper\RenderContext;
use Kunstmaan\PagePartBundle\PagePartAdmin\AbstractPagePartAdminConfigurator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * The article overview page which shows its articles
 *
 * @ORM\Entity(repositoryClass="PyDev\WebsiteBundle\Repository\News\NewsOverviewPageRepository")
 * @ORM\Table(name="pydev_websitebundle_news_overviewpages")
 */
class NewsOverviewPage extends AbstractArticleOverviewPage
{
    /**
     * @return AbstractPagePartAdminConfigurator[]
     */
    public function getPagePartAdminConfigurations()
    {
        return array(new NewsOverviewPagePagePartAdminConfigurator());
    }

    /**
     * @param ContainerInterface $container
     * @param Request            $request
     * @param RenderContext      $context
     */
    public function service(ContainerInterface $container, Request $request, RenderContext $context)
    {
        parent::service($container, $request, $context);
    }

    public function getArticleRepository($em)
    {
        return $em->getRepository('PyDevWebsiteBundle:News\NewsPage');
    }

    /**
     * @return string
     */
    public function getDefaultView()
    {
        return 'PyDevWebsiteBundle:News/NewsOverviewPage:view.html.twig';
    }

    /**
     * Returns the default backend form type for this page
     *
     * @return AbstractType
     */
    public function getDefaultAdminType()
    {
        return new NewsOverviewPageAdminType();
    }
}
