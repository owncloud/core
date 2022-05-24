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

namespace Google\Service\Blogger;

class Post extends \Google\Collection
{
  protected $collection_key = 'labels';
  protected $authorType = PostAuthor::class;
  protected $authorDataType = '';
  protected $blogType = PostBlog::class;
  protected $blogDataType = '';
  /**
   * @var string
   */
  public $content;
  /**
   * @var string
   */
  public $customMetaData;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  protected $imagesType = PostImages::class;
  protected $imagesDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $labels;
  protected $locationType = PostLocation::class;
  protected $locationDataType = '';
  /**
   * @var string
   */
  public $published;
  /**
   * @var string
   */
  public $readerComments;
  protected $repliesType = PostReplies::class;
  protected $repliesDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $titleLink;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $url;

  /**
   * @param PostAuthor
   */
  public function setAuthor(PostAuthor $author)
  {
    $this->author = $author;
  }
  /**
   * @return PostAuthor
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param PostBlog
   */
  public function setBlog(PostBlog $blog)
  {
    $this->blog = $blog;
  }
  /**
   * @return PostBlog
   */
  public function getBlog()
  {
    return $this->blog;
  }
  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param string
   */
  public function setCustomMetaData($customMetaData)
  {
    $this->customMetaData = $customMetaData;
  }
  /**
   * @return string
   */
  public function getCustomMetaData()
  {
    return $this->customMetaData;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param PostImages[]
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return PostImages[]
   */
  public function getImages()
  {
    return $this->images;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param PostLocation
   */
  public function setLocation(PostLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return PostLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setPublished($published)
  {
    $this->published = $published;
  }
  /**
   * @return string
   */
  public function getPublished()
  {
    return $this->published;
  }
  /**
   * @param string
   */
  public function setReaderComments($readerComments)
  {
    $this->readerComments = $readerComments;
  }
  /**
   * @return string
   */
  public function getReaderComments()
  {
    return $this->readerComments;
  }
  /**
   * @param PostReplies
   */
  public function setReplies(PostReplies $replies)
  {
    $this->replies = $replies;
  }
  /**
   * @return PostReplies
   */
  public function getReplies()
  {
    return $this->replies;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setTitleLink($titleLink)
  {
    $this->titleLink = $titleLink;
  }
  /**
   * @return string
   */
  public function getTitleLink()
  {
    return $this->titleLink;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Post::class, 'Google_Service_Blogger_Post');
