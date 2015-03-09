<?php

class ExampleTest extends TestCase
{

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		//$crawler = $this->client->request('GET', '/');
		//$this->assertTrue($this->client->getResponse()->isOk());

		$this->call('GET', '/');
		$this->assertResponseOk();
	}

	public function testRouteContact()
	{
		//$crawler = $this->client->request('GET', '/');
		//$this->assertTrue($this->client->getResponse()->isOk());

		$this->call('GET', 'contact');
		$this->assertResponseOk();
	}

	public function testSumArray()
	{
		$data = array(10, 20, 30);
		$result = array_sum($data);
		$this->assertEquals(60, $result);
	}

	public function testBasicAssertString()
	{
		$data = 'Je suis petit';
		$this->assertTrue(starts_with($data, 'Je'));
		$this->assertFalse(starts_with($data, 'Tu'));
		$this->assertSame(starts_with($data, 'Tu'), false);
		$this->assertStringStartsWith('Je', $data);
		$this->assertStringEndsWith('petit', $data);
	}

/*	public function testBasicView()
	{
		$response = $this->call('GET', '/');
		$view = $response->original;
		$this->assertEquals('Vous y êtes !', $view['message']);
		/*
		  	$response = $this->call('GET', '/');
  			$this->assertViewHas('message');
  			$this->assertViewHas('message', 'Vous y êtes !');
		 */
//	}

	public function testDOM()
	{
		$crawler = $this->client->request('GET', '/');
		$this->assertCount(1, $crawler->filter('title:contains("Laravel PHP Framework")'));
	}

	public function testDOMFilter()
	{
		$crawler = $this->client->request('GET', '/');
		$crawler = $crawler->filter('title');
		$this->assertEquals($crawler->text(), 'Laravel PHP Framework');
	}
}