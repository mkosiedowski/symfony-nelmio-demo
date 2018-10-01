<?php

namespace App\DTO;

use JMS\Serializer\Annotation as Serializer;
use Swagger\Annotations as SWG;

class Response
{
    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @SWG\Property(type="string", format="date", example="2018-08-05")
     */
    public $date;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'H:i:s'>")
     * @SWG\Property(type="string", pattern="^\d{2}-\d{2}-\d{2}$", example="10:00:00")
     */
    public $time;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @SWG\Property(type="string", pattern="^\d{4}-\d{2}-\d{2} \d{2}-\d{2}-\d{2}$", example="2018-10-21 10:00:00")
     */
    public $datetime;

    /**
     * Response constructor.
     *
     * @param \DateTime $date
     * @param \DateTime $time
     * @param \DateTime $datetime
     */
    public function __construct(\DateTime $date, \DateTime $time, \DateTime $datetime)
    {
        $this->date = $date;
        $this->time = $time;
        $this->datetime = $datetime;
    }

    public static function fromRequest(Request $request): Response
    {
        return new static($request->date, $request->time, $request->datetime);
    }
}
