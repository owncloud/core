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
  /**
   * @var string[]
   */
  public $description;
  /**
   * @var int
   */
  public $errorCode;
  protected $jsonResponseType = HttpBody::class;
  protected $jsonResponseDataType = '';
  /**
   * @var string
   */
  public $lang;
  protected $noticesType = Notice::class;
  protected $noticesDataType = 'array';
  /**
   * @var string[]
   */
  public $rdapConformance;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string[]
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string[]
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param int
   */
  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }
  /**
   * @return int
   */
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
  /**
   * @param string
   */
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setRdapConformance($rdapConformance)
  {
    $this->rdapConformance = $rdapConformance;
  }
  /**
   * @return string[]
   */
  public function getRdapConformance()
  {
    return $this->rdapConformance;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RdapResponse::class, 'Google_Service_DomainsRDAP_RdapResponse');
