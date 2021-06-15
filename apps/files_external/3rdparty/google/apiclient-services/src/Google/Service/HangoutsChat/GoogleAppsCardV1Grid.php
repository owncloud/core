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

class Google_Service_HangoutsChat_GoogleAppsCardV1Grid extends Google_Collection
{
  protected $collection_key = 'items';
  protected $borderStyleType = 'Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle';
  protected $borderStyleDataType = '';
  public $columnCount;
  protected $itemsType = 'Google_Service_HangoutsChat_GoogleAppsCardV1GridItem';
  protected $itemsDataType = 'array';
  protected $onClickType = 'Google_Service_HangoutsChat_GoogleAppsCardV1OnClick';
  protected $onClickDataType = '';
  public $title;

  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle
   */
  public function setBorderStyle(Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle $borderStyle)
  {
    $this->borderStyle = $borderStyle;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle
   */
  public function getBorderStyle()
  {
    return $this->borderStyle;
  }
  public function setColumnCount($columnCount)
  {
    $this->columnCount = $columnCount;
  }
  public function getColumnCount()
  {
    return $this->columnCount;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1GridItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1GridItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1OnClick
   */
  public function setOnClick(Google_Service_HangoutsChat_GoogleAppsCardV1OnClick $onClick)
  {
    $this->onClick = $onClick;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1OnClick
   */
  public function getOnClick()
  {
    return $this->onClick;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
