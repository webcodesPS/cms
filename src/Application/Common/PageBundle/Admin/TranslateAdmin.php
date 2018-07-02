<?php

namespace App\Application\Common\PageBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Application\Common\PageBundle\Entity\TranslatePage;

class TranslateAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Name'))
            ->add('page', null, array('label' => 'Add to page'))
            ->add('locale', ChoiceFieldMaskType::class, [
                'label' => 'Locale',
                'choices' => TranslatePage::getLocaleList(),
                'required' => false
            ])
            ->add('translate', TextareaType::class, array('attr' => array('class' => 'ckeditor')))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Name'))
            ->add('page', null, array('label' => 'Page'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Name'))
            ->addIdentifier('page', null, array('label' => 'Page'))
            ->add('locale', null, array('label' => 'Locale'))
        ;
    }

}
