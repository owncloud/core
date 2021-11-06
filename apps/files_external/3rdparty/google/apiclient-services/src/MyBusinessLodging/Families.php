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

namespace Google\Service\MyBusinessLodging;

class Families extends \Google\Model
{
  public $babysitting;
  public $babysittingException;
  public $kidsActivities;
  public $kidsActivitiesException;
  public $kidsClub;
  public $kidsClubException;

  public function setBabysitting($babysitting)
  {
    $this->babysitting = $babysitting;
  }
  public function getBabysitting()
  {
    return $this->babysitting;
  }
  public function setBabysittingException($babysittingException)
  {
    $this->babysittingException = $babysittingException;
  }
  public function getBabysittingException()
  {
    return $this->babysittingException;
  }
  public function setKidsActivities($kidsActivities)
  {
    $this->kidsActivities = $kidsActivities;
  }
  public function getKidsActivities()
  {
    return $this->kidsActivities;
  }
  public function setKidsActivitiesException($kidsActivitiesException)
  {
    $this->kidsActivitiesException = $kidsActivitiesException;
  }
  public function getKidsActivitiesException()
  {
    return $this->kidsActivitiesException;
  }
  public function setKidsClub($kidsClub)
  {
    $this->kidsClub = $kidsClub;
  }
  public function getKidsClub()
  {
    return $this->kidsClub;
  }
  public function setKidsClubException($kidsClubException)
  {
    $this->kidsClubException = $kidsClubException;
  }
  public function getKidsClubException()
  {
    return $this->kidsClubException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Families::class, 'Google_Service_MyBusinessLodging_Families');
