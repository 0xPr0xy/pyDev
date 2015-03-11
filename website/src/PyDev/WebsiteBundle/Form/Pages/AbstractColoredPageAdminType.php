<?php

namespace PyDev\WebsiteBundle\Form\Pages;

use Kunstmaan\NodeBundle\Form\PageAdminType;
use PyDev\WebsiteBundle\Entity\Pages\AbstractColoredPage;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * The admin type for abstract colored pages
 */
class AbstractColoredPageAdminType extends PageAdminType
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
        $builder->add('backgroundColor', 'color', array('required' => true));
    }

    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolverInterface $resolver The resolver for the options.
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => AbstractColoredPage::class
        ));
    }

    /**
     * @assert () == 'abstractcoloredpage'
     *
     * @return string
     */
    public function getName()
    {
        return 'abstractcoloredpage';
    }
}
