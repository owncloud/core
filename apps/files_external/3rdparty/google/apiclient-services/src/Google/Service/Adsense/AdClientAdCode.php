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

class Google_Service_Adsense_AdClientAdCode extends Google_Model
{
  public $adCode;
  public $ampBody;
  public $ampHead;

  public function setAdCode($adCode)
  {
    $this->adCode = $adCode;
  }
  public function getAdCode()
  {
    return $this->adCode;
  }
  public function setAmpBody($ampBody)
  {
    $this->ampBody = $ampBody;
  }
  public function getAmpBody()
  {
    return $this->ampBody;
  }
  public function setAmpHead($ampHead)
  {
    $this->ampHead = $ampHead;
  }
  public function getAmpHead()
  {
    return $this->ampHead;
  }
}
