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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingModelsMediaCastDeviceAnnotation extends \Google\Model
{
  /**
   * @var string
   */
  public $castDeviceSource;
  /**
   * @var string
   */
  public $castDeviceType;
  /**
   * @var string
   */
  public $creationTimestampMs;
  /**
   * @var string
   */
  public $deviceId;
  protected $deviceIdentifierType = AssistantApiCoreTypesDeviceId::class;
  protected $deviceIdentifierDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $quantificationType = NlpSemanticParsingModelsMediaQuantification::class;
  protected $quantificationDataType = '';

  /**
   * @param string
   */
  public function setCastDeviceSource($castDeviceSource)
  {
    $this->castDeviceSource = $castDeviceSource;
  }
  /**
   * @return string
   */
  public function getCastDeviceSource()
  {
    return $this->castDeviceSource;
  }
  /**
   * @param string
   */
  public function setCastDeviceType($castDeviceType)
  {
    $this->castDeviceType = $castDeviceType;
  }
  /**
   * @return string
   */
  public function getCastDeviceType()
  {
    return $this->castDeviceType;
  }
  /**
   * @param string
   */
  public function setCreationTimestampMs($creationTimestampMs)
  {
    $this->creationTimestampMs = $creationTimestampMs;
  }
  /**
   * @return string
   */
  public function getCreationTimestampMs()
  {
    return $this->creationTimestampMs;
  }
  /**
   * @param string
   */
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return string
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param AssistantApiCoreTypesDeviceId
   */
  public function setDeviceIdentifier(AssistantApiCoreTypesDeviceId $deviceIdentifier)
  {
    $this->deviceIdentifier = $deviceIdentifier;
  }
  /**
   * @return AssistantApiCoreTypesDeviceId
   */
  public function getDeviceIdentifier()
  {
    return $this->deviceIdentifier;
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
   * @param NlpSemanticParsingModelsMediaQuantification
   */
  public function setQuantification(NlpSemanticParsingModelsMediaQuantification $quantification)
  {
    $this->quantification = $quantification;
  }
  /**
   * @return NlpSemanticParsingModelsMediaQuantification
   */
  public function getQuantification()
  {
    return $this->quantification;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaCastDeviceAnnotation::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaCastDeviceAnnotation');
