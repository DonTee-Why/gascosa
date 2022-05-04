# GACOSCA - A Simple E-Voting System

A simple e-voting system written in PHP using the Model View Controller (MVC) pattern.

## Features

- Import a HTML file and watch it magically convert to Markdown
- Drag and drop images (requires your Dropbox account be linked)
- Import and save files from GitHub, Dropbox, Google Drive and One Drive
- Drag and drop markdown and HTML files into Dillinger
- Export documents as Markdown, HTML and PDF

## Tech

Gacosca uses Symphony Components to work properly.

## Installation

Gacosca requires PHP v8.0+ to run.

Install the dependencies:

```sh
cd gacosca
composer install
```

Set the database parameters for the project in the config.php file

```sh
<?php
...
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gascosa');
```

> **Note**: An existing database is required for this project to work properly.

## Development

### Install tables

Start your development server.
Navigate to this address in your browser depending on your development server to install the required tables in your database:

```sh
127.0.0.1:8000/gacosca/install
or
locahost/gacosca/install
```

Run the project:

```sh
locahost/gacosca/
```

> **Note**: The `gacosca/` in the url points to the value of URL_SUBFOLDER in the config.php file.

```sh
<?php
...
define('URL_SUBFOLDER', 'gascosa');
...
```

## Others

You will have to add the email addresses manually to the database to be able to login. You can create a page to register email addresses.

## License

MIT

**Free Software, Hell Yeah!**
