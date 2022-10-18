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

class TextField extends \Google\Model
{
  protected $autoCompleteType = AutoComplete::class;
  protected $autoCompleteDataType = '';
  protected $autoCompleteCallbackType = FormAction::class;
  protected $autoCompleteCallbackDataType = '';
  /**
   * @var bool
   */
  public $autoCompleteMultipleSelections;
  /**
   * @var string
   */
  public $hintText;
  /**
   * @var string
   */
  public $label;
  /**
   * @var int
   */
  public $maxLines;
  /**
   * @var string
   */
  public $name;
  protected $onChangeType = FormAction::class;
  protected $onChangeDataType = '';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;

  /**
   * @param AutoComplete
   */
  public function setAutoComplete(AutoComplete $autoComplete)
  {
    $this->autoComplete = $autoComplete;
  }
  /**
   * @return AutoComplete
   */
  public function getAutoComplete()
  {
    return $this->autoComplete;
  }
  /**
   * @param FormAction
   */
  public function setAutoCompleteCallback(FormAction $autoCompleteCallback)
  {
    $this->autoCompleteCallback = $autoCompleteCallback;
  }
  /**
   * @return FormAction
   */
  public function getAutoCompleteCallback()
  {
    return $this->autoCompleteCallback;
  }
  /**
   * @param bool
   */
  public function setAutoCompleteMultipleSelections($autoCompleteMultipleSelections)
  {
    $this->autoCompleteMultipleSelections = $autoCompleteMultipleSelections;
  }
  /**
   * @return bool
   */
  public function getAutoCompleteMultipleSelections()
  {
    return $this->autoCompleteMultipleSelections;
  }
  /**
   * @param string
   */
  public function setHintText($hintText)
  {
    $this->hintText = $hintText;
  }
  /**
   * @return string
   */
  public function getHintText()
  {
    return $this->hintText;
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
   * @param int
   */
  public function setMaxLines($maxLines)
  {
    $this->maxLines = $maxLines;
  }
  /**
   * @return int
   */
  public function getMaxLines()
  {
    return $this->maxLines;
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
class_alias(TextField::class, 'Google_Service_CloudSearch_TextField');
