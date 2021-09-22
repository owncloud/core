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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2ImportUserEventsRequest extends \Google\Model
{
  protected $errorsConfigType = GoogleCloudRetailV2ImportErrorsConfig::class;
  protected $errorsConfigDataType = '';
  protected $inputConfigType = GoogleCloudRetailV2UserEventInputConfig::class;
  protected $inputConfigDataType = '';

  /**
   * @param GoogleCloudRetailV2ImportErrorsConfig
   */
  public function setErrorsConfig(GoogleCloudRetailV2ImportErrorsConfig $errorsConfig)
  {
    $this->errorsConfig = $errorsConfig;
  }
  /**
   * @return GoogleCloudRetailV2ImportErrorsConfig
   */
  public function getErrorsConfig()
  {
    return $this->errorsConfig;
  }
  /**
   * @param GoogleCloudRetailV2UserEventInputConfig
   */
  public function setInputConfig(GoogleCloudRetailV2UserEventInputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return GoogleCloudRetailV2UserEventInputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2ImportUserEventsRequest::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2ImportUserEventsRequest');
