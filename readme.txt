== ABOUT THEME == 

Theme Name : Sanremo
Version    : 1.1.0
Theme URL  : http://www.moozthemes.com/sanremo-wordpress-theme/
Theme Documentation  : http://www.moozthemes.com/sanremo-wordpress-theme-documentation/

Author: MOOZ Themes
Author URL: http://moozthemes.com/

License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl.html

== COPYRIGHT AND LICENSE == 

Sanremo WordPress Theme, Copyright 2016 MOOZ Themes
Sanremo is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Sanremo WordPress Theme bundles the following third-party resources:

* FontAwesome.
  FontAwesome 4.2.0
  Copyright 2012 Dave Gandy
  Font License: SIL OFL 1.1
  Code License: MIT License
  http://fontawesome.io/license/
* Bootstrap by twitter.
  Bootstrap is Licensed under the MIT License. https://github.com/twbs/bootstrap/blob/master/LICENSE.
* Slick Slider by Ken Wheeler. http://kenwheeler.github.io/slick/
  Slick Slider is Licensed under the MIT license. https://github.com/kenwheeler/slick/blob/master/LICENSE
* WP-Bootstrap-NavWalker licensed under the GPLv2 license. http://www.gnu.org/licenses/gpl-2.0.html
* Other custom js files are our own creation and is licensed under the same license as this theme. 
* Images on screenshot.
  - hyacinth-747157_1280.jpg:
    from: https://pixabay.com/en/hyacinth-flower-blossom-bloom-pink-747157/
    license: https://creativecommons.org/publicdomain/zero/1.0/deed.en
  - flowers-789630_1280.jpg:
    from: https://pixabay.com/en/flowers-vases-cactus-tulips-789630/
    license: https://creativecommons.org/publicdomain/zero/1.0/deed.en
  - man-1150037_640.jpg
    from: https://pixabay.com/en/man-beard-red-plaid-shirts-1150037/
    license: https://creativecommons.org/publicdomain/zero/1.0/deed.en

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/gpl.html), version 3 or later.

== BRIEF DOCUMENTATION ==

1. Add a Custom Logo

Adding a custom logo is very easy. Please use the following steps.

Go to Customizer. ( Appearence > Customize )
Use the "Site Identity" Section to change site title, description or upload a logo.
Click "Save and Publish" button.

2. Custom Main Menu

After just installing the theme it will display the pages as the default menu. You can add your own links, categories, pages for the menu.

Go to Appearance > Menus in the WordPress Dashboard.
In the edit menus tab click on the link “create new menu”.
Give a Menu Name and click button “create menu”.
Then you can choose/create the links from the three tabs(Pages/Links/Categories) which is in the left hand side.
After Creating the menu select the Theme Location of the menu.(It’s under the Menu Settings which is in the bottom of the page.) In this case tick the “Primary Menu”.
Hit Save.

3. Set left/right or full page layout

Go to Customizer. ( Appearence > Customize )
Use the "Layout Options" Section to choose a Left, Right sidebar or full width page.
Click "Save and Publish" button.

5. Adding a slider

Go to Customizer. ( Appearence > Customize )
Use the "Slider Settings" Section to choose a category for slider and click on "Show Slider?" checkbox to switch on or off slider.
Click "Save and Publish" button.

And there are 3 widgets designed for Sanremo theme.
1. Social: Add links to your social profiles.
2. About author: About author module with author photo and description.
3. Latest posts: Latest posts widget with small thumbnails and article titles.

Drag and drop these widgets to above two widget areas and arrange them as you like.

==== THEME CHANGELOG ====

1.0.1 - 04.07.2016
* Fixed isues
* Added licensing information

* Escaped values in all Sanremo widgets
* Removed old tags in style.css
* Added WordPress core logo upload feature

1.0.2 - 05.07.2016
* Fixed isues

1.0.3 - 11.07.2016
* updated constructors in widgets
* prefixed all variables
* fixed isues with customizer and comments
* fixed isue with escape attributes and urls

1.0.4 - 18.07.2016
* Added license details for all screenshot images
* Disabled slider by default
* Added unminified script versions
* Removed jQuery script (using core-bundled scripts instead)
* Added prefix to missing functions
* Added the_archive_title(), the_archive_description() on archive page
* favicon.ico removed

1.0.5 - 18.07.2016
* changed photo for screenshot

1.0.6 - 19.07.2016
* Fixed isue with constructor in widget-sanremo-author.php on line 8
* Changed from echo get_the_post_thumbnail to the_post_thumbnail
* Fixed missing escape in content-single.php line 62

1.0.7 - 10.09.2016
* Rebuilded widget-about-author
* Fixed isues with social widget
* Translated texts in header.php, widget-sanremo-social.php and wp_bootstrap_navwalker.php
* In functions.php cat_count_span prefixed
* Removed sanremo_password_form from extras.php
* Removed echo from get_search_form in 404.php

1.0.8 - 13.09.2016
* Added more describtion about licence
* Added full width footer widget area
* Added WP Instagram widget support

1.0.9 - 16.09.2016
* Removed About Me widget

1.0.10 - 01.10.2016
* Fixed issues with slider titles on mobile phones
* Fixed issues with WP Instagram Plugin styling

1.1.0 - 12.10.2016
* Added WooCommerce support
* Added MailChimps support