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

namespace Google\Service\ContainerAnalysis;

class Version extends \Google\Model
{
  public $epoch;
  public $inclusive;
  public $kind;
  public $name;
  public $revision;

  public function setEpoch($epoch)
  {
    $this->epoch = $epoch;
  }
  public function getEpoch()
  {
    return $this->epoch;
  }
  public function setInclusive($inclusive)
  {
    $this->inclusive = $inclusive;
  }
  public function getInclusive()
  {
    return $this->inclusive;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  public function getRevision()
  {
    return $this->revision;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Version::class, 'Google_Service_ContainerAnalysis_Version');
