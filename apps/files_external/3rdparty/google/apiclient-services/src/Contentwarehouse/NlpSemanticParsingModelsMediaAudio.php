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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingModelsMediaAudio extends \Google\Collection
{
  protected $collection_key = 'tag';
  protected $albumType = NlpSemanticParsingModelsMediaAlbumTitle::class;
  protected $albumDataType = '';
  protected $artistType = NlpSemanticParsingModelsMediaMusicArtist::class;
  protected $artistDataType = '';
  protected $bookType = NlpSemanticParsingModelsMediaBook::class;
  protected $bookDataType = '';
  protected $dateTimeType = NlpSemanticParsingDatetimeDateTime::class;
  protected $dateTimeDataType = '';
  protected $episodeConstraintType = NlpSemanticParsingModelsMediaEpisodeConstraint::class;
  protected $episodeConstraintDataType = 'array';
  protected $gameType = NlpSemanticParsingModelsMediaGame::class;
  protected $gameDataType = '';
  protected $genericMusicType = NlpSemanticParsingModelsMediaGenericMusic::class;
  protected $genericMusicDataType = '';
  protected $genreType = NlpSemanticParsingModelsMediaMusicGenre::class;
  protected $genreDataType = '';
  protected $movieType = NlpSemanticParsingModelsMediaMovie::class;
  protected $movieDataType = '';
  protected $newsTopicType = NlpSemanticParsingModelsMediaNewsTopic::class;
  protected $newsTopicDataType = '';
  /**
   * @var bool
   */
  public $noExplicitAudio;
  protected $playlistType = NlpSemanticParsingModelsMediaMusicPlaylist::class;
  protected $playlistDataType = '';
  protected $podcastType = NlpSemanticParsingModelsMediaPodcast::class;
  protected $podcastDataType = '';
  protected $radioType = NlpSemanticParsingModelsMediaRadio::class;
  protected $radioDataType = '';
  protected $radioNetworkType = NlpSemanticParsingModelsMediaRadioNetwork::class;
  protected $radioNetworkDataType = '';
  /**
   * @var string
   */
  public $rawText;
  /**
   * @var string
   */
  public $scoreType;
  protected $seasonConstraintType = NlpSemanticParsingModelsMediaSeasonConstraint::class;
  protected $seasonConstraintDataType = '';
  protected $songType = NlpSemanticParsingModelsMediaSong::class;
  protected $songDataType = '';
  /**
   * @var string[]
   */
  public $tag;
  protected $tvShowType = NlpSemanticParsingModelsMediaTVShow::class;
  protected $tvShowDataType = '';

  /**
   * @param NlpSemanticParsingModelsMediaAlbumTitle
   */
  public function setAlbum(NlpSemanticParsingModelsMediaAlbumTitle $album)
  {
    $this->album = $album;
  }
  /**
   * @return NlpSemanticParsingModelsMediaAlbumTitle
   */
  public function getAlbum()
  {
    return $this->album;
  }
  /**
   * @param NlpSemanticParsingModelsMediaMusicArtist
   */
  public function setArtist(NlpSemanticParsingModelsMediaMusicArtist $artist)
  {
    $this->artist = $artist;
  }
  /**
   * @return NlpSemanticParsingModelsMediaMusicArtist
   */
  public function getArtist()
  {
    return $this->artist;
  }
  /**
   * @param NlpSemanticParsingModelsMediaBook
   */
  public function setBook(NlpSemanticParsingModelsMediaBook $book)
  {
    $this->book = $book;
  }
  /**
   * @return NlpSemanticParsingModelsMediaBook
   */
  public function getBook()
  {
    return $this->book;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime
   */
  public function setDateTime(NlpSemanticParsingDatetimeDateTime $dateTime)
  {
    $this->dateTime = $dateTime;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime
   */
  public function getDateTime()
  {
    return $this->dateTime;
  }
  /**
   * @param NlpSemanticParsingModelsMediaEpisodeConstraint[]
   */
  public function setEpisodeConstraint($episodeConstraint)
  {
    $this->episodeConstraint = $episodeConstraint;
  }
  /**
   * @return NlpSemanticParsingModelsMediaEpisodeConstraint[]
   */
  public function getEpisodeConstraint()
  {
    return $this->episodeConstraint;
  }
  /**
   * @param NlpSemanticParsingModelsMediaGame
   */
  public function setGame(NlpSemanticParsingModelsMediaGame $game)
  {
    $this->game = $game;
  }
  /**
   * @return NlpSemanticParsingModelsMediaGame
   */
  public function getGame()
  {
    return $this->game;
  }
  /**
   * @param NlpSemanticParsingModelsMediaGenericMusic
   */
  public function setGenericMusic(NlpSemanticParsingModelsMediaGenericMusic $genericMusic)
  {
    $this->genericMusic = $genericMusic;
  }
  /**
   * @return NlpSemanticParsingModelsMediaGenericMusic
   */
  public function getGenericMusic()
  {
    return $this->genericMusic;
  }
  /**
   * @param NlpSemanticParsingModelsMediaMusicGenre
   */
  public function setGenre(NlpSemanticParsingModelsMediaMusicGenre $genre)
  {
    $this->genre = $genre;
  }
  /**
   * @return NlpSemanticParsingModelsMediaMusicGenre
   */
  public function getGenre()
  {
    return $this->genre;
  }
  /**
   * @param NlpSemanticParsingModelsMediaMovie
   */
  public function setMovie(NlpSemanticParsingModelsMediaMovie $movie)
  {
    $this->movie = $movie;
  }
  /**
   * @return NlpSemanticParsingModelsMediaMovie
   */
  public function getMovie()
  {
    return $this->movie;
  }
  /**
   * @param NlpSemanticParsingModelsMediaNewsTopic
   */
  public function setNewsTopic(NlpSemanticParsingModelsMediaNewsTopic $newsTopic)
  {
    $this->newsTopic = $newsTopic;
  }
  /**
   * @return NlpSemanticParsingModelsMediaNewsTopic
   */
  public function getNewsTopic()
  {
    return $this->newsTopic;
  }
  /**
   * @param bool
   */
  public function setNoExplicitAudio($noExplicitAudio)
  {
    $this->noExplicitAudio = $noExplicitAudio;
  }
  /**
   * @return bool
   */
  public function getNoExplicitAudio()
  {
    return $this->noExplicitAudio;
  }
  /**
   * @param NlpSemanticParsingModelsMediaMusicPlaylist
   */
  public function setPlaylist(NlpSemanticParsingModelsMediaMusicPlaylist $playlist)
  {
    $this->playlist = $playlist;
  }
  /**
   * @return NlpSemanticParsingModelsMediaMusicPlaylist
   */
  public function getPlaylist()
  {
    return $this->playlist;
  }
  /**
   * @param NlpSemanticParsingModelsMediaPodcast
   */
  public function setPodcast(NlpSemanticParsingModelsMediaPodcast $podcast)
  {
    $this->podcast = $podcast;
  }
  /**
   * @return NlpSemanticParsingModelsMediaPodcast
   */
  public function getPodcast()
  {
    return $this->podcast;
  }
  /**
   * @param NlpSemanticParsingModelsMediaRadio
   */
  public function setRadio(NlpSemanticParsingModelsMediaRadio $radio)
  {
    $this->radio = $radio;
  }
  /**
   * @return NlpSemanticParsingModelsMediaRadio
   */
  public function getRadio()
  {
    return $this->radio;
  }
  /**
   * @param NlpSemanticParsingModelsMediaRadioNetwork
   */
  public function setRadioNetwork(NlpSemanticParsingModelsMediaRadioNetwork $radioNetwork)
  {
    $this->radioNetwork = $radioNetwork;
  }
  /**
   * @return NlpSemanticParsingModelsMediaRadioNetwork
   */
  public function getRadioNetwork()
  {
    return $this->radioNetwork;
  }
  /**
   * @param string
   */
  public function setRawText($rawText)
  {
    $this->rawText = $rawText;
  }
  /**
   * @return string
   */
  public function getRawText()
  {
    return $this->rawText;
  }
  /**
   * @param string
   */
  public function setScoreType($scoreType)
  {
    $this->scoreType = $scoreType;
  }
  /**
   * @return string
   */
  public function getScoreType()
  {
    return $this->scoreType;
  }
  /**
   * @param NlpSemanticParsingModelsMediaSeasonConstraint
   */
  public function setSeasonConstraint(NlpSemanticParsingModelsMediaSeasonConstraint $seasonConstraint)
  {
    $this->seasonConstraint = $seasonConstraint;
  }
  /**
   * @return NlpSemanticParsingModelsMediaSeasonConstraint
   */
  public function getSeasonConstraint()
  {
    return $this->seasonConstraint;
  }
  /**
   * @param NlpSemanticParsingModelsMediaSong
   */
  public function setSong(NlpSemanticParsingModelsMediaSong $song)
  {
    $this->song = $song;
  }
  /**
   * @return NlpSemanticParsingModelsMediaSong
   */
  public function getSong()
  {
    return $this->song;
  }
  /**
   * @param string[]
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return string[]
   */
  public function getTag()
  {
    return $this->tag;
  }
  /**
   * @param NlpSemanticParsingModelsMediaTVShow
   */
  public function setTvShow(NlpSemanticParsingModelsMediaTVShow $tvShow)
  {
    $this->tvShow = $tvShow;
  }
  /**
   * @return NlpSemanticParsingModelsMediaTVShow
   */
  public function getTvShow()
  {
    return $this->tvShow;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaAudio::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaAudio');
