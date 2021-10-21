<?php

namespace Pedre\Response;

class Response
{

    private $status = 200;
    private $response = [
        'success' => true,
        'data' => [],
        'message' => '',
    ];

    public function setSuccess(bool $value): Response
    {
        $this->response['success'] = $value;
        return $this;
    }

    public function setData(array $value): Response
    {
        $this->response['data'] = $value;
        return $this;
    }

    public function setMessage(string $value): Response
    {
        $this->response['message'] = $value;
        return $this;
    }

    public function setErrorCode(int $value): Response
    {
        $this->response['error_code'] = $value;
        return $this;
    }

    public function setStatus(int $value): Response
    {
        $this->status = $value;
        return $this;
    }

    public function send()
    {
        return response()->json($this->response, $this->status);
    }
}
