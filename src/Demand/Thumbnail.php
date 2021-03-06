<?php

declare(strict_types=1);

namespace ReliqArts\GuidedImage\Demand;

use Illuminate\Http\Request;
use ReliqArts\GuidedImage\Contract\GuidedImage;

final class Thumbnail extends ExistingImage
{
    public const ROUTE_TYPE_NAME = 'thumb';

    private const METHOD_CROP = 'crop';
    private const METHOD_FIT = 'fit';
    private const METHODS = [self::METHOD_CROP, self::METHOD_FIT];

    /**
     * @var string
     */
    private string $method;

    /**
     * Thumbnail constructor.
     *
     * @param mixed $width
     * @param mixed $height
     * @param mixed $returnObject
     */
    public function __construct(
        Request $request,
        GuidedImage $guidedImage,
        string $method,
        $width,
        $height,
        $returnObject = null
    ) {
        parent::__construct($request, $guidedImage, $width, $height, $returnObject);

        $this->method = $method;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    public function isValid(): bool
    {
        return in_array($this->method, self::METHODS, true);
    }
}
