<?php
/*
Plugin Name:    R3DF - Multisite blog slug remover
Description:    Remove /blog from WordPress multisite main site blog permalinks.
Plugin URI:     http://r3df.com/
Version:        1.0.0
Text Domain:    r3df-multisite-blog-slug-remover
Author:         R3DF
Author URI:     http://r3df.com
Author email:   plugin-support@r3df.com
Copyright:      R-Cubed Design Forge
*/

/*  Copyright 2012-2014  R-Cubed Design Forge

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// TODO
// Add note to permalinks page indicating the /blog removal, despite display,
// and add note about 2x save to get it to work.


/******      NOTE!!!!   NOTE!!!!     ******/
/******************************************/
/* You need to change a permalink setting and save, then change back
   to get the no /blog take effect.  Simply re-saving or viewing will
   not rest the /blog

   The /blog will remain prefixed in the permalinks on the permalinks
   options page, there is no way to remove it from the display there
   without hacking WordPress.
*/

// Remove /blog from main permalink, category base and tag base upon update to database
function r3df_remove_blog_slug( $option ) {
    // if permalink starts with /blog/, remove it
    if ( substr( $option , 0, 6) == '/blog/' ) {
        $option = substr( $option , 5 );
    }
    return  $option ;
}
add_filter('pre_update_option_' . 'category_base', 'r3df_remove_blog_slug');
add_filter('pre_update_option_' . 'tag_base', 'r3df_remove_blog_slug');
add_filter('pre_update_option_' . 'permalink_structure', 'r3df_remove_blog_slug');
