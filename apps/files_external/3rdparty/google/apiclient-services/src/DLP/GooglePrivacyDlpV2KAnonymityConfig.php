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

class GooglePrivacyDlpV2KAnonymityConfig extends \Google\Collection
{
  protected $collection_key = 'quasiIds';
  protected $entityIdType = GooglePrivacyDlpV2EntityId::class;
  protected $entityIdDataType = '';
  protected $quasiIdsType = GooglePrivacyDlpV2FieldId::class;
  protected $quasiIdsDataType = 'array';

  /**
   * @param GooglePrivacyDlpV2EntityId
   */
  public function setEntityId(GooglePrivacyDlpV2EntityId $entityId)
  {
    $this->entityId = $entityId;
  }
  /**
   * @return GooglePrivacyDlpV2EntityId
   */
  public function getEntityId()
  {
    return $this->entityId;
  }
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2KAnonymityConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2KAnonymityConfig');
