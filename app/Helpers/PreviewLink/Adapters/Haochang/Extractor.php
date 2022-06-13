<?php
declare(strict_types = 1);

namespace App\Helpers\PreviewLink\Adapters\Haochang;

use Embed\Extractor as Base;
use Embed\Http\Crawler;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use App\Helpers\PreviewLink\Adapters\Haochang\Detectors;

class Extractor extends Base
{
    public function __construct(UriInterface $uri, RequestInterface $request, ResponseInterface $response, Crawler $crawler)
    {
        parent::__construct($uri, $request, $response, $crawler);

        $this->code = new Detectors\Code($this);
    }
}
