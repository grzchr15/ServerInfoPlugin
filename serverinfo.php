<?php
/**
 * Plugin Name: serverinfoplugin.
 * Plugin URI: https://bretterhofer.at/blog/wordpress-plugin-for-ip-and-other-information-serverinfoplugin/
 * Description: A Plugin to create short codes for server information and Client connect information
 * Version: The plugin's version number. Example: 1.0.0
 * Author: christian.bretterhofer@bretterhofer.at
 * Author URI: https://bretterhofer.at/
 * Text Domain: Optional englisch
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: GPL3
 */
 /*  Copyright YEAR  Christian Bretterhofer  (email : christian.bretterhofer@bretterhofer.at)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 
 class ServerinfoPlugin {
		function serverinfoplugin_func( $atts, $content = "" ) {
		
			$a = shortcode_atts( array(
	        'tag' => 'SERVER_ADDR',
	        'width' => 'something else',
	        'height' => 'something else',
	        'bold' => '0',
	    ), $atts );
	  	switch(strtoupper ($atts['tag'])){
		  	case "REMOTE_ADDR":
		  		$content=$_SERVER["REMOTE_ADDR"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		$content="<b>".$content."</b>";
		  		break;
		  		
		  	case "REMOTE_PORT":
		  		$content=$_SERVER["REMOTE_PORT"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "REMOTE_HOST":
		  		$remoteIP=$_SERVER['REMOTE_ADDR'];
					if (strstr($remoteIP, ', ')) {
					    $ips = explode(', ', $remoteIP);
					    $remoteIP = $ips[0];
					}
		  		$content=$hostname = gethostbyaddr($remoteIP); //$_SERVER["REMOTE_HOST"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "SSL_TLS_SNI":
		  		$content=$_SERVER["SSL_TLS_SNI"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "X_FORWARDED_FOR":
		  		$content=$_SERVER["X_FORWARDED_FOR"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "X_FORWARDED_HOST":
		  		$content=$_SERVER["X_FORWARDED_HOST"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "SERVER_ADDR":
		  		$content=$_SERVER["SERVER_ADDR"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "REQUEST_METHOD":
		  		$content=$_SERVER["REQUEST_METHOD"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "SERVER_PROTOCOL":
		  		$content=$_SERVER["SERVER_PROTOCOL"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "HTTPS":
		  		$content=$_SERVER["HTTPS"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  	case "HTTP_USER_AGENT":
		  		$content=$_SERVER["HTTP_USER_AGENT"];
		  		if($atts['text'] =='bold'){$content="<b>".$content."</b>";}
		  		break;
		  		
		   	case "HELP":
		  		$content="[serverinfotag tag='REMOTE_ADDR']";
		  		$content.="<br>\n[serverinfotag tag='REMOTE_PORT']";
		  		$content.="<br>\n[serverinfotag tag='REMOTE_HOST']";
		  		$content.="<br>\n[serverinfotag tag='HTTP_USER_AGENT']";
		  		$content.="<br>\n[serverinfotag tag='SSL_TLS_SNI']";
		  		$content.="<br>\n[serverinfotag tag='X_FORWARDED_FOR']";
		  		$content.="<br>\n[serverinfotag tag='X_FORWARDED_HOST']";
		  		$content.="<br>\n[serverinfotag tag='SERVER_ADDR']";
		  		$content.="<br>\n[serverinfotag tag='REQUEST_METHOD']";
		  		$content.="<br>\n[serverinfotag tag='SERVER_PROTOCOL']";
		  		$content.="<br>\n[serverinfotag tag='HTTPS']";
		  		break;
		  }
			return "$content";
		}
 }
 add_shortcode( 'serverinfotag', array( 'ServerinfoPlugin', 'serverinfoplugin_func' ) );
 add_filter('widget_text', 'do_shortcode', 11); //do shortcodes in widgets

 