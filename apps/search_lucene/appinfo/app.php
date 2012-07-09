<?php

/**
* ownCloud - search_lucene application
*
* @author    Jörn Dreyer <jfd@butonic.de>
* @copyright 2012 Jörn Dreyer
* @license   http://www.gnu.org/licenses/agpl-3.0 GNU Affero General Public License (AGPL) 3.0
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

OC::$CLASSPATH['OC_Search_Lucene']         = 'apps/search_lucene/lib/lucene.php';
OC::$CLASSPATH['OC_Search_Lucene_Indexer'] = 'apps/search_lucene/lib/indexer.php';
OC::$CLASSPATH['OC_Search_Lucene_Hooks']   = 'apps/search_lucene/lib/hooks.php';

//TODO add translation
//$l = new OC_L10N('search_lucene');

//OCP\App::register(array(
//  'order' => 20,
//  'id' => 'search_lucene',
//  'name' => 'Lucene Search'));

OC_Search::registerProvider('OC_Search_Lucene');

OCP\App::registerPersonal('search_lucene', 'settings');

// --------------------------------------------------

//post_create is ignored, as write will be triggered afterwards anyway

//connect to the filesystem for auto updating
OCP\Util::connectHook('OC_Filesystem', 'post_write', 'OC_Search_Lucene_Hooks', 'indexFile');

//connect to the filesystem for renaming
OCP\Util::connectHook('OC_Filesystem', 'post_rename', 'OC_Search_Lucene_Hooks', 'indexFile');

//listen for file deletions to clean the database
OCP\Util::connectHook('OC_Filesystem', 'delete', 'OC_Search_Lucene_Hooks', 'delete');

