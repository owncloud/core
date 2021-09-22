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

namespace Google\Service\Games;

class Application extends \Google\Collection
{
  protected $collection_key = 'instances';
  protected $internal_gapi_mappings = [
        "achievementCount" => "achievement_count",
        "leaderboardCount" => "leaderboard_count",
  ];
  public $achievementCount;
  protected $assetsType = ImageAsset::class;
  protected $assetsDataType = 'array';
  public $author;
  protected $categoryType = ApplicationCategory::class;
  protected $categoryDataType = '';
  public $description;
  public $enabledFeatures;
  public $id;
  protected $instancesType = Instance::class;
  protected $instancesDataType = 'array';
  public $kind;
  public $lastUpdatedTimestamp;
  public $leaderboardCount;
  public $name;
  public $themeColor;

  public function setAchievementCount($achievementCount)
  {
    $this->achievementCount = $achievementCount;
  }
  public function getAchievementCount()
  {
    return $this->achievementCount;
  }
  /**
   * @param ImageAsset[]
   */
  public function setAssets($assets)
  {
    $this->assets = $assets;
  }
  /**
   * @return ImageAsset[]
   */
  public function getAssets()
  {
    return $this->assets;
  }
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param ApplicationCategory
   */
  public function setCategory(ApplicationCategory $category)
  {
    $this->category = $category;
  }
  /**
   * @return ApplicationCategory
   */
  public function getCategory()
  {
    return $this->category;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnabledFeatures($enabledFeatures)
  {
    $this->enabledFeatures = $enabledFeatures;
  }
  public function getEnabledFeatures()
  {
    return $this->enabledFeatures;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Instance[]
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return Instance[]
   */
  public function getInstances()
  {
    return $this->instances;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
  {
    $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
  }
  public function getLastUpdatedTimestamp()
  {
    return $this->lastUpdatedTimestamp;
  }
  public function setLeaderboardCount($leaderboardCount)
  {
    $this->leaderboardCount = $leaderboardCount;
  }
  public function getLeaderboardCount()
  {
    return $this->leaderboardCount;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setThemeColor($themeColor)
  {
    $this->themeColor = $themeColor;
  }
  public function getThemeColor()
  {
    return $this->themeColor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Application::class, 'Google_Service_Games_Application');
