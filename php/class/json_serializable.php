<?php


class QuestionRegistry implements JsonSerializable
{

    private $code;
    private $question;
    private $results;

    function __construct($code, $question)
    {
        $this->code = $code;
        $this->question = $question;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getQuestion()
    {
        return $this->Question;
    }

    public function getResults()
    {
        return $this->results;
    }


    public function jsonSerialize()
    {
        return ['code' => $this->code,
            'question' => $this->question,
            'results' => $this->results];
    }
}
