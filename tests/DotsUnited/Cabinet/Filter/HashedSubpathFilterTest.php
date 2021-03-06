<?php

/*
 * This file is part of Cabinet.
 *
 * (c) 2012 Jan Sorgalla <jan.sorgalla@dotsunited.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DotsUnited\Cabinet\Filter;

/**
 * @author  Jan Sorgalla <jan.sorgalla@dotsunited.de>
 *
 * @covers  DotsUnited\Cabinet\Filter\HashedSubpathFilter
 */
class HashedSubpathFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultConfig()
    {
        $filter = new HashedSubpathFilter();

        $this->assertEquals(0, $filter->getLevel());
        $this->assertEquals('md5', $filter->getCallback());
        $this->assertFalse($filter->getPreserveDirs());
    }

    public function testConstructorAcceptsConfig()
    {
        $config = array(
            'level' => 2,
            'callback' => 'sha1',
            'preserve_dirs' => true
        );

        $filter = new HashedSubpathFilter($config);

        $this->assertEquals($config['level'], $filter->getLevel());
        $this->assertEquals($config['callback'], $filter->getCallback());
        $this->assertEquals($config['preserve_dirs'], $filter->getPreserveDirs());
    }

    public function testSetCallbackThrowsExceptionIfNoValidCallbackSupplied()
    {
        $this->setExpectedException('\InvalidArgumentException', 'Invalid callback');

        $filter = new HashedSubpathFilter();
        $filter->setCallback(null);
    }

    public function testFilterReturnsOriginalValueIfLevelIsZero()
    {
        $filter = new HashedSubpathFilter();
        $filter->setLevel(0);

        $this->assertEquals('foo.txt', $filter->filter('foo.txt'));
    }

    public function testFilterDoesNotPreserveDirsIfSetToFalse()
    {
        $filter = new HashedSubpathFilter();
        $filter
            ->setLevel(5)
            ->setCallback('md5')
            ->setPreserveDirs(false);

        $expected = '4/5/3/b/c/foo.txt';
        $filtered = $filter->filter('path/to/foo.txt');

        $this->assertEquals($expected, $filtered);
    }

    public function testFilterPreservesDirsIfSetToTrue()
    {
        $filter = new HashedSubpathFilter();
        $filter
            ->setLevel(5)
            ->setCallback('md5')
            ->setPreserveDirs(true);

        $expected = 'path/to/4/f/d/8/c/foo.txt';
        $filtered = $filter->filter('path/to/foo.txt');

        $this->assertEquals($expected, $filtered);
    }

    public function testFilterThrowsExceptionIfCallbackReturnsEmptyString()
    {
        $this->setExpectedException('\RuntimeException', 'Invalid callback (empty hash returned)');
        $filter = new HashedSubpathFilter();
        $filter
            ->setLevel(5)
            ->setCallback(function($value) {
                return '';
            });

        $filter->filter('foo.txt');
    }
}
