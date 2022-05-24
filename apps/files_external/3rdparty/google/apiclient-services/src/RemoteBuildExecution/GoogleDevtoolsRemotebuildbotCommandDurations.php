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

namespace Google\Service\RemoteBuildExecution;

class GoogleDevtoolsRemotebuildbotCommandDurations extends \Google\Model
{
  public $casRelease;
  public $cmWaitForAssignment;
  public $dockerPrep;
  public $dockerPrepStartTime;
  public $download;
  public $downloadStartTime;
  public $execStartTime;
  public $execution;
  public $isoPrepDone;
  public $overall;
  public $stdout;
  public $upload;
  public $uploadStartTime;

  public function setCasRelease($casRelease)
  {
    $this->casRelease = $casRelease;
  }
  public function getCasRelease()
  {
    return $this->casRelease;
  }
  public function setCmWaitForAssignment($cmWaitForAssignment)
  {
    $this->cmWaitForAssignment = $cmWaitForAssignment;
  }
  public function getCmWaitForAssignment()
  {
    return $this->cmWaitForAssignment;
  }
  public function setDockerPrep($dockerPrep)
  {
    $this->dockerPrep = $dockerPrep;
  }
  public function getDockerPrep()
  {
    return $this->dockerPrep;
  }
  public function setDockerPrepStartTime($dockerPrepStartTime)
  {
    $this->dockerPrepStartTime = $dockerPrepStartTime;
  }
  public function getDockerPrepStartTime()
  {
    return $this->dockerPrepStartTime;
  }
  public function setDownload($download)
  {
    $this->download = $download;
  }
  public function getDownload()
  {
    return $this->download;
  }
  public function setDownloadStartTime($downloadStartTime)
  {
    $this->downloadStartTime = $downloadStartTime;
  }
  public function getDownloadStartTime()
  {
    return $this->downloadStartTime;
  }
  public function setExecStartTime($execStartTime)
  {
    $this->execStartTime = $execStartTime;
  }
  public function getExecStartTime()
  {
    return $this->execStartTime;
  }
  public function setExecution($execution)
  {
    $this->execution = $execution;
  }
  public function getExecution()
  {
    return $this->execution;
  }
  public function setIsoPrepDone($isoPrepDone)
  {
    $this->isoPrepDone = $isoPrepDone;
  }
  public function getIsoPrepDone()
  {
    return $this->isoPrepDone;
  }
  public function setOverall($overall)
  {
    $this->overall = $overall;
  }
  public function getOverall()
  {
    return $this->overall;
  }
  public function setStdout($stdout)
  {
    $this->stdout = $stdout;
  }
  public function getStdout()
  {
    return $this->stdout;
  }
  public function setUpload($upload)
  {
    $this->upload = $upload;
  }
  public function getUpload()
  {
    return $this->upload;
  }
  public function setUploadStartTime($uploadStartTime)
  {
    $this->uploadStartTime = $uploadStartTime;
  }
  public function getUploadStartTime()
  {
    return $this->uploadStartTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemotebuildbotCommandDurations::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotCommandDurations');
