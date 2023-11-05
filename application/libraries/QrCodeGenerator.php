<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Endroid\QrCode\QrCode;

class QrCodeGenerator
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($text, $filePath)
    {
        $qrCode = new QrCode($text);
        $qrCode->writeFile($filePath);
        return $filePath;
    }
}
