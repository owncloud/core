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

class Google_Service_ServiceNetworking_BackendRule extends Google_Model
{
  public $address;
  public $deadline;
  public $disableAuth;
  public $jwtAudience;
  public $minDeadline;
  public $operationDeadline;
  public $pathTranslation;
  public $protocol;
  public $selector;

  public function setAddress($address)
  {
    $this->address = $address;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function setDeadline($deadline)
  {
    $this->deadline = $deadline;
  }
  public function getDeadline()
  {
    return $this->deadline;
  }
  public function setDisableAuth($disableAuth)
  {
    $this->disableAuth = $disableAuth;
  }
  public function getDisableAuth()
  {
    return $this->disableAuth;
  }
  public function setJwtAudience($jwtAudience)
  {
    $this->jwtAudience = $jwtAudience;
  }
  public function getJwtAudience()
  {
    return $this->jwtAudience;
  }
  public function setMinDeadline($minDeadline)
  {
    $this->minDeadline = $minDeadline;
  }
  public function getMinDeadline()
  {
    return $this->minDeadline;
  }
  public function setOperationDeadline($operationDeadline)
  {
    $this->operationDeadline = $operationDeadline;
  }
  public function getOperationDeadline()
  {
    return $this->operationDeadline;
  }
  public function setPathTranslation($pathTranslation)
  {
    $this->pathTranslation = $pathTranslation;
  }
  public function getPathTranslation()
  {
    return $this->pathTranslation;
  }
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  public function getProtocol()
  {
    return $this->protocol;
  }
  public function setSelector($selector)
  {
    $this->selector = $selector;
  }
  public function getSelector()
  {
    return $this->selector;
  }
}
