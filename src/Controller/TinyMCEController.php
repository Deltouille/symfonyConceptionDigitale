<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\FileException;
use Symfony\Component\HttpFoundation\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


class TinyMCEController extends AbstractController
{

    /**
     * @Route("/upload-images" ,name="uploadImage")
     */
    public function uploadImage(Request $request)
    {
        $file = $request->files->get('file');
        $filename = 'file-'.md5(uniqid()).'.'.$file->guessExtension();
        $file->move(
            $this->getParameter('image_article_upload'),
            $filename,
        );

        $fileNameAndPath = [
            'filename' =>  $filename,
            'path' => '/uploads/images/' . $filename,
        ];
        
        return $this->json([
            'location' => $fileNameAndPath['path']
        ]);
    }
}
