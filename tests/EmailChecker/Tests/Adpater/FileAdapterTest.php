<?php

/*
 * This file is part of EmailChecker.
 *
 * (c) Matthieu Moquet <matthieu@moquet.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EmailChecker\Tests\Adpater;

use EmailChecker\Adapter\FileAdapter;
use EmailChecker\Tests\TestCase;

class FileAdapterTest extends TestCase
{
    protected $adapter;

    public function setUp()
    {
        $this->adapter = new FileAdapter(__DIR__.'/../../../fixtures/throwaway_domains.txt');
    }

    /**
     * @dataProvider throwawayDomains
     */
    public function testThrowawayDomains($domain)
    {
        $this->assertTrue($this->adapter->isThrowawayDomain($domain));
    }

    /**
     * @dataProvider notThrowawayDomains
     */
    public function testNotThrowawayDomains($domain)
    {
        $this->assertFalse($this->adapter->isThrowawayDomain($domain));
    }

    public static function throwawayDomains()
    {
        return array(
            array('jetable.org'),
            array('mailjet.org'),
            array('dummy-space.ext'),
            array('yopmail.com'),
        );
    }

    public static function notThrowawayDomains()
    {
        return array(
            array('gmail.com'),
            array('hotmail.com'),
            array('comment.ext'),
        );
    }
}