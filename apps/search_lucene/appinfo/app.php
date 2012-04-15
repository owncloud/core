<?php

/**
* ownCloud - search_lucene application
*
* @author Jörn Dreyer
* @copyright 2012 Jörn Dreyer jfd@butonic.de
* 
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either 
* version 3 of the License, or any later version.
* 
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*  
* You should have received a copy of the GNU Lesser General Public 
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
* 
*/

OC::$CLASSPATH['OC_Search_Lucene'] = 'apps/search_lucene/lib/lucene.php';
OC::$CLASSPATH['OC_Search_Lucene_Status'] = 'apps/search_lucene/lib/status.php';

//$l = new OC_L10N('search_lucene');

OC_App::register(array(
  'order' => 20,
  'id' => 'search_lucene',
  'name' => 'Lucene Search'));

OC_Search::registerProvider('OC_Search_Lucene');

OC_APP::registerPersonal('search_lucene','settings');


//connect to the filesystem for auto updating
OC_Hook::connect('OC_Filesystem','post_write','OC_Search_Lucene_Status','onPostWrite');

//connect to the filesystem for renaming
OC_Hook::connect('OC_Filesystem','post_rename','OC_Search_Lucene_Status','onPostRename');

//listen for file deletions to clean the database
OC_Hook::connect('OC_Filesystem','post_delete','OC_Search_Lucene_Status','onPostDelete');


// start a background ajax call to index files. the app has no template so we need it here
OC_Util::addScript('search_lucene', 'indexer');
?>
