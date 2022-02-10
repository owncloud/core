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

namespace Google\Service\TrafficDirectorService;

class RegexMatcher extends \Google\Model
{
  protected $googleRe2Type = GoogleRE2::class;
  protected $googleRe2DataType = '';
  /**
   * @var string
   */
  public $regex;

  /**
   * @param GoogleRE2
   */
  public function setGoogleRe2(GoogleRE2 $googleRe2)
  {
    $this->googleRe2 = $googleRe2;
  }
  /**
   * @return GoogleRE2
   */
  public function getGoogleRe2()
  {
    return $this->googleRe2;
  }
  /**
   * @param string
   */
  public function setRegex($regex)
  {
    $this->regex = $regex;
  }
  /**
   * @return string
   */
  public function getRegex()
  {
    return $this->regex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegexMatcher::class, 'Google_Service_TrafficDirectorService_RegexMatcher');
