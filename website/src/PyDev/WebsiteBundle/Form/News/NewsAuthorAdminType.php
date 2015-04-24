<?php

namespace PyDev\WebsiteBundle\Form\News;

use Kunstmaan\ArticleBundle\Form\AbstractAuthorAdminType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsAuthorAdminType extends AbstractAuthorAdminType
{
    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolverInterface $resolver The resolver for the options.
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PyDev\WebsiteBundle\Entity\News\NewsAuthor'
        ));
    }

    /**
     * @return string
     */
    function getName()
    {
        return 'Newsauthor_form';
    }
}
