<?php
// INIT
setlocale(LC_ALL, 'en_US.UTF-8');
//setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
// only items with date in the past will be shown - so what is the date today?
$today = date('Y-m-d');
// show all items for preview (comment the next line out for production)
//$today = "2015-12-01";
// date translate
// for example to german
// uncomment for use
// $dateTranslate = array(
// 	'Monday'    => 'Montag',
// 	'Tuesday'   => 'Dienstag',
// 	'Wednesday' => 'Mittwoch',
// 	'Thursday'  => 'Donnerstag',
// 	'Friday'    => 'Freitag',
// 	'Saturday'  => 'Samstag',
// 	'Sunday'    => 'Sonntag',
// 	'Mon'       => 'Mo',
// 	'Tue'       => 'Di',
// 	'Wed'       => 'Mi',
// 	'Thu'       => 'Do',
// 	'Fri'       => 'Fr',
// 	'Sat'       => 'Sa',
// 	'Sun'       => 'So',
// 	'January'   => 'Januar',
// 	'February'  => 'Februar',
// 	'March'     => 'März',
// 	'April'     => 'April',
// 	'May'       => 'Mai',
// 	'June'      => 'Juni',
// 	'July'      => 'Juli',
// 	'October'   => 'Oktober',
// 	'September' => 'September',
// 	'November'  => 'November',
// 	'December'  => 'Dezember',
// );
//$advent = (int)date('d').'. '.$dataTranslate[date('F')]; // german version without 1st, 3rd and so on
$advent = date('jS').' '.date('F');
// CONFIG
// overall config settings


$config = array (
	'lang'							=> 'en',
	'charset'						=> 'utf-8',
	'title'							=> 'Joe\'s Advent Calendar',
	'description'				=> '24 surprises to shorten the time till chrismas eve',
	'url'								=> 'http://localhost/advent/',
	'webauthPassword'		=> '3858f62230ac3c915f300c664312c63f', // for cookie based web login in md5(foobar)
	'webauthError'			=> 'Error: incorrect Password',
);
// mail settings
$mail = array(
	'toName'						=> 'Joe',
	'toAddress'					=> 'test@0x38.de',
	'fromName'					=> 'Sam',
	'fromAddress'				=> 'sam@example.org',
	'subject'						=> 'It\'s the '.$advent.'!',
	'mime'							=> 'MIME-Version: 1.0' . "\r\n",
	'content-type'			=> 'Content-type: text/plain; charset='.$config['charset']."\r\n",
	'mailauth'				=> (int)'322929299292929' // used if you want to send the mail via webcron
);
// email template
$day = explode("-",$today);
if ((int)$day[2] < 2) {
	// start with welcome
	$hash = "what";
}else{
	// else current day
	$hash = $today;
}
$mail['message'] = "
Dear ".$mail['toName'].",\r\n
today it is the ".$advent.".\r\n
Would you like to open you Door?\r\n
Please follow the link: ".$config['url']."#/$hash\r\n
\r\n
Best Regards,\r\n
".$mail['fromName']
."";

// auth view
$auth = array(
	'title'				=> 'Welcome Message',
	'placeholder'	=> 'This is a hint...'
);
// foot
$footer = array(
	'hint'				=> '<p>To navigate use the <strong>[spacebar]</strong> or <strong>arrow keys [&larr;] [&uarr;] [&rarr;] [&darr;]</strong>.</p>',
	//'hint'				=> '<p>Du kannst das <strong>Freizeichen [spacebar]</strong> oder <strong>Pfeiltasten [&larr;] [&uarr;] [&rarr;] [&darr;]</strong> zum navigieren benutzen</p>'
	'hintTouch'		=> '<p>To navigate touch the left or right side.</p>'
	//'hintTouch'		=> '<p>Rechts oder Links tippen um zu navigieren</p>'
);
// welcome
$welcome[] = array(
					'name' => 'what',
					'data-x' => '-1000',
					'data-y' => '-1500',
					'data-z' => '',
					'data-rotate' => '',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
				<p>Hello <strong>Joe</strong>. <br />Do you know what that is?<br /><small>Go to the next with [&rarr;]</small></p>
'
);
$welcome[] = array(
					'name' => 'is',
					'data-x' => '1000',
					'data-y' => '-3000',
					'data-z' => '',
					'data-rotate' => '180',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
				<p>This is <em>your</em> Advent Calandar!</p>
'
);
$welcome[] = array(
					'name' => 'unlock',
					'data-x' => '2000',
					'data-y' => '-500',
					'data-z' => '',
					'data-rotate' => '90',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '5',
					'content' => '
				<p>From now on, I\'ll send you an email every day that unlocks an new door until chrismas eve.</p>
'
);
$welcome[] = array(
					'name' => 'first',
					'data-x' => '2500',
					'data-y' => '3500',
					'data-z' => '',
					'data-rotate' => '-60',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
				<p>Next You\'ll find your first unlocked door [&rarr;]</p>
'
);

// items that will be display each day
// from 1st to 24th of december

// modules example
// (it is possible to add more than one module per day)

/// quote
// <q>Inline quote text.</q>

/// blockquote
// <blockquote>
// 	<p>Blockquote text Lorem Ipsum</p>
// 	<p class="cite">Author name</p>
// </blockquote>

/// image (add the class vertical to figure for portrai images)
// <figure class="image">
// 	<a href="#">
// 		<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
// 	</a>
// 	<figcaption>Figure Caption text lorem ipsum.</figcaption>
// </figure>

/// image-gallery (3 items per col with max. 3 rows and min. 1 row with 3 items / for example 3x3 images)
// <figure class="gallery image">
// 	<a href="#">
// 		<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
// 	</a>
// </figure>
// <figure class="gallery image">
// 	<a href="#">
// 		<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
// 	</a>
// </figure>
// <figure class="gallery image">
// 	<a href="#">
// 		<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
// 	</a>
// </figure>

/// audio
// <h2>Headline text lorem ipsum.</h2>
// <p>
// 	<audio controls>
// 		<source src="//www.freesound.org/data/previews/60/60608_27178-lq.mp3" />
// 	</audio>
// </p>

/// video
// <video controls>
// 	<source src="//mirrors.creativecommons.org/movingimages/webm/WannaWorkTogether_480p.webm" />
// </video>

/// dummy source
// image http://berlinics.de/winterliches-berlin/unter-den-linden-016.jpg.photo
//		from Simon Gattner (https://creativecommons.org/licenses/by-nc-sa/3.0/deed.en)
// audio http://www.freesound.org/people/morgantj/sounds/60608/ icecreamtruck
//		from www.freesound.org by morgantj (http://creativecommons.org/licenses/by/3.0/)
// video https://mirrors.creativecommons.org/movingimages/webm/WannaWorkTogether_480p.webm Wanna work Together?
// 		from https://creativecommons.org/videos/wanna-work-together (http://creativecommons.org/licenses/by/2.5/)
$items[] = array(
					'date' => '2015-12-01',
					'data-x' => '5000',
					'data-y' => '2000',
					'data-z' => '',
					'data-rotate' => '60',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '',
					'content' => '
		<h2>Headline text lorem ipsum.</h2>
		<p>
			<audio controls>
				<source src="//www.freesound.org/data/previews/60/60608_27178-lq.mp3" />
			</audio>
		</p>'
				);
$items[] = array(
					'date' => '2015-12-02',
					'data-x' => '5000',
					'data-y' => '0',
					'data-z' => '-100',
					'data-rotate' => '',
					'data-rotate-x' => '-40',
					'data-rotate-y' => '10',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<q>Inline quote text.</q>
'
				);
$items[] = array(	'date' => '2015-12-03',
					'data-x' => '-5000',
					'data-y' => '1000',
					'data-z' => '500',
					'data-rotate' => '180',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
		<video controls>
			<source src="//mirrors.creativecommons.org/movingimages/webm/WannaWorkTogether_480p.webm" />
		</video>
'
				);
$items[] = array(	'date' => '2015-12-04',
					'data-x' => '6000',
					'data-y' => '4000',
					'data-z' => '8000',
					'data-rotate' => '',
					'data-rotate-x' => '-60',
					'data-rotate-y' => '90',
					'data-rotate-z' => '',
					'data-scale' => '',
					'content' => '
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
'
				);
$items[] = array(	'date' => '2015-12-05',
					'data-x' => '4000',
					'data-y' => '-2000',
					'data-z' => '100',
					'data-rotate' => '90',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<figure class="image">
			<a href="#">
				<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
			</a>
			<figcaption>Figure Caption text lorem ipsum.</figcaption>
		</figure>
'
				);
$items[] = array(	'date' => '2015-12-06',
					'data-x' => '3000',
					'data-y' => '4000',
					'data-z' => '-5000',
					'data-rotate' => '',
					'data-rotate-x' => '270',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '',
					'content' => '
		<h2>Headline text lorem ipsum.</h2>
		<figure class="image">
			<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
		</figure>
		<audio controls>
			<source src="//www.freesound.org/data/previews/60/60608_27178-lq.mp3" />
		</audio>
'
				);
$items[] = array(	'date' => '2015-12-07',
					'data-x' => '-2000',
					'data-y' => '4000',
					'data-z' => '-4000',
					'data-rotate' => '',
					'data-rotate-x' => '-180',
					'data-rotate-y' => '90',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
		<blockquote>
			<p>Quote Text lorem ipsum</p>
			<p class="cite">Author Name</p>
		</blockquote>
		<q>Inline quote text.</q>
		<q class="now">Inline Quote text<br /> with line break</q>
'
				);
$items[] = array(	'date' => '2015-12-08',
					'data-x' => '-3500',
					'data-y' => '-3000',
					'data-z' => '-5000',
					'data-rotate' => '360',
					'data-rotate-x' => '180',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<h2>Headline text lorem ipsum.</h2>
		<video controls>
			<source src="//mirrors.creativecommons.org/movingimages/webm/WannaWorkTogether_480p.webm" />
		</video>
'
				);
$items[] = array(	'date' => '2015-12-09',
					'data-x' => '-2500',
					'data-y' => '1000',
					'data-z' => '-2000',
					'data-rotate' => '60',
					'data-rotate-x' => '-90',
					'data-rotate-y' => '90',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
		<q>Inline quote text.</q>
'
				);
$items[] = array(	'date' => '2015-12-10',
					'data-x' => '500',
					'data-y' => '-2000',
					'data-z' => '1000',
					'data-rotate' => '-180',
					'data-rotate-x' => '120',
					'data-rotate-y' => '110',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<figure class="image vertical">
			<a href="#">
				<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
			</a>
			<figcaption>Figure Caption text lorem ipsum.</figcaption>
		</figure>
'
				);
$items[] = array(	'date' => '2015-12-11',
					'data-x' => '1000',
					'data-y' => '-1000',
					'data-z' => '2000',
					'data-rotate' => '90',
					'data-rotate-x' => '-50',
					'data-rotate-y' => '-30',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<h2>Headline text lorem ipsum.</h2>
		<p>
			<audio controls>
				<source src="//www.freesound.org/data/previews/60/60608_27178-lq.mp3" />
			</audio>
		</p>
'
				);
$items[] = array(	'date' => '2015-12-12',
					'data-x' => '8000',
					'data-y' => '900',
					'data-z' => '-600',
					'data-rotate' => '-60',
					'data-rotate-x' => '320',
					'data-rotate-y' => '-30',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<figure class="image">
			<a href="#">
				<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
			</a>
			<figcaption>Figure Caption text lorem ipsum.</figcaption>
		</figure>
'
				);
$items[] = array(	'date' => '2015-12-13',
					'data-x' => '-2000',
					'data-y' => '3000',
					'data-z' => '2000',
					'data-rotate' => '-20',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '30',
					'data-scale' => '6',
					'content' => '
		<q>Inline quote text.</q>
'
				);
$items[] = array(	'date' => '2015-12-14',
					'data-x' => '4000',
					'data-y' => '6000',
					'data-z' => '-2000',
					'data-rotate' => '-160',
					'data-rotate-x' => '',
					'data-rotate-y' => '-70',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<figure class="image">
			<a href="#">
				<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
			</a>
			<figcaption>Figure Caption text lorem ipsum.</figcaption>
		</figure>
'
				);
$items[] = array(	'date' => '2015-12-15',
					'data-x' => '3000',
					'data-y' => '',
					'data-z' => '',
					'data-rotate' => '-180',
					'data-rotate-x' => '',
					'data-rotate-y' => '180',
					'data-rotate-z' => '90',
					'data-scale' => '',
					'content' => '
		<p>
			<video controls>
				<source src="//mirrors.creativecommons.org/movingimages/webm/WannaWorkTogether_480p.webm" />
			</video>
		</p>
'
				);
$items[] = array(	'date' => '2015-12-16',
					'data-x' => '6400',
					'data-y' => '-1400',
					'data-z' => '300',
					'data-rotate' => '-160',
					'data-rotate-x' => '',
					'data-rotate-y' => '20',
					'data-rotate-z' => '-90',
					'data-scale' => '3',
					'content' => '
		<h2>Headline text lorem ipsum.</h2>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
			<figure class="gallery image">
				<a href="#">
					<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
				</a>
			</figure>
		<p>
			<audio controls class="gallery">
				<source src="//www.freesound.org/data/previews/60/60608_27178-lq.mp3"/>
			</audio>
		</p>
'
				);
$items[] = array(	'date' => '2015-12-17',
					'data-x' => '6500',
					'data-y' => '1500',
					'data-z' => '-2000',
					'data-rotate' => '90',
					'data-rotate-x' => '30',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
		<blockquote>
			<p>Quote text lorem ipsum</p>
			<p>lorem ipsum text</p>
		</blockquote>
'
				);
$items[] = array(	'date' => '2015-12-18',
					'data-x' => '1200',
					'data-y' => '2400',
					'data-z' => '3200',
					'data-rotate' => '-220',
					'data-rotate-x' => '-60',
					'data-rotate-y' => '',
					'data-rotate-z' => '60',
					'data-scale' => '2',
					'content' => '
		<p>
			<video controls>
				<source src="//mirrors.creativecommons.org/movingimages/webm/WannaWorkTogether_480p.webm" />
			</video>
		</p>
'
				);
$items[] = array(	'date' => '2015-12-19',
					'data-x' => '-2700',
					'data-y' => '500',
					'data-z' => '1800',
					'data-rotate' => '200',
					'data-rotate-x' => '-180',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
		<figure class="image vertical">
			<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
			<figcaption>Figure Caption text lorem ipsum.</figcaption>
		</figure>
'
				);
$items[] = array(	'date' => '2015-12-20',
					'data-x' => '7500',
					'data-y' => '-2500',
					'data-z' => '500',
					'data-rotate' => '110',
					'data-rotate-x' => '30',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '4',
					'content' => '
		<blockquote>
			<p>
				Blockquote text with<br />
				a newline
			</p>
		</blockquote>
'
				);
$items[] = array(	'date' => '2015-12-21',
					'data-x' => '-500',
					'data-y' => '100',
					'data-z' => '1000',
					'data-rotate' => '-90',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<p>
			<video controls>
				<source src="//mirrors.creativecommons.org/movingimages/webm/WannaWorkTogether_480p.webm" />
			</video>
		</p>
'
				);
$items[] = array(	'date' => '2015-12-22',
					'data-x' => '7000',
					'data-y' => '3000',
					'data-z' => '1500',
					'data-rotate' => '3600',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '2',
					'content' => '
		<figure class="image vertical">
			<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
			<figcaption>Figure Caption text lorem ipsum.</figcaption>
		</figure>
		<p>
			<audio controls class="gallery vertical">
				<source src="//www.freesound.org/data/previews/60/60608_27178-lq.mp3"/>
			</audio>
		</p>
'
				);
$items[] = array(	'date' => '2015-12-23',
					'data-x' => '5800',
					'data-y' => '500',
					'data-z' => '2000',
					'data-rotate' => '1800',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '',
					'content' => '
		<figure class="image">
			<img src="//berlinics.de/cache/winterliches-berlin/unter-den-linden-016_330.jpg" />
			<figcaption>Figure Caption text lorem ipsum.</figcaption>
		</figure>
'
				);
$items[] = array(	'date' => '2015-12-24',
					'data-x' => '2000',
					'data-y' => '3000',
					'data-z' => '6000',
					'data-rotate' => '',
					'data-rotate-x' => '',
					'data-rotate-y' => '',
					'data-rotate-z' => '',
					'data-scale' => '3',
					'content' => '
		<h2>Headline text lorem ipsum.</h2>
		<p>
			<video controls>
				<source src="//mirrors.creativecommons.org/movingimages/webm/WannaWorkTogether_480p.webm" />
			</video>
		</p>
		<q>Inline quote text.</q>
'
				);
?>
