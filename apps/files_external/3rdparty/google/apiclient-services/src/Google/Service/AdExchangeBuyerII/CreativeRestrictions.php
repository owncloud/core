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

class Google_Service_AdExchangeBuyerII_CreativeRestrictions extends Google_Collection
{
  protected $collection_key = 'creativeSpecifications';
  public $creativeFormat;
  protected $creativeSpecificationsType = 'Google_Service_AdExchangeBuyerII_CreativeSpecification';
  protected $creativeSpecificationsDataType = 'array';
  public $skippableAdType;

  public function setCreativeFormat($creativeFormat)
  {
    $this->creativeFormat = $creativeFormat;
  }
  public function getCreativeFormat()
  {
    return $this->creativeFormat;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_CreativeSpecification[]
   */
  public function setCreativeSpecifications($creativeSpecifications)
  {
    $this->creativeSpecifications = $creativeSpecifications;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_CreativeSpecification[]
   */
  public function getCreativeSpecifications()
  {
    return $this->creativeSpecifications;
  }
  public function setSkippableAdType($skippableAdType)
  {
    $this->skippableAdType = $skippableAdType;
  }
  public function getSkippableAdType()
  {
    return $this->skippableAdType;
  }
}
