<?php

/**
* ownCloud - gallery application
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

OC::$CLASSPATH['OC_Lucene_Search'] = 'apps/lucene_search/lib/lucene.php';

//$l = new OC_L10N('lucene_search');

OC_App::register(array(
  'order' => 20,
  'id' => 'lucene_search',
  'name' => 'Lucene Search'));

OC_Search::registerProvider('OC_Lucene_Search');

OC_APP::registerPersonal('lucene_search','settings');


//connect to the filesystem for auto updating
OC_Hook::connect('OC_Filesystem','post_write','OC_Lucene_Search','updateFile');

//connect to the filesystem for renaming
OC_Hook::connect('OC_Filesystem','post_rename','OC_Lucene_Search','renameFile');

//listen for file deletions to clean the database
OC_Hook::connect('OC_Filesystem','post_delete','OC_Lucene_Search','deleteFile');

?>
