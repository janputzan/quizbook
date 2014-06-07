<?php
return array(	
	"base_url"   => "http://quizbook.eu/",
	"providers"  => array (
		"Google"     => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "ID", "secret" => "SECRET" ),
			),
		"Facebook"   => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "1424238897840103", "secret" => "ac4654154727f6d8280e9cde4367dbc6" ),
			"scope"		=> "publish_actions",
			),
		"Twitter"    => array (
			"enabled"    => true,
			"keys"       => array ( "key" => "ID", "secret" => "SECRET" )
			)
	),
);