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

class QualityShoppingShoppingAttachmentLocale extends \Google\Model
{
  /**
   * @var int
   */
  public $languageId;
  /**
   * @var int
   */
  public $regionId;

  /**
   * @param int
   */
  public function setLanguageId($languageId)
  {
    $this->languageId = $languageId;
  }
  /**
   * @return int
   */
  public function getLanguageId()
  {
    return $this->languageId;
  }
  /**
   * @param int
   */
  public function setRegionId($regionId)
  {
    $this->regionId = $regionId;
  }
  /**
   * @return int
   */
  public function getRegionId()
  {
    return $this->regionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityShoppingShoppingAttachmentLocale::class, 'Google_Service_Contentwarehouse_QualityShoppingShoppingAttachmentLocale');
