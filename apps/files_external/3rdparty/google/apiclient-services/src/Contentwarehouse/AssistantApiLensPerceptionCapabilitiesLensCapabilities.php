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

class AssistantApiLensPerceptionCapabilitiesLensCapabilities extends \Google\Model
{
  protected $diningType = AssistantApiLensPerceptionCapabilitiesLensCapabilitiesDining::class;
  protected $diningDataType = '';
  protected $educationType = AssistantApiLensPerceptionCapabilitiesLensCapabilitiesEducation::class;
  protected $educationDataType = '';
  protected $outdoorType = AssistantApiLensPerceptionCapabilitiesLensCapabilitiesOutdoor::class;
  protected $outdoorDataType = '';
  protected $shoppingType = AssistantApiLensPerceptionCapabilitiesLensCapabilitiesShopping::class;
  protected $shoppingDataType = '';
  protected $textType = AssistantApiLensPerceptionCapabilitiesLensCapabilitiesText::class;
  protected $textDataType = '';
  protected $translateType = AssistantApiLensPerceptionCapabilitiesLensCapabilitiesTranslate::class;
  protected $translateDataType = '';

  /**
   * @param AssistantApiLensPerceptionCapabilitiesLensCapabilitiesDining
   */
  public function setDining(AssistantApiLensPerceptionCapabilitiesLensCapabilitiesDining $dining)
  {
    $this->dining = $dining;
  }
  /**
   * @return AssistantApiLensPerceptionCapabilitiesLensCapabilitiesDining
   */
  public function getDining()
  {
    return $this->dining;
  }
  /**
   * @param AssistantApiLensPerceptionCapabilitiesLensCapabilitiesEducation
   */
  public function setEducation(AssistantApiLensPerceptionCapabilitiesLensCapabilitiesEducation $education)
  {
    $this->education = $education;
  }
  /**
   * @return AssistantApiLensPerceptionCapabilitiesLensCapabilitiesEducation
   */
  public function getEducation()
  {
    return $this->education;
  }
  /**
   * @param AssistantApiLensPerceptionCapabilitiesLensCapabilitiesOutdoor
   */
  public function setOutdoor(AssistantApiLensPerceptionCapabilitiesLensCapabilitiesOutdoor $outdoor)
  {
    $this->outdoor = $outdoor;
  }
  /**
   * @return AssistantApiLensPerceptionCapabilitiesLensCapabilitiesOutdoor
   */
  public function getOutdoor()
  {
    return $this->outdoor;
  }
  /**
   * @param AssistantApiLensPerceptionCapabilitiesLensCapabilitiesShopping
   */
  public function setShopping(AssistantApiLensPerceptionCapabilitiesLensCapabilitiesShopping $shopping)
  {
    $this->shopping = $shopping;
  }
  /**
   * @return AssistantApiLensPerceptionCapabilitiesLensCapabilitiesShopping
   */
  public function getShopping()
  {
    return $this->shopping;
  }
  /**
   * @param AssistantApiLensPerceptionCapabilitiesLensCapabilitiesText
   */
  public function setText(AssistantApiLensPerceptionCapabilitiesLensCapabilitiesText $text)
  {
    $this->text = $text;
  }
  /**
   * @return AssistantApiLensPerceptionCapabilitiesLensCapabilitiesText
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param AssistantApiLensPerceptionCapabilitiesLensCapabilitiesTranslate
   */
  public function setTranslate(AssistantApiLensPerceptionCapabilitiesLensCapabilitiesTranslate $translate)
  {
    $this->translate = $translate;
  }
  /**
   * @return AssistantApiLensPerceptionCapabilitiesLensCapabilitiesTranslate
   */
  public function getTranslate()
  {
    return $this->translate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiLensPerceptionCapabilitiesLensCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiLensPerceptionCapabilitiesLensCapabilities');
