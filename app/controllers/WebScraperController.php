<?php
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class WebScraperController extends BaseController {

	private $client;
	public  $url;
	public  $crawler;
	public  $filters;
	public  $content = array();

	/**
	 * Defining our Dependency Injection Here.
	 * or Instantiate new Classes here.
	 *
	 * @return void
	 */
	public function __construct(Client $client)
	{
		$this->client 	= $client;
	}

	/**
	 * This will be used for Outputing our Data 
	 * and Rendering to browser.
	 *
	 * @return void
	 */
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

	/**
	 * Setup our scraper data. Which includes the url that 
	 * we want to scrape
	 * 
	 * @param (String) $url = default is NULL
	 *		  (String) $method = Method Types its either POST || GET
	 * @return void
	 */
	public function setScrapeUrl($url = NULL, $method = 'GET')
	{
		$this->crawler = $this->client->request($method, $url);
		return $this->crawler;
	}

	/**
	 * This will get all the return Result from our Web Scraper
	 *
	 * @return array
	 */
	public function getContents()
	{
		return $this->content = $this->startScraper();
	}

	/**
	 * It will handle all the scraping logic, filtering
	 * and getting the data from the defined url in our method setScrapeUrl()
	 * 
	 * @return array
	 */
	private function startScraper()
	{	
		// lets check if our filter has result.
		// im using CssSelector Dom Components like jquery for selecting data attributes.
		$countContent = $this->crawler->filter('.posts__post-title')->count();

		if ($countContent) {
			// loop through in each ".posts--list-large li" to get the data that we need.
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