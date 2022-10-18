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

class SwitchWidget extends \Google\Model
{
  /**
   * @var string
   */
  public $controlType;
  /**
   * @var string
   */
  public $name;
  protected $onChangeType = FormAction::class;
  protected $onChangeDataType = '';
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
class_alias(SwitchWidget::class, 'Google_Service_CloudSearch_SwitchWidget');
