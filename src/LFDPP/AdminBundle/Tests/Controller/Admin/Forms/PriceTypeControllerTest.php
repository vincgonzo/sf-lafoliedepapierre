<?php

namespace LFDPP\AdminBundle\Tests\Controller\Admin\Forms;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PriceTypeControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add');
    }

}
