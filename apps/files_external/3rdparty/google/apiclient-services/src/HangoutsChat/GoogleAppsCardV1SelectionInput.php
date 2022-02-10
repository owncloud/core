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

namespace Google\Service\HangoutsChat;

class GoogleAppsCardV1SelectionInput extends \Google\Collection
{
  protected $collection_key = 'items';
  protected $itemsType = GoogleAppsCardV1SelectionItem::class;
  protected $itemsDataType = 'array';
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $name;
  protected $onChangeActionType = GoogleAppsCardV1Action::class;
  protected $onChangeActionDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param GoogleAppsCardV1SelectionItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return GoogleAppsCardV1SelectionItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleAppsCardV1Action
   */
  public function setOnChangeAction(GoogleAppsCardV1Action $onChangeAction)
  {
    $this->onChangeAction = $onChangeAction;
  }
  /**
   * @return GoogleAppsCardV1Action
   */
  public function getOnChangeAction()
  {
    return $this->onChangeAction;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1SelectionInput::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1SelectionInput');
