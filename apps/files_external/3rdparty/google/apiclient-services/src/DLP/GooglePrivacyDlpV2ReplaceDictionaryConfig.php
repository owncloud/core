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

class GooglePrivacyDlpV2ReplaceDictionaryConfig extends \Google\Model
{
  protected $wordListType = GooglePrivacyDlpV2WordList::class;
  protected $wordListDataType = '';

  /**
   * @param GooglePrivacyDlpV2WordList
   */
  public function setWordList(GooglePrivacyDlpV2WordList $wordList)
  {
    $this->wordList = $wordList;
  }
  /**
   * @return GooglePrivacyDlpV2WordList
   */
  public function getWordList()
  {
    return $this->wordList;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2ReplaceDictionaryConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2ReplaceDictionaryConfig');
