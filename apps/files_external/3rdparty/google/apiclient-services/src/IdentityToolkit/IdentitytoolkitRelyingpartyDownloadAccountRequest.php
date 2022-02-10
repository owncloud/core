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

namespace Google\Service\IdentityToolkit;

class IdentitytoolkitRelyingpartyDownloadAccountRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $delegatedProjectNumber;
  /**
   * @var string
   */
  public $maxResults;
  /**
   * @var string
   */
  public $nextPageToken;
  /**
   * @var string
   */
  public $targetProjectId;

  /**
   * @param string
   */
  public function setDelegatedProjectNumber($delegatedProjectNumber)
  {
    $this->delegatedProjectNumber = $delegatedProjectNumber;
  }
  /**
   * @return string
   */
  public function getDelegatedProjectNumber()
  {
    return $this->delegatedProjectNumber;
  }
  /**
   * @param string
   */
  public function setMaxResults($maxResults)
  {
    $this->maxResults = $maxResults;
  }
  /**
   * @return string
   */
  public function getMaxResults()
  {
    return $this->maxResults;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param string
   */
  public function setTargetProjectId($targetProjectId)
  {
    $this->targetProjectId = $targetProjectId;
  }
  /**
   * @return string
   */
  public function getTargetProjectId()
  {
    return $this->targetProjectId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentitytoolkitRelyingpartyDownloadAccountRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDownloadAccountRequest');
