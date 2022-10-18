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

class GoodocLanguageLabel extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "closestLanguageId" => "ClosestLanguageId",
        "confidence" => "Confidence",
        "languageCode" => "LanguageCode",
  ];
  /**
   * @var int
   */
  public $closestLanguageId;
  /**
   * @var int
   */
  public $confidence;
  /**
   * @var string
   */
  public $languageCode;

  /**
   * @param int
   */
  public function setClosestLanguageId($closestLanguageId)
  {
    $this->closestLanguageId = $closestLanguageId;
  }
  /**
   * @return int
   */
  public function getClosestLanguageId()
  {
    return $this->closestLanguageId;
  }
  /**
   * @param int
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return int
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocLanguageLabel::class, 'Google_Service_Contentwarehouse_GoodocLanguageLabel');
