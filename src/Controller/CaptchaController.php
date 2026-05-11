<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Utility\Text;

class CaptchaController extends Controller
{
    public function image()
    {
        $this->autoRender = false;

        // 🔥 Generate random string (letters + numbers)
        $code = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, 5);

        // Store in session
        $this->request->getSession()->write('captcha_code', $code);

        // Create image
        $width = 140;
        $height = 50;
        $img = imagecreatetruecolor($width, $height);

        // Colors
        $bg = imagecolorallocate($img, 245, 245, 245);
        $textColor = imagecolorallocate($img, 40, 40, 40);

        imagefilledrectangle($img, 0, 0, $width, $height, $bg);

        // 🔥 Add noise lines
        for ($i = 0; $i < 5; $i++) {
            $lineColor = imagecolorallocate($img, rand(150,200), rand(150,200), rand(150,200));
            imageline($img, rand(0,$width), rand(0,$height), rand(0,$width), rand(0,$height), $lineColor);
        }

        // 🔥 Add noise dots
        for ($i = 0; $i < 100; $i++) {
            $dotColor = imagecolorallocate($img, rand(180,220), rand(180,220), rand(180,220));
            imagesetpixel($img, rand(0,$width), rand(0,$height), $dotColor);
        }

        // 🔥 Draw text with slight random positions
        $fontSize = 5;
        $x = 15;

        for ($i = 0; $i < strlen($code); $i++) {
            $y = rand(10, 20);
            imagestring($img, $fontSize, $x, $y, $code[$i], $textColor);
            $x += 20;
        }

        header("Content-Type: image/png");
        imagepng($img);
        imagedestroy($img);
    }



}
