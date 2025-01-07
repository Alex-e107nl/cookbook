<?php
/*
 * CookBook - an e107 plugin by Tijn Kuyper (http://www.tijnkuyper.nl)
 *
 * Released under the terms and conditions of the
 * Apache License 2.0 (see LICENSE file or http://www.apache.org/licenses/LICENSE-2.0)
 *
 * Main template
*/

if (!defined('e107_INIT')) { exit; }

// OVERVIEW GRID
$COOKBOOK_TEMPLATE['overview_grid']['start'] = '
<div class="row">';

$COOKBOOK_TEMPLATE['overview_grid']['items'] = '
    <div class="col-12 col-md-6 col-lg-4 my-4">
		<div class="card h-100">
			<div class="thumbnail">
				{SETIMAGE: w=800&h=600&crop=1}
					<a href="{COOKBOOK_RECIPE_URL}">{COOKBOOK_RECIPE_THUMB}</a> 
			</div>
			<div class="card-body">
				<h4 class="card-title">{COOKBOOK_RECIPE_NAME: type=link}</h4>
					<p>{COOKBOOK_RECIPE_SUMMARY: max=150}</p>
			</div>
			<div class="card-footer">
				<div class="d-flex align-items-center small py-2">
                    <span class="me-1">{GLYPH=fa-user}</span>
						<div>
							<div>{COOKBOOK_RECIPE_AUTHOR}</div>
						</div>
						<div class="ms-auto">
							<span class="me-1">
								<span>{GLYPH=fa-user}</span>
									{COOKBOOK_CATEGORY_NAME}
							</span>
							<span class="ms-1">
								<span>{GLYPH=fa-clock}</span>
									{COOKBOOK_RECIPE_TIME}
							</span>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	
';

$COOKBOOK_TEMPLATE['overview_grid']['end'] = '
	</div>
<div class="row"> 
   {GRID_NEXTPREV}
</div>';   


// OVERVIEW TABLE (DATATABLES) 
// NOTE: requires the "recipes" class in <table>. Otherise DataTabels won't initialise. 
// NOTE: you can use DataTables data-attributes for customization: https://datatables.net/examples/advanced_init/html5-data-options.html

$COOKBOOK_TEMPLATE['overview_datatable']['start'] = '
<div align="left pull-left">
<table class="table table-bordered text-left recipes dt-responsive nowrap" data-order=\'[[5, "desc"]]\' cellspacing="0" width="100%">
	<thead>
		<tr>
		  	<th data-orderable="false" width="40%">{LAN=LAN_CB_RECIPE}</th>
		  	<th>{GLYPH=fa-cutlery}</th>
		  	<th>{GLYPH=fa-users}</th>
	  	 	<th>{GLYPH=fa-clock-o}</th>
	  	 	<th>{GLYPH=fa-toolbox}</th>
            <th>{GLYPH=fa-star}</th>
	  	 	<th data-orderable="false">{GLYPH=fa-tags}</th>
		</tr>
	</thead>
    <tbody>
';

$COOKBOOK_TEMPLATE['overview_datatable']['items'] = ' {SETIMAGE: w=22&h=22&crop=1}
		<tr>
			<td><a class="me-2" href="{COOKBOOK_RECIPE_URL}"> {COOKBOOK_RECIPE_THUMB}</a>{COOKBOOK_RECIPE_NAME: type=link}</td>
	    	<td>{COOKBOOK_CATEGORY_NAME: type=link}</td>
	    	<td>{COOKBOOK_RECIPE_PERSONS}</td>
	    	<td>{COOKBOOK_RECIPE_TIME}</td>
            <td>{COOKBOOK_RECIPE_DIFFICULTY}</td>
	    	<td>{COOKBOOK_RECIPE_AUTHORRATING}</td>
	    	<td>{COOKBOOK_RECIPE_KEYWORDS: limit=5}</td>
    	</tr>
';

$COOKBOOK_TEMPLATE['overview_datatable']['end'] = '
	</tbody>
</table>
</div>
';


// INDVIDUAL RECIPE LAYOUT <div class="card-header">
//			<h5 class="card-title">{COOKBOOK_RECIPE_NAME}</h5>
//		</div>

$COOKBOOK_TEMPLATE['recipe_layout'] = '
<div class="col-12 mb-4">
	<div class="row row-cards">
		{---RECIPE-CONTENT---}
		{---RECIPE-INFO---}
	</div>
</div>

';

$COOKBOOK_TEMPLATE['recipe_content'] = '
<!-- Start content left  -->
<div class="col-lg-8">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">{COOKBOOK_RECIPE_NAME}</h3>
		</div>
		<div class="card-body">
			<span class="pull-right float-right float-end col-xs-12 col-sm-4 col-md-4 ms-0 ms-md-4 mb-4 mb-lg-0">
				{SETIMAGE: w=800&h=600&crop=1}
				<img class="img-fluid img-thumbnail" alt="{COOKBOOK_RECIPE_ANCHOR}" src="{COOKBOOK_RECIPE_THUMB_URL}">
			</span>
			<p>{COOKBOOK_RECIPE_SUMMARY}</p>
			
			<div class="accordion" id="accordion1">
				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							{LAN=LAN_CB_INGREDIENTS}
						</button>
					</h2>
					<div id="collapseOne" class="accordion-collapse collapse">
						<div class="accordion-body">
							{COOKBOOK_RECIPE_INGREDIENTS}
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							{LAN=LAN_CB_INSTRUCTIONS}
						</button>
					</h2>
					<div id="collapseTwo" class="accordion-collapse collapse">
						<div class="accordion-body">
							{COOKBOOK_RECIPE_INSTRUCTIONS}
						</div>
					</div>
				</div>
			</div>
			
			<hr />
			
			<div class=p-2">
				{SETSTYLE=default}
				<div class="row justify-content-end my-4">
					{COOKBOOK_RECIPE_USERRATING}
				</div>
					{SETSTYLE=cookbook_comments}
					{COOKBOOK_RECIPE_COMMENTS}
					{SETSTYLE=default}
			</div>
		</div>
				
		<div class="card-footer">
			{SETSTYLE=cookbook_related}   
			{COOKBOOK_RECIPE_RELATED}
			{SETSTYLE=default}
		</div>
	</div>
</div>

<!-- End content left-->
';

$COOKBOOK_WRAPPER['recipe_info']['COOKBOOK_RECIPE_AUTHORRATING: type=stars']   = '<div id="rating">{---}</div>';
$COOKBOOK_WRAPPER['recipe_info']['COOKBOOK_RECIPE_DIFFICULTY: type=stars']     = '<div id="difficulty">{---}</div>';

$COOKBOOK_TEMPLATE['recipe_info'] = '
<!-- Sidebar -->
<div class="col-lg-4">
	<div class="card mb-4 mt-4 mt-lg-0">
		
		<div class="card-header">
			<h3 class="card-title">{LAN=LAN_CB_RECIPEINFO}</h3>
		</div>
		<div class="card-body p-1">
			<ul class="fa-ul">
				<li>{GLYPH: type=fa-cutlery&class=fa-li} {COOKBOOK_CATEGORY_NAME: type=link}</li>
				<li>{GLYPH: type=fa-users&class=fa-li} {COOKBOOK_RECIPE_PERSONS}</li>
				<li>{GLYPH: type=fa-clock-o&class=fa-li} {COOKBOOK_RECIPE_TIME}</li>
				<li>{GLYPH: type=fa-tags&class=fa-li} {COOKBOOK_RECIPE_KEYWORDS: limit=5}</li>
				<li>{GLYPH: type=fa-trophy&class=fa-li} {COOKBOOK_RECIPE_AUTHORRATING: type=stars}</li>
				<li>{GLYPH: type=fa-toolbox&class=fa-li} {COOKBOOK_RECIPE_DIFFICULTY: type=stars}</li>
				<li>{GLYPH: type=fa-user&class=fa-li} {COOKBOOK_RECIPE_AUTHOR}</li>
				<li>{GLYPH: type=fa-calendar-alt&class=fa-li} {COOKBOOK_RECIPE_DATE}</li>
			</ul>
		
		
		</div>
	</div>
	<div class="card">
		<div class="card-status-top bg-green"></div>
		<div class="card-header">
			<h3 class="card-title">{LAN=LAN_CB_ACTIONS}</h3>
		</div>
		<div class="card-body p-1">
			<ul class="fa-ul">
				<li>{COOKBOOK_RECIPE_BOOKMARK}</li>
				<li>{GLYPH: type=fa-pencil&class=fa-li} {COOKBOOK_RECIPE_EDIT}</li>
				<li>{GLYPH: type=fa-print&class=fa-li} {COOKBOOK_RECIPE_PRINT}</li>
			</ul>
		</div>
	</div>
	
</div>


<!-- End sidebar -->
';

// Styling of an individual keyword (when using {COOKBOOK_RECIPE_KEYWORDS})
$COOKBOOK_TEMPLATE['recipe_keyword'] = '<a href="{URL}" title="{KEYWORD}"><span class="label label-primary">{KEYWORD}</span></a>';

// Styling of bookmark
$COOKBOOK_TEMPLATE['recipe_bookmark_empty'] = '<i class="fa-li far fa-bookmark"></i> <a href="">{VALUE}</a>'; // Used when recipe has not been bookmarked yet
$COOKBOOK_TEMPLATE['recipe_bookmark_full']  = '<i class="fa-li fas fa-bookmark"></i> <a href="">{VALUE}</a>'; // Used when recipe is already bookmarked

// KEYWORD OVERVIEW (TAGCLOUD) (div #id should always be 'recipe_tagcloud')
$COOKBOOK_TEMPLATE['keyword_overview'] = '
{COOKBOOK_TAGCLOUD}
<div id="recipe_tagcloud" class="container-fluid" style="min-height: 350px;"></div>
';


$COOKBOOK_WRAPPER['print_recipe_layout'] = $COOKBOOK_WRAPPER['recipe_info']; 

// PRINT TEMPLATE FOR INDIVIDUAL RECIPE
$COOKBOOK_TEMPLATE['print_recipe_layout'] = '
<h1>{COOKBOOK_RECIPE_NAME}</h1>

<p>{COOKBOOK_RECIPE_SUMMARY}</p>

<h2>{LAN=LAN_CB_INGREDIENTS}</h2>
<p>{COOKBOOK_RECIPE_INGREDIENTS}</p>
	            
<h2>{LAN=LAN_CB_INSTRUCTIONS}</h2>
{COOKBOOK_RECIPE_INSTRUCTIONS}
	           
<h3>{LAN=LAN_CB_RECIPEINFO}</h3>
<ul class="fa-ul">
	<li>{GLYPH: type=fa-cutlery&class=fa-li} {COOKBOOK_CATEGORY_NAME}</li>
	<li>{GLYPH: type=fa-users&class=fa-li} {COOKBOOK_RECIPE_PERSONS}</li>
	<li>{GLYPH: type=fa-clock-o&class=fa-li} {COOKBOOK_RECIPE_TIME}</li>
	<li>{GLYPH: type=fa-tags&class=fa-li} {COOKBOOK_RECIPE_KEYWORDS}</li>
    <li>{GLYPH: type=fa-trophy&class=fa-li} {COOKBOOK_RECIPE_AUTHORRATING: type=stars}</li>
    <li>{GLYPH: type=fa-toolbox&class=fa-li} {COOKBOOK_RECIPE_DIFFICULTY: type=stars}</li>
    <li>{GLYPH: type=fa-user&class=fa-li} {COOKBOOK_RECIPE_AUTHOR}</li>
    <li>{GLYPH: type=fa-calendar-alt&class=fa-li} {COOKBOOK_RECIPE_DATE}</li>
</ul>
';

$COOKBOOK_TEMPLATE['related']['caption']    = '{LAN=LAN_CB_RELATEDRECIPES}';
$COOKBOOK_TEMPLATE['related']['start']      = '{SETIMAGE: w=300&h=300&crop=1}<div class="row">';
$COOKBOOK_TEMPLATE['related']['item']       = '<div class="col-md-3 col-sm-6 h-100">
                                                 <a href="{RELATED_URL}">{RELATED_IMAGE}</a>
                                                 <h6><a href="{RELATED_URL}">{RELATED_TITLE}</a></h6>
                                                </div>';
$COOKBOOK_TEMPLATE['related']['end']        = '</div>';