<?php

namespace kustra88\Tools;

class Justify
{
    private $text;
    private $length;

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
    public function getText()
    {
        return $this->text;
    }
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }
    public function getLength()
    {
        return $this->length;
    }
    public function wynik(){
        $str_out = '';
        $char = ' ';
        $str_in = trim($this->text);  //usuwamy puste znaki na poczatku i koncu stringa
        $des_length = intval($this->length); //int
        $pos = 0;
        $pom = count(explode(' ', $str_in));



        
        if (strlen($str_in) > $des_length){
            $str = wordwrap($str_in, $des_length); //zawija łańcuch znaków (\n) po podanej liczbie znaków w parametrze - $des_length;
            $str = explode("\n", $str); // wystąpienie znaku nowej linii (\n) rozbija ciąg znaków tworząc tablice       
        }

        
        if ($des_length <= 0 || strlen($str_in) <= $des_length)
                return $str_in;


        else {

            while($pom > 0) {
                
                $str_in = $str[$pos];  
                $words = explode(' ', $str_in); //tworzenie nowej tablicy slow z $this->text;
                $words_number = count($words);
                $words_length = strlen(implode('', $words));//implode rozbija tablice array na ciąg rozdzielony ustalonym w parametrze znakiem;

                $spaces = ceil(($des_length-$words_length)/($words_number));
                $remainder = $des_length - $words_length - (($words_number-1) * $spaces);

                $last = array_pop($words); //zdejmuje ostatni element ze stosu;
                foreach ($words as $word) {
                    $spaces_to_add = $spaces;
                    if($remainder > 0) {
                        $spaces_to_add++;
                        $remainder--;
                    }
                    $str_out .= $word . str_repeat($char, $spaces_to_add);
                }
                
                $str_out .= $last;
                $str_out .= "\r\n";
                $pos++;
                $pom = $pom - $words_number;
            }

        }   
        //nl2br()   
        return $str_out;
    }
}
