<?php

class Test extends PHPUnit_Framework_TestCase
{
    public function testPlugin()
    {
        $obj = new AlwaysFoodstampTotal();
    }

    public function testFooters()
    {
        CoreLocal::set('runningTotal', 1.23);
        CoreLocal::set('fntlflag', 0);
        CoreLocal::set('End', 0);
        $f = new AlwaysFsEligibleFooter();
        $this->assertInternalType('string', $f->header_content());
        $this->assertInternalType('string', $f->display_content());
        CoreLocal::set('End', 1);
        $this->assertInternalType('string', $f->display_content());

        $f = new AlwaysFsTotalFooter();
        CoreLocal::set('End', 0);
        CoreLocal::set('ttlflag', 1);
        $this->assertInternalType('string', $f->header_content());
        $this->assertInternalType('string', $f->display_content());
        CoreLocal::set('End', 1);
        $this->assertInternalType('string', $f->header_content());
        $this->assertInternalType('string', $f->display_content());
        CoreLocal::set('ttlflag', 0);
        $this->assertInternalType('string', $f->header_content());
        $this->assertInternalType('string', $f->display_content());
    }
}

