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

class Google_Service_YouTube_ThirdPartyLink extends Google_Model
{
  public $etag;
  public $kind;
  public $linkingToken;
  protected $snippetType = 'Google_Service_YouTube_ThirdPartyLinkSnippet';
  protected $snippetDataType = '';
  protected $statusType = 'Google_Service_YouTube_ThirdPartyLinkStatus';
  protected $statusDataType = '';

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLinkingToken($linkingToken)
  {
    $this->linkingToken = $linkingToken;
  }
  public function getLinkingToken()
  {
    return $this->linkingToken;
  }
  /**
   * @param Google_Service_YouTube_ThirdPartyLinkSnippet
   */
  public function setSnippet(Google_Service_YouTube_ThirdPartyLinkSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return Google_Service_YouTube_ThirdPartyLinkSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param Google_Service_YouTube_ThirdPartyLinkStatus
   */
  public function setStatus(Google_Service_YouTube_ThirdPartyLinkStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_YouTube_ThirdPartyLinkStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}
