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

class Google_Service_Transcoder_JobTemplate extends Google_Model
{
  protected $configType = 'Google_Service_Transcoder_JobConfig';
  protected $configDataType = '';
  public $name;

  /**
   * @param Google_Service_Transcoder_JobConfig
   */
  public function setConfig(Google_Service_Transcoder_JobConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_Transcoder_JobConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
