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

namespace Google\Service\CloudHealthcare;

class Hl7V2Store extends \Google\Collection
{
  protected $collection_key = 'notificationConfigs';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $notificationConfigsType = Hl7V2NotificationConfig::class;
  protected $notificationConfigsDataType = 'array';
  protected $parserConfigType = ParserConfig::class;
  protected $parserConfigDataType = '';
  /**
   * @var bool
   */
  public $rejectDuplicateMessage;

  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
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
   * @param Hl7V2NotificationConfig[]
   */
  public function setNotificationConfigs($notificationConfigs)
  {
    $this->notificationConfigs = $notificationConfigs;
  }
  /**
   * @return Hl7V2NotificationConfig[]
   */
  public function getNotificationConfigs()
  {
    return $this->notificationConfigs;
  }
  /**
   * @param ParserConfig
   */
  public function setParserConfig(ParserConfig $parserConfig)
  {
    $this->parserConfig = $parserConfig;
  }
  /**
   * @return ParserConfig
   */
  public function getParserConfig()
  {
    return $this->parserConfig;
  }
  /**
   * @param bool
   */
  public function setRejectDuplicateMessage($rejectDuplicateMessage)
  {
    $this->rejectDuplicateMessage = $rejectDuplicateMessage;
  }
  /**
   * @return bool
   */
  public function getRejectDuplicateMessage()
  {
    return $this->rejectDuplicateMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Hl7V2Store::class, 'Google_Service_CloudHealthcare_Hl7V2Store');
