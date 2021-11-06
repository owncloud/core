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

namespace Google\Service\CloudHealthcare;

class EvaluateUserConsentsRequest extends \Google\Model
{
  protected $consentListType = ConsentList::class;
  protected $consentListDataType = '';
  public $pageSize;
  public $pageToken;
  public $requestAttributes;
  public $resourceAttributes;
  public $responseView;
  public $userId;

  /**
   * @param ConsentList
   */
  public function setConsentList(ConsentList $consentList)
  {
    $this->consentList = $consentList;
  }
  /**
   * @return ConsentList
   */
  public function getConsentList()
  {
    return $this->consentList;
  }
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
  }
  public function setRequestAttributes($requestAttributes)
  {
    $this->requestAttributes = $requestAttributes;
  }
  public function getRequestAttributes()
  {
    return $this->requestAttributes;
  }
  public function setResourceAttributes($resourceAttributes)
  {
    $this->resourceAttributes = $resourceAttributes;
  }
  public function getResourceAttributes()
  {
    return $this->resourceAttributes;
  }
  public function setResponseView($responseView)
  {
    $this->responseView = $responseView;
  }
  public function getResponseView()
  {
    return $this->responseView;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EvaluateUserConsentsRequest::class, 'Google_Service_CloudHealthcare_EvaluateUserConsentsRequest');
