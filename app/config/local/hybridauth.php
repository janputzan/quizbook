<?php
return array(	
	"base_url"   => "http://localhost:8000/social/auth",
	"providers"  => array (
		"Google"     => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "ID", "secret" => "SECRET" ),
			),
		"Facebook"   => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "1424241524506507", "secret" => "6386eea02a732c519179f3d11090ec51" ),
			"scope"		=> "publish_actions",
			),
		"Twitter"    => array (
			"enabled"    => true,
			"keys"       => array ( "key" => "ID", "secret" => "SECRET" )
			)
	),
);