# Coder's Den Forum
A forum style website that allows users to create posts with images, text and email address. Displays posts chronologically and allows users to search posts based on users' email address.

The content on the website can be customized with Light/Dark mode, as well as any accent color that the user chooses!
For simplicity sake, XAMPP is recommended if trying to use the server on a local machine.


## Stack
- This website requires Apache and mySQL. During development XAMPP was used.
- The website stores the images in a randomly generated ID onto a directory on the hosts machine. This allows for multiple images of the same name to be uploaded.
- Stores user's emails, posts, image directory, in a mySQL database that is queried and sent to the user when browsing posts.
- Allows for custom color themes using Javascript localstorage to keep parameters consistent across the site and instances.
- Responsive design with CSS, content is adjusted appropriately for mobile devices.