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

class AppsDynamiteSharedDecoratedTextSwitchControl extends \Google\Model
{
  /**
   * @var string
   */
  public $controlType;
  /**
   * @var string
   */
  public $name;
  protected $onChangeActionType = AppsDynamiteSharedAction::class;
  protected $onChangeActionDataType = '';
  /**
   * @var bool
   */
  public $selected;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setControlType($controlType)
  {
    $this->controlType = $controlType;
  }
  /**
   * @return string
   */
  public function getControlType()
  {
    return $this->controlType;
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
   * @param AppsDynamiteSharedAction
   */
  public function setOnChangeAction(AppsDynamiteSharedAction $onChangeAction)
  {
    $this->onChangeAction = $onChangeAction;
  }
  /**
   * @return AppsDynamiteSharedAction
   */
  public function getOnChangeAction()
  {
    return $this->onChangeAction;
  }
  /**
   * @param bool
   */
  public function setSelected($selected)
  {
    $this->selected = $selected;
  }
  /**
   * @return bool
   */
  public function getSelected()
  {
    return $this->selected;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedDecoratedTextSwitchControl::class, 'Google_Service_CloudSearch_AppsDynamiteSharedDecoratedTextSwitchControl');
