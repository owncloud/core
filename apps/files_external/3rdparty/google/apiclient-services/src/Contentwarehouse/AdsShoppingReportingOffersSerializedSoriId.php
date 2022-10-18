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

class AdsShoppingReportingOffersSerializedSoriId extends \Google\Model
{
  /**
   * @var string
   */
  public $highId;
  /**
   * @var string
   */
  public $lowId1;
  /**
   * @var string
   */
  public $lowId2;

  /**
   * @param string
   */
  public function setHighId($highId)
  {
    $this->highId = $highId;
  }
  /**
   * @return string
   */
  public function getHighId()
  {
    return $this->highId;
  }
  /**
   * @param string
   */
  public function setLowId1($lowId1)
  {
    $this->lowId1 = $lowId1;
  }
  /**
   * @return string
   */
  public function getLowId1()
  {
    return $this->lowId1;
  }
  /**
   * @param string
   */
  public function setLowId2($lowId2)
  {
    $this->lowId2 = $lowId2;
  }
  /**
   * @return string
   */
  public function getLowId2()
  {
    return $this->lowId2;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdsShoppingReportingOffersSerializedSoriId::class, 'Google_Service_Contentwarehouse_AdsShoppingReportingOffersSerializedSoriId');
