<?php

namespace PyDev\WebsiteBundle\Form\PageParts;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ImagePagePartAdminType
 */
class ImagePagePartAdminType extends \Symfony\Component\Form\AbstractType
{

    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting form the
     * top most type. Type extensions can further modify the form.
     * @param FormBuilderInterface $builder The form builder
     * @param array                $options The options
     *
     * @see FormTypeExtensionInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('image', 'media', array(
            'pattern' => 'KunstmaanMediaBundle_chooser',
            'mediatype' => 'image',
            'required' => false,
        ));
        $builder->add('imageAltText', 'text', array(
            'required' => false,
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'pydev_websitebundle_imagepageparttype';
    }

    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolverInterface $resolver The resolver for the options.
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => '\PyDev\WebsiteBundle\Entity\PageParts\ImagePagePart'
        ));
    }
}
