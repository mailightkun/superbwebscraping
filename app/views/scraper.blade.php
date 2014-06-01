@extends('index')

@section('content')
    <div class="container-fluid" style="background-color:#e8e8e8">
        <div class="container container-pad" id="property-listings">
            
            <div class="row">
              <div class="col-md-12">
                <h1>Superb Web Scraper Demo using Laravel 4  by Developers.ph</h1>
                <p>Web Scraping Contents</p>
              </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12"> 
                @if($contents)
					@foreach ($contents as $content)
	                    <!-- Begin Listing: 609 W GRAVERS LN-->
	                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
	                        <div class="media">
	                            <a class="pull-left" href="{{ $content['url'] }}" target="_parent">
	                            <img alt="image" class="img-responsive" src="{{ $content['image_preview'] }}"></a>

	                            <div class="clearfix visible-sm"></div>

	                            <div class="media-body fnt-smaller">
	                                <a href="#" target="_parent"></a>

	                                <h4 class="media-heading">
	                                  <a href="{{ $content['url'] }}" target="_parent">
	                                  	{{ $content['title'] }}
	                                  </a>
	                                </h4>
	                                <p class="hidden-xs">
	                                	 {{ $content['short_description'] }}
	                                </p>
	                                <span class="fnt-smaller fnt-lighter fnt-arial">Author name: {{ $content['author'] }}</span>
	                            </div>
	                        </div>
	                    </div><!-- End Listing-->
	        		@endforeach
	        	@else 
	        	<div class="well text-center"> No Result Found!</div>
	        	@endif
                </div>
        </div><!-- End container -->
    </div>
@stop


@section('stylesheets')

	<style type="text/css">
		/**** BASE ****/
		body {
		    color: #888;
		    background-color: #e8e8e8;
		}
		a {
		    color: #03a1d1;
		    text-decoration: none!important;
		}

		/**** LAYOUT ****/
		.list-inline>li {
		    padding: 0 10px 0 0;
		}
		.container-pad {
		    padding: 30px 15px;
		}


		/**** MODULE ****/
		.bgc-fff {
		    background-color: #fff!important;
		}
		.box-shad {
		    -webkit-box-shadow: 1px 1px 0 rgba(0,0,0,.2);
		    box-shadow: 1px 1px 0 rgba(0,0,0,.2);
		}
		.brdr {
		    border: 1px solid #ededed;
		}

		/* Font changes */
		.fnt-smaller {
		    font-size: .9em;
		}
		.fnt-lighter {
		    color: #bbb;
		}

		/* Padding - Margins */
		.pad-10 {
		    padding: 10px!important;
		}
		.mrg-0 {
		    margin: 0!important;
		}
		.btm-mrg-10 {
		    margin-bottom: 10px!important;
		}
		.btm-mrg-20 {
		    margin-bottom: 20px!important;
		}

		/* Color  */
		.clr-535353 {
		    color: #535353;
		}

		/**** MEDIA QUERIES ****/
		@media only screen and (max-width: 991px) {
		    #property-listings .property-listing {
		        padding: 5px!important;
		    }
		    #property-listings .property-listing a {
		        margin: 0;
		    }
		    #property-listings .property-listing .media-body {
		        padding: 10px;
		    }
		}

		@media only screen and (min-width: 992px) {
		    #property-listings .property-listing img {
		        max-width: 180px;
		    }
		}


	</style>

@stop