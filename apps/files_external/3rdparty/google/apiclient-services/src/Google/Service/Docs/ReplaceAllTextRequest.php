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

class Google_Service_Docs_ReplaceAllTextRequest extends Google_Model
{
  protected $containsTextType = 'Google_Service_Docs_SubstringMatchCriteria';
  protected $containsTextDataType = '';
  public $replaceText;

  /**
   * @param Google_Service_Docs_SubstringMatchCriteria
   */
  public function setContainsText(Google_Service_Docs_SubstringMatchCriteria $containsText)
  {
    $this->containsText = $containsText;
  }
  /**
   * @return Google_Service_Docs_SubstringMatchCriteria
   */
  public function getContainsText()
  {
    return $this->containsText;
  }
  public function setReplaceText($replaceText)
  {
    $this->replaceText = $replaceText;
  }
  public function getReplaceText()
  {
    return $this->replaceText;
  }
}
