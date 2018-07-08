<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-08 15:47
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Tests\Feature;

use CrCms\Foundation\Testing\CreatesApplication;
use Illuminate\Foundation\Testing\TestCase;

/**
 * Class CategoryTest
 * @package CrCms\Mall\Tests\Feature
 */
class CategoryTest extends TestCase
{
    use CreatesApplication;

    public function testAbc()
    {
        $this->assertEquals(true,true);
    }
}