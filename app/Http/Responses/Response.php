<?php
namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Illuminate\Http\Response as BaseResponse;

class Response extends BaseResponse 
{
    /**
     * Create a new HTTP response.
     *
     * @param  mixed  $content
     * @param  int  $status
     * @param  array  $headers
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($content = '', $status = 200, array $headers = [])
    {
        $this->headers = new ResponseHeaderBag($headers);

        if($this->shouldBeJson($content)) 
        {
            $key = $status < 400 ? 'data' : 'error';
            $content = array($key => $content, 'status' => $status);
        }
        else if($status < 400) 
        {
            $content = array('success' => $content, 'status' => $status);
        }
        else 
        {
            $content = $content;
        }

        $this->setContent($content);
        $this->setStatusCode($status);
        $this->setProtocolVersion('1.0');
    }

    /**
     * Morph the given content into JSON.
     *
     * @param  mixed  $content
     * @return string
     */
    protected function morphToJson($content)
    {
        if ($content instanceof Jsonable) {
            return $content->toJson();
        } elseif ($content instanceof Arrayable) {
            return json_encode($content->toArray(), JSON_PRETTY_PRINT);
        }

        return json_encode($content, JSON_PRETTY_PRINT);
    }

}