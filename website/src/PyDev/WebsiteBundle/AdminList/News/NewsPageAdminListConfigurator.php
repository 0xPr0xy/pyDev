<?php

namespace PyDev\WebsiteBundle\AdminList\News;

use Doctrine\ORM\QueryBuilder;
use Kunstmaan\ArticleBundle\AdminList\AbstractArticlePageAdminListConfigurator;
use PyDev\WebsiteBundle\Entity\News\NewsOverviewPage;

/**
 * The AdminList configurator for the NewsPage
 */
class NewsPageAdminListConfigurator extends AbstractArticlePageAdminListConfigurator
{
    /**
     * Return current bundle name.
     *
     * @return string
     */
    public function getBundleName()
    {
        return 'PyDevWebsiteBundle';
    }

    /**
     * Return current entity name.
     *
     * @return string
     */
    public function getEntityName()
    {
        return 'News\NewsPage';
    }

    /**
     * @param QueryBuilder $queryBuilder The query builder
     */
    public function adaptQueryBuilder(QueryBuilder $queryBuilder)
    {
        parent::adaptQueryBuilder($queryBuilder);

        $queryBuilder->setParameter('class', 'PyDev\WebsiteBundle\Entity\News\NewsPage');
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getOverviewPageRepository()
    {
        return $this->em->getRepository('PyDevWebsiteBundle:News\NewsOverviewPage');
    }

    /**
     * @return string
     */
    public function getListTemplate()
    {
        return 'PyDevWebsiteBundle:AdminList/News/NewsPageAdminList:list.html.twig';
    }
}
