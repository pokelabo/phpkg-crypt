phpkg-crypt
==========

Contains `Md5::short`, shorter version of MD5(22 digit), originally written by Serge at 20-May-2008 03:19, found on [the official md5 function manual][].

[the official md5 function manual]: http://php.net/md5

Installation
------------

Install composer in your project:

    curl -s https://getcomposer.org/installer | php

Create a composer.json file in your project root:

    {
        "require": {
            "pokelabo/crypt": "*"
        },
        "repositories": [
            {
                "type": "git",
                "url": "https://github.com/pokelabo/phpkg-crypt.git"
            }
        ]
    }

License
-------

MIT Public License
