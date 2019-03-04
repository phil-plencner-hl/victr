# Phil Plencner VICTR Assessment

Uses the GitHub API to retrieve the most starred public PHP projects. 

## Features

* Stores the list of repositories in a MySQL table. 
* The table contains the repository ID, name, URL, created date, last push date, description, and
number of stars.

## Requirements

* PHP >= 5.4
* [Guzzle](https://github.com/guzzle/guzzle) library,
* [PHP GitHub API](https://github.com/KnpLabs/php-github-api) wrapper,
* [AngularJS](https://angularjs.org/) JavaScript MVW Framework,
* [Bootstrap](http://getbootstrap.com/) library

## Demo

You can view a working demonstration of the assessment at http://www.plencnerlabs.com/victr/

## Documentation
* Use victr.sql to import the mySQL table into your database
* Update the /db/db.php file with your mySQL database connection information in the connectDB() function.
function connectDB() {
	$conn = new mysqli('localhost', 'root', '', 'victr');

## License

`victr` is licensed under the MIT License - see the LICENSE file for details

## Credits

### Contributors

- Thanks to [Phil Plencner aka. beefheartfan](http://github.com/beefheartfan) for his contributions and support.

Thanks to GitHub for the high quality API and documentation.
