<?php

namespace Smalot\PdfParser\Tests\Units\Element;

use mageekguy\atoum;

class ElementHexa extends atoum\test
{
    public function testParse()
    {
        // Skipped.
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse('ABC', null, $offset);
        $this->boolean($element)->isEqualTo(false);
        $this->integer($offset)->isEqualTo(0);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(' [ <0020> 5 6 ]', null, $offset);
        $this->boolean($element)->isEqualTo(false);
        $this->integer($offset)->isEqualTo(0);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(' << <0020> >>', null, $offset);
        $this->boolean($element)->isEqualTo(false);
        $this->integer($offset)->isEqualTo(0);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(' / <0020> ', null, $offset);
        $this->boolean($element)->isEqualTo(false);
        $this->integer($offset)->isEqualTo(0);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(' 0 <0020> ', null, $offset);
        $this->boolean($element)->isEqualTo(false);
        $this->integer($offset)->isEqualTo(0);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(" 0 \n <0020> ", null, $offset);
        $this->boolean($element)->isEqualTo(false);
        $this->integer($offset)->isEqualTo(0);

        // Valid.
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(' <0020> ', null, $offset);
        $this->string($element->getContent())->isEqualTo(' ');
        $this->integer($offset)->isEqualTo(7);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(' <0020> ', null, $offset);
        $this->string($element->getContent())->isEqualTo(' ');
        $this->integer($offset)->isEqualTo(7);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(' <0020>', null, $offset);
        $this->string($element->getContent())->isEqualTo(' ');
        $this->integer($offset)->isEqualTo(7);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse('<0020>', null, $offset);
        $this->string($element->getContent())->isEqualTo(' ');
        $this->integer($offset)->isEqualTo(6);
        $offset  = 0;
        $element = \Smalot\PdfParser\Element\ElementHexa::parse(" \n <0020> ", null, $offset);
        $this->string($element->getContent())->isEqualTo(' ');
        $this->integer($offset)->isEqualTo(9);
    }

    public function testGetContent()
    {
        $element = new \Smalot\PdfParser\Element\ElementHexa('0020');
        $this->string($element->getContent())->isEqualTo(' ');
    }

    public function testEquals()
    {
        $element = new \Smalot\PdfParser\Element\ElementHexa('0020');
        $this->boolean($element->equals(' '))->isEqualTo(true);
        $this->boolean($element->equals('A'))->isEqualTo(false);
    }

    public function testContains()
    {
        $element = new \Smalot\PdfParser\Element\ElementHexa('0020');
        $this->boolean($element->contains(' '))->isEqualTo(true);
        $this->boolean($element->contains('A'))->isEqualTo(false);
    }

    public function test__toString()
    {
        $element = new \Smalot\PdfParser\Element\ElementHexa('0020');
        $this->string($element->__toString())->isEqualTo(' ');
    }
}