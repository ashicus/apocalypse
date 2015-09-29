                 _           _       _  __       
        /\      | |         (_)     (_)/ _|      
       /  \   __| |_ __ ___  _ _ __  _| |_ _   _ 
      / /\ \ / _` | '_ ` _ \| | '_ \| |  _| | | |
     / ____ \ (_| | | | | | | | | | | | | | |_| |
    /_/    \_\__,_|_| |_| |_|_|_| |_|_|_|  \__, |
                                            __/ |
                                           |___/ 


## Adminify

Adminify creates an admin panel for your application by utilising your application's models.

## Installation

To install the bundle either download and drag and drop it into your bundles folder or run the following on Artisan

    php artisan bundle:install adminify

Pop the following in your application's bundles.php array

    'adminify' => array('handles' => 'admin')

Ensure you've installed migrations and then run the following on Artisan

    php artisan migrate adminify

Finally, pop a user in the database

    php artisan adminify::setup firstname lastname username email@address.com password

You can also pass through an optional 5th argument of role; the default is admin for first setup.

When you're done you should have an admin panel at youapplication.com/admin

## Changelog

### v1.03

- Added console to Adminify
- Fixed issue with logviewer that caused it to break when no logs were present
- Changed the way assets are included

### v1.02

Added a log viewer to Adminify

### v1.01

Adminify now works on a different handle, hazzah!