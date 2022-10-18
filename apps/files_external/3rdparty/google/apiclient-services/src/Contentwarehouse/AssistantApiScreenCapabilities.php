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

class AssistantApiScreenCapabilities extends \Google\Collection
{
  protected $collection_key = 'supportedScreenStates';
  /**
   * @var string[]
   */
  public $inputType;
  protected $maskType = AssistantApiScreenCapabilitiesMask::class;
  protected $maskDataType = '';
  protected $protoLayoutTargetedSchemaType = AssistantApiScreenCapabilitiesProtoLayoutVersion::class;
  protected $protoLayoutTargetedSchemaDataType = '';
  protected $resolutionType = AssistantApiScreenCapabilitiesResolution::class;
  protected $resolutionDataType = '';
  /**
   * @var bool
   */
  public $screenOff;
  /**
   * @var string
   */
  public $screenStateDetection;
  /**
   * @var string
   */
  public $supportedRenderingFormat;
  /**
   * @var string[]
   */
  public $supportedScreenStates;
  /**
   * @var bool
   */
  public $visionHelpEnabled;

  /**
   * @param string[]
   */
  public function setInputType($inputType)
  {
    $this->inputType = $inputType;
  }
  /**
   * @return string[]
   */
  public function getInputType()
  {
    return $this->inputType;
  }
  /**
   * @param AssistantApiScreenCapabilitiesMask
   */
  public function setMask(AssistantApiScreenCapabilitiesMask $mask)
  {
    $this->mask = $mask;
  }
  /**
   * @return AssistantApiScreenCapabilitiesMask
   */
  public function getMask()
  {
    return $this->mask;
  }
  /**
   * @param AssistantApiScreenCapabilitiesProtoLayoutVersion
   */
  public function setProtoLayoutTargetedSchema(AssistantApiScreenCapabilitiesProtoLayoutVersion $protoLayoutTargetedSchema)
  {
    $this->protoLayoutTargetedSchema = $protoLayoutTargetedSchema;
  }
  /**
   * @return AssistantApiScreenCapabilitiesProtoLayoutVersion
   */
  public function getProtoLayoutTargetedSchema()
  {
    return $this->protoLayoutTargetedSchema;
  }
  /**
   * @param AssistantApiScreenCapabilitiesResolution
   */
  public function setResolution(AssistantApiScreenCapabilitiesResolution $resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return AssistantApiScreenCapabilitiesResolution
   */
  public function getResolution()
  {
    return $this->resolution;
  }
  /**
   * @param bool
   */
  public function setScreenOff($screenOff)
  {
    $this->screenOff = $screenOff;
  }
  /**
   * @return bool
   */
  public function getScreenOff()
  {
    return $this->screenOff;
  }
  /**
   * @param string
   */
  public function setScreenStateDetection($screenStateDetection)
  {
    $this->screenStateDetection = $screenStateDetection;
  }
  /**
   * @return string
   */
  public function getScreenStateDetection()
  {
    return $this->screenStateDetection;
  }
  /**
   * @param string
   */
  public function setSupportedRenderingFormat($supportedRenderingFormat)
  {
    $this->supportedRenderingFormat = $supportedRenderingFormat;
  }
  /**
   * @return string
   */
  public function getSupportedRenderingFormat()
  {
    return $this->supportedRenderingFormat;
  }
  /**
   * @param string[]
   */
  public function setSupportedScreenStates($supportedScreenStates)
  {
    $this->supportedScreenStates = $supportedScreenStates;
  }
  /**
   * @return string[]
   */
  public function getSupportedScreenStates()
  {
    return $this->supportedScreenStates;
  }
  /**
   * @param bool
   */
  public function setVisionHelpEnabled($visionHelpEnabled)
  {
    $this->visionHelpEnabled = $visionHelpEnabled;
  }
  /**
   * @return bool
   */
  public function getVisionHelpEnabled()
  {
    return $this->visionHelpEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiScreenCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiScreenCapabilities');
