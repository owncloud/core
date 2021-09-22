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

namespace Google\Service\DomainsRDAP;

class RdapResponse extends \Google\Collection
{
  protected $collection_key = 'rdapConformance';
  public $description;
  public $errorCode;
  protected $jsonResponseType = HttpBody::class;
  protected $jsonResponseDataType = '';
  public $lang;
  protected $noticesType = Notice::class;
  protected $noticesDataType = 'array';
  public $rdapConformance;
  public $title;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }
  public function getErrorCode()
  {
    return $this->errorCode;
  }
  /**
   * @param HttpBody
   */
  public function setJsonResponse(HttpBody $jsonResponse)
  {
    $this->jsonResponse = $jsonResponse;
  }
  /**
   * @return HttpBody
   */
  public function getJsonResponse()
  {
    return $this->jsonResponse;
  }
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  public function getLang()
  {
    return $this->lang;
  }
  /**
   * @param Notice[]
   */
  public function setNotices($notices)
  {
    $this->notices = $notices;
  }
  /**
   * @return Notice[]
   */
  public function getNotices()
  {
    return $this->notices;
  }
  public function setRdapConformance($rdapConformance)
  {
    $this->rdapConformance = $rdapConformance;
  }
  public function getRdapConformance()
  {
    return $this->rdapConformance;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RdapResponse::class, 'Google_Service_DomainsRDAP_RdapResponse');
