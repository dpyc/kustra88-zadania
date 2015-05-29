<?php

namespace spec\kustra88\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JustifySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('kustra88\Tools\Justify');
    }
    function it_should_have_setter_and_getter()
    {
        $this
            ->setText('piotrek piotrek kustra piotrek lorem ipsum lorem ipsum kustra piotrek lorem')
            ->getText()
            ->shouldReturn('piotrek piotrek kustra piotrek lorem ipsum lorem ipsum kustra piotrek lorem');
        $this
            ->setLength(25)
            ->getLength()
            ->shouldReturn(25);
    }
    function it_should_generate_wynik()
    {
        $this
            ->setText('piotrek piotrek kustra piotrek lorem ipsum lorem ipsum kustra piotrek lorem')
            ->setLength(25)
            ->wynik()
            ->shouldReturn("piotrek   piotrek  kustra\npiotrek lorem ipsum lorem\nipsum    kustra   piotrek\nlorem");
    }
}
