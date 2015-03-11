<?php

namespace PyDev\WebsiteBundle\Twig;

use Twig_Extension;
use Doctrine\ORM\EntityManager;

/**
 * PageTwigExtension
 */
class PageTwigExtension extends Twig_Extension
{
    /**
     * @var EntityManager $entityManager
     */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('get_page', array($this, 'getPage'))
        );
    }

    /**
     * @param $class
     *
     * @param $id
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @internal param int $id The id of the detail page
     * @internal param string $locale The locale
     * @return mixed
     */
    public function getPage($class, $id)
    {
        $nodeTranslationRepository = $this->entityManager->getRepository($class);
        $queryBuilder = $nodeTranslationRepository->createQueryBuilder('nt');
        $queryBuilder->andWhere('nt.id = :id');
        $queryBuilder->setParameter(':id', $id);
        $page = $queryBuilder->getQuery()->getOneOrNullResult();
        return $page;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'applicationdossier_twig_dossier';
    }
}
