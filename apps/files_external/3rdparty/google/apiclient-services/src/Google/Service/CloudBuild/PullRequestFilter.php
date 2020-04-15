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

class Google_Service_CloudBuild_PullRequestFilter extends Google_Model
{
  public $branch;
  public $commentControl;
  public $invertRegex;

  public function setBranch($branch)
  {
    $this->branch = $branch;
  }
  public function getBranch()
  {
    return $this->branch;
  }
  public function setCommentControl($commentControl)
  {
    $this->commentControl = $commentControl;
  }
  public function getCommentControl()
  {
    return $this->commentControl;
  }
  public function setInvertRegex($invertRegex)
  {
    $this->invertRegex = $invertRegex;
  }
  public function getInvertRegex()
  {
    return $this->invertRegex;
  }
}
