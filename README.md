## start project after clone from Github

- step 1:
  Go to the folder application using cd command on your cmd or terminal
- step 2:
  Run composer install on your cmd or terminal
- step 3:
create a .env file on the root folder and copy the content of .env.example to it
- step 4:
  Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
- step 5:
  Run php artisan key:generate
- step 6:
Run php artisan migrate 
- step 7:
Run php artisan serve and go to http://localhost:8000
