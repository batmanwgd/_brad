<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
* Theme path image
*/
$theme_path_images = ETHANT_THEME_DIRECTORY . 'assets/img/';

/**
 * Wrapper for Kirki
 */
if ( ! class_exists( 'VLT_Options' ) ) {
	class VLT_Options {

		private static $default_options = array();

		public static function add_config( $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_config( 'ethant_customize', $args );
			}
		}

		public static function add_panel( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_panel( $name, $args );
			}
		}

		public static function add_section( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_section( $name, $args );
			}
		}

		public static function add_field( $args ) {
			if ( isset( $args ) && is_array( $args ) ) {
				if ( class_exists( 'Kirki' ) ) {
					Kirki::add_field( 'ethant_customize', $args );
				}
				if ( isset( $args['settings'] ) && isset( $args['default'] ) ) {
					self::$default_options[$args['settings']] = $args['default'];
				}
			}
		}

		public static function get_option( $name, $default = null ) {
			$value = get_theme_mod( $name, null );

			if ( $value === null ) {
				$value = isset( self::$default_options[$name] ) ? self::$default_options[$name] : null;
			}

			if ( $value === null ) {
				$value = $default;
			}

			return $value;
		}

	}
}

/**
 * Custom get_theme_mod
 */
if ( ! function_exists( 'ethant_get_theme_mod' ) ) {
	function ethant_get_theme_mod( $name = null, $use_acf = null, $postID = null, $acf_name = null ) {

		$value = null;

		if ( $name == null ) {
			return $value;
		}

		// try get value from meta box
		if ( $use_acf ) {
			$value = ethant_get_field( $acf_name ? $acf_name : $name, $postID );
		}

		// get value from options
		if ( $value == null ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		if ( is_archive() || is_search() || is_404() ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		$value = apply_filters( 'ethant/get_theme_mod', $value, $name );

		return $value;

	}
}

/**
 * Get value from acf field
 */
if ( ! function_exists( 'ethant_get_field' ) ) {
	function ethant_get_field( $name = null, $postID = null ) {

		$value = null;

		// try get value from meta box
		if ( function_exists( 'get_field' ) ) {
			if ( $postID == null ) {
				$postID = get_the_ID();
			}
			$value = get_field( $name, $postID );
		}

		return $value;

	}
}

/**
 * Get social icons
 */
if ( ! function_exists( 'ethant_get_social_icons' ) ) {
	function ethant_get_social_icons() {
		$social_icons = array(
			'socicon-internet' => esc_html__( 'Internet', 'ethant' ),
			'socicon-moddb' => esc_html__( 'Moddb', 'ethant' ),
			'socicon-indiedb' => esc_html__( 'Indiedb', 'ethant' ),
			'socicon-traxsource' => esc_html__( 'Traxsource', 'ethant' ),
			'socicon-gamefor' => esc_html__( 'Gamefor', 'ethant' ),
			'socicon-pixiv' => esc_html__( 'Pixiv', 'ethant' ),
			'socicon-myanimelist' => esc_html__( 'Myanimelist', 'ethant' ),
			'socicon-blackberry' => esc_html__( 'Blackberry', 'ethant' ),
			'socicon-wickr' => esc_html__( 'Wickr', 'ethant' ),
			'socicon-spip' => esc_html__( 'Spip', 'ethant' ),
			'socicon-napster' => esc_html__( 'Napster', 'ethant' ),
			'socicon-beatport' => esc_html__( 'Beatport', 'ethant' ),
			'socicon-hackerone' => esc_html__( 'Hackerone', 'ethant' ),
			'socicon-hackernews' => esc_html__( 'Hackernews', 'ethant' ),
			'socicon-smashwords' => esc_html__( 'Smashwords', 'ethant' ),
			'socicon-kobo' => esc_html__( 'Kobo', 'ethant' ),
			'socicon-bookbub' => esc_html__( 'Bookbub', 'ethant' ),
			'socicon-mailru' => esc_html__( 'Mailru', 'ethant' ),
			'socicon-gitlab' => esc_html__( 'Gitlab', 'ethant' ),
			'socicon-instructables' => esc_html__( 'Instructables', 'ethant' ),
			'socicon-portfolio' => esc_html__( 'Portfolio', 'ethant' ),
			'socicon-codered' => esc_html__( 'Codered', 'ethant' ),
			'socicon-origin' => esc_html__( 'Origin', 'ethant' ),
			'socicon-nextdoor' => esc_html__( 'Nextdoor', 'ethant' ),
			'socicon-udemy' => esc_html__( 'Udemy', 'ethant' ),
			'socicon-livemaster' => esc_html__( 'Livemaster', 'ethant' ),
			'socicon-crunchbase' => esc_html__( 'Crunchbase', 'ethant' ),
			'socicon-homefy' => esc_html__( 'Homefy', 'ethant' ),
			'socicon-calendly' => esc_html__( 'Calendly', 'ethant' ),
			'socicon-realtor' => esc_html__( 'Realtor', 'ethant' ),
			'socicon-tidal' => esc_html__( 'Tidal', 'ethant' ),
			'socicon-qobuz' => esc_html__( 'Qobuz', 'ethant' ),
			'socicon-natgeo' => esc_html__( 'Natgeo', 'ethant' ),
			'socicon-mastodon' => esc_html__( 'Mastodon', 'ethant' ),
			'socicon-unsplash' => esc_html__( 'Unsplash', 'ethant' ),
			'socicon-homeadvisor' => esc_html__( 'Homeadvisor', 'ethant' ),
			'socicon-angieslist' => esc_html__( 'Angieslist', 'ethant' ),
			'socicon-codepen' => esc_html__( 'Codepen', 'ethant' ),
			'socicon-slack' => esc_html__( 'Slack', 'ethant' ),
			'socicon-openaigym' => esc_html__( 'Openaigym', 'ethant' ),
			'socicon-logmein' => esc_html__( 'Logmein', 'ethant' ),
			'socicon-fiverr' => esc_html__( 'Fiverr', 'ethant' ),
			'socicon-gotomeeting' => esc_html__( 'Gotomeeting', 'ethant' ),
			'socicon-aliexpress' => esc_html__( 'Aliexpress', 'ethant' ),
			'socicon-guru' => esc_html__( 'Guru', 'ethant' ),
			'socicon-appstore' => esc_html__( 'Appstore', 'ethant' ),
			'socicon-homes' => esc_html__( 'Homes', 'ethant' ),
			'socicon-zoom' => esc_html__( 'Zoom', 'ethant' ),
			'socicon-alibaba' => esc_html__( 'Alibaba', 'ethant' ),
			'socicon-craigslist' => esc_html__( 'Craigslist', 'ethant' ),
			'socicon-wix' => esc_html__( 'Wix', 'ethant' ),
			'socicon-redfin' => esc_html__( 'Redfin', 'ethant' ),
			'socicon-googlecalendar' => esc_html__( 'Googlecalendar', 'ethant' ),
			'socicon-shopify' => esc_html__( 'Shopify', 'ethant' ),
			'socicon-freelancer' => esc_html__( 'Freelancer', 'ethant' ),
			'socicon-seedrs' => esc_html__( 'Seedrs', 'ethant' ),
			'socicon-bing' => esc_html__( 'Bing', 'ethant' ),
			'socicon-doodle' => esc_html__( 'Doodle', 'ethant' ),
			'socicon-bonanza' => esc_html__( 'Bonanza', 'ethant' ),
			'socicon-squarespace' => esc_html__( 'Squarespace', 'ethant' ),
			'socicon-toptal' => esc_html__( 'Toptal', 'ethant' ),
			'socicon-gust' => esc_html__( 'Gust', 'ethant' ),
			'socicon-ask' => esc_html__( 'Ask', 'ethant' ),
			'socicon-trulia' => esc_html__( 'Trulia', 'ethant' ),
			'socicon-loomly' => esc_html__( 'Loomly', 'ethant' ),
			'socicon-ghost' => esc_html__( 'Ghost', 'ethant' ),
			'socicon-upwork' => esc_html__( 'Upwork', 'ethant' ),
			'socicon-fundable' => esc_html__( 'Fundable', 'ethant' ),
			'socicon-booking' => esc_html__( 'Booking', 'ethant' ),
			'socicon-googlemaps' => esc_html__( 'Googlemaps', 'ethant' ),
			'socicon-zillow' => esc_html__( 'Zillow', 'ethant' ),
			'socicon-niconico' => esc_html__( 'Niconico', 'ethant' ),
			'socicon-toneden' => esc_html__( 'Toneden', 'ethant' ),
			'socicon-augment' => esc_html__( 'Augment', 'ethant' ),
			'socicon-bitbucket' => esc_html__( 'Bitbucket', 'ethant' ),
			'socicon-fyuse' => esc_html__( 'Fyuse', 'ethant' ),
			'socicon-yt-gaming' => esc_html__( 'Yt-gaming', 'ethant' ),
			'socicon-sketchfab' => esc_html__( 'Sketchfab', 'ethant' ),
			'socicon-mobcrush' => esc_html__( 'Mobcrush', 'ethant' ),
			'socicon-microsoft' => esc_html__( 'Microsoft', 'ethant' ),
			'socicon-pandora' => esc_html__( 'Pandora', 'ethant' ),
			'socicon-messenger' => esc_html__( 'Messenger', 'ethant' ),
			'socicon-gamewisp' => esc_html__( 'Gamewisp', 'ethant' ),
			'socicon-bloglovin' => esc_html__( 'Bloglovin', 'ethant' ),
			'socicon-tunein' => esc_html__( 'Tunein', 'ethant' ),
			'socicon-gamejolt' => esc_html__( 'Gamejolt', 'ethant' ),
			'socicon-trello' => esc_html__( 'Trello', 'ethant' ),
			'socicon-spreadshirt' => esc_html__( 'Spreadshirt', 'ethant' ),
			'socicon-500px' => esc_html__( '500px', 'ethant' ),
			'socicon-8tracks' => esc_html__( '8tracks', 'ethant' ),
			'socicon-airbnb' => esc_html__( 'Airbnb', 'ethant' ),
			'socicon-alliance' => esc_html__( 'Alliance', 'ethant' ),
			'socicon-amazon' => esc_html__( 'Amazon', 'ethant' ),
			'socicon-amplement' => esc_html__( 'Amplement', 'ethant' ),
			'socicon-android' => esc_html__( 'Android', 'ethant' ),
			'socicon-angellist' => esc_html__( 'Angellist', 'ethant' ),
			'socicon-apple' => esc_html__( 'Apple', 'ethant' ),
			'socicon-appnet' => esc_html__( 'Appnet', 'ethant' ),
			'socicon-baidu' => esc_html__( 'Baidu', 'ethant' ),
			'socicon-bandcamp' => esc_html__( 'Bandcamp', 'ethant' ),
			'socicon-battlenet' => esc_html__( 'Battlenet', 'ethant' ),
			'socicon-mixer' => esc_html__( 'Mixer', 'ethant' ),
			'socicon-bebee' => esc_html__( 'Bebee', 'ethant' ),
			'socicon-bebo' => esc_html__( 'Bebo', 'ethant' ),
			'socicon-behance' => esc_html__( 'Behance', 'ethant' ),
			'socicon-blizzard' => esc_html__( 'Blizzard', 'ethant' ),
			'socicon-blogger' => esc_html__( 'Blogger', 'ethant' ),
			'socicon-buffer' => esc_html__( 'Buffer', 'ethant' ),
			'socicon-chrome' => esc_html__( 'Chrome', 'ethant' ),
			'socicon-coderwall' => esc_html__( 'Coderwall', 'ethant' ),
			'socicon-curse' => esc_html__( 'Curse', 'ethant' ),
			'socicon-dailymotion' => esc_html__( 'Dailymotion', 'ethant' ),
			'socicon-deezer' => esc_html__( 'Deezer', 'ethant' ),
			'socicon-delicious' => esc_html__( 'Delicious', 'ethant' ),
			'socicon-deviantart' => esc_html__( 'Deviantart', 'ethant' ),
			'socicon-diablo' => esc_html__( 'Diablo', 'ethant' ),
			'socicon-digg' => esc_html__( 'Digg', 'ethant' ),
			'socicon-discord' => esc_html__( 'Discord', 'ethant' ),
			'socicon-disqus' => esc_html__( 'Disqus', 'ethant' ),
			'socicon-douban' => esc_html__( 'Douban', 'ethant' ),
			'socicon-draugiem' => esc_html__( 'Draugiem', 'ethant' ),
			'socicon-dribbble' => esc_html__( 'Dribbble', 'ethant' ),
			'socicon-drupal' => esc_html__( 'Drupal', 'ethant' ),
			'socicon-ebay' => esc_html__( 'Ebay', 'ethant' ),
			'socicon-ello' => esc_html__( 'Ello', 'ethant' ),
			'socicon-endomodo' => esc_html__( 'Endomodo', 'ethant' ),
			'socicon-envato' => esc_html__( 'Envato', 'ethant' ),
			'socicon-etsy' => esc_html__( 'Etsy', 'ethant' ),
			'socicon-facebook' => esc_html__( 'Facebook', 'ethant' ),
			'socicon-feedburner' => esc_html__( 'Feedburner', 'ethant' ),
			'socicon-filmweb' => esc_html__( 'Filmweb', 'ethant' ),
			'socicon-firefox' => esc_html__( 'Firefox', 'ethant' ),
			'socicon-flattr' => esc_html__( 'Flattr', 'ethant' ),
			'socicon-flickr' => esc_html__( 'Flickr', 'ethant' ),
			'socicon-formulr' => esc_html__( 'Formulr', 'ethant' ),
			'socicon-forrst' => esc_html__( 'Forrst', 'ethant' ),
			'socicon-foursquare' => esc_html__( 'Foursquare', 'ethant' ),
			'socicon-friendfeed' => esc_html__( 'Friendfeed', 'ethant' ),
			'socicon-github' => esc_html__( 'Github', 'ethant' ),
			'socicon-goodreads' => esc_html__( 'Goodreads', 'ethant' ),
			'socicon-google' => esc_html__( 'Google', 'ethant' ),
			'socicon-googlescholar' => esc_html__( 'Googlescholar', 'ethant' ),
			'socicon-googlegroups' => esc_html__( 'Googlegroups', 'ethant' ),
			'socicon-googlephotos' => esc_html__( 'Googlephotos', 'ethant' ),
			'socicon-googleplus' => esc_html__( 'Googleplus', 'ethant' ),
			'socicon-grooveshark' => esc_html__( 'Grooveshark', 'ethant' ),
			'socicon-hackerrank' => esc_html__( 'Hackerrank', 'ethant' ),
			'socicon-hearthstone' => esc_html__( 'Hearthstone', 'ethant' ),
			'socicon-hellocoton' => esc_html__( 'Hellocoton', 'ethant' ),
			'socicon-heroes' => esc_html__( 'Heroes', 'ethant' ),
			'socicon-smashcast' => esc_html__( 'Smashcast', 'ethant' ),
			'socicon-horde' => esc_html__( 'Horde', 'ethant' ),
			'socicon-houzz' => esc_html__( 'Houzz', 'ethant' ),
			'socicon-icq' => esc_html__( 'Icq', 'ethant' ),
			'socicon-identica' => esc_html__( 'Identica', 'ethant' ),
			'socicon-imdb' => esc_html__( 'Imdb', 'ethant' ),
			'socicon-instagram' => esc_html__( 'Instagram', 'ethant' ),
			'socicon-issuu' => esc_html__( 'Issuu', 'ethant' ),
			'socicon-istock' => esc_html__( 'Istock', 'ethant' ),
			'socicon-itunes' => esc_html__( 'Itunes', 'ethant' ),
			'socicon-keybase' => esc_html__( 'Keybase', 'ethant' ),
			'socicon-lanyrd' => esc_html__( 'Lanyrd', 'ethant' ),
			'socicon-lastfm' => esc_html__( 'Lastfm', 'ethant' ),
			'socicon-line' => esc_html__( 'Line', 'ethant' ),
			'socicon-linkedin' => esc_html__( 'Linkedin', 'ethant' ),
			'socicon-livejournal' => esc_html__( 'Livejournal', 'ethant' ),
			'socicon-lyft' => esc_html__( 'Lyft', 'ethant' ),
			'socicon-macos' => esc_html__( 'Macos', 'ethant' ),
			'socicon-mail' => esc_html__( 'Mail', 'ethant' ),
			'socicon-medium' => esc_html__( 'Medium', 'ethant' ),
			'socicon-meetup' => esc_html__( 'Meetup', 'ethant' ),
			'socicon-mixcloud' => esc_html__( 'Mixcloud', 'ethant' ),
			'socicon-modelmayhem' => esc_html__( 'Modelmayhem', 'ethant' ),
			'socicon-mumble' => esc_html__( 'Mumble', 'ethant' ),
			'socicon-myspace' => esc_html__( 'Myspace', 'ethant' ),
			'socicon-newsvine' => esc_html__( 'Newsvine', 'ethant' ),
			'socicon-nintendo' => esc_html__( 'Nintendo', 'ethant' ),
			'socicon-npm' => esc_html__( 'Npm', 'ethant' ),
			'socicon-odnoklassniki' => esc_html__( 'Odnoklassniki', 'ethant' ),
			'socicon-openid' => esc_html__( 'Openid', 'ethant' ),
			'socicon-opera' => esc_html__( 'Opera', 'ethant' ),
			'socicon-outlook' => esc_html__( 'Outlook', 'ethant' ),
			'socicon-overwatch' => esc_html__( 'Overwatch', 'ethant' ),
			'socicon-patreon' => esc_html__( 'Patreon', 'ethant' ),
			'socicon-paypal' => esc_html__( 'Paypal', 'ethant' ),
			'socicon-periscope' => esc_html__( 'Periscope', 'ethant' ),
			'socicon-persona' => esc_html__( 'Persona', 'ethant' ),
			'socicon-pinterest' => esc_html__( 'Pinterest', 'ethant' ),
			'socicon-play' => esc_html__( 'Play', 'ethant' ),
			'socicon-player' => esc_html__( 'Player', 'ethant' ),
			'socicon-playstation' => esc_html__( 'Playstation', 'ethant' ),
			'socicon-pocket' => esc_html__( 'Pocket', 'ethant' ),
			'socicon-qq' => esc_html__( 'Qq', 'ethant' ),
			'socicon-quora' => esc_html__( 'Quora', 'ethant' ),
			'socicon-raidcall' => esc_html__( 'Raidcall', 'ethant' ),
			'socicon-ravelry' => esc_html__( 'Ravelry', 'ethant' ),
			'socicon-reddit' => esc_html__( 'Reddit', 'ethant' ),
			'socicon-renren' => esc_html__( 'Renren', 'ethant' ),
			'socicon-researchgate' => esc_html__( 'Researchgate', 'ethant' ),
			'socicon-residentadvisor' => esc_html__( 'Residentadvisor', 'ethant' ),
			'socicon-reverbnation' => esc_html__( 'Reverbnation', 'ethant' ),
			'socicon-rss' => esc_html__( 'Rss', 'ethant' ),
			'socicon-sharethis' => esc_html__( 'Sharethis', 'ethant' ),
			'socicon-skype' => esc_html__( 'Skype', 'ethant' ),
			'socicon-slideshare' => esc_html__( 'Slideshare', 'ethant' ),
			'socicon-smugmug' => esc_html__( 'Smugmug', 'ethant' ),
			'socicon-snapchat' => esc_html__( 'Snapchat', 'ethant' ),
			'socicon-songkick' => esc_html__( 'Songkick', 'ethant' ),
			'socicon-soundcloud' => esc_html__( 'Soundcloud', 'ethant' ),
			'socicon-spotify' => esc_html__( 'Spotify', 'ethant' ),
			'socicon-stackexchange' => esc_html__( 'Stackexchange', 'ethant' ),
			'socicon-stackoverflow' => esc_html__( 'Stackoverflow', 'ethant' ),
			'socicon-starcraft' => esc_html__( 'Starcraft', 'ethant' ),
			'socicon-stayfriends' => esc_html__( 'Stayfriends', 'ethant' ),
			'socicon-steam' => esc_html__( 'Steam', 'ethant' ),
			'socicon-storehouse' => esc_html__( 'Storehouse', 'ethant' ),
			'socicon-strava' => esc_html__( 'Strava', 'ethant' ),
			'socicon-streamjar' => esc_html__( 'Streamjar', 'ethant' ),
			'socicon-stumbleupon' => esc_html__( 'Stumbleupon', 'ethant' ),
			'socicon-swarm' => esc_html__( 'Swarm', 'ethant' ),
			'socicon-teamspeak' => esc_html__( 'Teamspeak', 'ethant' ),
			'socicon-teamviewer' => esc_html__( 'Teamviewer', 'ethant' ),
			'socicon-technorati' => esc_html__( 'Technorati', 'ethant' ),
			'socicon-telegram' => esc_html__( 'Telegram', 'ethant' ),
			'socicon-tripadvisor' => esc_html__( 'Tripadvisor', 'ethant' ),
			'socicon-tripit' => esc_html__( 'Tripit', 'ethant' ),
			'socicon-triplej' => esc_html__( 'Triplej', 'ethant' ),
			'socicon-tumblr' => esc_html__( 'Tumblr', 'ethant' ),
			'socicon-twitch' => esc_html__( 'Twitch', 'ethant' ),
			'socicon-twitter' => esc_html__( 'Twitter', 'ethant' ),
			'socicon-uber' => esc_html__( 'Uber', 'ethant' ),
			'socicon-ventrilo' => esc_html__( 'Ventrilo', 'ethant' ),
			'socicon-viadeo' => esc_html__( 'Viadeo', 'ethant' ),
			'socicon-viber' => esc_html__( 'Viber', 'ethant' ),
			'socicon-viewbug' => esc_html__( 'Viewbug', 'ethant' ),
			'socicon-vimeo' => esc_html__( 'Vimeo', 'ethant' ),
			'socicon-vine' => esc_html__( 'Vine', 'ethant' ),
			'socicon-vkontakte' => esc_html__( 'Vkontakte', 'ethant' ),
			'socicon-warcraft' => esc_html__( 'Warcraft', 'ethant' ),
			'socicon-wechat' => esc_html__( 'Wechat', 'ethant' ),
			'socicon-weibo' => esc_html__( 'Weibo', 'ethant' ),
			'socicon-whatsapp' => esc_html__( 'Whatsapp', 'ethant' ),
			'socicon-wikipedia' => esc_html__( 'Wikipedia', 'ethant' ),
			'socicon-windows' => esc_html__( 'Windows', 'ethant' ),
			'socicon-wordpress' => esc_html__( 'Wordpress', 'ethant' ),
			'socicon-wykop' => esc_html__( 'Wykop', 'ethant' ),
			'socicon-xbox' => esc_html__( 'Xbox', 'ethant' ),
			'socicon-xing' => esc_html__( 'Xing', 'ethant' ),
			'socicon-yahoo' => esc_html__( 'Yahoo', 'ethant' ),
			'socicon-yammer' => esc_html__( 'Yammer', 'ethant' ),
			'socicon-yandex' => esc_html__( 'Yandex', 'ethant' ),
			'socicon-yelp' => esc_html__( 'Yelp', 'ethant' ),
			'socicon-younow' => esc_html__( 'Younow', 'ethant' ),
			'socicon-youtube' => esc_html__( 'Youtube', 'ethant' ),
			'socicon-zapier' => esc_html__( 'Zapier', 'ethant' ),
			'socicon-zerply' => esc_html__( 'Zerply', 'ethant' ),
			'socicon-zomato' => esc_html__( 'Zomato', 'ethant' ),
			'socicon-zynga' => esc_html__( 'Zynga', 'ethant' )
		);
		return apply_filters( 'ethant/get_social_icons', $social_icons );
	}
}

/**
 * Add custom choice
 */
if ( ! function_exists( 'ethant_add_custom_choice' ) ) {
	function ethant_add_custom_choice() {
		return array(
			'fonts' => apply_filters( 'vlthemes/kirki_font_choices', array() )
		);
	}
}