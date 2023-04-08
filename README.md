# movie_portal

![cinema-4153289_640](https://user-images.githubusercontent.com/85740167/230725855-1da7d3c5-a79b-455a-b6aa-d198052213b5.jpg)
<br><samp>Image by <a href="https://pixabay.com/users/mohamed_hassan-5229782/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4153289">mohamed_hassan-5229782/</a> from <a href="https://pixabay.com//?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4153289">Pixabay</a></samp>

## School project written with a friend in Php for a movie portal.



### How to test:


1.  download and install XAMPP (https://www.apachefriends.org/de/index.html) or similar unless you already have a personal webserver


> **Note**
> you will also need a working install of mysql :exclamation:

2. download the project and unzip it in xamp/htdocs

3. create database:
   - From cmd (or terminal in Mac) change directory to "movie_portal-main/data" <br>
      - in macintosh './create_database.bat' <br>
      - Windows 'create_database.bat' <br>
      - this will create an sql database called "fallstudie_gruppe1"
> **Note**
> you might have to change the use and password parameters in ""movie_portal-main/include/database.php" to match your user and password for mysql :exclamation:

4. Open webpage: 
  - Go to localhost and click on the folder movie-portal-main



5. You can now register or log in:  
    - for testing purposes you can use the User: 
      - "bluetrain", "blackspace", or "erikamoon", 
    - Password: 
      - "Berlin1!"

6. To access the admin area go to: "localhost/movie_portal-main/admin". 
    - For testing purposes User: "admin", Password: "admin".


7. extra testdata for the Admin to upload are in "movie-portal-main/test/testdaten/json". These can be uploaded from within the admin area for test purposes.


