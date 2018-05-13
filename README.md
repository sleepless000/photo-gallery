# Building Web Applications using MySQL and PHP (W1)

A simple on-line photo gallery application using PHP and MySQL.
Deploy Location
================
<http://titan.dcs.bbk.ac.uk/~batana01/w1fma/index.php>

## Description
### Photo gallery application includes the following aspects:
####1. Each image is associated with a textual title and description.
####2. The default application home page displays thumbnails of all the images that have been uploaded. Thumbnails measure 150px by 150px, and the aspect ratio of the images is maintained when uploaded. Each thumbnail is presented with the image title.
####3. Each thumbnail image links to a larger version of the image. An image no larger than 600px by 600px is displayed, followed by the image title and description. Clicking on the large image takes the user back to the thumbnail page. Image aspect ratio is maintained. Uploaded images are reduced in size to measure no larger than 600 pixels in either width or height, but would never be enlarged if they are smaller than this size to begin with.
####4.  Any user can upload their own images to be included in the gallery. Only valid JPEG images are accepted.

###Web services


####5. The application  include a simple JSON web service that can be used to retrieve the title, description, filename, width and height of the large version of any image that has been uploaded to the application. The data will be returned from the service as a JSON object. 

  http://titan.dcs.bbk.ac.uk/~batana01/w1fma/data.php?id=[%enter ID number here%]

  ####Example JSON request:

  <http://titan.dcs.bbk.ac.uk/~batana01/w1fma/data.php?id=1>

	
####The above URL is the web service, provide the image id from the larger version of the image and this will return the title,description, filename, width and height of the image. The id can be found either on the top url(example id=1) of the larger image or simply click on the thumbnail of any image and when the larger version of the image appears next to the description of the image you will find the id.(listed as Photo id:1).
