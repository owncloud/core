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

class GooglePrivacyDlpV2InfoTypeCategory extends \Google\Model
{
  /**
   * @var string
   */
  public $industryCategory;
  /**
   * @var string
   */
  public $locationCategory;
  /**
   * @var string
   */
  public $typeCategory;

  /**
   * @param string
   */
  public function setIndustryCategory($industryCategory)
  {
    $this->industryCategory = $industryCategory;
  }
  /**
   * @return string
   */
  public function getIndustryCategory()
  {
    return $this->industryCategory;
  }
  /**
   * @param string
   */
  public function setLocationCategory($locationCategory)
  {
    $this->locationCategory = $locationCategory;
  }
  /**
   * @return string
   */
  public function getLocationCategory()
  {
    return $this->locationCategory;
  }
  /**
   * @param string
   */
  public function setTypeCategory($typeCategory)
  {
    $this->typeCategory = $typeCategory;
  }
  /**
   * @return string
   */
  public function getTypeCategory()
  {
    return $this->typeCategory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2InfoTypeCategory::class, 'Google_Service_DLP_GooglePrivacyDlpV2InfoTypeCategory');
