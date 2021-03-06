<?php

namespace Webburza\Sylius\ArticleBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleType extends AbstractResourceType
{
    /**
     * Build the Article form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('translations', 'a2lix_translationsForms', [
            'form_type' => 'webburza_article_translation',
            'label'    => 'webburza.sylius.article.translations'
        ]);

        $builder->add('image', 'webburza_article_image', [
            'label' => 'webburza.sylius.article.label.cover_image'
        ]);

        $builder->add('category', 'webburza_article_category_choice', [
            'label' => 'webburza.sylius.article.label.category'
        ]);

        $builder->add('publishedAt', Type\DateTimeType::class, [
            'label' => 'webburza.sylius.article.label.published_at',
            'required' => false,
            'date_format' => 'y-M-d',
            'date_widget' => 'choice',
            'time_widget' => 'text'
        ]);

        $builder->add('published', Type\CheckboxType::class, [
            'label' => 'webburza.sylius.article.label.published'
        ]);

        $builder->add('featured', Type\CheckboxType::class, [
            'label' => 'webburza.sylius.article.label.featured'
        ]);
    }

    public function getName()
    {
        return 'webburza_article';
    }
}
