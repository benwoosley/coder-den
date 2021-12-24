# Coder's Den Forum

A question based forum website that allows users to ask and discuss any topic.

A forum style website that allows users to create posts with images, text and email address. Displays posts chronologically and allows users to search posts based on users' email address.

The content on the website can be customized with Light/Dark mode, as well as any accent color that the user chooses!

For simplicity sake, XAMPP is recommended if hosting the website on a local machine.

Developed by Gunnar Benson, Benjamin Jackson, and Benjamin Woosley.

### Stack
This website requires HTTP server and mySQL. During development XAMPP was used.

The website stores the images in a randomly generated ID onto a directory on the hosts machine. This allows for multiple images of the same name to be uploaded.

Stores user's emails, posts, image directory, in a mySQL database that is queried with PHP and sent to the user when browsing posts.

Allows for custom color themes using Javascript localstorage to keep parameters consistent across the site and instances.

Responsive design with CSS, content is adjusted appropriately for mobile devices.
