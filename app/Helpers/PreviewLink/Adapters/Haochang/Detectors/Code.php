<?php
declare(strict_types = 1);

namespace App\Helpers\PreviewLink\Adapters\Haochang\Detectors;

use Embed\Detectors\Code as Detector;
use Embed\EmbedCode;
use function Embed\html;
use function Embed\matchPath;

class Code extends Detector
{
    public function detect(): ?EmbedCode
    {
        $uri = $this->extractor->getUri();
        $path = $uri->getPath();

        if (!matchPath('/share/*', $path)) {
            return null;
        }

        $videoNode = $this->extractor->getDocument()->select('.//video')->node();
        if($videoNode == null){
            return null;
        }
        $src = $videoNode->getAttribute('src');
        if($src == null){
            return null;
        }
        $width = 640;
        $height = 480;

        $html = '<div class= "iframe-wrap-video"><video controls="true" preload="metadata" playsinline disablePictureInPicture controlsList="nodownload" name="media" width="100%"><source src="'.$src.'#t=0.5" type="video/mp4"></video></div>';

        /*$html = html('video', [
            'src' => $src,
            'width' => $width,
            'height' => $height,
        ]);*/

        return new EmbedCode($html, $width, $height);
    }
}
