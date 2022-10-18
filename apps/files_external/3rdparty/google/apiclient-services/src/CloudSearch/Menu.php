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

namespace Google\Service\CloudSearch;

class Menu extends \Google\Collection
{
  protected $collection_key = 'items';
  protected $itemsType = MenuItem::class;
  protected $itemsDataType = 'array';
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $name;
  protected $onChangeType = FormAction::class;
  protected $onChangeDataType = '';

  /**
   * @param MenuItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return MenuItem[]
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
   * @param FormAction
   */
  public function setOnChange(FormAction $onChange)
  {
    $this->onChange = $onChange;
  }
  /**
   * @return FormAction
   */
  public function getOnChange()
  {
    return $this->onChange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Menu::class, 'Google_Service_CloudSearch_Menu');
