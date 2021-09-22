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

class GoogleAppsCardV1TextInput extends \Google\Model
{
  protected $autoCompleteActionType = GoogleAppsCardV1Action::class;
  protected $autoCompleteActionDataType = '';
  public $hintText;
  protected $initialSuggestionsType = GoogleAppsCardV1Suggestions::class;
  protected $initialSuggestionsDataType = '';
  public $label;
  public $name;
  protected $onChangeActionType = GoogleAppsCardV1Action::class;
  protected $onChangeActionDataType = '';
  public $type;
  public $value;

  /**
   * @param GoogleAppsCardV1Action
   */
  public function setAutoCompleteAction(GoogleAppsCardV1Action $autoCompleteAction)
  {
    $this->autoCompleteAction = $autoCompleteAction;
  }
  /**
   * @return GoogleAppsCardV1Action
   */
  public function getAutoCompleteAction()
  {
    return $this->autoCompleteAction;
  }
  public function setHintText($hintText)
  {
    $this->hintText = $hintText;
  }
  public function getHintText()
  {
    return $this->hintText;
  }
  /**
   * @param GoogleAppsCardV1Suggestions
   */
  public function setInitialSuggestions(GoogleAppsCardV1Suggestions $initialSuggestions)
  {
    $this->initialSuggestions = $initialSuggestions;
  }
  /**
   * @return GoogleAppsCardV1Suggestions
   */
  public function getInitialSuggestions()
  {
    return $this->initialSuggestions;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1TextInput::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1TextInput');
