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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2IntentParameter extends \Google\Collection
{
  protected $collection_key = 'prompts';
  /**
   * @var string
   */
  public $defaultValue;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $entityTypeDisplayName;
  /**
   * @var bool
   */
  public $isList;
  /**
   * @var bool
   */
  public $mandatory;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $prompts;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return string
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setEntityTypeDisplayName($entityTypeDisplayName)
  {
    $this->entityTypeDisplayName = $entityTypeDisplayName;
  }
  /**
   * @return string
   */
  public function getEntityTypeDisplayName()
  {
    return $this->entityTypeDisplayName;
  }
  /**
   * @param bool
   */
  public function setIsList($isList)
  {
    $this->isList = $isList;
  }
  /**
   * @return bool
   */
  public function getIsList()
  {
    return $this->isList;
  }
  /**
   * @param bool
   */
  public function setMandatory($mandatory)
  {
    $this->mandatory = $mandatory;
  }
  /**
   * @return bool
   */
  public function getMandatory()
  {
    return $this->mandatory;
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
   * @param string[]
   */
  public function setPrompts($prompts)
  {
    $this->prompts = $prompts;
  }
  /**
   * @return string[]
   */
  public function getPrompts()
  {
    return $this->prompts;
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
class_alias(GoogleCloudDialogflowV2IntentParameter::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentParameter');
