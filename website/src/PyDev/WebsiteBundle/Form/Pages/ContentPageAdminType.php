<?php

namespace PyDev\WebsiteBundle\Form\Pages;

use Kunstmaan\NodeBundle\Form\PageAdminType;
use PyDev\WebsiteBundle\Entity\Pages\ContentPage;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * The admin type for admin pages
 */
class ContentPageAdminType extends AbstractColoredPageAdminType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting form the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array                $options The options
     *
     * @SuppressWarnings("unused")
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolverInterface $resolver The resolver for the options.
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ContentPage::class
        ));
    }

    /**
     * @assert () == 'contentpage'
     *
     * @return string
     */
    public function getName()
    {
        return 'contentpage';
    }
}
