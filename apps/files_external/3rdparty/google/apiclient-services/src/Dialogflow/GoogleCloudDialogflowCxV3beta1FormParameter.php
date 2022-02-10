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

class GoogleCloudDialogflowCxV3beta1FormParameter extends \Google\Model
{
  /**
   * @var array
   */
  public $defaultValue;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $entityType;
  protected $fillBehaviorType = GoogleCloudDialogflowCxV3beta1FormParameterFillBehavior::class;
  protected $fillBehaviorDataType = '';
  /**
   * @var bool
   */
  public $isList;
  /**
   * @var bool
   */
  public $redact;
  /**
   * @var bool
   */
  public $required;

  /**
   * @param array
   */
  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return array
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
  public function setEntityType($entityType)
  {
    $this->entityType = $entityType;
  }
  /**
   * @return string
   */
  public function getEntityType()
  {
    return $this->entityType;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1FormParameterFillBehavior
   */
  public function setFillBehavior(GoogleCloudDialogflowCxV3beta1FormParameterFillBehavior $fillBehavior)
  {
    $this->fillBehavior = $fillBehavior;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1FormParameterFillBehavior
   */
  public function getFillBehavior()
  {
    return $this->fillBehavior;
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
  public function setRedact($redact)
  {
    $this->redact = $redact;
  }
  /**
   * @return bool
   */
  public function getRedact()
  {
    return $this->redact;
  }
  /**
   * @param bool
   */
  public function setRequired($required)
  {
    $this->required = $required;
  }
  /**
   * @return bool
   */
  public function getRequired()
  {
    return $this->required;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1FormParameter::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1FormParameter');
