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

    	if ($des_length <= 0)
    			return $str_in;

    	if (strlen($str_in) > $des_length){
    		$str = wordwrap($str_in, $des_length); //zawija łańcuch znaków (\n) po podanej liczbie znaków w parametrze - $des_length;
    		$str = explode("\n", $str); // wystąpienie znaku nowej linii (\n) rozbija ciąg znaków tworząc tablice
    		$str_in = $str[0];
    	}

    	$words = explode(' ', $str_in); //tworzenie nowej tablicy slow z $this->text;
    	$words_number = count($words);

    	if ($words_number == 1){
    		$length = ($des_length - strlen($words[0])) / 2;
    		$str_out .= str_repeat($char, floor($length)). $words[0] . str_repeat($char, ceil($length)); //floor - zwraca liczbę całkowitą mniejszą lub równą podanemu argumentowi (np. 4.3 zwraca 4); ceil - zwraca liczbę całkowitą większą lub równą podanemu argumentowi (np. 4.3 zwraca 5); str_repeat - powratza ciąg w parametrze str_repeat(ciag_ktory_ma_byc_powtorzony, ilosc_powtorzen);
    	} else {
    		$word_length = strlen(implode('', $words));//implode rozbija tablice array na ciąg rozdzielony ustalonym w parametrze znakiem;

			$words_number--;

    		$spaces = floor(($des_length-$word_length)/$words_number);
    		$remainder = $des_length - $word_length - ($words_number * $spaces);
    		$last = array_pop($words); //zdejmuje ostatni element ze stosu;

    		foreach($words as $word) {
    			$spaces_to_add = $spaces;
    			if($remainder > 0) {
    				$spaces_to_add++;
    				$remainder--;
    			}
    			$str_out .= $word . str_repeat($char, $spaces_to_add);
    		}
    		$str_out .= $last;
    	}
    	$str_out .= "\n";
    	return $str_out;
    }
}
