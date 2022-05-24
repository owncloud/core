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

class CheckDataAccessRequest extends \Google\Model
{
  protected $consentListType = ConsentList::class;
  protected $consentListDataType = '';
  /**
   * @var string
   */
  public $dataId;
  /**
   * @var string[]
   */
  public $requestAttributes;
  /**
   * @var string
   */
  public $responseView;

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
  /**
   * @param string
   */
  public function setDataId($dataId)
  {
    $this->dataId = $dataId;
  }
  /**
   * @return string
   */
  public function getDataId()
  {
    return $this->dataId;
  }
  /**
   * @param string[]
   */
  public function setRequestAttributes($requestAttributes)
  {
    $this->requestAttributes = $requestAttributes;
  }
  /**
   * @return string[]
   */
  public function getRequestAttributes()
  {
    return $this->requestAttributes;
  }
  /**
   * @param string
   */
  public function setResponseView($responseView)
  {
    $this->responseView = $responseView;
  }
  /**
   * @return string
   */
  public function getResponseView()
  {
    return $this->responseView;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CheckDataAccessRequest::class, 'Google_Service_CloudHealthcare_CheckDataAccessRequest');
