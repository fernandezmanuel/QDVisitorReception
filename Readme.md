# QDVisitorReception
A quick and dirty visitor registration system to use on some sort of tablet at the reception desk.

This thing is spaghetticode written in PHP 5 with the mysqli extension. It's basically a guestbook from the first chapter on a PHP learning book, but with extra steps. Gets the job done though.

## Getting started
There's no hipster framework that gives you dependency hell and fails to install anyway.
Just git clone in your webserver folder and create a database.

### Prerequisites
You're going to need:
* Some sort of webserver like Apache 2, nginx, or IIS
* PHP 5 (but PHP 7 may work too)
* MariaDB or MySQL
* Git client

For example, on Debian, you install those like this:
```
apt install -y apache2 php mariadb-server mariadb-client git
```

The setup should work on CentOS, Arch, or even Windows too, but I couldn't be bothered to test that hypothesis.

### Installing
In the MariaDB console, create the database and user.

Or use PHPMyAdmin, who am I to judge?

Here's an example:
```
CREATE DATABASE 'aanwezig';

CREATE TABLE 'bezoeker' (
  'naam' varchar(123) NOT NULL,
  'meel' varchar(123) NOT NULL,
  'bedrijf' varchar(123) NOT NULL,
  'tijd' datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE 'bezoeker'
  ADD UNIQUE KEY 'naam' ('naam');

GRANT ALL PRIVILEGES ON aanwezig.* TO aanwezig@localhost IDENTIFIED BY 'please change this';
```

If you copy/pasted the above example, at least change the password.

### Deployment
Git clone in the webserver folder. That folder is ```/var/www/html``` on Debian, but it might be somewhere else on your server, so check where it is first.

Rename the ```configuratie.php.default``` file to ```configuratie.php```.

Edit the ```configuratie.php``` file to reflect the database, user, and password.

For extra security, use password protection with the ```.htaccess``` file on the ```reception``` directory, which is described here: http://www.htaccesstools.com/articles/password-protection/

## Contributing
Just make some pull request and I'll probably hit the "Merge" button.

## License
This project is licensed under The Unlicense - see the ```LICENSE``` file for details.