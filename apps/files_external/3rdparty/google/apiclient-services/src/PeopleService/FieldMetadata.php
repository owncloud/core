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

namespace Google\Service\PeopleService;

class FieldMetadata extends \Google\Model
{
  public $primary;
  protected $sourceType = Source::class;
  protected $sourceDataType = '';
  public $sourcePrimary;
  public $verified;

  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param Source
   */
  public function setSource(Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Source
   */
  public function getSource()
  {
    return $this->source;
  }
  public function setSourcePrimary($sourcePrimary)
  {
    $this->sourcePrimary = $sourcePrimary;
  }
  public function getSourcePrimary()
  {
    return $this->sourcePrimary;
  }
  public function setVerified($verified)
  {
    $this->verified = $verified;
  }
  public function getVerified()
  {
    return $this->verified;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FieldMetadata::class, 'Google_Service_PeopleService_FieldMetadata');
