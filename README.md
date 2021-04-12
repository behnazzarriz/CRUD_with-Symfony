# CRUD_with-Symfony
1-before we install Symfony we need to install Composer from this link: https://getcomposer.org/download/

2-If you are installing Symfony using Composer, run the following command:
composer  composer create-project symfony/skeleton my_project_name - means that Symfony will be installed in the current directory. You can replace it with any name.
Go to :https://symfony.com/doc/current/index.html

3-Later if you need to install some packages, it may be necessary (not always!) to specify the version of the package. For example composer require 
composer require sensio/framework-extra-bundle
composer require symfony/maker-bundle
composer require doctrine/annotations (if you want to create Route via annotations) und If you want to create a route via annotations, and then you also need to have .htaccess in the root of the project : composer require symfony/apache-pack

In order to find the right package version, visit packagist website, for example https://packagist.org/packages/sensio/framework-extra-bundle
and take a look at the "requires" section, and framework-bundle package version - it must not be greater than your Symfony installation version.

4-Installation and creating virtual host 

5- We first make controller called ToDoList: php bin/console make:Controller ToDoList
6-The following package can be installed for the database installation: composer require doctrine
and after installing it we see that we need to change the .env file : DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
and in console run this : php bin/console doctrine:database:create

7- Create Entity Task ,entities in symphony are like models in other frameworks
in our console:
php bin/console make:entity, 
  the name of entity:Task and fields(title->string, status->boolean)
  
8- And now in order to create a table in the database, we need two things:
  The first is migration file I create migrations in this way: php bin/console make:migration
  The second,I want to do now is to make database table using migration code so: php bin/console doctrine:migrations:migrate
9-And as you can see, I have put CRUD Functions in the ToDoList controller in the folder Src.

##### This is my little project doing CRUD Operations by Symfony

