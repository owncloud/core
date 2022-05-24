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

class GooglePrivacyDlpV2DatastoreOptions extends \Google\Model
{
  protected $kindType = GooglePrivacyDlpV2KindExpression::class;
  protected $kindDataType = '';
  protected $partitionIdType = GooglePrivacyDlpV2PartitionId::class;
  protected $partitionIdDataType = '';

  /**
   * @param GooglePrivacyDlpV2KindExpression
   */
  public function setKind(GooglePrivacyDlpV2KindExpression $kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return GooglePrivacyDlpV2KindExpression
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param GooglePrivacyDlpV2PartitionId
   */
  public function setPartitionId(GooglePrivacyDlpV2PartitionId $partitionId)
  {
    $this->partitionId = $partitionId;
  }
  /**
   * @return GooglePrivacyDlpV2PartitionId
   */
  public function getPartitionId()
  {
    return $this->partitionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2DatastoreOptions::class, 'Google_Service_DLP_GooglePrivacyDlpV2DatastoreOptions');
