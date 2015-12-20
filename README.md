#php.advent.calendar
Simple PHP-Script to manage an online advent calendar for a dedicated person.
The calendar is simple password protected and sends an e-mail with an link to the dedicated person.

##Dependences
Webserver (Apache) with PHP (5.3 or higher) and sendmail support
Shell access to add, configure and run cron jobs
Webbrowser that supports HTML5 and Javascript like Firefox or Chrome

##Setup
Copy and rename /public_www to your server root directory (chown and chmod).
Configure the script in app/config.php and add your items
To test the changed values you can set $today (at the beginning of config.php) to a value like 2016-12-30
Open http://example.org/cal-path/ and test
Change doc root in /cron and copy /cron to /etc/cron.d/advent (restart cron).
