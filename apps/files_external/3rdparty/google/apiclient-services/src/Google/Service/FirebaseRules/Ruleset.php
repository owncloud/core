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

class Google_Service_FirebaseRules_Ruleset extends Google_Model
{
  public $createTime;
  protected $metadataType = 'Google_Service_FirebaseRules_Metadata';
  protected $metadataDataType = '';
  public $name;
  protected $sourceType = 'Google_Service_FirebaseRules_Source';
  protected $sourceDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_FirebaseRules_Metadata
   */
  public function setMetadata(Google_Service_FirebaseRules_Metadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_FirebaseRules_Metadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_FirebaseRules_Source
   */
  public function setSource(Google_Service_FirebaseRules_Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_FirebaseRules_Source
   */
  public function getSource()
  {
    return $this->source;
  }
}
