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

namespace Google\Service\Transcoder;

class Progress extends \Google\Model
{
  public $analyzed;
  public $encoded;
  public $notified;
  public $uploaded;

  public function setAnalyzed($analyzed)
  {
    $this->analyzed = $analyzed;
  }
  public function getAnalyzed()
  {
    return $this->analyzed;
  }
  public function setEncoded($encoded)
  {
    $this->encoded = $encoded;
  }
  public function getEncoded()
  {
    return $this->encoded;
  }
  public function setNotified($notified)
  {
    $this->notified = $notified;
  }
  public function getNotified()
  {
    return $this->notified;
  }
  public function setUploaded($uploaded)
  {
    $this->uploaded = $uploaded;
  }
  public function getUploaded()
  {
    return $this->uploaded;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Progress::class, 'Google_Service_Transcoder_Progress');
