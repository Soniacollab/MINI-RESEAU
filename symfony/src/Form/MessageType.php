<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Zone de texte du message
            ->add('content', TextareaType::class, [
                'label' => 'Votre message',
                'attr' => [
                    'placeholder' => 'Exprimez-vous ici...',
                    'rows' => 4,
                ],
            ])

            // Champ pour l'image (upload)
            ->add('image', FileType::class, [
                'label' => 'Image (JPG ou PNG)',
                'mapped' => false, // car ce champ n’est pas directement dans l’entité Message
                'required' => false,
                'attr' => [
                    'accept' => 'image/png, image/jpeg'
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Veuillez uploader une image au format JPG ou PNG.',
                    ])
                ],
            ])

            // Bouton d’envoi
            ->add('submit', SubmitType::class, [
                'label' => 'Publier le message',
                'attr' => [
                    'class' => 'btn btn-primary w-100'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
