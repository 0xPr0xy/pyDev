<?php

namespace PyDev\WebsiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kunstmaan\MediaBundle\Helper\Services\MediaCreatorService;
use Kunstmaan\NodeBundle\Entity\NodeTranslation;
use Kunstmaan\NodeBundle\Helper\Services\PageCreatorService;
use Kunstmaan\PagePartBundle\Helper\Services\PagePartCreatorService;
use PyDev\WebsiteBundle\Entity\Pages\ContentPage;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use PyDev\WebsiteBundle\Entity\Pages\HomePage;

/**
 * PageFixtures
 */
class PageFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * Username that is used for creating pages
     */
    const ADMIN_USERNAME = 'admin';

    /** @var ContainerInterface */
    private $container = null;

    /** @var ObjectManager */
    private $manager;

    /** @var PageCreatorService */
    private $pageCreator;

    /** @var PagePartCreatorService */
    private $pagePartCreator;

    /** @var MediaCreatorService */
    private $mediaCreator;

    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->pageCreator     = $this->container->get('kunstmaan_node.page_creator_service');
        $this->pagePartCreator = $this->container->get('kunstmaan_pageparts.pagepart_creator_service');
        $this->mediaCreator    = $this->container->get('kunstmaan_media.media_creator_service');

        $this->createPages();
    }

    /**
     * Create pages
     */
    private function createPages()
    {
        $homePage = new HomePage();
        $homePage->setTitle('Home');
        $homePage->setBackgroundColor('#0266C8');

        $translations = array();
        $translations[] = array('language' => 'en', 'callback' => function(HomePage $page, NodeTranslation $translation, $seo) {
            $translation->setTitle('Home');
            $translation->setSlug('');
        });

        $options = array(
            'parent' => null,
            'page_internal_name' => 'homepage',
            'set_online' => true,
            'hidden_from_nav' => false,
            'creator' => self::ADMIN_USERNAME
        );

        $this->pageCreator->createPage($homePage, $translations, $options);

        $homePageRepository = $this->manager->getRepository(HomePage::class);
        $homePage = $homePageRepository->find(1);

        $pages = array(
            array('color' => '#EA3F47', 'name' => 'Login'),
            array('color' => '#EE8613', 'name' => 'Blog'),
            array('color' => '#F4BD3F', 'name' => 'Projects'),
            array('color' => '#93C814', 'name' => 'Gallery'),
            array('color' => '#0B93C5', 'name' => 'Downloads'),
            array('color' => '#2EB3DE', 'name' => 'Contact'),
            array('color' => '#00933B', 'name' => 'About'),
        );

        $this->createContentPages($homePage, $pages);
    }

    private function createContentPages($homePage, $pages)
    {
        foreach($pages as $pageItem){
            $contentPage = new ContentPage();
            $contentPage->setTitle($pageItem['name']);
            $contentPage->setBackgroundColor($pageItem['color']);

            $translations = array();
            $translations[] = array('language' => 'en', 'callback' => function(ContentPage $contentPage, NodeTranslation $translation) {
                $translation->setTitle($contentPage->getTitle());
                $translation->setSlug(strtolower($contentPage->getTitle()));
                echo '> created ' . $contentPage->getTitle(), PHP_EOL;
            });
            $options = array(
                'parent' => $homePage,
                'page_internal_name' => strtolower($pageItem['name']),
                'set_online' => true,
                'hidden_from_nav' => false,
                'creator' => self::ADMIN_USERNAME
            );
            $this->pageCreator->createPage($contentPage, $translations, $options);
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder()
    {
        return 200;
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface $container A ContainerInterface instance
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
