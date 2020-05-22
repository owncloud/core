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

class Google_Service_FirebaseHosting_Rewrite extends Google_Model
{
  public $dynamicLinks;
  public $function;
  public $glob;
  public $path;
  public $regex;
  protected $runType = 'Google_Service_FirebaseHosting_CloudRunRewrite';
  protected $runDataType = '';

  public function setDynamicLinks($dynamicLinks)
  {
    $this->dynamicLinks = $dynamicLinks;
  }
  public function getDynamicLinks()
  {
    return $this->dynamicLinks;
  }
  public function setFunction($function)
  {
    $this->function = $function;
  }
  public function getFunction()
  {
    return $this->function;
  }
  public function setGlob($glob)
  {
    $this->glob = $glob;
  }
  public function getGlob()
  {
    return $this->glob;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setRegex($regex)
  {
    $this->regex = $regex;
  }
  public function getRegex()
  {
    return $this->regex;
  }
  /**
   * @param Google_Service_FirebaseHosting_CloudRunRewrite
   */
  public function setRun(Google_Service_FirebaseHosting_CloudRunRewrite $run)
  {
    $this->run = $run;
  }
  /**
   * @return Google_Service_FirebaseHosting_CloudRunRewrite
   */
  public function getRun()
  {
    return $this->run;
  }
}
