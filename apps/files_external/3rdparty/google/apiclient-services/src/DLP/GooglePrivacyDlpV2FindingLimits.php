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

class GooglePrivacyDlpV2FindingLimits extends \Google\Collection
{
  protected $collection_key = 'maxFindingsPerInfoType';
  protected $maxFindingsPerInfoTypeType = GooglePrivacyDlpV2InfoTypeLimit::class;
  protected $maxFindingsPerInfoTypeDataType = 'array';
  /**
   * @var int
   */
  public $maxFindingsPerItem;
  /**
   * @var int
   */
  public $maxFindingsPerRequest;

  /**
   * @param GooglePrivacyDlpV2InfoTypeLimit[]
   */
  public function setMaxFindingsPerInfoType($maxFindingsPerInfoType)
  {
    $this->maxFindingsPerInfoType = $maxFindingsPerInfoType;
  }
  /**
   * @return GooglePrivacyDlpV2InfoTypeLimit[]
   */
  public function getMaxFindingsPerInfoType()
  {
    return $this->maxFindingsPerInfoType;
  }
  /**
   * @param int
   */
  public function setMaxFindingsPerItem($maxFindingsPerItem)
  {
    $this->maxFindingsPerItem = $maxFindingsPerItem;
  }
  /**
   * @return int
   */
  public function getMaxFindingsPerItem()
  {
    return $this->maxFindingsPerItem;
  }
  /**
   * @param int
   */
  public function setMaxFindingsPerRequest($maxFindingsPerRequest)
  {
    $this->maxFindingsPerRequest = $maxFindingsPerRequest;
  }
  /**
   * @return int
   */
  public function getMaxFindingsPerRequest()
  {
    return $this->maxFindingsPerRequest;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2FindingLimits::class, 'Google_Service_DLP_GooglePrivacyDlpV2FindingLimits');
