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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2TransformationConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $deidentifyTemplate;
  /**
   * @var string
   */
  public $imageRedactTemplate;
  /**
   * @var string
   */
  public $structuredDeidentifyTemplate;

  /**
   * @param string
   */
  public function setDeidentifyTemplate($deidentifyTemplate)
  {
    $this->deidentifyTemplate = $deidentifyTemplate;
  }
  /**
   * @return string
   */
  public function getDeidentifyTemplate()
  {
    return $this->deidentifyTemplate;
  }
  /**
   * @param string
   */
  public function setImageRedactTemplate($imageRedactTemplate)
  {
    $this->imageRedactTemplate = $imageRedactTemplate;
  }
  /**
   * @return string
   */
  public function getImageRedactTemplate()
  {
    return $this->imageRedactTemplate;
  }
  /**
   * @param string
   */
  public function setStructuredDeidentifyTemplate($structuredDeidentifyTemplate)
  {
    $this->structuredDeidentifyTemplate = $structuredDeidentifyTemplate;
  }
  /**
   * @return string
   */
  public function getStructuredDeidentifyTemplate()
  {
    return $this->structuredDeidentifyTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2TransformationConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2TransformationConfig');
