# Coder's Den Forum
<img width="640" alt="Screen Shot 2022-02-21 at 1 27 05 AM" src="https://user-images.githubusercontent.com/56568238/154900760-b414f399-c6d4-4de0-b397-84c6447b04fd.png">
Developed by Gunnar Benson, Benjamin Jackson, and Benjamin Woosley.


A question based forum website that allows users to ask and discuss any topic.

A forum style website that allows users to create posts with images, text and email address. Displays posts chronologically and allows users to search posts based on users' email address.

Posts are sorted chronologically, and there is a leaderboard on the landing page with the Top Askers!

The content on the website can be customized with Light/Dark mode, as well as any accent color that the user chooses!

### Deploying
For simplicity sake, XAMPP is recommended if hosting the website on a local machine. Make sure that Apache Web Server and MySQL database are running.
#### Steps to setup phpmyadmin and mySQL 
1. Uses the root account with no password by default, this can be changed by modifying the first line of every `.php` file.
2. Create a database titled 'posts'
3. Create a table called 'posts'
4. Within the table you need these columns:
- id (INT) (auto increment)
- email (VARCHAR)
- content (VARCHAR)
- created_at (TIMESTAMP) (default value set to current timestamp)
- img_dir (VARCHAR)

If everything was done correctly it should work without modification. The image directory/upload varies from system to system so this may require additional tweaking.
### Stack
This website requires HTTP server and mySQL. During development XAMPP was used.

The website stores the images in a randomly generated ID onto a directory on the hosts machine. This allows for multiple images of the same name to be uploaded.

Stores user's emails, posts, image directory, in a mySQL database that is queried with PHP and sent to the user when browsing posts.

Allows for custom color themes using Javascript localstorage to keep parameters consistent across the site and instances.

Responsive design with CSS, content is adjusted appropriately for mobile devices.
