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

class Google_Service_HangoutsChat_GoogleAppsCardV1SelectionInput extends Google_Collection
{
  protected $collection_key = 'items';
  protected $itemsType = 'Google_Service_HangoutsChat_GoogleAppsCardV1SelectionItem';
  protected $itemsDataType = 'array';
  public $label;
  public $name;
  protected $onChangeActionType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Action';
  protected $onChangeActionDataType = '';
  public $type;

  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1SelectionItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1SelectionItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Action
   */
  public function setOnChangeAction(Google_Service_HangoutsChat_GoogleAppsCardV1Action $onChangeAction)
  {
    $this->onChangeAction = $onChangeAction;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Action
   */
  public function getOnChangeAction()
  {
    return $this->onChangeAction;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
