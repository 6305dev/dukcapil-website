<?php

namespace App\Controllers;

class ViewController
{

    protected $db;

    public function __construct()
    {
        $this->db = new \App\Models\AdminModel();
    }

    public function HomePage()
    {
        return $this->render('home', ['title' => 'DISDUKCAPIL TAPIN', 'data' => $this->db->findAll('articles')]);
    }

    public function SearchPage()
    {
        return $this->render('search', ['title' => 'DISDUKCAPIL TAPIN - PENCARIAN']);
    }

    public function ReviewPage()
    {
        return $this->render('Review', ['title' => 'DISDUKCAPIL TAPIN - PENILAIAN KINERJA PEGAWAI']);
    }

    public function UploadPage()
    {
        include_once './views/upload.php';
    }

    public function LoginPage()
    {
        $captcha = $this->createCaptcha();
        $_SESSION['captcha'] = $captcha;
        include_once './views/login.php';
    }

    public function MissingPage()
    {
        return $this->render('404', ['title' => '404']);
    }

    public function render($paging, $params = [])
    {
        include_once './views/layouts/header.php';
        include_once './views/' . $paging . '.php';
        include_once './views/layouts/footer.php';
    }

    public function createCaptcha()
    {
        $characters = array_merge(range('a', 'z'), range(0, 9));
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[mt_rand(0, count($characters) - 1)];
        }
        return $randomString;
    }
}
