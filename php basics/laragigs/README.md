Configure access rights in the root of the project:

-   sudo chown -R $USER:daemon storage bootstrap/cache
-   sudo chmod -R 775 storage bootstrap/cache

To run your Laravel project using XAMPP, you can follow these steps:

1) Open the httpd-vhosts.conf file in your XAMPP installation. The file is usually located at C:\xampp\apache\conf\extra\httpd-vhosts.conf.

2) Add the following code to the file, specifying the document root, server name, and directory settings for your Laravel project:
```
<VirtualHost *:80>
    DocumentRoot "path/to/your/laravel/public"
    ServerName laravel.test
    ServerAlias www.laravel.test
    ErrorLog "logs/laravel-error.log"
    CustomLog "logs/laravel-access.log" common
    <Directory "path/to/your/laravel">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Make sure to replace "path/to/your/laravel" with the actual path to your Laravel project's directory.

3) Save the changes to the httpd-vhosts.conf file.

4) Open the hosts file on your system. In Windows, it is usually located at C:\Windows\System32\drivers\etc\hosts.

5) Add the following line to the hosts file:
`127.0.0.1   laravel.test`

6) Save the changes to the hosts file.

7) Restart the Apache server in XAMPP for the changes to take effect.

After completing these steps, you should be able to access your Laravel project by visiting http://laravel.test or http://www.laravel.test in your web browser.

Note: Make sure to replace laravel.test with the desired domain name for your project.