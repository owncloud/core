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

class GooglePrivacyDlpV2LDiversityConfig extends \Google\Collection
{
  protected $collection_key = 'quasiIds';
  protected $quasiIdsType = GooglePrivacyDlpV2FieldId::class;
  protected $quasiIdsDataType = 'array';
  protected $sensitiveAttributeType = GooglePrivacyDlpV2FieldId::class;
  protected $sensitiveAttributeDataType = '';

  /**
   * @param GooglePrivacyDlpV2FieldId[]
   */
  public function setQuasiIds($quasiIds)
  {
    $this->quasiIds = $quasiIds;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId[]
   */
  public function getQuasiIds()
  {
    return $this->quasiIds;
  }
  /**
   * @param GooglePrivacyDlpV2FieldId
   */
  public function setSensitiveAttribute(GooglePrivacyDlpV2FieldId $sensitiveAttribute)
  {
    $this->sensitiveAttribute = $sensitiveAttribute;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId
   */
  public function getSensitiveAttribute()
  {
    return $this->sensitiveAttribute;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2LDiversityConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2LDiversityConfig');
