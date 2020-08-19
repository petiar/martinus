# How to

1. Install `symfony` CLI: https://symfony.com/download
2. Clone the repo (`git clone git@github.com:petiar/martinus.git`)
3. Navigate to the project dir and run `composer install`
4. Edit the DB connection string in the `.env` file
5. Create the DB schema as per the SQL command bellow
6. Run `symfony server:start`
7. Navigate to the `/import` URL in the browser to import items from the csv file
8. Navigate to the `/books` URL to check whether import went well

### ... or if you do not want to install symfony CLI

Skip steps 1 and 6 from above and just use the `public` dir as a webroot in your env

# DB schema

```
CREATE TABLE `book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `picture` varchar(1024) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9510 DEFAULT CHARSET=utf8;
```
