Projet IHM on Symfony
========================


1) Installing the website
----------------------------------

When it comes to installing the Symfony Standard Edition, you have the
following options.

### Prerequisites
  * git;
  * php;

### Download 
Clone the repository :

    git clone https://github.com/loic12305/projetIHM.git && cd projetIHM

Install all dependences

    sudo php composer.phar update --prefer-dist   

Update `app/config/parameters.yml` with right config


2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

The script returns a status code of `0` if all mandatory requirements are met,
`1` otherwise.

Access the `config.php` script from a browser:

    http://localhost/path/to/symfony/app/web/config.php

If you get any warnings or recommendations, fix them before moving on.

