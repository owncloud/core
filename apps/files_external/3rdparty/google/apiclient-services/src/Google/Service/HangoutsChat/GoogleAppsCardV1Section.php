<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_HangoutsChat_GoogleAppsCardV1Section extends Google_Collection
{
  protected $collection_key = 'widgets';
  public $collapsible;
  public $header;
  public $uncollapsibleWidgetsCount;
  protected $widgetsType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Widget';
  protected $widgetsDataType = 'array';

  public function setCollapsible($collapsible)
  {
    $this->collapsible = $collapsible;
  }
  public function getCollapsible()
  {
    return $this->collapsible;
  }
  public function setHeader($header)
  {
    $this->header = $header;
  }
  public function getHeader()
  {
    return $this->header;
  }
  public function setUncollapsibleWidgetsCount($uncollapsibleWidgetsCount)
  {
    $this->uncollapsibleWidgetsCount = $uncollapsibleWidgetsCount;
  }
  public function getUncollapsibleWidgetsCount()
  {
    return $this->uncollapsibleWidgetsCount;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Widget[]
   */
  public function setWidgets($widgets)
  {
    $this->widgets = $widgets;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Widget[]
   */
  public function getWidgets()
  {
    return $this->widgets;
  }
}
