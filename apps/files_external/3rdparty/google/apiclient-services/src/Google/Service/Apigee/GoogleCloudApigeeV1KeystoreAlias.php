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

class Google_Service_Apigee_GoogleCloudApigeeV1KeystoreAlias extends Google_Collection
{
  protected $collection_key = 'domainNames';
  public $alias;
  public $domainNames;
  public $expiryDate;
  public $valid;

  public function setAlias($alias)
  {
    $this->alias = $alias;
  }
  public function getAlias()
  {
    return $this->alias;
  }
  public function setDomainNames($domainNames)
  {
    $this->domainNames = $domainNames;
  }
  public function getDomainNames()
  {
    return $this->domainNames;
  }
  public function setExpiryDate($expiryDate)
  {
    $this->expiryDate = $expiryDate;
  }
  public function getExpiryDate()
  {
    return $this->expiryDate;
  }
  public function setValid($valid)
  {
    $this->valid = $valid;
  }
  public function getValid()
  {
    return $this->valid;
  }
}
