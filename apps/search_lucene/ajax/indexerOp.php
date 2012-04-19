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


header('Content-type: text/html; charset=UTF-8') ;

require_once('../../../lib/base.php');
OC_JSON::checkLoggedIn();
OC_JSON::checkAppEnabled('search_lucene');

// get a list of files to index
// index a file

function handleIndexing() {
  set_time_limit(0);
  $eventSource = new OC_EventSource();
  OC_Search_Lucene::index($eventSource);
  $eventSource->close();
}
function syncFromCache() {
  set_time_limit(0);
  $eventSource = new OC_EventSource();
  OC_Search_Lucene_Status::syncFromCache($eventSource);
  $eventSource->close();
}


if ($_GET['action']) {
  switch($_GET['action']) {
  case 'index':
    handleIndexing();
    break;
  case 'sync':
    syncFromCache();
    break;
  default:
    OC_JSON::error(array('cause' => 'Unknown operation'));
  }
}