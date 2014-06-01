<?php
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;


class WebScraperController extends BaseController {

	private $client;
	public  $url;
	public  $crawler;
	public  $filters;
	public  $content = array();

	public function __construct(Client $client)
	{
		$this->client 	= $client;
	}

	public function getIndex()
	{
		$this->url = 'http://code.tutsplus.com';
		$this->setScrapeUrl( $this->url );
		
		$this->filters = [
			'title' 			=> '.posts__post-title',
			'short_description' => '.posts__post-summary',
			'image_preview' 	=> '.posts__post-preview img',
			'author' 			=> '.posts__post-author-link'
		];
		return View::make('scraper')->with('contents', $this->getContents());
	}

	public function setScrapeUrl($url = array(), $method = 'GET')
	{
		$this->crawler = $this->client->request($method, $url);
		return $this->crawler;
	}
	
	public function getContents()
	{
		return $this->content = $this->startScraper();
	}

	private function startScraper()
	{
		$h1_count = $this->crawler->filter('.posts__post-title')->count();

		if ($h1_count) {
		    $this->content = $this->crawler->filter('.posts--list-large li')->each(function(Crawler $node, $i) {
		    	return [
		           		'title' 			=> $node->filter($this->filters['title'])->text(),
		           		'url' 				=> $this->url.$node->filter($this->filters['title'])->attr('href'),
		           		'short_description' => $node->filter($this->filters['short_description'])->text(),
		           		'image_preview' 	=> $node->filter($this->filters['image_preview'])->attr('src'),
		           		'author' 			=> $node->filter($this->filters['author'])->text()
		        ];
		    });
		}
		return $this->content;
	}

}