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

class GooglePrivacyDlpV2DatastoreKey extends \Google\Model
{
  protected $entityKeyType = GooglePrivacyDlpV2Key::class;
  protected $entityKeyDataType = '';

  /**
   * @param GooglePrivacyDlpV2Key
   */
  public function setEntityKey(GooglePrivacyDlpV2Key $entityKey)
  {
    $this->entityKey = $entityKey;
  }
  /**
   * @return GooglePrivacyDlpV2Key
   */
  public function getEntityKey()
  {
    return $this->entityKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2DatastoreKey::class, 'Google_Service_DLP_GooglePrivacyDlpV2DatastoreKey');
