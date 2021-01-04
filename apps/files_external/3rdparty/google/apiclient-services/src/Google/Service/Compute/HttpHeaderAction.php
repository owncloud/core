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

class Google_Service_Compute_HttpHeaderAction extends Google_Collection
{
  protected $collection_key = 'responseHeadersToRemove';
  protected $requestHeadersToAddType = 'Google_Service_Compute_HttpHeaderOption';
  protected $requestHeadersToAddDataType = 'array';
  public $requestHeadersToRemove;
  protected $responseHeadersToAddType = 'Google_Service_Compute_HttpHeaderOption';
  protected $responseHeadersToAddDataType = 'array';
  public $responseHeadersToRemove;

  /**
   * @param Google_Service_Compute_HttpHeaderOption[]
   */
  public function setRequestHeadersToAdd($requestHeadersToAdd)
  {
    $this->requestHeadersToAdd = $requestHeadersToAdd;
  }
  /**
   * @return Google_Service_Compute_HttpHeaderOption[]
   */
  public function getRequestHeadersToAdd()
  {
    return $this->requestHeadersToAdd;
  }
  public function setRequestHeadersToRemove($requestHeadersToRemove)
  {
    $this->requestHeadersToRemove = $requestHeadersToRemove;
  }
  public function getRequestHeadersToRemove()
  {
    return $this->requestHeadersToRemove;
  }
  /**
   * @param Google_Service_Compute_HttpHeaderOption[]
   */
  public function setResponseHeadersToAdd($responseHeadersToAdd)
  {
    $this->responseHeadersToAdd = $responseHeadersToAdd;
  }
  /**
   * @return Google_Service_Compute_HttpHeaderOption[]
   */
  public function getResponseHeadersToAdd()
  {
    return $this->responseHeadersToAdd;
  }
  public function setResponseHeadersToRemove($responseHeadersToRemove)
  {
    $this->responseHeadersToRemove = $responseHeadersToRemove;
  }
  public function getResponseHeadersToRemove()
  {
    return $this->responseHeadersToRemove;
  }
}
