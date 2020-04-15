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

class Google_Service_DLP_GooglePrivacyDlpV2FileSet extends Google_Model
{
  protected $regexFileSetType = 'Google_Service_DLP_GooglePrivacyDlpV2CloudStorageRegexFileSet';
  protected $regexFileSetDataType = '';
  public $url;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2CloudStorageRegexFileSet
   */
  public function setRegexFileSet(Google_Service_DLP_GooglePrivacyDlpV2CloudStorageRegexFileSet $regexFileSet)
  {
    $this->regexFileSet = $regexFileSet;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2CloudStorageRegexFileSet
   */
  public function getRegexFileSet()
  {
    return $this->regexFileSet;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
